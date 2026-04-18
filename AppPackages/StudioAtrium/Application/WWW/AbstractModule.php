<?php
namespace StudioAtrium\Application\WWW;

abstract class AbstractModule extends \Point7_WebApp_Module_Abstract
{
    /** @var \StudioAtrium\Application\DAORepository|null */
    protected mixed $_daoRepository = null;

    public function _initAction(
        $action,
        \Point7_WebApp_Request $request,
        $appContext,
        $responseContext
    ): void {
        parent::_initAction($action, $request, $appContext, $responseContext);
        // _daoRepository is already set by parent via Point7_WebApp::getDAORepository()
    }
}
