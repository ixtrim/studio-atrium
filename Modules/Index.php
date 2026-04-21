<?php

/* $Id: Index.php 762 2013-04-03 11:55:02Z radek $ */

namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\Helper;
use StudioAtrium\Application\WWW;


class Index extends WWW\AbstractModule 
{
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doMainPage(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		//get main page carousel
		$carousel = $this->_daoRepository->getCarouselFinder()->getList(true);
		$responseContext->set('mainCarousel', $carousel);

		//na wniosek sempai - 2026-01-28
		$responseContext->set('canonicalUrl', 'https://www.studioatrium.pl');		

		//get main page boxes
		$boxes = $this->_daoRepository->getBoxFinder()->getList(true, true);
		$coloredBoxes = array();
		
		$field = $row = 0;
		foreach ($boxes as $k => $box) {
			if ($box->getBgColor()) {
				$coloredBoxes[$row][$field] = $box->getId();		
			}

			if ($field == 3) {
				$row++;
				$field = 0;
			} else {
				$field++;
			}
			
			$props = json_decode($box->getAttachments()->current()->getProps());
			$pid = isset($props->props) ? $props->props : 0;
			
			if($pid) {
			    $box->setLink($box->getLink() . '?pid=' . $pid);
			}
			
			if ($box->getType() == \StudioAtrium\Entity\Box::TYPE_ARTICLES) {
				$articles = $this->_daoRepository->getDocumentFinder()->getList(
						false,
						null,
						\StudioAtrium\Entity\Document::STATUS_PUBLISHED,
						3, 0, null, 0, true);
				$box->setContent($articles->toArray());
			} elseif ($box->getType() == \StudioAtrium\Entity\Box::TYPE_COMMENTS) {
				$forum = $this->_daoRepository->getDiscussFinder()->getLastPosts();
				$box->setContent($forum->toArray());
			}
		}
		$responseContext->set('boxesIndex', $coloredBoxes);
		$responseContext->set('boxes', $boxes->toArray('', 'id'));
		
		$stats = array();
		$siteMenu = $responseContext->get('siteMenu');	
		foreach ($siteMenu[\StudioAtrium\Entity\Project\Category::TREE_HOUSE] as $tree) {
			$stats[$tree['id']] = count(explode(",", $tree['project_list']));
			if (!empty($tree['children'])) {
				foreach ($tree['children'] as $child) {
					$stats[$child['id']] = count(explode(",", $child['project_list']));
				}
			}
		}
		$responseContext->set('siteMenuStats', $stats);
		
		$classMap = array(
				0 => 'zero',
				1 => 'one',
				2 => 'two',
				3 => 'three'
		);
		
		$responseContext->set('classMap', $classMap);
		
		$cache = \Point7_WebApp::getCache();
		
		//proponowane
		/* @var $category \StudioAtrium\Entity\Project\Category */
		
		if (!$featured = $cache->get(Helper\Cache::FEATURED_CATEGORY)) {
			$category = $this->_daoRepository->getProjectCategoryFinder()->getById(Helper\ProjectCategory::FEATURED_CATEGORY_ID);
			if($category && $category->getProjectList()) {
				$idList = explode(',', $category->getProjectList());
				
				$featured = $this->_daoRepository->getProjectFinder(\Point7_WebApp::getConfigParam('paths.clicksearch_sets'))->getListById(
					$idList,
					\StudioAtrium_Entity_EntityBase_Project::STATUS_PUBLISHED
				)->toArray();
				
				$cache->set(Helper\Cache::FEATURED_CATEGORY, $featured, 1800);
			}
		}
		
		$responseContext->set('featured', $featured);

		// Compare and favourite IDs from cookies
		$compareIds = array();
		if (!empty($_COOKIE['saCom'])) {
			$compareIds = explode('|', $_COOKIE['saCom']);
		}
		$responseContext->set('compareIds', $compareIds);

		$user = $appContext->getUser();
		$favouriteIds = array();
		if ($user) {
			$props = $user->getProps(true) ?: array();
			$favouriteIds = isset($props['favourite']) ? $props['favourite'] : array();
		} elseif (!empty($_COOKIE['saFav'])) {
			$favouriteIds = explode('|', $_COOKIE['saFav']);
		}
		$responseContext->set('favouriteIds', $favouriteIds);

		//projects for google search results on mobile
		$responseContext->set('mobileGoogleSearch', array_slice($featured, 0, 3));

		//realisations
		if (!$realisations = $cache->get(Helper\Cache::REALISATIONS_MAIN_PAGE_KEY)) {
			$realisations = $this->_daoRepository->getAttachmentFinder()->getAttachmentsByProfile('ProjectRealisation', true, 3, true, false, true);
			$cache->set(Helper\Cache::REALISATIONS_MAIN_PAGE_KEY, $realisations, 1800);
		}
		$responseContext->set('realisations', $realisations);

		//interiors
		if (!$interiors = $cache->get(Helper\Cache::INTERIORS_MAIN_PAGE_KEY)) {
			$interiors = $this->_daoRepository->getAttachmentFinder()->getAttachmentsByProfile('ProjectRealisationInterior', true, 3, true, false, true);
			$cache->set(Helper\Cache::INTERIORS_MAIN_PAGE_KEY, $interiors, 1800);
		}
		$responseContext->set('interiors', $interiors);
		
		//unfinished
		if (!$unfinished = $cache->get(Helper\Cache::BUILDING_PROGRESS_MAIN_PAGE_KEY)) {
			$unfinished = $this->_daoRepository->getAttachmentFinder()->getAttachmentsByProfile('ProjectBuildingInProgress', true, 3, true, false, true);
			$cache->set(Helper\Cache::BUILDING_PROGRESS_MAIN_PAGE_KEY, $unfinished, 1800);
		}
		$responseContext->set('unfinished', $unfinished);
		
		//Opis kategorii wszystkie projekty - w celach pozycjinerskich
		
		/* @var $category \StudioAtrium\Entity\Project\Category */
		$category = $this->_daoRepository->getProjectCategoryFinder()->getByLink(Helper\ProjectCategory::getDefaultHouseCategory());
		$responseContext->set('description', $category->getDescription());
		
		//partners
		$partners = $this->_daoRepository->getDocumentFinder()->getList(\StudioAtrium\Entity\Document::DOCTYPE_PARTNER, null, \StudioAtrium\Entity\Document::STATUS_PUBLISHED);
		$responseContext->set('partners', $partners);
		
		$params = new \Point7_AbstractDAO_FinderParams();
		$params->addFilter('char_id', 'carousel_main_slide');
		
		if (($setting = $this->_daoRepository->getSettingsDAO()->find($params))) {
			if ($setting[0]->getNumValue() == -1) {
				$responseContext->set("carousel_main_slide", 0);
			} else {
				$responseContext->set("carousel_main_slide", $setting[0]->getNumValue());
			}
		}
		
		
		require_once APP_PACKAGES . '/Vendors/Mobile-Detect/Mobile_Detect.php';
		$detect = new \Mobile_Detect();

		// Any mobile device (phones or tablets).
		if ( $detect->isMobile() ) {
		    $responseContext->set("isMobile", 1);
		}
	}
}
