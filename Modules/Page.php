<?php

/* $Id: Authenticate.php 762 2013-04-03 11:55:02Z radek $ */

namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\WWW\AbstractModule;
use StudioAtrium\Application\WWW\AppContext;
use StudioAtrium\Application\WWW\ResponseContext;
use StudioAtrium\Entity\User;


/**
 * Static pages
 *
 */
class Page extends AbstractModule {

	/**
	* @var \StudioAtrium\Entity\Document\Finder
	*/
	protected $_documentFinder = null;

	/**
	* @see Packages/7Point/WebApp/Module/Point7_WebApp_Module_Abstract::_initAction()
	*/
	protected function _initAction(
		$action,
		\Point7_WebApp_Request $request,
		AppContext $appContext,
		ResponseContext $responseContext
	) {
		parent::_initAction($action, $request, $appContext, $responseContext);
		$this->_documentFinder = $this->_daoRepository->getDocumentFinder();
	}


	/**
	 * @param Point7_WebApp_Request $request
	 * @param Point7_WebApp_Context_Application $appContext
	 * @param Point7_WebApp_Context_Response $responseContext
	 */
	public function doDisplay(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	){
	}


	/**
	 * @param Point7_WebApp_Request $request
	 * @param Point7_WebApp_Context_Application $appContext
	 * @param Point7_WebApp_Context_Response $responseContext
	 */
	public function doDisplay404(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	){
		\StudioAtrium\Application\Helper\Meta::prepareMeta($responseContext, "404", "Display");
		header( $_SERVER['SERVER_PROTOCOL']." 404 Not Found", true);
	}
}
