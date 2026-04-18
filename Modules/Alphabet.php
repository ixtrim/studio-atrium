<?php

/* $Id: Alpgabet.php 762 2025-09-18 11:55:02Z lukasz $ */

namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\WWW;
use StudioAtrium\Application\Helper;

class Alphabet extends WWW\AbstractModule 
{
	/**
	 * @var \StudioAtrium\Entity\Project\Finder
	 */
	protected $_projectFinder = null;

	
	/**
	 * @see \Point7_WebApp_Module_Abstract::_initAction()
	 */
	public function _initAction($action,\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext) 
	{
		parent::_initAction($action, $request, $appContext, $responseContext);

		if (!$request->isValid() && !$request->isParamAllowed('skip_validation_error')) {
			//$responseContext->setErrorMessage('Wystąpił błąd. Brak wymaganych parametrów.');
			
			\Point7_WebApp::getLogger('notfound')->error(
				\StudioAtrium\Application\Exception\Helper::format404Message('Błąd ogólny', 'House', $action)
			);
			
			$this->_exit();
		}
		
		$this->_projectFinder = $this->_daoRepository->getProjectFinder(\Point7_WebApp::getConfigParam('paths.clicksearch_sets'));
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doList(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
	
		$list = $this->_projectFinder->getListByFirstLetter($request->getParam('letter'));
		$responseContext->set('list', $list);
		$responseContext->set('letter', $request->getParam('letter'));
		
		/* dodane na wsniosek Sempai 09.04.2026 */
		$responseContext->set('noindexNofollow', true);

	}
}
