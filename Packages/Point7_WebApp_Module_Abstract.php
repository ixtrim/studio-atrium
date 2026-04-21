<?php

/** Thrown by _exit() to stop module execution and signal a result. */
class Point7_WebApp_ExitException extends RuntimeException
{
    public function __construct(
        public readonly bool    $isOk      = true,
        public readonly ?string $resultKey = null
    ) {
        parent::__construct();
    }
}

/** Thrown by _forward() to dispatch to another module/action. */
class Point7_WebApp_ForwardException extends RuntimeException
{
    public function __construct(
        public readonly string  $module,
        public readonly ?string $action = null
    ) {
        parent::__construct();
    }
}

/** Thrown by _redirect() to issue an HTTP redirect. */
class Point7_WebApp_RedirectException extends RuntimeException
{
    public readonly string $url;
    public readonly int    $httpCode;

    public function __construct(string $url, int $httpCode = 302)
    {
        $this->url      = $url;
        $this->httpCode = $httpCode;
        parent::__construct();
    }
}

abstract class Point7_WebApp_Module_Abstract
{
    protected mixed $_daoRepository = null;

    public function _initAction(
        $action,
        Point7_WebApp_Request $request,
        $appContext,
        $responseContext
    ): void {
        $this->_daoRepository = Point7_WebApp::getDAORepository();
    }

    /**
     * Stop module execution.
     * $isOk selects on_exec_ok vs on_exec_error fallback.
     * $resultKey triggers on_{resultKey} in the result_map if set.
     */
    protected function _exit(bool $isOk = true, ?string $resultKey = null): never
    {
        throw new Point7_WebApp_ExitException($isOk, $resultKey);
    }

    protected function _forward(string $module, ?string $action = null): never
    {
        throw new Point7_WebApp_ForwardException($module, $action);
    }

    protected function _redirect(string $url, int $httpCode = 302): never
    {
        throw new Point7_WebApp_RedirectException($url, $httpCode);
    }
}
