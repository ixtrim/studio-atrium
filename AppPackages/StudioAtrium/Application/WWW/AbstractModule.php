<?php
namespace StudioAtrium\Application\WWW;

abstract class AbstractModule extends \Point7_WebApp_Module_Abstract
{
    /** @var \StudioAtrium\Application\DAORepository|null */
    protected $_daoRepository = null;

    /** Module name passed to Meta helpers (e.g. "Project", "ProjectExtend"). */
    protected $_name = '';

    public function _initAction(
        $action,
        \Point7_WebApp_Request $request,
        $appContext,
        $responseContext
    ) {
        parent::_initAction($action, $request, $appContext, $responseContext);
        if ($this->_name === '') {
            $this->_name = (new \ReflectionClass($this))->getShortName();
        }
    }
}
