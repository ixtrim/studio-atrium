<?php

/** Thrown by _exit() to stop module execution and signal a result. */
class Point7_WebApp_ExitException extends RuntimeException
{
    public $isOk;
    public $resultKey;

    public function __construct($isOk = true, $resultKey = null)
    {
        $this->isOk      = $isOk;
        $this->resultKey = $resultKey;
        parent::__construct();
    }
}

/** Thrown by _forward() to dispatch to another module/action. */
class Point7_WebApp_ForwardException extends RuntimeException
{
    public $module;
    public $action;

    public function __construct($module, $action = null)
    {
        $this->module = $module;
        $this->action = $action;
        parent::__construct();
    }
}

/** Thrown by _redirect() to issue an HTTP redirect. */
class Point7_WebApp_RedirectException extends RuntimeException
{
    public $url;
    public $httpCode;

    public function __construct($url, $httpCode = 302)
    {
        $this->url      = $url;
        $this->httpCode = $httpCode;
        parent::__construct();
    }
}

abstract class Point7_WebApp_Module_Abstract
{
    protected $_daoRepository = null;

    public function _initAction(
        $action,
        Point7_WebApp_Request $request,
        $appContext,
        $responseContext
    ) {
        $this->_daoRepository = Point7_WebApp::getDAORepository();
    }

    /**
     * Stop module execution.
     * $isOk selects on_exec_ok vs on_exec_error fallback.
     * $resultKey triggers on_{resultKey} in the result_map if set.
     */
    protected function _exit($isOk = true, $resultKey = null)
    {
        throw new Point7_WebApp_ExitException($isOk, $resultKey);
    }

    protected function _forward($module, $action = null)
    {
        throw new Point7_WebApp_ForwardException($module, $action);
    }

    protected function _redirect($url, $httpCode = 302)
    {
        throw new Point7_WebApp_RedirectException($url, $httpCode);
    }
}
