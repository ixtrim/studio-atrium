<?php
/**
 * Point7_WebApp — core static facade and MVC dispatcher.
 *
 * Reads config-www.xml, bootstraps services, and dispatches
 * ?module=X&action=Y requests to StudioAtrium module classes.
 */
class Point7_WebApp
{
    private static array                       $config        = [];
    private static ?Point7_WebApp_Session      $session       = null;
    private static ?Point7_WebApp_Cache_File   $cache         = null;
    private static ?Point7_WebApp_Cache_File   $userCache     = null;
    private static array                       $loggers       = [];
    private static mixed                       $daoRepository = null;
    private static array                       $registry      = [];
    private static ?PDO                        $pdo           = null;
    private static ?Point7_WebApp_Context_Application $appCtx = null;

    // -------------------------------------------------------------------------
    // Bootstrap
    // -------------------------------------------------------------------------

    public static function init(object $initConfig): void
    {
        $configFile = APP_PATH . '/Conf/config-www.xml';
        self::$config = self::parseConfig($configFile);

        // PDO
        $dsn    = self::$config['registry']['global']['dbconnection::pdo1']['dsn']      ?? '';
        $user   = self::$config['registry']['global']['dbconnection::pdo1']['username'] ?? '';
        $pass   = self::$config['registry']['global']['dbconnection::pdo1']['passwd']   ?? '';
        if ($dsn) {
            try {
                self::$pdo = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4',
                ]);
            } catch (PDOException $e) {
                // Non-fatal on dev: log and continue
                error_log('Point7_WebApp: DB connection failed: ' . $e->getMessage());
            }
        }

        // Session
        self::$session = new Point7_WebApp_Session();
        $sc = self::$config['registry']['global']['application::session'] ?? [];
        foreach ($sc as $k => $v) {
            self::$session->configure($k, $v);
        }
        self::$session->init();

        // Cache
        self::$cache = new Point7_WebApp_Cache_File();
        $cachePath   = self::resolveValue(
            self::$config['registry']['global']['application::cache']['path'] ?? (APP_PATH . '/Cache')
        );
        self::$cache->configure('path', $cachePath);
        self::$cache->init();

        self::$userCache = new Point7_WebApp_Cache_File();
        $userCachePath   = self::resolveValue(
            self::$config['registry']['global']['application::userCache']['path'] ?? (APP_PATH . '/Cache/Users')
        );
        self::$userCache->configure('path', $userCachePath);
        self::$userCache->init();

        // DAO repository
        if (class_exists('\StudioAtrium\Application\DAORepository')) {
            self::$daoRepository = new \StudioAtrium\Application\DAORepository(self::$pdo);
        }

        // Allow the app's InitConfig to run extra setup
        if (method_exists($initConfig, 'configure')) {
            $initConfig->configure();
        }
    }

    // -------------------------------------------------------------------------
    // Request Dispatch
    // -------------------------------------------------------------------------

    public static function run(): void
    {
        $moduleName = ucfirst(strtolower($_GET['module'] ?? 'index'));
        $moduleName = self::normalizeModuleName($moduleName);

        self::dispatch($moduleName, null, 0);
    }

    private static function dispatch(string $moduleName, ?string $forcedAction, int $depth): void
    {
        if ($depth > 10) {
            http_response_code(500);
            echo 'Too many forwards.';
            return;
        }

        $moduleXml = APP_PATH . '/Conf/Modules/' . $moduleName . '.xml';
        if (!file_exists($moduleXml)) {
            self::dispatch('Page', 'Display404', $depth + 1);
            return;
        }

        $moduleConfig = self::parseModuleXml($moduleXml);
        $actionName   = $forcedAction
            ?? ucfirst(strtolower($_GET['action'] ?? ''))
            ?: $moduleConfig['default_action'];

        // Build request + validate params
        $request = self::buildRequest($moduleConfig, $actionName);

        // Application context
        $appCtx = new Point7_WebApp_Context_Application();
        $appCtx->setConfig(self::$config);
        $appCtx->setSecret((string)(self::$config['secret'] ?? ''));

        // Response context — use app-level subclass if available
        $responseCtx = class_exists('\StudioAtrium\Application\WWW\ResponseContext')
            ? new \StudioAtrium\Application\WWW\ResponseContext()
            : new Point7_WebApp_Context_Response();

        self::$appCtx = $appCtx;

        // Run before-commands
        $commandResults = self::runBeforeCommands($moduleConfig, $actionName, $request, $appCtx, $responseCtx);
        foreach ($commandResults as $class => $result) {
            $appCtx->recordCommandResult($class, $result === Point7_WebApp_Command_Abstract::STATE_OK);
        }

        // Instantiate module
        $className = $moduleConfig['classname'];
        if (!class_exists($className)) {
            self::dispatch('Page', 'Display404', $depth + 1);
            return;
        }

        $module   = new $className();
        $method   = 'do' . $actionName;
        $resultKey = null;
        $exitOk    = true;

        try {
            // _initAction
            if (method_exists($module, '_initAction')) {
                $module->_initAction($actionName, $request, $appCtx, $responseCtx);
            }

            if (!method_exists($module, $method)) {
                self::dispatch('Page', 'Display404', $depth + 1);
                return;
            }

            $module->$method($request, $appCtx, $responseCtx);

        } catch (Point7_WebApp_ExitException $e) {
            $exitOk    = $e->isOk;
            $resultKey = $e->resultKey;

        } catch (Point7_WebApp_ForwardException $e) {
            $fwdModule = self::normalizeModuleName($e->module);
            $fwdAction = $e->action ? ucfirst($e->action) : null;
            // Merge forward params into GET
            foreach ($responseCtx->getForwardParams() as $k => $v) {
                $_GET[$k] = $v;
            }
            self::dispatch($fwdModule, $fwdAction, $depth + 1);
            return;

        } catch (Point7_WebApp_RedirectException $e) {
            header('Location: ' . $e->url, true, $e->httpCode);
            return;
        }

        // Resolve result_map
        self::renderResult($moduleConfig, $actionName, $exitOk, $resultKey, $request, $appCtx, $responseCtx, $depth);
    }

    private static function renderResult(
        array $moduleConfig,
        string $actionName,
        bool $exitOk,
        ?string $resultKey,
        Point7_WebApp_Request $request,
        Point7_WebApp_Context_Application $appCtx,
        Point7_WebApp_Context_Response $responseCtx,
        int $depth
    ): void {
        $resultMap = $moduleConfig['result_map'][$actionName] ?? [];

        // Determine which result_map key to use
        $candidates = [];
        if ($resultKey !== null) {
            $candidates[] = 'on_' . $resultKey;
        }
        $candidates[] = $exitOk ? 'on_exec_ok' : 'on_exec_error';

        $result = null;
        foreach ($candidates as $candidate) {
            if (isset($resultMap[$candidate])) {
                $result = $resultMap[$candidate];
                break;
            }
        }

        if ($result === null) {
            // No result_map entry → output JSON if json data set, else nothing
            self::outputResponse($responseCtx, ['type' => 'dummy'], $depth);
            return;
        }

        self::outputResponse($responseCtx, $result, $depth);
    }

    private static function outputResponse(
        Point7_WebApp_Context_Response $responseCtx,
        array $result,
        int $depth
    ): void {
        $type = $result['type'] ?? 'dummy';

        switch ($type) {
            case 'forward':
                $fwdModule = self::normalizeModuleName($result['module']);
                $fwdAction = isset($result['action']) ? ucfirst($result['action']) : null;
                foreach ($responseCtx->getForwardParams() as $k => $v) {
                    $_GET[$k] = $v;
                }
                self::dispatch($fwdModule, $fwdAction, $depth + 1);
                return;

            case 'redirect':
                header('Location: ' . $result['url'], true, (int)($result['code'] ?? 302));
                return;

            case 'json':
                foreach ($responseCtx->getHTTPResponseHeaders() as $name => $value) {
                    header("$name: $value");
                }
                header('Content-Type: application/json; charset=utf-8');
                echo json_encode($responseCtx->getJSONResponse(), JSON_UNESCAPED_UNICODE);
                return;

            case 'javascript':
                header('Content-Type: application/javascript; charset=utf-8');
                echo $responseCtx->getJavaScriptResponse() ?? '';
                return;

            case 'file':
                foreach ($responseCtx->getHTTPResponseHeaders() as $name => $value) {
                    header("$name: $value");
                }
                $fileData = $responseCtx->getFileToSend();
                if ($fileData !== null) {
                    echo $fileData;
                } elseif ($responseCtx->getFileContent() !== null) {
                    echo $responseCtx->getFileContent();
                }
                return;

            case 'dummy':
                foreach ($responseCtx->getHTTPResponseHeaders() as $name => $value) {
                    header("$name: $value");
                }
                if ($responseCtx->getFileToSend() !== null) {
                    echo $responseCtx->getFileToSend();
                }
                return;

            case 'smarty3':
                self::renderSmarty($result, $responseCtx);
                return;

            default:
                self::renderSmarty($result, $responseCtx);
        }
    }

    private static function renderSmarty(array $result, Point7_WebApp_Context_Response $responseCtx): void
    {
        $smarty = new Smarty();
        $tplDir     = self::getConfigParam('views.smarty.template_dir') ?? '';
        $compileDir = self::getConfigParam('views.smarty.compile_dir') ?? '';
        if ($tplDir)     $smarty->setTemplateDir($tplDir);
        if ($compileDir) {
            if (!is_dir($compileDir)) @mkdir($compileDir, 0775, true);
            $smarty->setCompileDir($compileDir);
        }

        // Assign all response data
        foreach ($responseCtx->getAll() as $key => $value) {
            $smarty->assign($key, $value);
        }

        // Assign smarty.* params from result_map
        foreach ($result['params'] ?? [] as $k => $v) {
            if (str_starts_with($k, 'smarty.')) {
                $smarty->assign(substr($k, 7), $v);
            }
        }

        // Messages
        if ($msg = $responseCtx->getErrorMessage()) {
            $smarty->assign('errorMessage', $msg);
        }
        if ($msg = $responseCtx->getInfoMessage()) {
            $smarty->assign('infoMessage', $msg);
        }

        foreach ($responseCtx->getHTTPResponseHeaders() as $name => $value) {
            header("$name: $value");
        }

        $layout   = $result['params']['layout']   ?? null;
        $template = $result['params']['template']  ?? null;

        if ($layout && $template) {
            $smarty->assign('_contentTemplate', $template);
            $smarty->display($layout);
        } elseif ($template) {
            $smarty->display($template);
        }
    }

    // -------------------------------------------------------------------------
    // Request building + param validation
    // -------------------------------------------------------------------------

    private static function buildRequest(array $moduleConfig, string $actionName): Point7_WebApp_Request_Filtered
    {
        $request = new Point7_WebApp_Request_Filtered(
            $_GET    ?? [],
            $_POST   ?? [],
            $_FILES  ?? [],
            $_COOKIE ?? [],
            $_SERVER['REQUEST_METHOD'] ?? 'GET'
        );

        $actionConfig = $moduleConfig['actions'][$actionName] ?? null;
        if (!$actionConfig) {
            return $request;
        }

        $allowedMethod = strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
        $allowed = $actionConfig['allowed_methods'][$allowedMethod] ?? false;
        // Allow if no restrictions set
        if (!empty($actionConfig['allowed_methods']) && !$allowed) {
            $request->markInvalid('_method', 'Method not allowed');
        }

        $allowedNames = [];
        foreach ($actionConfig['params'] ?? [] as $paramName => $paramDef) {
            $allowedNames[] = $paramName;
            $value = $_GET[$paramName] ?? $_POST[$paramName] ?? null;

            if ($value === null || $value === '') {
                if ($paramDef['required'] ?? false) {
                    $msg = $paramDef['msg_required'] ?? "Parametr '{$paramName}' jest wymagany.";
                    $request->markInvalid($paramName, $msg);
                } elseif (isset($paramDef['default'])) {
                    // Inject default into globals so getParam() picks it up
                    $_GET[$paramName] = $paramDef['default'];
                }
            } else {
                // Basic validators
                $validator = $paramDef['validator'] ?? 'String';
                self::applyValidator($request, $paramName, $value, $validator, $paramDef);
            }
        }

        $request->setAllowedParams($allowedNames);

        // Re-populate the request with possibly-updated globals
        return new Point7_WebApp_Request_Filtered(
            $_GET    ?? [],
            $_POST   ?? [],
            $_FILES  ?? [],
            $_COOKIE ?? [],
            $_SERVER['REQUEST_METHOD'] ?? 'GET'
        );
    }

    private static function applyValidator(
        Point7_WebApp_Request_Filtered $request,
        string $paramName,
        mixed $value,
        string $validator,
        array $paramDef
    ): void {
        switch ($validator) {
            case 'Integer':
                if (!is_numeric($value) || (string)(int)$value !== (string)$value) {
                    $request->markInvalid($paramName, "Parametr '{$paramName}' musi być liczbą całkowitą.");
                    break;
                }
                $val = (int)$value;
                if (isset($paramDef['min']) && $val < (int)$paramDef['min']) {
                    $request->markInvalid($paramName, "Parametr '{$paramName}' jest za mały.");
                }
                if (isset($paramDef['max']) && $val > (int)$paramDef['max']) {
                    $request->markInvalid($paramName, "Parametr '{$paramName}' jest za duży.");
                }
                break;
            case 'Email':
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $request->markInvalid($paramName, "Nieprawidłowy adres e-mail.");
                }
                break;
            case 'String':
                $len = strlen((string)$value);
                if (isset($paramDef['min_length']) && $len < (int)$paramDef['min_length']) {
                    $msg = $paramDef['msg_min_length'] ?? "Parametr '{$paramName}' jest za krótki.";
                    $request->markInvalid($paramName, $msg);
                }
                if (isset($paramDef['max_length']) && $len > (int)$paramDef['max_length']) {
                    $request->markInvalid($paramName, "Parametr '{$paramName}' jest za długi.");
                }
                break;
        }
    }

    // -------------------------------------------------------------------------
    // Command runner
    // -------------------------------------------------------------------------

    private static function runBeforeCommands(
        array $moduleConfig,
        string $actionName,
        Point7_WebApp_Request $request,
        Point7_WebApp_Context_Application $appCtx,
        Point7_WebApp_Context_Response $responseCtx
    ): array {
        $results  = [];
        $commands = $moduleConfig['commands']['before'] ?? [];
        // Sort by priority descending
        usort($commands, fn($a, $b) => (int)$b['priority'] - (int)$a['priority']);

        foreach ($commands as $cmd) {
            $action = $cmd['action'] ?? '*';
            if ($action !== '*' && strtolower($action) !== strtolower($actionName)) {
                continue;
            }
            $class = $cmd['class'];
            if (!class_exists($class)) {
                // Look in Commands/ directory
                $file = APP_PATH . '/Commands/' . $class . '.php';
                if (file_exists($file)) require_once $file;
            }
            if (class_exists($class)) {
                $instance = new $class();
                $results[$class] = $instance->execute($request, $appCtx, $responseCtx);
            }
        }
        return $results;
    }

    // -------------------------------------------------------------------------
    // XML Config Parser
    // -------------------------------------------------------------------------

    private static function parseConfig(string $file): array
    {
        if (!file_exists($file)) return [];

        $xml = simplexml_load_file($file);
        if (!$xml) return [];

        $config = self::xmlToArray($xml);

        // Flatten dot-notation config from <paths>, <domain>, <mailer>, etc.
        return $config;
    }

    private static function xmlToArray(\SimpleXMLElement $xml): array
    {
        $result = [];
        foreach ($xml->children() as $tag => $child) {
            $value = count($child->children()) > 0
                ? self::xmlToArray($child)
                : self::resolveValue((string)$child);

            if (isset($result[$tag])) {
                if (!is_array($result[$tag]) || !isset($result[$tag][0])) {
                    $result[$tag] = [$result[$tag]];
                }
                $result[$tag][] = $value;
            } else {
                // Also collect XML attributes as sub-keys
                $attrs = [];
                foreach ($child->attributes() as $k => $v) {
                    $attrs[$k] = (string)$v;
                }
                if ($attrs && is_array($value)) {
                    $value = array_merge($attrs, $value);
                } elseif ($attrs && !is_array($value)) {
                    // leaf node with attributes
                    if ($value !== '') $attrs['_value'] = $value;
                    $value = $attrs;
                }

                $result[$tag] = $value;
            }
        }

        // Handle <object> elements in registry — index by 'name' attribute
        if ($xml->getName() === 'global' || $xml->getName() === 'dao') {
            $result = self::parseRegistryObjects($xml);
        }

        return $result;
    }

    private static function parseRegistryObjects(\SimpleXMLElement $xml): array
    {
        $result = [];
        foreach ($xml->children() as $child) {
            if ($child->getName() === 'object') {
                $name  = (string)($child['name'] ?? '');
                $class = (string)($child['class'] ?? '');
                $entry = ['class' => $class, 'global' => (string)($child['global'] ?? 'false') === 'true'];
                foreach ($child->children() as $param) {
                    $pName   = (string)($param['name']   ?? '');
                    $pValue  = (string)($param['value']  ?? '');
                    $pTarget = (string)($param['target'] ?? '');
                    if ($pTarget === 'configure') {
                        $entry[$pName] = self::resolveValue($pValue);
                    } else {
                        $entry[$pName] = self::resolveValue($pValue);
                    }
                }
                if ($name) $result[$name] = $entry;
            } elseif ($child->getName() === 'include') {
                // Merge included file
                $includeFile = APP_PATH . '/Conf/' . (string)($child['file'] ?? '');
                if (file_exists($includeFile)) {
                    $included = simplexml_load_file($includeFile);
                    if ($included) {
                        $result = array_merge($result, self::parseRegistryObjects($included));
                    }
                }
            }
        }
        return $result;
    }

    private static function parseModuleXml(string $file): array
    {
        $xml = simplexml_load_file($file);
        if (!$xml) return [];

        $config = [
            'classname'      => (string)$xml->classname,
            'classfile'      => (string)$xml->classfile,
            'default_action' => ucfirst((string)$xml->default_action),
            'actions'        => [],
            'commands'       => ['before' => []],
            'result_map'     => [],
        ];

        // Parse request/actions
        if ($xml->request) {
            foreach ($xml->request->action as $action) {
                $aName = ucfirst((string)$action['name']);
                $config['actions'][$aName] = [
                    'allowed_methods' => [],
                    'params'          => [],
                ];
                if ($action->allowed_methods) {
                    $am = $action->allowed_methods;
                    foreach (['get', 'post', 'put', 'delete'] as $m) {
                        if ((string)($am[$m] ?? '') === 'yes') {
                            $config['actions'][$aName]['allowed_methods'][strtoupper($m)] = true;
                        }
                    }
                }
                foreach ($action->param as $param) {
                    $pName = (string)$param['name'];
                    $pDef  = [
                        'required'     => ((string)($param['required'] ?? 'no')) === 'yes',
                        'default'      => isset($param['default']) ? (string)$param['default'] : null,
                        'msg_required' => (string)($param['msg_required'] ?? ''),
                    ];
                    if ($param->validator) {
                        $pDef['validator']   = (string)$param->validator['name'];
                        foreach ($param->validator->attributes() as $k => $v) {
                            $pDef[$k] = (string)$v;
                        }
                    }
                    $config['actions'][$aName]['params'][$pName] = $pDef;
                }
            }
        }

        // Parse commands
        if ($xml->commands && $xml->commands->on_before_exec) {
            $config['commands']['before'] = self::parseCommandIncludes(
                $xml->commands->on_before_exec,
                dirname($file)
            );
        }

        // Parse result_map
        if ($xml->result_map) {
            foreach ($xml->result_map->action as $action) {
                $aName  = ucfirst((string)$action['name']);
                $config['result_map'][$aName] = [];
                foreach ($action->children() as $resultNode) {
                    $rKey    = $resultNode->getName(); // on_exec_ok, on_exec_error, on_authorized …
                    $config['result_map'][$aName][$rKey] = self::parseResultNode($resultNode);
                }
            }
        }

        return $config;
    }

    private static function parseResultNode(\SimpleXMLElement $node): array
    {
        // <forward module="X" action="Y" />
        if ($node->forward) {
            return [
                'type'   => 'forward',
                'module' => (string)$node->forward['module'],
                'action' => (string)($node->forward['action'] ?? ''),
            ];
        }
        // <redirect url="X" />
        if ($node->redirect) {
            return [
                'type' => 'redirect',
                'url'  => (string)$node->redirect['url'],
                'code' => (int)($node->redirect['code'] ?? 302),
            ];
        }
        // <view classname="Point7_WebApp_View_JSON" />
        if ($node->view) {
            $viewClass = (string)$node->view['classname'];
            $params    = [];
            foreach ($node->view->param as $p) {
                $key   = (string)$p['name'];
                $value = isset($p->value) ? (string)$p->value : (string)($p['value'] ?? '');
                $params[$key] = $value;
            }
            return ['type' => self::mapViewType($viewClass), 'class' => $viewClass, 'params' => $params];
        }
        return ['type' => 'dummy'];
    }

    private static function mapViewType(string $class): string
    {
        return match (true) {
            str_contains($class, 'JSON')            => 'json',
            str_contains($class, 'JavaScript')      => 'javascript',
            str_contains($class, 'Smarty3')         => 'smarty3',
            str_contains($class, 'SendGeneratedFile'),
            str_contains($class, 'File')            => 'file',
            str_contains($class, 'Dummy')           => 'dummy',
            default                                  => 'smarty3',
        };
    }

    private static function parseCommandIncludes(\SimpleXMLElement $node, string $baseDir): array
    {
        $commands = [];
        foreach ($node->children() as $child) {
            if ($child->getName() === 'command') {
                $commands[] = [
                    'class'    => (string)($child['classname'] ?? ''),
                    'priority' => (int)($child['priority'] ?? 0),
                    'action'   => (string)($child['action'] ?? '*'),
                ];
            } elseif ($child->getName() === 'include') {
                $path = realpath($baseDir . '/../' . (string)$child['file']);
                if ($path && file_exists($path)) {
                    $inc = simplexml_load_file($path);
                    if ($inc) {
                        $commands = array_merge($commands, self::parseCommandIncludes($inc, dirname($path)));
                    }
                }
            }
        }
        return $commands;
    }

    // -------------------------------------------------------------------------
    // Static service accessors
    // -------------------------------------------------------------------------

    public static function getConfigParam(string $key): mixed
    {
        $parts = explode('.', $key);
        $node  = self::$config;
        foreach ($parts as $part) {
            if (!is_array($node) || !array_key_exists($part, $node)) {
                return null;
            }
            $node = $node[$part];
        }
        return is_array($node) ? null : $node;
    }

    public static function getSession(): Point7_WebApp_Session
    {
        return self::$session ?? (self::$session = new Point7_WebApp_Session());
    }

    public static function getLogger(string $name): Point7_Log_PEARWrapper
    {
        if (!isset(self::$loggers[$name])) {
            $logger = new Point7_Log_PEARWrapper();
            $file   = LOG_PATH . '/' . date('Y-m') . '-' . $name . '.log';
            $logger->configure('file', $file);
            self::$loggers[$name] = $logger;
        }
        return self::$loggers[$name];
    }

    public static function getCache(): Point7_WebApp_Cache_File
    {
        return self::$cache ?? (self::$cache = new Point7_WebApp_Cache_File());
    }

    public static function getDAORepository(): mixed
    {
        return self::$daoRepository;
    }

    public static function getRegistryObject(string $key): mixed
    {
        return self::$registry[$key] ?? null;
    }

    public static function getPDO(): ?PDO
    {
        return self::$pdo;
    }

    // -------------------------------------------------------------------------
    // Helpers
    // -------------------------------------------------------------------------

    private static function normalizeModuleName(string $name): string
    {
        // 'index' → 'Index', 'myModule' → 'Mymodule' (framework convention)
        return ucfirst(strtolower($name));
    }

    public static function resolveValue(string $value): string
    {
        $value = str_replace('{#APP_PATH#}',        defined('APP_PATH')        ? APP_PATH        : '', $value);
        $value = str_replace('{#LOG_PATH#}',        defined('LOG_PATH')        ? LOG_PATH        : '', $value);
        $value = str_replace('{#POINT7_PACKAGES#}', defined('POINT7_PACKAGES') ? POINT7_PACKAGES : '', $value);
        $value = str_replace('%{year}',             date('Y'),                                         $value);
        $value = str_replace('%{month}',            date('m'),                                         $value);
        $value = str_replace('%{timestamp}',        date('Y-m-d H:i:s'),                               $value);
        return $value;
    }
}
