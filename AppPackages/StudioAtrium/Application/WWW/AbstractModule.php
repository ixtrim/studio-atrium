<?php
namespace StudioAtrium\Application\WWW;

abstract class AbstractModule extends \Point7_WebApp_Module_Abstract
{
    /** @var \StudioAtrium\Application\DAORepository|null */
    protected mixed $_daoRepository = null;

    protected function _initAction(
        string $action,
        \Point7_WebApp_Request $request,
        \Point7_WebApp_Context_Application $appContext,
        \Point7_WebApp_Context_Response $responseContext
    ): void {
        parent::_initAction($action, $request, $appContext, $responseContext);
        // _daoRepository is already set by parent via Point7_WebApp::getDAORepository()
    }
}
