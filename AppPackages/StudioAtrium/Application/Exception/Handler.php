<?php
namespace StudioAtrium\Application\Exception;

class Handler
{
    public function handleException(\Throwable $e): void
    {
        $code = $e->getCode() ?: 500;
        if (!headers_sent()) {
            http_response_code($code >= 400 && $code < 600 ? $code : 500);
        }

        $logMsg = sprintf(
            '[%s] %s in %s:%d',
            get_class($e),
            $e->getMessage(),
            $e->getFile(),
            $e->getLine()
        );
        error_log($logMsg);

        if (defined('APP_PATH') && file_exists(APP_PATH . '/Views/Templates/Error/500.tpl')) {
            try {
                $smarty = new \Smarty();
                $smarty->setTemplateDir(APP_PATH . '/Views/Templates');
                $smarty->setCompileDir(APP_PATH . '/Views/Templates/_compile');
                $smarty->assign('exception', $e);
                $smarty->display('Error/500.tpl');
            } catch (\Throwable) {
                echo '<h1>Internal Server Error</h1>';
            }
        } else {
            echo '<h1>Internal Server Error</h1>';
            if (($_SERVER['REMOTE_ADDR'] ?? '') === '127.0.0.1') {
                echo '<pre>' . htmlspecialchars($logMsg) . '</pre>';
            }
        }
    }
}
