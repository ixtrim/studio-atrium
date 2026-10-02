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
	public function _initAction($action, \Point7_WebApp_Request $request, $appContext, $responseContext)
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
		$list = null;
		
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

		$listCards = array();
		if (!empty($list) && count($list)) {
			$listCards = $this->_buildFavouriteCards($list, $comparedIds);
		}
		$responseContext->set('listCards', $listCards);
	}

	/**
	 * Build 2026 teaser cards for the favourites grid.
	 *
	 * @param \StudioAtrium\Entity\EntityCollection|iterable $list
	 * @param array $comparedIds
	 * @return array
	 */
	private function _buildFavouriteCards($list, array $comparedIds)
	{
		$cards = array();
		$ids = array();
		foreach ($list as $project) {
			$ids[] = (int) $project->getId();
		}
		$ids = array_values(array_filter($ids));
		$extras = array();
		if (!empty($ids)) {
			try {
				$pdo = \Point7_WebApp::getPDO();
				$placeholders = implode(',', array_fill(0, count($ids), '?'));
				$stmt = $pdo->prepare(
					"SELECT project_id, project_param_id, num_value
					 FROM project_to_param
					 WHERE project_id IN ($placeholders) AND project_param_id IN (45, 46, 78)"
				);
				$stmt->execute($ids);
				foreach ($stmt->fetchAll(\PDO::FETCH_ASSOC) as $param) {
					$pid = (int) $param['project_id'];
					$paramId = (int) $param['project_param_id'];
					if (!isset($extras[$pid])) {
						$extras[$pid] = array('baths' => 0, 'garage' => 0);
					}
					if ($paramId === 45 || $paramId === 46) {
						$extras[$pid]['baths'] += (int) round((float) $param['num_value']);
					} elseif ($paramId === 78) {
						$extras[$pid]['garage'] = (int) round((float) $param['num_value']);
					}
				}
			} catch (\Throwable $e) {
				$extras = array();
			}
		}

		$urlGen = new WWW\UrlGenerator();
		$paramsHelper = new WWW\ProjectParamsHelper();
		$comparedMap = array_fill_keys(array_map('strval', $comparedIds), true);

		foreach ($list as $project) {
			$pid = (int) $project->getId();
			$params = $project->getParamsGeneral(true);
			$extraData = $project->getExtraData(true);
			$type = $project->getType();

			$areaRaw = isset($params['1']['value']) ? $params['1']['value'] : '';
			$rooms = isset($params['68']['value']) ? $params['68']['value'] : '';
			$area = $areaRaw !== '' ? str_replace('.', ',', (string) $areaRaw) . ' m2' : '';

			$sale = \StudioAtrium\Application\Helper\Project::resolveSalePricing(
				$project->getPrice(),
				$project->getDiscount(),
				\StudioAtrium\Application\Helper\Project::getHomepageBestsellerTag($pid)
			);

			$badgeLabel = '';
			$badgeVariant = '';
			if ($sale['discount'] > 0) {
				$badgeLabel = 'RABAT ' . (int) round($sale['discount']) . ' zł';
				$badgeVariant = 'discount';
			} elseif ($paramsHelper->mIsNew($project)) {
				$badgeLabel = 'NOWOŚĆ';
				$badgeVariant = 'new';
			}

			$action = 'item';
			if ($type === 'garage') {
				$action = 'garage';
			} elseif (!in_array($type, array('house', 'skeleton'), true)) {
				$action = 'other';
			}
			$urlParams = array(
				'module'     => 'project',
				'action'     => $action,
				'id'         => $pid,
				'link_title' => $project->getName(),
			);
			if ($action === 'other') {
				$urlParams['category'] = $type;
			}

			$imageUrl = '';
			if (!empty($extraData['thumbnail'])) {
				$imageUrl = 'https://media.studioatrium.pl/project/' . str_replace('-200-', '-640-', $extraData['thumbnail']);
			} else {
				$imageUrl = 'https://media.studioatrium.pl/project/' . $pid . '/render-box.jpg';
			}

			$cards[] = array(
				'id'            => $pid,
				'name'          => $project->getName(),
				'url'           => $urlGen->generateUrl($urlParams),
				'image_url'     => $imageUrl,
				'type_label'    => $this->_favouriteTypeLabel($params, $type),
				'area'          => $area,
				'rooms'         => $rooms,
				'baths'         => isset($extras[$pid]) ? $extras[$pid]['baths'] : 0,
				'garage'        => isset($extras[$pid]) ? $extras[$pid]['garage'] : 0,
				'price'         => (int) round($sale['current']),
				'price_old'     => $sale['old'] !== null ? (int) round($sale['old']) : null,
				'badge_label'   => $badgeLabel,
				'badge_variant' => $badgeVariant,
				'is_favourite'  => true,
				'is_compare'    => isset($comparedMap[(string) $pid]),
			);
		}

		return $cards;
	}

	/**
	 * @param array $params
	 * @param string $type
	 * @return string
	 */
	private function _favouriteTypeLabel(array $params, $type)
	{
		if ($type === 'garage') {
			return 'GARAŻ';
		}
		$prefix = ($type === 'skeleton') ? 'DOM SZKIELETOWY' : 'DOM';
		if ($type === 'skeleton') {
			return $prefix;
		}
		$hasFloor = !empty($params['18']['value']);
		$hasLoft = !empty($params['17']['value']);
		if ($hasFloor) {
			return $prefix . ' PIĘTROWY';
		}
		if ($hasLoft) {
			return $prefix . ' Z PODDASZEM';
		}
		return $prefix . ' PARTEROWY';
	}

	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param WWW\AppContext $appContext
	 * @param WWW\ResponseContext $responseContext
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
