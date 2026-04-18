<?php
abstract class Point7_WebApp_Command_Abstract
{
    const STATE_OK    = 'ok';
    const STATE_ERROR = 'error';

    abstract protected function _doExecute(
        Point7_WebApp_Request $request,
        Point7_WebApp_Context_Application $appContext,
        Point7_WebApp_Context_Response $responseContext
    );

    public function execute(
        Point7_WebApp_Request $request,
        Point7_WebApp_Context_Application $appContext,
        Point7_WebApp_Context_Response $responseContext
    ) {
        return $this->_doExecute($request, $appContext, $responseContext);
    }
}
