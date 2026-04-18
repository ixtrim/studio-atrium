<?php

/* $Id: Index.php 762 2013-04-03 11:55:02Z radek $ */

namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\WWW;

class Favourite extends WWW\AbstractModule 
{
	
	/**
	 * @var \StudioAtrium\Entity\Project\Finder
	 */
	protected $_projectFinder = null;
	
	/**
	 * @see Point7_WebApp_Module_Abstract::_initAction()
	 */
	public function _initAction($action, \Point7_WebApp_Request $request, $appContext, $responseContext): void
	{
		parent::_initAction($action, $request, $appContext, $responseContext);
		$this->_projectFinder = $this->_daoRepository->getProjectFinder(\Point7_WebApp::getConfigParam('paths.clicksearch_sets'));
	
		if (!$request->isValid()) {
			$responseContext->set('error', 'Brak wymaganych parametrów.');
			$this->_exit();
		}
		
		$responseContext->set('noindexNofollow', true);
	}
	
	
	/**
	 * @param \Point7_WebApp_Context_Response_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response_Filtered $responseContext
	 */
	public function doList(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$user = $appContext->getUser();
		
		$favouriteIds = array();
		
		if($user) {
			$props = $user->getProps(true) or $props = array();
		
			$favouriteIds = isset($props['favourite']) ? $props['favourite'] : array();
		} else {
			$favouriteCookie = $request->getCookieParam('saFav');
		
			if($favouriteCookie) {
				$favouriteIds = explode('|', $favouriteCookie);
			}
		}
		
		if($favouriteIds) {
		
			$list = $this->_projectFinder->getListById(
				$favouriteIds,
				\StudioAtrium_Entity_EntityBase_Project::STATUS_PUBLISHED,
				true
			);
			
			
			$message = 'Przesyłam linki do ciekawych projektów:' . "\n\n";
			
			$list->rewind();

			while($project = $list->next()) {
				
				$link = $appContext->getConfigParam('domain.www') . \StudioAtrium\Application\Helper\Url::buildProjectUrl($project);
				
				$message .= $link . "\n";
			}
				
			$responseContext->set('list', $list);
			
			$responseContext->set('message', $message);
		}
		
		
		$comparedIds = array();
		
		$comparedCookie = $request->getCookieParam('saCom');
		
		if($comparedCookie) {
			$comparedIds = explode('|', $comparedCookie);
		}
		$responseContext->set('comparedIds', $comparedIds);
	}
	
	/**
	 * @param \Point7_WebApp_Context_Response_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response_Filtered $responseContext
	 */
	public function doCompare(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$comparedIds = array();
		
		$comparedCookie = $request->getCookieParam('saCom');
		
		if($comparedCookie) {
			$comparedIds = explode('|', $comparedCookie);
		}
		
		$params = $this->_daoRepository->getProjectParamFinder()->getListForProject('house', true)->toArray('', 'id');
		
		$compareParamsList = $this->_daoRepository->getProjectParamFinder()->getListingByAlternateName('compare')->getParams(true);
	
		$paramsMap = array();
		
		$storeys = array();
		
		if($comparedIds) {
		
			$list = $this->_projectFinder->getListById(
				$comparedIds,
				\StudioAtrium_Entity_EntityBase_Project::STATUS_PUBLISHED,
				true
			);
			
			$list->rewind();
			
			while($project = $list->next()) {
	
				$sketches = $project->getAttachments()->getAttachmentsByType('ProjectSketch');
				
				foreach($sketches as $sketch) {
					$props = json_decode($sketch->getProps(), true);
					if(isset($props['storey']) && !in_array($props['storey'], $storeys)) {
						$storeys[] = $props['storey'];
					}
				}
	
				$projectParams = $this->_daoRepository->getProjectToParamFinder()->getParamsForProject($project->getId())->toArray('', 'project_param_id');
				$paramsMap[$project->getId()] = $projectParams;
			}
	
			$responseContext->set('list', $list);
			$responseContext->set('params', $params);
			$responseContext->set('paramIds', $compareParamsList);
			$responseContext->set('paramsMap', $paramsMap);
			
			$responseContext->set('storeys', $storeys);
		}
	}
	
	/**
	 * @param Point7_WebApp_Request $request
	 * @param Point7_WebApp_Context_Application $appContext
	 * @param Point7_WebApp_Context_Response $responseContext
	 */
	public function doSend(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		if (!$request->isValid()) {
			$responseContext->setJSONResponse('status', 'fail');
			$this->_exit();
		}

		$result = false;

		if ($mailerConfig = $appContext->getConfigParam('mailer.sender')) {
			
			$mailerConfig['sender']['from_email'] = $request->getParam('sender_email');
				
			$content = nl2br($request->getParam('message')) . '<br><br>' . $request->getParam('signature');
				
			if ($result = $this->_sendMail($request->getParam('receiver_email'), 'Ciekawe projekty Studia Atrium', $content, $mailerConfig, true)) {
				$responseContext->setJSONResponse('status', 'ok');
			} else {
				$responseContext->setJSONResponse('status', 'error');
			}
				
		} else {
			\Point7_WebApp::getLogger('error')->error('Error during sending e-mail from favourite box - no mailer config');
			$responseContext->setJSONREsponse('status', 'error');
		}


		if (!$result) {
			$responseContext->setJSONResponse('status', 'fail');
		} else {
			$responseContext->setJSONResponse('status', 'ok');
		}
	}
}
