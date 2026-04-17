<?php

/* $Id: Index.php 762 2013-04-03 11:55:02Z lukasz $ */

namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\WWW;

class Relocator301 extends WWW\AbstractModule 
{
	
	/**
	 * @param \Point7_WebApp_Context_Response_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response_Filtered $responseContext
	 */
	public function doRelocate(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$url = \Point7_WebApp::getConfigParam('domain.fullurl');
		$params = $request->getParam('params');
		$rawParams = $request->getRawParams();

		if ($request->isValid()) {
			switch ($request->getParam('relocate')) {
				case 'baza-wiedzy': {
						$page = !empty($params['page']) ? $params['page'] : 0;
						if (!empty($params['tag'])) {
							$url .= 'baza-wiedzy,' . $params['tag'] . ',' . ($page + 1);
						} else {
							$url .= 'baza-wiedzy/,' . ($page + 1);
						}
						
						if (!empty($rawParams['search'])) {
							$url .= '?search=' . $rawParams['search'];
						}
				} break;
				case 'archiwum-forum': {
						$page = !empty($params['page']) ? $params['page'] : 0;
						$url .= 'archiwum/Forum,' . $params['title'] . ',' . $params['id'] . ',' . ($page + 1) . '.html';
				} break;
				case 'projekt-garazu': {
						$mirror = !empty($params['lustro']) ? true : false;
						if ($project = $this->_daoRepository->getProjectFinder(null)->getByIdOld($params['id'])) {
							$url .= ltrim(\StudioAtrium\Application\Helper\Url::buildProjectUrl($project, 'projekty-garazy', $mirror), '/');
						} else {
							$url .= 'projekty-garazy';
						}
				} break;
				case 'projekt-wiaty': {
						if ($project = $this->_daoRepository->getProjectFinder(null)->getByIdOld($params['id'])) {
							$url .= ltrim(\StudioAtrium\Application\Helper\Url::buildProjectUrl($project, 'projekty/wiaty'), '/');
						} else {
							$url .= 'projekty/wiaty';
						}
				} break;
				case 'projekt-altany': {
						if ($project = $this->_daoRepository->getProjectFinder(null)->getByIdOld($params['id'])) {
							$url .= ltrim(\StudioAtrium\Application\Helper\Url::buildProjectUrl($project, 'projekty/altany'), '/');
						} else {
							$url .= 'projekty/altany';
						}
				} break;
				case 'projekt-ogrodzenia': {
						if ($project = $this->_daoRepository->getProjectFinder(null)->getByIdOld($params['id'])) {
							$url .= ltrim(\StudioAtrium\Application\Helper\Url::buildProjectUrl($project, 'projekty/ogrodzenia'), '/');
						} else {
							$url .= 'projekty/ogrodzenia';
						}
				} break;
				case 'projekt-domu': {
						if ($project = $this->_daoRepository->getProjectFinder(null)->getByIdOld($params['id'])) {
							if (!empty($params['mirror']) && $params['mirror'] == 1) {
								$url .= ltrim(\StudioAtrium\Application\Helper\Url::buildProjectUrl($project, 'projekty-domow', true), '/');
							} else {
								$url .= ltrim(\StudioAtrium\Application\Helper\Url::buildProjectUrl($project, 'projekty-domow'), '/');
							}
						} else {
							$url .= 'projekty-domow';
						}
				} break;
				case 'selfie': {
						if ($project = $this->_daoRepository->getProjectFinder(null)->getByIdOld($params['id'])) {
							$url .= 'selfie/' . ltrim(\StudioAtrium\Application\Helper\Url::fixLinkTitle($project->getName())) . ',' . $project->getId() . '.html';
						} else {
							$url .= 'projekty-domow';
						}
				} break;
			}
		}
//_dump($url,1);
		header('HTTP/1.1 301 Moved Permanently');
		header("Location: " . $url);
		header('Connection: close');
		die();
	}
}
