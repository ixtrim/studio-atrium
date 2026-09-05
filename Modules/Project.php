<?php

/* $Id: Index.php 762 2013-04-03 11:55:02Z radek $ */

namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\WWW;
use StudioAtrium\Application\Helper;

class Project extends WWW\AbstractModule 
{
	/**
	 * @var \StudioAtrium\Entity\Project\Finder
	 */
	protected $_projectFinder = null;
	
	protected $_action = null;
	
	/**
	 * @see \Point7_WebApp_Module_Abstract::_initAction()
	 */
	public function _initAction($action, \Point7_WebApp_Request $request, $appContext, $responseContext)
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
		$this->_action = $action;
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doHouse(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$project = $this->_projectFinder->getById($request->getParam('id'));

		if (!$project) {
			if (($alternativeProjectLink = $this->_daoRepository->getProjectToParamFinder()->getParamForProject($request->getParam('id'), Helper\Project::getParamsMap('alternative_link')))
					&& ($url = $alternativeProjectLink->getStringValue())) {
				header('HTTP/1.1 301 Moved Permanently');
				header("Location: " . $url);
				header('Connection: close');
				die();
			} else {
				\Point7_WebApp::getLogger('notfound')->error(
					\StudioAtrium\Application\Exception\Helper::format404Message('Nie znaleziono projektu domu', 'Project', 'House')
				);
				$this->_exit();
			}
		} elseif ($project->getType() == 'export' && !$responseContext->get('isLocal')) {
			\Point7_WebApp::getLogger('notfound')->error(
				\StudioAtrium\Application\Exception\Helper::format404Message('Nie znaleziono projektu domu', 'Project', 'House (export)')
			);
			$this->_exit();
		} elseif (!in_array($project->getType(), array('house', 'skeleton'))) {
		    \Point7_WebApp::getLogger('notfound')->error(
		        \StudioAtrium\Application\Exception\Helper::format404Message('Nieprawidłowy typ projektu domu', 'Project', 'House (not house or skeleton)')
	        );
		    $this->_exit();
		}
	
		//validate url and move 301 to a valid one - 2025-11-24 - sempai
		if (($request->getParam('version') == 'normal' && Helper\Url::buildProjectUrl($project) != $_SERVER['REQUEST_URI']) || 
		    $request->getParam('version') == 'mirror' && Helper\Url::buildProjectUrl($project, false, true) != $_SERVER['REQUEST_URI']
		    ) {
		    header('HTTP/1.1 301 Moved Permanently');
		    if ($request->getParam('version') == 'mirror') {
		      header("Location: " . \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildProjectUrl($project, false, true));
		    } else {
		      header("Location: " . \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildProjectUrl($project));
		    }
		    header('Connection: close');
		    die();
		}

		$params = $this->_daoRepository->getProjectParamFinder()->getListForProject('house', true)->toArray('', 'id');
		$projectParams = $this->_daoRepository->getProjectToParamFinder()->getParamsForProject($request->getParam('id'))->toArray('', 'project_param_id');
		
		$projectSketchParams = $this->_daoRepository->getSketchParamFinder()->getParamsForProject($request->getParam('id'));
		
		$sketchIdList = array();
		foreach ($projectSketchParams as $psp) {
			$sketchIdList[$psp->getSketchParamId()] = $psp->getSketchParamId();
		}
		if ($sketchIdList) {
			$sketchParams = $this->_daoRepository->getSketchParamFinder()->getById($sketchIdList)->toArray('', 'id');
		} else {
			$sketchParams = $this->_daoRepository->getSketchParamFinder()->getList()->toArray('', 'id');
		}
		$technicalDataList = $this->_daoRepository->getProjectParamFinder()->getListingByAlternateName('domtech');
		
		if (!empty($projectParams[123]) && $projectParams[123]['num_value'] == 1) {
			$responseContext->set('withSeparateGarage', 1);
			$technicalDataGarageList = $this->_daoRepository->getProjectParamFinder()->getListingByAlternateName('garazzdomem');
			$responseContext->set('technicalGarageList', $technicalDataGarageList);
		}
		
		$responseContext->set('params', $params);
		$responseContext->set('projectParams', $projectParams);
		$responseContext->set('sketchParams', $sketchParams);
		$responseContext->set('projectSketchParams', $projectSketchParams);
		$responseContext->set('technicalList', $technicalDataList);
		$responseContext->set('project', $project);
		
		//meta tags
		if ($project->getMetaTitle()) {
			$title = $project->getMetaTitle();
			if ($request->getParam('version') == 'mirror') {
				$title .= ' - odbicie lustrzane';
			}

			if ($project->getMetaDescription()) {
				$responseContext->setMeta($title, $project->getMetaDescription());
			} else {
				// params_general is a JSON blob keyed by name (see
				// ProjectParamsHelper::decode(), the working implementation
				// used everywhere else) - not by a numeric param id, so this
				// reads it the same way rather than via a nonexistent
				// Helper\ParamsGeneral::USABLE_AREA_ID constant.
				$paramsGeneral = json_decode((string)$project->getParamsGeneral(), true);
				$area = is_array($paramsGeneral) && !empty($paramsGeneral['usable_area']) ? $paramsGeneral['usable_area'] : '';

				$responseContext->setMeta($title, 'Projekt domu '.$project->getName().' o powierzchni użytkowej '.$area.' m2. '.$project->getShortDescription());
			}
		} else {
			$mirror = ($request->getParam('version') == 'mirror') ? true : false;
			Helper\Meta::prepareMeta($responseContext, $this->_name, 'House', $project, null, $mirror);
		}
		
		//opinions
		$opinions = $this->_daoRepository->getProjectCommentFinder()->getTreeByProjectId(
			$request->getParam('id'),
			\StudioAtrium\Entity\Project\Comment::TYPE_OPINION
		);
		
		$responseContext->set('opinions', $opinions);
		
		//last entries from discuss posts
		$comments = $this->_daoRepository->getDiscussFinder()->getTreeByProjectId(
			$request->getParam('id'),
			null,
			true,
			true
		);
		
		if ($comments) {
			$responseContext->set('commentList', $comments);
			
			$counter = array();
			$authorList = array();
			foreach ($comments as $comment) {
				if ($comment['author_id'] > 0 && !in_array($comment['author_id'], Helper\User::getAdmins())) {
					$authorList[$comment['author_id']] = $comment['author_id'];
				}
				
				$counter[$comment['cat_id']] = !isset($counter[$comment['cat_id']]) ? 1 : $counter[$comment['cat_id']] + 1;
				$counter['sum'] = !isset($counter['sum']) ? 1 : $counter['sum'] + 1;
				
				if (!empty($comment['children'])) {
					$counter[$comment['cat_id']] += count($comment['children']);
					$counter['sum'] += count($comment['children']);
					
					foreach ($comment['children'] as $child) {
						if ($child['author_id'] > 0 && !in_array($child['author_id'], Helper\User::getAdmins())) {
							$authorList[$child['author_id']] = $child['author_id'];
						}
					}
				}
			}
			
			$responseContext->set('discuss_counter', $counter);
			
			if ($authorList) {
				$commentAuthors = $this->_daoRepository->getUserFinder()->getListById($authorList, false);
				$responseContext->set('commentAuthors', $commentAuthors->toArray(array(), 'id'));
			}
		}
		
		
		$responseContext->set('discuss_categories', Helper\Discuss::getCategories());
		
		$extras = json_decode($project->getExtraData(), true);
	
		//features
		if(isset($extras['features'])) {
			$features = $this->_projectFinder->getFeatures('sorting', $extras['features']);
			
			$responseContext->set('features', $features);
		}

		//has not estimate (kosztorys)
		if(isset($extras['cost']) && $extras['cost'] == -1) {
			$responseContext->set('noestimate', true);
		} else {
		    $responseContext->set('costs', $this->_getCost($projectParams, $extras));
		}

		//linked project
		if(isset($extras['linkedProjects'])) {
			$linkedProject = $this->_projectFinder->getById($extras['linkedProjects'][0]);
			$linkedProjectUrl = \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildProjectUrl($linkedProject);
			$responseContext->set('linkedProjectUrl', $linkedProjectUrl);
		} else {
			if(\StudioAtrium\Application\WWW\SmartyFunctionsRegistry::mHasSkeletonOption($projectParams)) {
				if(isset($extras['price_other_type'])) {
					$skeletonPrice = $extras['price_other_type'];
				} else {
					//powierzchnia użytkowa $projectParams[1]
					$usableArea = str_replace(',', '.', $projectParams[1]['num_value']);
					$skeletonPrice = $project->getPrice();
					
					if($project->getDiscount()) {
					    $skeletonPrice -= $project->getDiscount();
					}
					
					$skeletonPrice += Helper\Project::getSkeletonPriceAddition($usableArea);
				}
				
				$responseContext->set('skeletonPrice', $skeletonPrice);
			} elseif ($project->getType() == 'skeleton' && isset($extras['price_other_type'])) {
				$responseContext->set('skeletonPrice', $extras['price_other_type']);
			}
		}
		
		//check plot app for this project
		if (($situation = $this->_daoRepository->getHouseSituationFinder()->getByProjectId($request->getParam('id'), 0, true, false)) && $situation->count() == 1) {
			$responseContext->set('hasPlot', 1);
		}
		
		//admin ids for comments
		$responseContext->set('adminIds', Helper\User::getAdmins());
		if (!empty($_COOKIE['tmpCommentStamp'])) {
			$responseContext->set('tmpStamp', $_COOKIE['tmpCommentStamp']);
		
			//get Attachment if uploaded earlier
			$attachments = $this->_daoRepository->getAttachmentDAO()->getForObject($_COOKIE['tmpCommentStamp']);
			$responseContext->set('uploadedTmp', $attachments->toArray());
		
		} else {
			$tmpStamp = time();
			$responseContext->set('tmpStamp', $tmpStamp);
			setcookie('tmpCommentStamp', $tmpStamp, time()+3600*24*7);
		}
		
		//project url
		$url = \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildProjectUrl($project);
		$responseContext->set('projectUrl', $url);
		//if ($request->getParam('version') == 'mirror') {
			$responseContext->set('canonicalUrl', $url);
		//}
		
		//OpenGraph tags for g+
		$openGraphTags = array();
		$openGraphTags['title'] = 'Projekt domu ' . $project->getName();
		$openGraphTags['description'] = str_replace('"', "'", $project->getShortDescription());
		$openGraphTags['type'] = 'product';
		$openGraphTags['site_name'] = 'Studio Atrium - projekty domów i garaży';
		
		$attachmentCollection = $project->getAttachments()->getAttachmentsByType('ProjectRender');
		
		if($attachmentCollection) {
			$attachment = $attachmentCollection->current()->toArray();
			$image = \Point7_WebApp::getConfigParam('static.project') . '/' . $attachment['childAttachments']['presentation'][0]['path'] . '/' . $attachment['childAttachments']['presentation'][0]['filename'];
			
			$openGraphTags['image'] = $image;
			$openGraphTags['image:width'] = '475';
			$openGraphTags['image:height'] = '317';
		}
		
		$openGraphTags['url'] = $url;
		
		$responseContext->set('ogTags', $openGraphTags);
		
		//get project categories
		$projectCategories = $this->_daoRepository->getProjectCategoryFinder()->getForProject($project->getId());
		$responseContext->set('projectCategories', $projectCategories);
		
		//breadcrumbs
		if(\StudioAtrium\Application\WWW\SmartyFunctionsRegistry::mIsGroundFloor($projectParams)) {
			$category = 'parterowe';
			$categoryLink = '/projekty-domow/parterowe/';
		} else if(\StudioAtrium\Application\WWW\SmartyFunctionsRegistry::mHasFloor($projectParams)) {
			$category = 'piętrowe';
			$categoryLink = '/projekty-domow/pietrowe/';
		} else if(\StudioAtrium\Application\WWW\SmartyFunctionsRegistry::mHasLoft($projectParams)) {
			$category = 'z poddaszem';
			$categoryLink = '/projekty-domow/z-poddaszem-uzytkowym/';
		}
		
		$responseContext->set('category', $category);
		$responseContext->set('categoryLink', $categoryLink);
		
		//breadcrumbs for schema
		$breadcrumbs = array();
		
		$breadcrumbs[1]['id'] = "https://www.studioatrium.pl/projekty-domow/";
		$breadcrumbs[1]['name'] = "Projekty domów";
		$breadcrumbs[2]['id'] = "https://www.studioatrium.pl" . $categoryLink;
		$breadcrumbs[2]['name'] = ucfirst($category);
		$breadcrumbs[3]['id'] = $url;
		$breadcrumbs[3]['name'] = 'Projekt domu ' . $project->getName();
		
		$responseContext->set('schemaBreadcrumbs', $breadcrumbs);

		//get cs Cloud Params
		$responseContext->set('csCloudParams', Helper\Project::getCsCloudParams());
		$responseContext->set('csCloudSelectParams', Helper\Project::getCsCloudSelectParams());
		$responseContext->set('csParamsValueNames', Helper\ClickSearchMap::getValueNames());
		
		
		if(isset($_SERVER['HTTP_REFERER'])) {
		    $matches = array();
			preg_match("/projekty-domow\/[^\/]+/", $_SERVER['HTTP_REFERER'], $matches);
			
			if($matches) {
				$subCategory = $this->_daoRepository->getProjectCategoryFinder()->getByLink($matches[0]);
				
				if($subCategory) {
					if(!in_array($matches[0], array('projekty-domow/parterowe', 'projekty-domow/z-poddaszem-uzytkowym', 'projekty-domow/pietrowe'))) {
						
						$responseContext->set('subCategory', strtolower($subCategory->getName()));
						$responseContext->set('subCategoryLink', '/' . $matches[0] . '/');
					}
				}
			}
		}
		
		$responseContext->set('oldProjectLink', Helper\Url::buidOldProjectUrl($project));
		
		//Banner
		$responseContext->set('banner', $this->_daoRepository->getBannerFinder()->getRandomBanner());
		$responseContext->set('bannerUrl', \Point7_WebApp::getConfigParam('static.banner'));
		
		$this->doGetPartner($request, $appContext, $responseContext);
		
		$promoEndValue = $blackWeekValue = '';
		//if promo price, get price_end
		if ($project->getDiscount() > 0) {
			if ($promoEnd = $this->_daoRepository->getSettingsFinder()->getByCharId('promo_end')) {
				$promoEndValue = $promoEnd->getStringValue();
				$responseContext->set('promoEnd', $promoEndValue);
			}
			if ($blackWeek = $this->_daoRepository->getSettingsFinder()->getByCharId('black_week_txt')) {
			    $blackWeekValue = $blackWeek->getStringValue();
			    $responseContext->set('blackWeekTxt', $blackWeekValue);
			}
		}
		
		
		//2025-11-27 - noindex dla projektow wycofanych z oferty na wniosek Sempai
		if (\StudioAtrium\Application\WWW\SmartyFunctionsRegistry::mIsWithdrawn($projectParams)) {
		  $responseContext->set('noindex', 1);
		}
		
		$responseContext->set('forumCategories', Helper\Discuss::getCategories());
		$responseContext->set('featureIcons', Helper\ProjectFeature::getIcons());
		
		//product for schema
		if ($project->getPrice() > 0) {
			$productSchema = array();
			
			$productSchema['name'] = 'Projekt domu ' . $project->getName();
			$productSchema['image'] = $image;
			$productSchema['description'] = str_replace('"', "'",$project->getShortDescription());
			$productSchema['url'] = $url;
			if ($project->getDiscount()) {
				$productSchema['price'] = $project->getPrice()-$project->getDiscount();
				$matchPromoEnd = array();
				if (preg_match('/([0-9]{2})-([0-9]{2})-([0-9]{4})/', $promoEndValue, $matchPromoEnd)) {
					$productSchema['priceValid'] = $matchPromoEnd[3].'-'.$matchPromoEnd[2].'-'.$matchPromoEnd[1];
				}
			} else {
				$productSchema['price'] = $project->getPrice();
			}
			$responseContext->set('schemaProduct', $productSchema);
		}
		
		if ($sketchAuthorize = $this->_daoRepository->getSketchAuthorizeFinder()->getByProjectId($request->getParam('id'))) {
			$projectSketchParamsArray = $projectSketchParams->toArray('', 'id');
			$roomsPoints = array();
			
			foreach ($sketchAuthorize as $sketchAuthorizeObj) {
				foreach ($sketchAuthorizeObj->getRooms() as $roomItem) {
					$roomsPoints[$sketchAuthorizeObj->getSketchId()][$roomItem->getId()] = $roomItem->getPoints(true);
					$roomsPoints[$sketchAuthorizeObj->getSketchId()][$roomItem->getId()]['ptspid'] = $roomItem->getProjectToSketchParamId();
				
					if ($roomItem->getSketchParamId() && array_key_exists($roomItem->getSketchParamId(), $sketchParams)) {
						$roomsPoints[$sketchAuthorizeObj->getSketchId()][$roomItem->getId()]['name'] = $projectSketchParamsArray[$roomItem->getProjectToSketchParamId()]['room_no'] . '. ' . $sketchParams[$roomItem->getSketchParamId()]['name'] . ' (' . $projectSketchParamsArray[$roomItem->getProjectToSketchParamId()]['area'] . ' m2)';
					}
				
					if ($roomItem->getDescription()) {
						$roomsPoints[$sketchAuthorizeObj->getSketchId()][$roomItem->getId()]['desc'] = $roomItem->getDescription();
					}
				
					if ($roomItem->getLink()) {
						$roomsPoints[$sketchAuthorizeObj->getSketchId()][$roomItem->getId()]['link'] = $roomItem->getLink();
					}
				}
				$roomsPoints[$sketchAuthorizeObj->getSketchId()] = json_encode($roomsPoints[$sketchAuthorizeObj->getSketchId()]);
			}
			
			$responseContext->set('sketchAuthorize', $sketchAuthorize->toArray('', 'sketch_id'));
			$responseContext->set('roomsPoints', $roomsPoints);
		}
		
		
		if($showroom = $this->_daoRepository->getRenderAuthorizeFinder()->getByProjectId($request->getParam('id'), \StudioAtrium\Entity\RenderAuthorize::STATUS_PUBLISHED)) {
	        $authorizations = array();
	        $productIds = array();
	        
	        /* @var \StudioAtrium\Entity\RenderAuthorize $item  */
	        foreach($showroom as $renderShowroom) {
	            
	            $authorization = $renderShowroom->getAuthorization(true);
	            $authorizations[$renderShowroom->getRenderId()] = $authorization;
	            
	            
	            foreach($authorization as $item) {
	                $productIds[] = $item['id'];
	            }
	            
	        }
	        
	        if($productIds) {
	            $products = $this->_daoRepository->getShowroomFinder()->getListById($productIds);
	            $responseContext->set('products', $products->toArray(array(), 'id'));
	        }
	        
	        $responseContext->set('authorizations', $authorizations);
		}

		$this->_prepareHouseDetail2026($request, $responseContext, $project, $projectParams, $params, $sketchParams, $projectSketchParams);
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetForum(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
	
		$comments = $this->_daoRepository->getDiscussFinder()->getTreeByProjectId(
			$request->getParam('id'),
			$request->getParam('cid'),
			true,
			true
		);
	
		if ($comments) {
			$responseContext->set('commentList', $comments);
			
			$counter = array();
			$authorList = array();
			foreach ($comments as $comment) {
				if ($comment['author_id'] > 0 && !in_array($comment['author_id'], Helper\User::getAdmins())) {
					$authorList[$comment['author_id']] = $comment['author_id'];
				}
			
				$counter[$comment['cat_id']] = !isset($counter[$comment['cat_id']]) ? 1 : $counter[$comment['cat_id']] + 1;
				$counter['sum'] = !isset($counter['sum']) ? 1 : $counter['sum'] + 1;
			
				if (!empty($comment['children'])) {
					$counter[$comment['cat_id']] += count($comment['children']);
					$counter['sum'] += count($comment['children']);
				}
			}
				
			$responseContext->set('discuss_counter', $counter);
				
			if ($authorList) {
				$commentAuthors = $this->_daoRepository->getUserFinder()->getListById($authorList, false);
				$responseContext->set('commentAuthors', $commentAuthors->toArray(array(), 'id'));
			}
		
			$responseContext->set('discuss_categories', Helper\Discuss::getCategories());
			$responseContext->set('adminIds', Helper\User::getAdmins());
		}
	}
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGarage(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$project = $this->_projectFinder->getById($request->getParam('id'));

		if (!$project || $project->getType() != 'garage') {
			\Point7_WebApp::getLogger('notfound')->error(
				\StudioAtrium\Application\Exception\Helper::format404Message('Nie znaleziono projektu garażu', 'Project', 'Garage')
			);
			$this->_exit();
		}
		
		//validate url and move 301 to a valid one - 2025-11-28 - sempai
		if (($request->getParam('version') == 'normal' && Helper\Url::buildProjectUrl($project, Helper\ProjectCategory::getDefaultGarageCategory()) != $_SERVER['REQUEST_URI']) ||
		    $request->getParam('version') == 'mirror' && Helper\Url::buildProjectUrl($project, Helper\ProjectCategory::getDefaultGarageCategory(), true) != $_SERVER['REQUEST_URI']
		    ) {
		        header('HTTP/1.1 301 Moved Permanently');
		        if ($request->getParam('version') == 'mirror') {
		          header("Location: " . \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildProjectUrl($project, Helper\ProjectCategory::getDefaultGarageCategory(), true));
		        } else {
		          header("Location: " . \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildProjectUrl($project, Helper\ProjectCategory::getDefaultGarageCategory()));
		        }
		        header('Connection: close');
		        die();
		    }
		
		
		$params = $this->_daoRepository->getProjectParamFinder()->getListForProject('garage', true)->toArray('', 'id');
		$projectParams = $this->_daoRepository->getProjectToParamFinder()->getParamsForProject($request->getParam('id'))->toArray('', 'project_param_id');

		$technicalDataList = $this->_daoRepository->getProjectParamFinder()->getListingByAlternateName('garaztech');

		$responseContext->set('params', $params);
		$responseContext->set('projectParams', $projectParams);
		$responseContext->set('technicalList', $technicalDataList);
		$responseContext->set('project', $project);
		
		
		$sketchParams = $this->_daoRepository->getSketchParamFinder()->getList()->toArray('', 'id');
		$responseContext->set('sketchParams', $sketchParams);
		
		$projectSketchParams = $this->_daoRepository->getSketchParamFinder()->getParamsForProject($request->getParam('id'));
		$responseContext->set('projectSketchParams', $projectSketchParams);

		//features
		$extras = json_decode($project->getExtraData(), true);

		if(isset($extras['features'])) {
			$features = $this->_projectFinder->getFeatures('sorting', $extras['features']);
				
			$responseContext->set('features', $features);
		}
		
		//project url
		$url = \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildProjectUrl($project, Helper\ProjectCategory::getDefaultGarageCategory());
		$responseContext->set('projectUrl', $url);
		
		//OpenGraph tags for g+
		$openGraphTags = array();
		$openGraphTags['title'] = 'Projekt garażu ' . $project->getSymbolAlpha() . '-' . $project->getSymbolNum();
		$openGraphTags['description'] = $project->getShortDescription();
		$openGraphTags['type'] = 'product';
		$openGraphTags['site_name'] = 'Studio Atrium - projekty domów i garaży';
		
		$attachment = $project->getAttachments()->getAttachmentsByType('ProjectRender')->current()->toArray();
		$image = \Point7_WebApp::getConfigParam('static.project') . '/' . $attachment['childAttachments']['presentation'][0]['path'] . '/' . $attachment['childAttachments']['presentation'][0]['filename'];
		
		//breadcrumbs 
		//get list of one stand garages
		$oneStandGarages = $this->_daoRepository->getProjectCategoryFinder()->getByLink('projekty-garazy/jednostanowiskowe');
		
		if(in_array($project->getId(), explode(',', $oneStandGarages->getProjectList()))) {
			$category = 'jednostanowiskowe';
			$categoryLink = '/projekty-garazy/jednostanowiskowe/';
		} else {
			$category = 'wielostanowiskowe';
			$categoryLink = '/projekty-garazy/wielostanowiskowe/';
		}
		
		$responseContext->set('category', $category);
		$responseContext->set('categoryLink', $categoryLink);
		
		//breadcrumbs for schema
		$breadcrumbs = array();
		
		$breadcrumbs[1]['id'] = "https://www.studioatrium.pl/projekty-garazy/";
		$breadcrumbs[1]['name'] = "Projekty garaży";
		$breadcrumbs[2]['id'] = "https://www.studioatrium.pl" . $categoryLink;
		$breadcrumbs[2]['name'] = ucfirst($category);
		$breadcrumbs[3]['id'] = $url;
		$breadcrumbs[3]['name'] = 'Projekt garażu ' . $project->getSymbolAlpha() . '-' . $project->getSymbolNum();
		
		$responseContext->set('schemaBreadcrumbs', $breadcrumbs);
		
		//openGraph
		$openGraphTags['image'] = $image;
		$openGraphTags['image:width'] = '475';
		$openGraphTags['image:height'] = '317';
		
		$openGraphTags['url'] = $url;
		
		$responseContext->set('ogTags', $openGraphTags);
		
		//meta tags
		if ($project->getMetaTitle()) {
			$title = $project->getMetaTitle();
			if ($request->getParam('version') == 'mirror') {
				$title .= ' - odbicie lustrzane';
			}
			$responseContext->setMeta($title, $project->getMetaDescription());
		} else {
			$mirror = ($request->getParam('version') == 'mirror') ? true : false;
			Helper\Meta::prepareMeta($responseContext, $this->_name, 'Garage', $project, null, $mirror);
		}
		
		$promoEndValue = '';
		//if promo price, get price_end
		if ($project->getDiscount() > 0) {
			if ($promoEnd = $this->_daoRepository->getSettingsFinder()->getByCharId('promo_end')) {
				$promoEndValue = $promoEnd->getStringValue();
				$responseContext->set('promoEnd', $promoEndValue);
			}
		}
		
		//product for schema
		$productSchema = array();
		
		$productSchema['name'] = 'Projekt garażu ' . $project->getSymbolAlpha() . '-' . $project->getSymbolNum();
		$productSchema['image'] = $image;
		$productSchema['description'] = $project->getShortDescription();
		$productSchema['url'] = $url;
		if ($project->getDiscount()) {
			$productSchema['price'] = $project->getPrice()-$project->getDiscount();
			$matchPromoEnd = array();
			if (preg_match('/([0-9]{2})-([0-9]{2})-([0-9]{4})/', $promoEndValue, $matchPromoEnd)) {
				$productSchema['priceValid'] = $matchPromoEnd[3].'-'.$matchPromoEnd[2].'-'.$matchPromoEnd[1];
			}
		} else {
			$productSchema['price'] = $project->getPrice();
		}
		
		$responseContext->set('schemaProduct', $productSchema);
		
		//2025-11-28 - noindex dla projektow wycofanych z oferty na wniosek Sempai
		if (\StudioAtrium\Application\WWW\SmartyFunctionsRegistry::mIsWithdrawn($projectParams)) {
		    $responseContext->set('noindex', 1);
		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doOther(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$project = $this->_projectFinder->getById($request->getParam('id'));

		if (!$project) {
			$responseContext->setErrorMessage('Przykro nam, nie udało się znaleźć takiego projektu');
			
			\Point7_WebApp::getLogger('notfound')->error(
				\StudioAtrium\Application\Exception\Helper::format404Message('Nie znaleziono projektu', 'Project', 'Other')
			);
			$this->_exit();
		}
		
		$type = Helper\Project::getTypeForCategory($request->getParam('category'));

		$params = $this->_daoRepository->getProjectParamFinder()->getListForProject($type, true)->toArray('', 'id');
		$projectParams = $this->_daoRepository->getProjectToParamFinder()->getParamsForProject($request->getParam('id'))->toArray('', 'project_param_id');

		
		switch($type) {
			case 'carport':
					$technicalDataList = $this->_daoRepository->getProjectParamFinder()->getListingByAlternateName('wiatatech');
					$category = 'wiaty';
					$categoryLink = '/projekty/wiaty/';
				break;
			case 'arbor':
					$technicalDataList = $this->_daoRepository->getProjectParamFinder()->getListingByAlternateName('altanatech');
					$category = 'altany';
					$categoryLink = '/projekty/altany/';
				break;
			case 'tank':
					$technicalDataList = $this->_daoRepository->getProjectParamFinder()->getListingByAlternateName('osadniktech');
					$category = 'osadniki';
					$categoryLink = '/projekty/osadniki/';
				break;
			case 'fence':
					$technicalDataList = $this->_daoRepository->getProjectParamFinder()->getListingByAlternateName('ogrodzenietech');
					$category = 'ogrodzenia';
					$categoryLink = '/projekty/ogrodzenia/';
				break;	
			case 'outbuilding':
					$technicalDataList = $this->_daoRepository->getProjectParamFinder()->getListingByAlternateName('gospotech');
					$category = 'gospodarcze';
					$categoryLink = '/projekty/gospodarcze/';
					
					$sketchParams = $this->_daoRepository->getSketchParamFinder()->getList()->toArray('', 'id');
					$responseContext->set('sketchParams', $sketchParams);
					
					$projectSketchParams = $this->_daoRepository->getSketchParamFinder()->getParamsForProject($request->getParam('id'));
					$responseContext->set('projectSketchParams', $projectSketchParams);
					
				break;
		}
		
		$responseContext->set('category', $category);
		$responseContext->set('categoryLink', $categoryLink);
		$responseContext->set('params', $params);
		$responseContext->set('projectParams', $projectParams);
		$responseContext->set('technicalList', $technicalDataList);
		$responseContext->set('project', $project);
		$responseContext->set('type', $type);

		//features
		$extras = json_decode($project->getExtraData(), true);

		if(isset($extras['features'])) {
			$features = $this->_projectFinder->getFeatures('sorting', $extras['features']);

			$responseContext->set('features', $features);
		}
		
		//project url
		$url = \Point7_WebApp::getConfigParam('domain.www') . '/projekty' . Helper\Url::buildProjectUrl($project, $request->getParam('category'));
		$responseContext->set('projectUrl', $url);
		
		//breadcrumbs for schema
		$breadcrumbs = array();
		
		$breadcrumbs[1]['id'] = "https://www.studioatrium.pl" . $categoryLink;
		$breadcrumbs[1]['name'] = ucfirst($category);
		$breadcrumbs[2]['id'] = $url;
		$breadcrumbs[2]['name'] = Helper\Project::getTypes($type) . ' ' . $project->getSymbolAlpha() . '-' . $project->getSymbolNum();
		
		$responseContext->set('schemaBreadcrumbs', $breadcrumbs);
		
		//OpenGraph tags for g+
		$openGraphTags = array();
		$openGraphTags['title'] = Helper\Project::getTypes($type) . ' ' . $project->getSymbolAlpha() . '-' . $project->getSymbolNum();
		$openGraphTags['description'] = str_replace('"', "'", $project->getShortDescription());
		$openGraphTags['type'] = 'product';
		$openGraphTags['site_name'] = 'Studio Atrium - projekty domów i garaży';
		
		$attachment = $project->getAttachments()->getAttachmentsByType('ProjectRender')->current()->toArray();
		$image = \Point7_WebApp::getConfigParam('static.project') . '/' . $attachment['childAttachments']['presentation'][0]['path'] . '/' . $attachment['childAttachments']['presentation'][0]['filename'];
		
		$openGraphTags['image'] = $image;
		$openGraphTags['image:width'] = '475';
		$openGraphTags['image:height'] = '317';
		
		$openGraphTags['url'] = $url;
		
		$responseContext->set('ogTags', $openGraphTags);
		
		//product for schema
		$productSchema = array();
		
		$productSchema['name'] = Helper\Project::getTypes($type) . ' ' . $project->getSymbolAlpha() . '-' . $project->getSymbolNum();
		$productSchema['image'] = $image;
		$productSchema['description'] = $project->getShortDescription();
		$productSchema['url'] = $url;
		if ($project->getDiscount()) {
			$productSchema['price'] = $project->getPrice()-$project->getDiscount();
			$matchPromoEnd = array();
			if (preg_match('/([0-9]{2})-([0-9]{2})-([0-9]{4})/', $promoEndValue, $matchPromoEnd)) {
				$productSchema['priceValid'] = $matchPromoEnd[3].'-'.$matchPromoEnd[2].'-'.$matchPromoEnd[1];
			}
		} else {
			$productSchema['price'] = $project->getPrice();
		}
		
		$responseContext->set('schemaProduct', $productSchema);
		
		//meta tags
		if ($project->getMetaTitle()) {
			$title = $project->getMetaTitle();
			if ($request->getParam('version') == 'mirror') {
				$title .= ' - odbicie lustrzane';
			}
			$responseContext->setMeta($title, $project->getMetaDescription());
		} else {
			$mirror = ($request->getParam('version') == 'mirror') ? true : false;
			Helper\Meta::prepareMeta($responseContext, $this->_name, 'Other', $project, null, $mirror);
		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doList(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		//check double slash in path - Sempai 08.04.2026 (path only; ignore // in query values)
	    $link = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
	    $linkPath = parse_url($link, PHP_URL_PATH);
	    if ($linkPath && strpos($linkPath, '//') !== false) {
	        $cleanPath = preg_replace('#/+#', '/', $linkPath);
	        $query = parse_url($link, PHP_URL_QUERY);
	        header('HTTP/1.1 301 Moved Permanently');
	        header("Location: " . \Point7_WebApp::getConfigParam('domain.www') . $cleanPath . ($query ? ('?' . $query) : ''));
	        header('Connection: close');
	        die();
	    }
		
		
		/* @var $category \StudioAtrium\Entity\Project\Category */
		$category = $this->_daoRepository->getProjectCategoryFinder()->getByLink(rtrim($request->getParam('category'), "/"));
		$isCanonicalSet = false;

		if (!$category) {
			$responseContext->setErrorMessage('Wystąpił błąd. Nie znaleziono takiej kategorii.');
			
			\Point7_WebApp::getLogger('notfound')->error(
				\StudioAtrium\Application\Exception\Helper::format404Message('Nie znaleziono kategorii ' . $request->getParam('category'), 'Project', 'List')
			);
			
			$this->_exit();
		}
		
		$m = array();
		preg_match("/projekty-domow|projekty-garazy/", $request->getParam('category'), $m);
		
		if($m) {
			$type = Helper\Project::getTypeForCategory($m[0]);
		} else {
			preg_match("/projekty\/([a-z\-]+)/", $request->getParam('category'), $m);
			$type = Helper\Project::getTypeForCategory($m[1]);
		}
		

		//defaultowe sortingi w celu wprowadzenia noindex na nie podstawowe
		$defaultDisplayType = 'box';
		$defaultSortBy = 'id';
		$defaultSortOrder = 'ASC';
		
		$displayParams = $this->_getDisplayParams($request);

		if ($displayParams['sortBy'] != 'usable_area') {
			$idList = explode(',', $category->getProjectList());
		} else {
			$catList =  $category->getProjectListByArea();
			if($catList) {
				$idList = explode(',', $catList);
			} else {
				$idList = explode(',', $category->getProjectList());
			}
		}
		
		if ($type == 'small') {
			$responseContext->set('disableBox', 1);
			if ($displayParams['displayType'] == 'box') {
				$displayParams['displayType'] = 'detail';
			}
		}
		
		$isAllProjects = ((int) $request->getParam('all') === 1);
		$listPath = $isAllProjects ? 'projekty' : rtrim($request->getParam('category'), '/');
		$responseContext->set('isAllProjects', $isAllProjects);

		// /projekty: default newest → oldest (by project id); keep curated category order elsewhere
		if ($isAllProjects) {
			$defaultSortOrder = 'DESC';
			$rawForSort = $request->getRawParams();
			$explicitSort = (isset($rawForSort['sort_order']) && $rawForSort['sort_order'] !== '')
				|| (isset($rawForSort['sort_by']) && $rawForSort['sort_by'] !== '');
			if (!$explicitSort) {
				$displayParams['sortOrder'] = 'DESC';
			}
			if ($displayParams['sortBy'] == 'id') {
				$sortedIds = array_values(array_filter(array_map('intval', $idList)));
				if (strtoupper($displayParams['sortOrder']) === 'DESC') {
					rsort($sortedIds, SORT_NUMERIC);
				} else {
					sort($sortedIds, SORT_NUMERIC);
				}
				$idList = $sortedIds;
			}
		}

		$rawParams = $request->getRawParams();
		$session = \Point7_WebApp::getSession();
		
		//naprawione - 301 dla adresow z pid - ustawienie wartosci do sesji, 301, wyjecie z sesji, wykasowanie sesji - sempai: 24-11-2025
		if (isset($rawParams['pid'])) {
		    $session->set('houseListPid', $rawParams['pid']);
		    
		    header('HTTP/1.1 301 Moved Permanently');
		    header("Location: " . \Point7_WebApp::getConfigParam('domain.www') . '/' . $listPath . '/');
		    header('Connection: close');
		    die();
		} elseif ($session->get('houseListPid')) {
		    $key = array_search($session->get('houseListPid'), $idList);
		    if ($key) {
		       array_unshift($idList, current(array_splice($idList, $key, 1)));
		    }
		    $session->remove('houseListPid');
		}
		
		//jeżeli pierwsza strona jest podana w adresie, redirect na tę bez cyfertki - Sempai 07.04.2026
		// rawParams must be client-supplied only (not XML default page=1), or this 301 loops
		if (isset($rawParams['page']) && $rawParams['page'] !== '' && (int)$rawParams['page'] === 1) {
		    header('HTTP/1.1 301 Moved Permanently');
		    header("Location: " . \Point7_WebApp::getConfigParam('domain.www') . '/' . $listPath . '/');
		    header('Connection: close');
		    die();
		}

		$limit = (int) $request->getParam('limit');
		if ($isAllProjects) {
			// More cards than category pages (11); keep 3n−1 so advisor tile fills the last grid cell
			$limit = 23;
		} elseif ($limit <= 0) {
			$limit = 11;
		}

		$list = $this->_projectFinder->getListById(
			$idList, 
			\StudioAtrium_Entity_EntityBase_Project::STATUS_PUBLISHED, 
			!$isAllProjects || $displayParams['sortBy'] != 'id',
			$request->getParam('page') - 1, 
			$limit, 
			$displayParams['sortBy'],
			$displayParams['sortOrder']
		);

		$responseContext->set('list', $list);
		$listCards = $this->_buildCategoryListCards($list);
		$responseContext->set('listCards', $listCards);
		$promoThumbs = array();
		foreach ($listCards as $card) {
			if (!empty($card['image_url'])) {
				$promoThumbs[] = $card['image_url'];
			}
			if (count($promoThumbs) >= 3) {
				break;
			}
		}
		$responseContext->set('categoryPromoThumbs', $promoThumbs);
		
		
		$pages = ceil($list->total() / $limit);
		
		//Meta tagi i modyfikacja treści dla kolejnych stron
		
		if (isset($rawParams['page']) && $rawParams['page'] !== '') {
			$responseContext->setMeta(str_replace('Studio Atrium', 'strona: ' . $request->getParam('page') . ' z ' . $pages . ' - Studio Atrium', $category->getMetaTitle()), $category->getMetaDescription());
		} else {
			if ($isAllProjects) {
				$responseContext->setMeta(
					'Wszystkie projekty domów | Studio Atrium',
					$category->getMetaDescription() ? $category->getMetaDescription() : 'Przeglądaj wszystkie gotowe projekty domów Studio Atrium — parterowe, z poddaszem, piętrowe i nowoczesne.'
				);
				$responseContext->set('description', $category->getDescription());
				$responseContext->set('shortDescription', $category->getShortDescription() ? $category->getShortDescription() : 'Kompletna lista gotowych projektów domów jednorodzinnych.');
				$responseContext->set('canonicalUrl', \Point7_WebApp::getConfigParam('domain.www') . '/projekty/');
				$isCanonicalSet = true;
			} else {
				$responseContext->setMeta($category->getMetaTitle(), $category->getMetaDescription());
				$responseContext->set('description', $category->getDescription());
				$responseContext->set('shortDescription', $category->getShortDescription());

				//canonical na stronę główną z projektów domów (2018-01-11) - akcja mająca na celu przerankowanie na główną stronę
				if($category->getId() == 1) {
					$responseContext->set('canonicalUrl', \Point7_WebApp::getConfigParam('domain.www'));
					$isCanonicalSet = true;
				} else {
				    if(isset($rawParams['pid']) && !in_array($category->getId(), array(5, 6))) { //patrz niżej
	    			    $responseContext->set('canonicalUrl', \Point7_WebApp::getConfigParam('domain.www') . self::_houseListUrl($request->getParam('category')));
						$isCanonicalSet = true;
	    			}
				}
			}
		}
		
		$noindexisset = false;
		
		if ($displayParams['displayType'] != $defaultDisplayType || $displayParams['sortBy'] != $defaultSortBy || $displayParams['sortOrder'] != $defaultSortOrder) {
			$responseContext->set('noindex', true);
			$noindexisset = true;
		}
		
		//kanibalizacja kategorii domy parterowe z najlepsze-domy-parterowe, dodane na wniosek sempai 30-01-2028
		if ($category->getId() == 92 && !$noindexisset) {
		    $responseContext->set('noindex', true);
		}
		
		
		//Google prev and next rels
		$mappedDisplayType = Helper\UrlParamMap::getMapping('display_type', $displayParams['displayType']);
		$mappedSortBy = Helper\UrlParamMap::getMapping('sort_by', $displayParams['sortBy']);
		$mappedSortOrder = Helper\UrlParamMap::getMapping('sort_order', $displayParams['sortOrder']);

		if($pages > 1) {
			if ($request->getParam('page') == 1) {
				
				$responseContext->set('nextUrl', \Point7_WebApp::getConfigParam('domain.www') . self::_houseListPagerUrl(
						$listPath,
						$mappedDisplayType,
						$mappedSortBy,
						$mappedSortOrder,
						2
					)
				);
				
				//projects for google search results on mobile
				$responseContext->set('mobileGoogleSearch', array_slice($list->toArray(), 0, 3));

			} else if ($request->getParam('page') == $pages) {
				if($request->getParam('page') == 2) {
					$responseContext->set('prevUrl', \Point7_WebApp::getConfigParam('domain.www') . self::_houseListUrl($listPath));
				} else {
					$responseContext->set('prevUrl', \Point7_WebApp::getConfigParam('domain.www') . self::_houseListPagerUrl(
							$listPath,
							$mappedDisplayType,
							$mappedSortBy,
							$mappedSortOrder,
							$request->getParam('page') - 1
						)
					);
				}
			} else {
				$responseContext->set('nextUrl', \Point7_WebApp::getConfigParam('domain.www') . self::_houseListPagerUrl(
						$listPath,
						$mappedDisplayType,
						$mappedSortBy,
						$mappedSortOrder,
						$request->getParam('page') + 1
					)
				);
				
				if($request->getParam('page') == 2) {
					$responseContext->set('prevUrl', \Point7_WebApp::getConfigParam('domain.www') . self::_houseListUrl($listPath));
				} else {
					$responseContext->set('prevUrl', \Point7_WebApp::getConfigParam('domain.www') . self::_houseListPagerUrl(
							$listPath,
							$mappedDisplayType,
							$mappedSortBy,
							$mappedSortOrder,
							$request->getParam('page') - 1
						)
					);
				}
			}
		}
		
		//Set variables
		$responseContext->set('category', $category);
		
// 		$csCategory = Helper\ClickSearchMap::getTypeParam('c' . $category->getId());
		
// 		if($csCategory) {
// 			$responseContext->set('csCategory', Helper\ClickSearchMap::getTypeParam('c' . $category->getId()));
// 		} else {
// 			$responseContext->set('csCustomCategory', 'c' . $category->getId());
// 		}

		$csType = Helper\ClickSearchMap::getTypeParam('c' . $category->getId());
		
		if($csType) {
			$responseContext->set('csType', $csType);
		} else {
			if($category->getId() != 1) {
				$responseContext->set('csCategory', 'c' . $category->getId());
			}
		}
		
		$url = self::_houseListUrl($listPath);
		$responseContext->set('url', $url);
		$responseContext->set('type', $type);
		$responseContext->set('listType', Helper\Project::getDisplayListTypes($type));

		if($list->total() < 4) {
			$responseContext->set('disableBox', 1);
			
			if($displayParams['displayType'] == 'box') {
				$displayParams['displayType'] = 'detail';
			}
		}
		
		if($type == 'tank') {
			$displayParams['displayType'] = 'list';
		}
		
		$responseContext->set('displayType', $displayParams['displayType']);
		$responseContext->set('sortBy', $displayParams['sortBy']);
		$responseContext->set('sortOrder', $displayParams['sortOrder']);
		
		$responseContext->set('total', $list->total());
		$responseContext->set('pages', $pages);
		$responseContext->set('page', $request->getParam('page'));
		
		//czasowe włączenie rankowania na /projekty-domow z list z domów parterowych i z domów z poddaszem (2017-09-25) - Marcin Gaworski request
		//if ($category->getId() == 5 || $category->getId() == 6) {
		//	$responseContext->set('canonicalUrl', "https://www.studioatrium.pl/projekty-domow/");
		//}
		
		//naprawa powyzszego błędu przez sempai 2025-11-24:
		//if ($category->getId() == 5) {
		//    $responseContext->set('canonicalUrl', "https://www.studioatrium.pl/projekty-domow/parterowe/");
		//} elseif ($category->getId() == 6) {
		//    $responseContext->set('canonicalUrl', "https://www.studioatrium.pl/projekty-domow/z-poddaszem-uzytkowym/");
		//}
		
		//naprawa powyzszego błędu przez sempai 2025-11-24, zmiana 28-01-2026:
		if ($category->getId() == 5) {
		    $canonUrl = "https://www.studioatrium.pl/projekty-domow/parterowe/";
		} elseif ($category->getId() == 6) {
		    $canonUrl = "https://www.studioatrium.pl/projekty-domow/z-poddaszem-uzytkowym/";
		} else {
		    $canonUrl = \Point7_WebApp::getConfigParam('domain.www') . $url;
		}
		
		//napraw canonical, jezeli jest strona
		if ($request->getParam('page') > 1) {
		    
		    $mappedDisplayType = Helper\UrlParamMap::getMapping('display_type', $defaultDisplayType);
		    $mappedSortBy = Helper\UrlParamMap::getMapping('sort_by', $defaultSortBy);
		    $mappedSortOrder = Helper\UrlParamMap::getMapping('sort_order', $defaultSortOrder);
		    
		    $canonUrl = \Point7_WebApp::getConfigParam('domain.www') . self::_houseListPagerUrl(
		        $request->getParam('category'),
		        $mappedDisplayType,
		        $mappedSortBy,
		        $mappedSortOrder,
		        $request->getParam('page')
		     );
		}

		if (!$isCanonicalSet) {
		  $responseContext->set('canonicalUrl', $canonUrl);
		}
				
		
		//breadcrumbs for schema
		$breadcrumbs = array();
		
		if ($category->getTree() == \StudioAtrium\Entity\Project\Category::TREE_HOUSE) {
			$breadcrumbs[1]['id'] = "https://www.studioatrium.pl/projekty-domow/";
			$breadcrumbs[1]['name'] = "Projekty domów";
			if ($category->getLink() != 'projekty-domow') {
				$breadcrumbs[2]['id'] = "https://www.studioatrium.pl/" . $category->getLink() . "/";
				$breadcrumbs[2]['name'] = str_replace('"', "'", $category->getName());
			}
		} else {
			$breadcrumbs[1]['id'] = "https://www.studioatrium.pl/".$category->getLink()."/";
			$breadcrumbs[1]['name'] = str_replace('"', "'", $category->getName());
		}
		
		$responseContext->set('schemaBreadcrumbs', $breadcrumbs);
		
		$bannerUrl = \Point7_WebApp::getConfigParam('static.banner');
		$responseContext->set('bannerUrl', $bannerUrl);
		
		
		//Parted banner
		$parts = array(
		    array($bannerUrl . '/parted/part2.jpg?t=20250128' => 'https://www.studioatrium.pl/projekty-domow/realizacje/'),
		    array($bannerUrl . '/parted/part3.jpg' => 'https://www.studioatrium.pl/wynik-wyszukiwania/?pow_min=70&pow_max=90'),
		    array($bannerUrl . '/parted/part4.jpg?t=20230421' => 'https://www.studioatrium.pl/projekty-domow/na-skarpe/'),
		    array($bannerUrl . '/parted/part5.png' => 'https://www.studioatrium.pl/znajdziemy-dla-ciebie-projekt.html'),
			array($bannerUrl . '/parted/part1.jpg?t=20230531' => 'https://www.studioatrium.pl/projekty-domow/szkieletowe/')
		);
		
		shuffle($parts);
		//array_unshift($parts, array($bannerUrl . '/parted/part1.jpg?t=20230531' => 'https://www.studioatrium.pl/projekty-domow/szkieletowe/'));
		
		$responseContext->set('partedBanner', $parts);
		
		
		// Check if category is na wąską działkę
		if ($category->getId() == Helper\Project::getNarrowPlotCategoryId()) {
		    $responseContext->set('isNarrowCategory', 1);
		}
		
		$blackWeekBannerValue = '';
		if ($blackWeekBanner = $this->_daoRepository->getSettingsFinder()->getByCharId('black_week_banner')) {
		    $blackWeekBannerValue = $blackWeekBanner->getStringValue();
		    $responseContext->set('blackWeekBanner', $blackWeekBannerValue);
		}
	}
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doRealizationsInterior(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$this->doRealizations($request, $appContext, $responseContext);
	}
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doRealizationsBuilding(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$this->doRealizations($request, $appContext, $responseContext);
	}
			
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doRealizations(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		//check double slash in path - Sempai 08.04.2026 (path only; ignore // in query values)
	    $link = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
	    $linkPath = parse_url($link, PHP_URL_PATH);
	    if ($linkPath && strpos($linkPath, '//') !== false) {
	        $cleanPath = preg_replace('#/+#', '/', $linkPath);
	        $query = parse_url($link, PHP_URL_QUERY);
	        header('HTTP/1.1 301 Moved Permanently');
	        header("Location: " . \Point7_WebApp::getConfigParam('domain.www') . $cleanPath . ($query ? ('?' . $query) : ''));
	        header('Connection: close');
	        die();
	    }
		
		
		$finder =  $this->_daoRepository->getAttachmentFinder();

		//breadcrumbs for schema
		$breadcrumbs = array();
		
		$breadcrumbs[1]['id'] = "https://www.studioatrium.pl/projekty-domow/";
		$breadcrumbs[1]['name'] = "Projekty domów";
		
		switch($this->_action) {
			case 'Realizations': default: 
					$type = 'ProjectRealisation';
					$responseContext->set('url', self::_realizationsListUrl());
					
					$breadcrumbs[2]['id'] = "https://www.studioatrium.pl/projekty-domow/realizacje/";
					$breadcrumbs[2]['name'] = "Realizacje projektów";
				break;
			case 'RealizationsBuilding': 
					$type = 'ProjectBuildingInProgress';
					$responseContext->set('url', self::_realizationsBuildingListUrl());
					
					$breadcrumbs[2]['id'] = "https://www.studioatrium.pl/projekty-domow/realizacje-w-budowie/";
					$breadcrumbs[2]['name'] = "Domy w budowie";
				break;
			case 'RealizationsInterior': 
					$type = 'ProjectRealisationInterior';
					$responseContext->set('url', self::_realizationsInteriorListUrl());
					
					$breadcrumbs[2]['id'] = "https://www.studioatrium.pl/projekty-domow/realizacje-wnetrz/";
					$breadcrumbs[2]['name'] = "Realizacje wnętrz";
				break;
		}
		
		$responseContext->set('schemaBreadcrumbs', $breadcrumbs);
		
		
		if(is_file(\Point7_WebApp::getConfigParam('paths.realizations_list'))) {
			require_once(\Point7_WebApp::getConfigParam('paths.realizations_list'));
		}

		if(!isset($realizationList[$type])) {
			$realisations = $finder->getAttachmentsByProfile(
				$type,
				false,
				$request->getParam('limit'),
				true,
				$request->getParam('page')
			);
		} else {

			$uidList = array();
			foreach($realizationList[$type] as $id) {
				$uidList[] = Helper\Project::getProjectUID($id);
			}
			
			$realisations = $finder->getAttachmentsByProfileAndUid(
				$type,
				$uidList,
				true,
				$request->getParam('limit'),
				$request->getParam('page')
			);
		}
		
		$responseContext->set('realisations', $realisations);
		
		$pages = 1;
		
		if($finder->getTotal() > 0) {
			$pages = ceil($finder->getTotal() / $request->getParam('limit'));
			$responseContext->set('pages', $pages);
			$responseContext->set('total', $finder->getTotal());
		}
		
		$page = $request->getParam('page');
		$responseContext->set('page', $page);
		
		if ($page > 1) {
			Helper\Meta::prepareArticleMeta($responseContext, $this->_name, $this->_action, '', $page, $pages);
		} else {
			Helper\Meta::prepareArticleMeta($responseContext, $this->_name, $this->_action);
		}
		
		
		if ($pages > 1) {
			if ($page == 1) {
				$responseContext->set('nextUrl', \Point7_WebApp::getConfigParam('domain.www') . self::_realizationsListUrl(
						2
					)
				);
			} else if ($page == $pages) {
					
				if ($request->getParam('page') == 2) {
					$responseContext->set('prevUrl', \Point7_WebApp::getConfigParam('domain.www') . self::_realizationsListUrl());
				} else {
					$responseContext->set('prevUrl', \Point7_WebApp::getConfigParam('domain.www') . self::_realizationsListUrl(
							$page - 1
						)
					);
				}
			} else {
				$responseContext->set('nextUrl', \Point7_WebApp::getConfigParam('domain.www') . self::_realizationsListUrl(
						$page + 1
					)
				);
					
				if ($request->getParam('page') == 2) {
					$responseContext->set('prevUrl', \Point7_WebApp::getConfigParam('domain.www') . self::_realizationsListUrl());
				} else {
					$responseContext->set('prevUrl', \Point7_WebApp::getConfigParam('domain.www') . self::_realizationsListUrl(
							$page - 1
						)
					);
				}
			}
		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doSearch(
	   \Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$displayParams = $this->_getDisplayParams($request);

		//(?= positive assertion
		$query = preg_replace('/(s?\s?-?)?glx?(?=\s|-|\d)\s?-?/i', '', $request->getParam('query'));
		
		//skeleton search
		if(preg_match('/[0-9]\s?sz/i', $query)) {
		    
		    $m = array();
		    preg_match('/[0-9]+/', $query, $m);
		    
		    $query = $m[0];
		    
		    $query = strlen($query) == 4 ? '999' . $query : '9990' . $query;
		}
		
				
		$list = $this->_projectFinder->getList(
			null,
			true,
			$request->getParam('page') - 1,
			$request->getParam('limit'),
		    $query,
			$displayParams['sortOrder'],
			$displayParams['sortBy'],
			\StudioAtrium_Entity_EntityBase_Project::STATUS_PUBLISHED
		);
		$responseContext->set('isSearch', 1);

		if ($list) {
			if ($list->total() == 1) {
				// forward user to single project
				$list->rewind();
				$project = $list->current();
				
				switch($project->getType()) {
					case 'house': case 'skeleton':
						$this->_redirect(Helper\Url::buildProjectUrl($project));
					break;
					case 'garage':
						$this->_redirect(Helper\Url::buildProjectUrl($project, Helper\ProjectCategory::getDefaultGarageCategory()));
					break;
					default:
					    $this->_redirect('/projekty' . Helper\Url::buildProjectUrl($project, Helper\ProjectCategory::getDefaultOtherCategory($project->getType())));
					break;
				}
			} else {
				
				//disable sorting if list is not a house or skeleton only
				$sortingDisabled = false;
				foreach ($list as $l) {
					if ($l->getType() != 'house' && $l->getType() != 'skeleton') {
						$sortingDisabled = true;
						break;
					}
				}
				
				$responseContext->set('sortingDisabled', $sortingDisabled);
				$responseContext->set('list', $list);
				
				$url = self::_searchListUrl();
				$responseContext->set('url', $url);
				
				if(strpos($_SERVER['REQUEST_URI'], '?') !== false) {
					$responseContext->set('query', substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], '?')));
				}
				
				if($list->total() < 4) {
					$responseContext->set('disableBox', 1);
				
					if($displayParams['displayType'] == 'box') {
						$displayParams['displayType'] = 'detail';
					}
				}
			
				$pages = ceil($list->total() / $request->getParam('limit'));
				$responseContext->set('total', $list->total());
				$responseContext->set('pages', $pages);
				$responseContext->set('page', $request->getParam('page'));
				
				$responseContext->set('displayType', $displayParams['displayType']);
				$responseContext->set('sortBy', $displayParams['sortBy']);
				$responseContext->set('sortOrder', $displayParams['sortOrder']);
				
				$type = Helper\Project::getTypeForCategory('projekty-domow');
				$responseContext->set('type', $type);
				$responseContext->set('listType', Helper\Project::getDisplayListTypes($type));
			}
		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doClickSearch(
			\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		
		$displayParams = $this->_getDisplayParams($request);
		$csParams = $this->_getClickSearchParams($request);
		$searchParams = $this->_getSearchParams($request);
// 		$category = $this->_getClickSearchCategory($request);
		
		$categoryId = null;
		if($request->getParam('kategoria')) {
			$categoryId = (int) str_replace('c', '', $request->getParam('kategoria'));
		}
		
		$sortByArea = ($displayParams['sortBy'] == 'usable_area') ? true : false;
		$projectsId = $this->_projectFinder->clickSearch($searchParams, $csParams, $categoryId, false, false, $sortByArea);

		if($projectsId) {
			$list = $this->_projectFinder->getListById(
				$projectsId,
				\StudioAtrium_Entity_EntityBase_Project::STATUS_PUBLISHED,
				true,
				$request->getParam('page') - 1,
				$request->getParam('limit'),
				$displayParams['sortBy'],
				$displayParams['sortOrder']
			);

			$responseContext->set('list', $list);
			
			if($list->total() < 4) {
				$responseContext->set('disableBox', 1);
			
				if($displayParams['displayType'] == 'box') {
					$displayParams['displayType'] = 'detail';
				}
			}
			
			$pages = ceil($list->total() / $request->getParam('limit'));
			$responseContext->set('total', $list->total());
			$responseContext->set('pages', $pages);
			$responseContext->set('page', $request->getParam('page'));
		}
		
		
		$url = Helper\Url::buildClickSearchListUrl();
		$responseContext->set('url', $url);
		
		if(strpos($_SERVER['REQUEST_URI'], '?') !== false) {
			$responseContext->set('query', substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], '?')));
		}
		
		$responseContext->set('displayType', $displayParams['displayType']);
		$responseContext->set('sortBy', $displayParams['sortBy']);
		$responseContext->set('sortOrder', $displayParams['sortOrder']);
		
		$type = Helper\Project::getTypeForCategory('projekty-domow');
		$responseContext->set('type', $type);
		$responseContext->set('listType', Helper\Project::getDisplayListTypes($type));
		
		$responseContext->set('isSearch', 1);
		
		if($request->getParam('kategoria')) {
			$category = $this->_daoRepository->getProjectCategoryFinder()->getById($categoryId);
			$responseContext->set('category', $category);

			$responseContext->set('csCategory', $request->getParam('kategoria'));
		}

		if($request->getParam('typ_projektu')) {
			$csType = Helper\ClickSearchMap::getTypeName($request->getParam('typ_projektu'));
			if($csType) {
				$responseContext->set('csType', $csType);
			} else {
				$category = $this->_daoRepository->getProjectCategoryFinder()->getById(str_replace('c', '', $request->getParam('typ_projektu')));
				$responseContext->set('category', $category);
				$responseContext->set('csType', $category->getName());
				$responseContext->set('csCustomCategory', $request->getParam('typ_projektu'));
			}
		}

		
		$responseContext->set('csParams', $csParams);
		$responseContext->set('paramsMap', Helper\ClickSearchMap::getMap());
		$responseContext->set('csParamsNames', Helper\ClickSearchMap::getParamsNames());
		$responseContext->set('csDualParams', Helper\ClickSearchMap::getDualParams());
		$responseContext->set('csDualParamsNames', Helper\ClickSearchMap::getDualParamsNames());
		$responseContext->set('csValueParams', Helper\ClickSearchMap::getValueParams());
		$responseContext->set('csValueNames', Helper\ClickSearchMap::getValueNames());
		$responseContext->set('csRangeParams', Helper\ClickSearchMap::getRangeParams());
		$responseContext->set('csParamsUnits', Helper\ClickSearchMap::getParamsUnits());
		
		$responseContext->set('csTripleParams', Helper\ClickSearchMap::getTripleParams());
		$responseContext->set('csTripleParamsNames', Helper\ClickSearchMap::getTripleParamsNames());
		
		$typedParams = array();
		
		if($request->getParam('pow_min')) {
			$typedParams['pow_min'] = $request->getParam('pow_min');
		}
		
		if($request->getParam('pow_max')) {
			$typedParams['pow_max'] = $request->getParam('pow_max');
		}
		
		if($request->getParam('pow_zab_min')) {
			$typedParams['pow_zab_min'] = $request->getParam('pow_zab_min');
		}
		
		if($request->getParam('pow_zab_max')) {
			$typedParams['pow_zab_max'] = $request->getParam('pow_zab_max');
		}
		
		if($request->getParam('pow_total_min')) {
			$typedParams['pow_total_min'] = $request->getParam('pow_total_min');
		}
		
		if($request->getParam('pow_total_max')) {
			$typedParams['pow_total_max'] = $request->getParam('pow_total_max');
		}
		
		if($request->getParam('dzialka_szer')) {
			$typedParams['dzialka_szer'] = $request->getParam('dzialka_szer');
		}
		
		if($request->getParam('dzialka_dl')) {
			$typedParams['dzialka_dl'] = $request->getParam('dzialka_dl');
		}
		
		if($request->getParam('front_szer')) {
		    $typedParams['front_szer'] = $request->getParam('front_szer');
		}

		$responseContext->set('csTypedParamsNames', Helper\ClickSearchMap::getTypedParams());
		$responseContext->set('csTypedParams', $typedParams);
		
		
		$csTag = null;
		foreach(array_keys($csParams) as $key) {
		    if($csTag = Helper\Project::getCsTagParam($key)) {
		        $responseContext->set('csTag', array('id' => $key, 'name' => $csTag[0], 'csname' => $csTag[1]));
		        break;
		    }
		}
		
		$csTagSelect = null;
		foreach(array_keys($csParams) as $key) {
		    if($csTagSelect = Helper\Project::getCsTagSelectParam($key)) {
		        $responseContext->set('csTagSelect', array('id' => $key, 'name' => $csTagSelect[0], 'csname' => $csTagSelect[1], 'value' => $csParams[$key]));
		        break;
		    }
		}

		$responseContext->set('noindex', true);
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doClickSearchNumbers(
			\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
				
		$response = array();
		
		$csParams = $this->_getClickSearchParams($request);
		$searchParams = $this->_getSearchParams($request);
		//$category = $this->_getClickSearchCategory($request);
		
		$category = null;
		if($request->getParam('kategoria')) {
			$category = (int) str_replace('c', '', $request->getParam('kategoria'));
		} 

		$this->_projectFinder->clickSearch($searchParams, $csParams, $category);
		
		$stats = $this->_projectFinder->getClickSearchStats();

		foreach ($stats['sets'] as $key => $value) {
			if(Helper\ClickSearchMap::getTypeParam($key)) {
// 				$stats['sets'][Helper\ClickSearchMap::getTypeParam($key)] = $value;
				unset($stats['sets'][$key]);
			}
		}
		
		foreach ($stats['types'] as $key => $value) {
			if(Helper\ClickSearchMap::getTypeParam($key)) {
				$stats['types'][Helper\ClickSearchMap::getTypeParam($key)] = $value;
				unset($stats['types'][$key]);
			}
		}
		
		$response['status'] = 'ok';
		$response['stats'] = $stats;
				
		$responseContext->setJSONREsponse('feedback' , $response);
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doFavourite(
			\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$response = array();
		
		$user = $appContext->getUser();
		
		if($user) {
			$props = $user->getProps(true) or $props = array();
			
			$userFavouriteIds = isset($props['favourite']) ? $props['favourite'] : array();
			
			switch($request->getParam('operation')) {
				case 'add':
					if(!in_array($request->getParam('id'), $userFavouriteIds)) {
						$userFavouriteIds[] = $request->getParam('id');
					}
				break;
				
				case 'remove':
					if(in_array($request->getParam('id'), $userFavouriteIds)) {
						unset($userFavouriteIds[array_search($request->getParam('id'), $userFavouriteIds)]);
					}

				break;
			}
			
			$props['favourite'] = $userFavouriteIds;
			
			$user->setProps(json_encode($props));
			
			try {
				$this->_daoRepository->getUserDAO()->store($user);
			} catch (\Exception $e) {
// 				TODO: może wyświetlić jakiś komunikat?
				$response['status'] = 'error';
			}
			
			$response['user'] = 1;
			$response['count'] = count($userFavouriteIds);
		} else {
			$response['user'] = 0;
		}
		
		
		$responseContext->setJSONREsponse('feedback' , $response);
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetFavourite(
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
			
			$responseContext->set('list', $list);
		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetSlideshow(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$project = $this->_projectFinder->getById($request->getParam('id'));
		
		
		switch($project->getType()) {
		    case 'garage':
		        $type = 'garażu';
	        break;
		    case 'outbuilding':
		        $type = 'budynku';
	        break;
		    default: 
		        $type = 'domu';
		}
		
		$data = array();
		
		$attachment = $project->getAttachments()->getAttachmentsByType('ProjectSketch')->toArray();
		foreach($attachment as $item) {
			$data[] = array(
				'src' => \Point7_WebApp::getConfigParam('static.project') . '/' . $item['path'] . '/' . $item['filename'],
				'type' => 'image',
			    'caption' => 'Projekt ' . $type . ' ' . $project->getName() . ' - ' . $item['title'],
				'isDom' => false
			);
		}
		
		$attachment = $project->getAttachments()->getAttachmentsByType('ProjectRender')->toArray();

		$counter = 1;
		foreach($attachment as $item) {
			$data[] = array(
				'src' => \Point7_WebApp::getConfigParam('static.project') . '/' . $item['path'] . '/' . $item['filename'],
				'type' => 'image', 
			    'caption' => 'Projekt ' . $type . ' ' . $project->getName() . ' - wizualizacja ' . $counter, 
				'isDom' => false
			);
			
			$counter++;
		}
		
		$responseContext->setJSONResponse('data', $data);
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetSimilar(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		if($similar = $this->_daoRepository->getProjectSimiliarFinder()->getSimiliarForProject($request->getParam('id'))->toArray('', 'similiar_id')) {
			$list = $this->_projectFinder->getListById(
				array_keys($similar),
				\StudioAtrium_Entity_EntityBase_Project::STATUS_PUBLISHED,
				true
			);
			
			$responseContext->set('list', $list);
			$responseContext->set('similiar', $similar);
		}
	}
	

	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetPartner(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$partners = $this->_daoRepository->getDocumentFinder()->getList(\StudioAtrium\Entity\Document::DOCTYPE_PARTNER, null, \StudioAtrium\Entity\Document::STATUS_PUBLISHED);
		$responseContext->set('partners', $partners);
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetProjectRealizations(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$project = $this->_projectFinder->getById($request->getParam('id'));
		
		//check connection with other project
		if ($linkedProjectId = $this->_daoRepository->getProjectToParamFinder()->getParamForProject($request->getParam('id'), Helper\Project::getParamsMap('realisations_link'))) {
			$projectLinked = $this->_projectFinder->getById((int)$linkedProjectId->getNumValue());
			$responseContext->set('__project', $projectLinked);
			$responseContext->set('is_similar', 1);
			$responseContext->set('__projectMain', $project);
		} else {
			$responseContext->set('__project', $project);
		}
		
		$responseContext->set('staticStockUrl', \Point7_WebApp::getConfigParam('static.stock'));
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetFaq(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		
		$faq = $this->_daoRepository->getProjectCommentFinder()->getTreeByProjectId(
			$request->getParam('id'),
			\StudioAtrium\Entity\Project\Comment::TYPE_FAQ
		);
		

		$responseContext->set('list', $faq);
		
		//FAQ - default questions
		$faq = $this->_daoRepository->getDocumentFinder()->getByCharId('faq', \StudioAtrium\Entity\Document::DOCTYPE_PAGE, \StudioAtrium\Entity\Document::STATUS_PUBLISHED);
		$responseContext->set('defaultFaq', $faq->current());
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetShowroom(
	    \Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
    ) {
	    
        $project = $this->_projectFinder->getById($request->getParam('id'));

        if($showroom = $this->_daoRepository->getRenderAuthorizeFinder()->getByProjectId($request->getParam('id'))) {
            $authorizations = array();
            $productIds = array();
            
            /* @var \StudioAtrium\Entity\RenderAuthorize $item  */
            foreach($showroom as $renderShowroom) {
                
                $authorization = $renderShowroom->getAuthorization(true);
                $authorizations[$renderShowroom->getRenderId()] = $authorization;
                
                foreach($authorization as $item) {
                    $productIds[] = $item['id'];
                }
            }
            
            if($productIds) {
                $products = $this->_daoRepository->getShowroomFinder()->getListById($productIds);
                $responseContext->set('products', $products->toArray(array(), 'id'));
            }
            
            $responseContext->set('authorizations', $authorizations);
            $responseContext->set('project', $project);
            
            $responseContext->set('showroom', $showroom);
        }
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetInteriors(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$project = $this->_projectFinder->getById($request->getParam('id'));
		$responseContext->set('project', $project);
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doAddComment(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
	    $response = array();
	    
		if (!$request->isValid()) {
			$response['status'] = 'fail';
			$responseContext->setJSONREsponse('feedback' , $response);
			$this->_exit();
		}
		
		if (!$project = $this->_projectFinder->getById($request->getParam('project_id'), false)) {
			$response['status'] = 'fail';
			$responseContext->setJSONREsponse('feedback' , $response);
			$this->_exit();
		}
		
		if (!$this->_checkForBlockedIP() || !$this->_checkForBlockedEmail($request->getParam('email'))) {
		    $response['status'] = 'fail';
		    $response['message'] = 'Nie udało się dodać wpisu. Nie masz uprawnień.';
		    $responseContext->setJSONREsponse('feedback' , $response);
		    $this->_exit();
		}
		
		$entry = new \StudioAtrium\Entity\Discuss\Post();
		
		$entry->setCatId($request->getParam('comment_type'));
		$entry->setTopic(strip_tags($request->getParam('subject')));
		$entry->setContent(strip_tags($request->getParam('comment')));
		$entry->setProjectId($request->getParam('project_id'));
		$entry->setNick(strip_tags($request->getParam('nick')));
		$entry->setCreateDate(date('Y-m-d H:i:s'));
		$entry->setModifyDate(date('Y-m-d H:i:s'));
		$entry->setParentId($request->getParam('parent_id'));
		$entry->setStatus(\StudioAtrium\Entity\Discuss\Post::STATUS_PUBLISHED);
		
		if ($appContext->getUser()) {
			$entry->setAuthorId($appContext->getUser()->getId());
		}
		
		try {
			$this->_daoRepository->getDiscussPostDAO()->store($entry);
			$response['status'] = 'ok';
			
			if (!empty($_COOKIE['tmpCommentStamp'])) {
				setcookie('tmpCommentStamp', null, -1);
			}
			
			if ($appContext->getUser()) {
				$this->_modifyUser($appContext->getUser());
			}
			
			//move tmp attachments
			if ($request->getParam('isTmpUid')) {
				$this->_moveTemporaryAttachment($request->getParam('ownerUid'), $entry->makeUID(), true);
			}
			
			if ($request->getParam('comment_type') == Helper\Discuss::DEFAULT_PROJECT_COMMENT_CATID) {
				//notify atrium
// 				$this->_sendMail(
// 					$appContext->getConfigParam('mailer.notify'),
// 					"Pytanie o projekt " . $project->getName(),
// 					"Nowy wpis na Forum w kategorii 'pytanie do projektu': " . $project->getName() . " od <strong>" . $request->getParam('nick') ."</strong>:<br><br>" . nl2br($entry->getContent()),
// 					$appContext->getConfigParam('mailer.sender'), true
// 				);
			}
			
			//new comments notifications
			if($request->getParam('notify')) {
				
				$notify = new \StudioAtrium\Entity\Discuss\Notify();
				
				$user = $appContext->getUser();
				
				if ($user) {
					$notify->setUserId($user->getId());
				}
				
				$notify->setEmail($request->getParam('email'));
				
				if ($entry->getParentId()) {
					$notify->setDiscussPostId($entry->getParentId());
				} else {
					$notify->setDiscussPostId($entry->getId());
				}
				
				try {
					$this->_daoRepository->getDiscussNotifyDAO()->store($notify);
				} catch (\Exception $e) {
					if($e->getCode() != 23000) {
						\Point7_WebApp::getLogger('error')->error(
							\StudioAtrium\Application\Exception\Helper::formatLoggerMessage($e, 'Nie udało się zapisać powiadomień usera o nowych wpisach na forum.')
						);
					}
				}
			}
			
			//Powiadomienia o nowym wpisie
			if ($entry->getParentId()) {
				$this->_sendNewCommentNotifications($entry, $project);
			}
		} catch (\Exception $e) {
			$response['status'] = 'fail';
		}
		
		$responseContext->setJSONREsponse('feedback' , $response);
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
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

			$project = $this->_projectFinder->getById($request->getParam('pid'));
			$url = \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildProjectUrl($project);
				
			$content = 'Wysyłam link do ciekawego projektu:<br><br>' . $url . '<br><br>' . $request->getParam('signature');

			if ($result = $this->_sendMail($request->getParam('receiver_email'), 'Ciekawy projekt Studia Atrium', $content, $mailerConfig, true)) {
				$responseContext->setJSONResponse('status', 'ok');
			} else {
				$responseContext->setJSONResponse('status', 'error');
			}

		} else {
			\Point7_WebApp::getLogger('error')->error('Error during sending e-mail from project box - no mailer config');
			$responseContext->setJSONResponse('status', 'error');
		}

		if (!$result) {
			$responseContext->setJSONResponse('status', 'fail');
		} else {
			$responseContext->setJSONResponse('status', 'ok');
		}
		
		$responseContext->setErrorMessage(null);
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetProjectNames(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$response = array();
		
		$list = $this->_projectFinder->getListByNamePart($request->getParam('query'));
		
		if($list) {
			foreach($list as $project) {
				$response[] = array($project->getId() => $project->getName());
			}
		}
		
		$responseContext->setJSONREsponse('feedback', $response);
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetForumProjects(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$response = array();
		
		$project = $this->_projectFinder->getById($request->getParam('id'));

		$list = $this->_projectFinder->getListByNamePart($project->getName());

		if($list) {
			foreach($list as $project) {
				$response[] = array($project->getId() => $project->getName());
			}
		}

		$responseContext->setJSONREsponse('feedback', $response);
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetRequestForm(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {

	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doAddFileRequest(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
	    $response = array();
	    
		if (!$project = $this->_projectFinder->getById($request->getParam('project_id'), true, true)) {
			$response['status'] = 'fail';
			$response['error'] = 'Nie znaleziono takiego projektu.';
			$responseContext->setJSONREsponse('feedback' , $response);
			$this->_exit(true);
		}
		
		if (!$appContext->getUser()) {
			$response['status'] = 'fail';
			$response['error'] = 'Aby móc pobrać lub zamówić pliki do projektu, musisz być zalogowanym użytkownikiem.';
			$responseContext->setJSONREsponse('feedback' , $response);
			$this->_exit(true);
		}
		
		$user = $appContext->getUser();
		$userProps = $user->getProps(true);
		
		#tu sprawdzic, czy gosc nie przekroczyl limitu pobran
		$userLimit = !empty($userProps['download_limit']) ? $userProps['download_limit'] : Helper\Project::MAX_USER_FILES_DOWNLOAD;
		$fParams = new \Point7_AbstractDAO_FinderParams();
		$fParams->addFilter('status', \StudioAtrium\Entity\Project\Files\Download::STATUS_CANCELLED, \Point7_AbstractDAO_FinderParams::OPERATOR_NOT_EQUAL);
		$fParams->addFilter('user_id', $user->getId());
		if ($downloads = $this->_daoRepository->getProjectFilesFinder()->getFilesDownloadList(false, $fParams, false)) {
			$dCounter = array();
			foreach ($downloads as $down) {
				if ($down->getProjectId() != $project->getId()) {
					$dCounter[$down->getProjectId()] = 1;
				}
			}

			if (count($dCounter) == $userLimit) {
				$response['status'] = 'fail';
				$response['error'] = 'Pobrałeś już maksymalną liczbę plików. Jeżeli potrzebujesz zwiększyć limit, skontaktuj się z nami.';
				$responseContext->setJSONREsponse('feedback' , $response);
				$this->_exit();
			}
		}

		$entry = new \StudioAtrium\Entity\Project\Files\Download();

		$entry->setProjectId($request->getParam('project_id'));
		$entry->setName($user->getName());
		$entry->setSurname($user->getSurname());
		$entry->setEmail($user->getEmail());
		$entry->setPhone($request->getParam('phone'));
		$entry->setProjectOrderDate($request->getParam('time'));
		$entry->setCreateDate(date('Y-m-d H:i:s'));
		$entry->setFileType($request->getParam('file_type'));
		$entry->setUserId($user->getId());
		
		$isComment = false;
		if ($request->getParam('comment')) {
		    $entryProps = array();
			$entryProps['uwagi'] = $request->getParam('comment');
			$entry->setProps(json_encode($entryProps));
			$isComment = true;
		}
		
		if ($request->getParam('order') == 1) {
			$entry->setStatus(\StudioAtrium\Entity\Project\Files\Download::STATUS_NEW);
		} else {
			$entry->setStatus(\StudioAtrium\Entity\Project\Files\Download::STATUS_DOWNLOADED);
		}

		
		if (empty($userProps['phone']) || $userProps['phone'] != $request->getParam('phone')) {
			$userProps['phone'] = $request->getParam('phone');
			$user->setProps(json_encode($userProps));
			$this->_daoRepository->getUserDAO()->store($user);
		}

		try {
			$this->_daoRepository->getProjectFilesDownloadDAO()->store($entry);
			$response['status'] = 'ok';
		} catch (\Exception $e) {
			$response['status'] = 'fail';
			$response['error'] = 'Nie udało się zrealizować zamówienia. Skontaktuj się z nami.';
			$responseContext->setJSONREsponse('feedback' , $response);
			$this->_exit();
		}
			
		if ($request->getParam('order') == 1) {
			if ($request->getParam('file_type') == \StudioAtrium\Entity\Project\Files\Download::FILE_TYPE_SKETCH) {
				$title = "Rysunki szczegółowe do projektu: " . $project->getName();
			} elseif ($request->getParam('file_type') == \StudioAtrium\Entity\Project\Files\Download::FILE_TYPE_MATERIALS) {
				$title = "Zestawienie materiałów do projektu: " . $project->getName();
			} elseif ($request->getParam('file_type') == \StudioAtrium\Entity\Project\Files\Download::FILE_TYPE_PARCEL_PDF) {
			    $title = "Obrys PDF do projektu: " . $project->getName();
			} elseif ($request->getParam('file_type') == \StudioAtrium\Entity\Project\Files\Download::FILE_TYPE_PARCEL_DWG) {
			    $title = "Obrys DWG do projektu : " . $project->getName();
			} elseif ($request->getParam('file_type') == \StudioAtrium\Entity\Project\Files\Download::FILE_TYPE_WOODWORK) {
			    $title = "Zestawienie stolarki do projektu : " . $project->getName();
			}
			
			$message = $title ."<br><br>";
			$message .= "zamawiający: " . $user->getName() . " " . $user->getSurname() . "<br>";
			$message .= "e-mail: " . $user->getEmail() . "<br>";
			$message .= "telefon: " . $request->getParam('phone') . "<br>";
			if ($request->getParam('comment')) {
				$message .= 'uwagi: ' . $request->getParam('comment') . "<br>";
			}
			$message .= "termin zamówienia projektu: " . Helper\Project::getOrderTimes($request->getParam('time'));
			
			//notify atrium
			$this->_sendMail(
				$appContext->getConfigParam('emails.atrium'),
				$title,
				$message . "<br>GL " . $project->getSymbolNum(),
				$appContext->getConfigParam('mailer.sender'), 
				true,
				$user->getEmail()
			);
		} else {
			$attachments = $project->getAttachmentsByType('ProjectFile');
			if ($attachments) {
				foreach ($attachments->toArray() as $attachment) {
					if ($attachment['props']['storey'] == $request->getParam('file_type')) {
						$headerFile = $appContext->getConfigParam('static.project') . '/' . $attachment['path'] . '/' . $attachment['filename'];
						$response['status'] = 'download';
						
						switch ($request->getParam('file_type')) {
						    case \StudioAtrium\Entity\Project\Files\Download::FILE_TYPE_SKETCH:
						      $name = 'rysunki-';
						    break;
						    
						    case \StudioAtrium\Entity\Project\Files\Download::FILE_TYPE_MATERIALS:
						      $name = 'zestawienie-';
						    break;
						    
						    case \StudioAtrium\Entity\Project\Files\Download::FILE_TYPE_WOODWORK:
						      $name = 'stolarka-';
						    break;
						    
						    case \StudioAtrium\Entity\Project\Files\Download::FILE_TYPE_COST_EXTRACT:
						      $name = 'kosztorys-';
						    break;
						    
						    case \StudioAtrium\Entity\Project\Files\Download::FILE_TYPE_PARCEL_PDF: case \StudioAtrium\Entity\Project\Files\Download::FILE_TYPE_PARCEL_DWG:
						        $name = 'obrys-';
					        break;
						}
						    
						$response['name'] = $name . $project->getSymbolNum() . '.' . pathinfo($headerFile, PATHINFO_EXTENSION);
						$response['file'] = str_rot13(base64_encode($headerFile));
						
						$responseContext->setJSONREsponse('feedback' , $response);
						
						if ($isComment) {
							$message = "zamawiający: " . $user->getName() . " " . $user->getSurname() . "<br>";
							$message .= "e-mail: " . $user->getEmail() . "<br>";
							$message .= "telefon: " . $request->getParam('phone') . "<br>";
							$message .= 'uwagi: ' . $request->getParam('comment') . "<br>";
							$message .= "termin zamówienia projektu: " . Helper\Project::getOrderTimes($request->getParam('time'));
						
							//notify atrium
							$this->_sendMail(
									$appContext->getConfigParam('emails.atrium'),
									'Pobranie pliku z komentarzem',
									$message,
									$appContext->getConfigParam('mailer.sender'),
									true,
									$user->getEmail()
									);
						}
						
						$this->_exit(false);
					}
				}
				
				$entry->setStatus(\StudioAtrium\Entity\Project\Files\Download::STATUS_CANCELLED);
				$this->_daoRepository->getProjectFilesDownloadDAO()->store($entry);
				
				$response['status'] = 'fail';
				$response['error'] = 'Wystąpił błąd: nie znaleziono szukanego pliku. Skontaktuj się z nami.';
				$responseContext->setJSONREsponse('feedback' , $response);
				$this->_exit();
				
			} else {
				$entry->setStatus(\StudioAtrium\Entity\Project\Files\Download::STATUS_CANCELLED);
				$this->_daoRepository->getProjectFilesDownloadDAO()->store($entry);
				
				$response['status'] = 'fail';
				$response['error'] = 'Wystąpił błąd: nie znaleziono szukanego pliku. Skontaktuj się z nami.';
				$responseContext->setJSONREsponse('feedback' , $response);
				$this->_exit();
			}
		}
		
		$responseContext->setJSONREsponse('feedback' , $response);
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doAddGenfileRequest(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		if (!$project = $this->_projectFinder->getById($request->getParam('project_id'), true, true)) {
			$this->_forward("Page", "Display404");
		}

		if (!$appContext->getUser()) {
			$responseContext->setErrorMessage('Aby móc pobrać lub zamówić pliki do projektu, musisz być zalogowanym użytkownikiem.');
			$responseContext->setForwardParam('id', $request->getParam('project_id'));
			$this->_exit();
		}
		
		$projectParams = $this->_daoRepository->getProjectToParamFinder()->getParamsForProject($request->getParam('project_id'))->toArray('', 'project_param_id');

		$user = $appContext->getUser();
		$userProps = $user->getProps(true);

		#tu sprawdzic, czy gosc nie przekroczyl limitu pobran
		$userLimit = !empty($userProps['download_limit']) ? $userProps['download_limit'] : Helper\Project::MAX_USER_FILES_DOWNLOAD;
		$fParams = new \Point7_AbstractDAO_FinderParams();
		$fParams->addFilter('status', \StudioAtrium\Entity\Project\Files\Download::STATUS_CANCELLED, \Point7_AbstractDAO_FinderParams::OPERATOR_NOT_EQUAL);
		$fParams->addFilter('user_id', $user->getId());
		if ($downloads = $this->_daoRepository->getProjectFilesFinder()->getFilesDownloadList(false, $fParams, false)) {
			$dCounter = array();
			foreach ($downloads as $down) {
				if ($down->getProjectId() != $project->getId()) {
					$dCounter[$down->getProjectId()] = 1;
				}
			}

			if (count($dCounter) == $userLimit) {
				$responseContext->setErrorMessage('Pobrałeś już maksymalną liczbę plików. Jeżeli potrzebujesz zwiększyć limit, skontaktuj się z nami.');
				$responseContext->setForwardParam('id', $request->getParam('project_id'));
				$this->_exit();
			}
		}

		$entry = new \StudioAtrium\Entity\Project\Files\Download();

		$entry->setProjectId($request->getParam('project_id'));
		$entry->setName($user->getName());
		$entry->setSurname($user->getSurname());
		$entry->setEmail($user->getEmail());
		$entry->setPhone($request->getParam('phone'));
		$entry->setProjectOrderDate($request->getParam('time'));
		$entry->setCreateDate(date('Y-m-d H:i:s'));
		$entry->setFileType($request->getParam('file_type'));
		$entry->setStatus(\StudioAtrium\Entity\Project\Files\Download::STATUS_DOWNLOADED);
		$entry->setUserId($user->getId());

		if ($request->getParam('comment')) {
		    $entryProps = array();
			$entryProps['uwagi'] = $request->getParam('comment');
			$entry->setProps(json_encode($entryProps));
		}

		if (empty($userProps['phone']) || $userProps['phone'] != $request->getParam('phone')) {
			$userProps['phone'] = $request->getParam('phone');
			$user->setProps(json_encode($userProps));
			$this->_daoRepository->getUserDAO()->store($user);
		}

		try {
			$this->_daoRepository->getProjectFilesDownloadDAO()->store($entry);
		} catch (\Exception $e) {
			$responseContext->setErrorMessage('Nie udało się zrealizować zamówienia. Skontaktuj się z nami.');
			$responseContext->setForwardParam('id', $request->getParam('project_id'));
			$this->_exit();
		}
		
		$pdf = new Helper\ProjectPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Studio Atrium');
		$pdf->SetTitle('Wydruk kosztorysu');
		$pdf->SetSubject('Wydruk kosztorysu');
		$pdf->SetKeywords('Wydruk kosztorysu');
		
		$smartyWrapper = new \Point7_WebApp_View_Smarty3_Wrapper();
		$smartyWrapper->template_dir = $appContext->getConfigParam('views.smarty.template_dir');
		$smartyWrapper->compile_dir = $appContext->getConfigParam('views.smarty.compile_dir');
		
		// remove default header/footer
		$pdf->setPrintHeader(false);
// 		$pdf->setPrintFooter(false);
// 		$pdf->SetFooterMargin(0);
		
		$pdf->setFooterHTML($smartyWrapper->render('Pdf/ProjectFooter.tpl'));
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		
		// set margins
// 		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// 		$pdf->SetMargins(10, 6, 0);
		$pdf->SetMargins(5, 6, 5);
		
		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		
		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		
		// set font
		$pdf->SetFont('dejavusans', '', 9);
		
		// add a page
		$pdf->AddPage();
		
		
		$extras = $project->getExtraData(true) or array();
		
		// method with usable area and factors for components of building (garage, cellar etc.)
		if (isset($extras['cost_corrected'])) {
		    $cost = $extras['cost_corrected'];
		} else {
		    $estimateVars = $this->_daoRepository->getSettingsFinder()->getFamilyList('estimate')->toArray('', 'char_id');
		    
    		$area = $projectParams[1]['num_value'];
    		
    		$areaFactor = $this->_daoRepository->getSettingsFinder()->getByCharId('areaCost')->getNumValue();
    		$cost = $area * $areaFactor;
    		
    		$hasCellar = isset($projectParams[2]) ? true : false; // 2 - piwnica
    		$hasGarage = isset($projectParams[3]) ? true : false; // 3 - garaż
    		
    		
    		$hasAttic = false;
    		
    		if(isset($projectParams[5]) || isset($projectParams[6]) || isset($projectParams[8])) { // 5 - strych, 6 - strych do adaptacji, 8 - poddasze do adaptacji
    		    $hasAttic = true;
    		}
    		
    		
    		if($hasCellar) {
    		    $cellarFactor = $estimateVars['cellarCost']['num_value'];
    		    $cost += $projectParams[2]['num_value'] * $cellarFactor;
    		}
    		
    		
    		if($hasGarage) {
    		    $garageFactor = $estimateVars['garageCost']['num_value'];
    		    $cost += $projectParams[3]['num_value'] * $garageFactor;
    		}
    		
    		if($hasAttic) {
    		    $atticFactor = $estimateVars['atticCost']['num_value'];
    		    
    		    $atticArea = 0;
    		    if(isset($projectParams[5])) { //5 - strych,
    		        $atticArea = $projectParams[5]['num_value'];
    		    } else if (isset($projectParams[6])) { //6 - strych do adaptacji
    		        $atticArea = $projectParams[6]['num_value'];
    		    } else if (isset($projectParams[8])) { //8 - poddasze do adaptacji
    		        $atticArea = $projectParams[8]['num_value'];
    		    }
    		    
    		    $cost += $atticArea * $atticFactor;
    		}
		}
		
		//old method with netto area and building type factor
// 		$nettoArea = 0;
		
// 		if(isset($projectParams[16])) { // 16 - pow netto parteru
// 			$nettoArea = floatval(str_replace(',', '.', $projectParams[16]['num_value']));
// 		}
		
		if (isset($projectParams[17]) || isset($projectParams[18])) { // 17 - pow netto poddasza, 18 - pow netto piętra
		
// 			if(isset($projectParams[17])) {
// 				$nettoArea += floatval(str_replace(',', '.', $projectParams[17]['num_value']));
// 			}
		
// 			if(isset($projectParams[18])) {
// 				$nettoArea += floatval(str_replace(',', '.', $projectParams[18]['num_value']));
// 			}
		
			if(isset($projectParams[20]) || isset($projectParams[21])) { //20 - pow. netto piwnic , 21 - pow. netto przyziemia
// 				if(isset($projectParams[20])) {
// 					$nettoArea += floatval(str_replace(',', '.', $projectParams[20]['num_value']));
// 				}
					
// 				if(isset($projectParams[21])) {
// 					$nettoArea += floatval(str_replace(',', '.', $projectParams[21]['num_value']));
// 				}
				
// 				if(isset($projectParams[3])) { // 3 - garaż
// 				    $factor = $this->_daoRepository->getSettingsFinder()->getByCharId('twoStoreysCellarGarageCost')->getNumValue();
// 				} else {
//     				$factor = $this->_daoRepository->getSettingsFinder()->getByCharId('twoStoreysCellarCost')->getNumValue();
// 				}
				
				$template = 'Pdf/TwoStoreysCellarEstimate.tpl';
			} else {
// 			    if(isset($projectParams[3])) { // 3 - garaż
// 			        $factor = $this->_daoRepository->getSettingsFinder()->getByCharId('twoStoreysGarageCost')->getNumValue();
// 			    } else {
//     				$factor = $this->_daoRepository->getSettingsFinder()->getByCharId('twoStoreysCost')->getNumValue();
// 			    }
				$template = 'Pdf/TwoStoreysEstimate.tpl';
			}
				
		} else {
		
			if(isset($projectParams[20]) || isset($projectParams[21])) { //20 - pow. netto piwnic, 21 - pow. netto przyziemia
// 				if(isset($projectParams[20])) {
// 					$nettoArea += floatval(str_replace(',', '.', $projectParams[20]['num_value']));
// 				}
		
// 				if(isset($projectParams[21])) {
// 					$nettoArea += floatval(str_replace(',', '.', $projectParams[21]['num_value']));
// 				}
				
// 				if(isset($projectParams[3])) { // 3 - garaż
// 				    $factor = $this->_daoRepository->getSettingsFinder()->getByCharId('oneStoreyCellarGarageCost')->getNumValue();
// 				} else {
// 				    $factor = $this->_daoRepository->getSettingsFinder()->getByCharId('oneStoreyCellarCost')->getNumValue();
// 				}
				$template = 'Pdf/OneStoreyCellarEstimate.tpl';
			} else {
// 			    if(isset($projectParams[3])) { // 3 - garaż
// 			        $factor = $this->_daoRepository->getSettingsFinder()->getByCharId('oneStoreyGarageCost')->getNumValue();
// 			    } else {
//     				$factor = $this->_daoRepository->getSettingsFinder()->getByCharId('oneStoreyCost')->getNumValue();
// 			    }
			    
				$template = 'Pdf/OneStoreyEstimate.tpl';
			}
		}
		
		$smartyWrapper->assign('project', $project->toArray());
			
		$smartyWrapper->assign('cost', $cost);
		$smartyWrapper->assign('costVat', $cost * 1.08);
		
// 		if (isset($extras['cost'])) {
// 		    $smartyWrapper->assign('cost', $extras['cost']);
// 		    $smartyWrapper->assign('costVat', $extras['cost'] * 1.08);
// 		} else {
// 			$smartyWrapper->assign('cost', $nettoArea * $factor);
// 			$smartyWrapper->assign('costVat', $nettoArea * $factor * 1.08);
// 		}
		
		$pdf->writeHTML($smartyWrapper->render($template), true, false, false, false, '');
		
		$responseContext->setHTTPResponseHeader('Content-Type', 'application/pdf');
		setcookie('fileDownloadToken', $request->getParam('token'), time() + 60, '/');
		$responseContext->setFileToSend($pdf->Output('Kosztorys ' . $project->getSymbolAlpha() . ' ' . $project->getSymbolNum() . ' ' . Helper\StringUtils::polishToLatin($project->getName()) . '.pdf', 'D'));
	}
	

	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doDownload(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		if ($request->isValid()) {
			$rot = str_rot13($request->getParam('file'));
			$link = base64_decode($rot);
			
			$ext = pathinfo($link, PATHINFO_EXTENSION);
			
			if ($ext == 'dwg') {
    			$responseContext->setHTTPResponseHeader('Content-Type', 'application/acad');
			} else {
    			$responseContext->setHTTPResponseHeader('Content-Type', 'application/pdf');
			}
			$responseContext->setFileToSend($link);
		} else {
			$this->_exit();
		}
	}
	
	
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doOpinions(
	    \Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
    ) {
        $finder =  $this->_daoRepository->getProjectCommentFinder();
        
        $opinions = $finder->getComments(
                \StudioAtrium\Entity\Project\Comment::STATUS_PUBLISHED,
                \StudioAtrium\Entity\Project\Comment::TYPE_OPINION,
                $request->getParam('page')-1,
                $request->getParam('limit'),
                false);
        
        $responseContext->set('opinions', $opinions);
        
        $pages = ceil($opinions->total() / $request->getParam('limit'));
        $responseContext->set('pages', $pages);
        $responseContext->set('total', $opinions->total());
        $responseContext->set('page', $request->getParam('page'));
        
        $projectId = array();
        
        foreach ($opinions as $opinion) {
            $projectId[$opinion->getProjectId()] = $opinion->getProjectId();
        }
        
        $projectsFinder = $this->_daoRepository->getProjectFinder(null);
        $projects = $projectsFinder->getListById($projectId, \StudioAtrium\Entity\Project::STATUS_PUBLISHED)->toArray(array(), 'id');
        
        $responseContext->set('projects', $projects);
        
        if ($request->getParam('page') > 1) {
            Helper\Meta::prepareArticleMeta($responseContext, $this->_name, $this->_action, '', $request->getParam('page'), $pages);
        } else {
            Helper\Meta::prepareArticleMeta($responseContext, $this->_name, $this->_action);
        }
        
        $responseContext->set('noindexNofollow', true);
        $responseContext->set('url', self::_opinionsListUrl());
	}
	
	
	/**
	 * @param \StudioAtrium\Entity\User $user
	 */
	private function _modifyUser($user)
	{
		$props = $user->getProps(true) or $props = array();
			
		$forumProps = isset($props['forum']) ? $props['forum'] : array();
			
		if(isset($forumProps['count'])) {
			$forumProps['count']++;
		} else {
			$forumProps['count'] = 1;
			$forumProps['date'] = date('d-m-Y');
		}
			
		$props['forum'] = $forumProps;
	
		$user->setProps(json_encode($props));
	
		try {
			$this->_daoRepository->getUserDAO()->store($user);
		} catch (\Exception $e) {
			\Point7_WebApp::getLogger('error')->error(
				\StudioAtrium\Application\Exception\Helper::formatLoggerMessage($e, 'Nie udało się zapisać propsów usera na forum.')
			);
		}
	}
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @return array
	 */
	private function _getDisplayParams(\Point7_WebApp_Request_Filtered $request)
	{
		$displayParams = array();
		
		$displayCookie = $request->getCookieParam('sa-display');
		
		if($displayCookie) {
			$display = explode('|', $displayCookie);
		}
		
		if(isset($display)) {
			$displayParams['sortBy'] = $display[0];
			$displayParams['sortOrder'] = strtoupper($display[1]);
			$displayParams['displayType'] = $display[2];
		} else {
			$displayParams['sortBy'] = $request->getParam('sort_by');
			$displayParams['sortOrder'] = $request->getParam('sort_order');
			$displayParams['displayType'] = $request->getParam('display_type');
		}
		
		return $displayParams;
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @return integer
	 */
	private function _getClickSearchCategory(\Point7_WebApp_Request_Filtered $request)
	{
		$category = null;
		
		$httpParams = array_keys($request->getRawParams());
		
		foreach(Helper\ClickSearchMap::getMap() as $value) {
	
			if(in_array($value, $httpParams) && $request->getParam($value) != '') {
	
				$paramId = Helper\ClickSearchMap::getParamId($value);
				
				if($paramId == 'type') {
					$category = Helper\ClickSearchMap::getTypeParamId($request->getParam($value));
					
					if(!$category) {
						$category = $request->getParam($value);
					}
					
					break;
				}
			}
		}
		
		$category = (int) str_replace('c', '', $category);
	
		return $category;
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @return array
	 */
	private function _getClickSearchParams(\Point7_WebApp_Request_Filtered $request)
	{
		$csParams = array();
		
		$httpParams = array_keys($request->getRawParams());
		
		foreach(Helper\ClickSearchMap::getMap() as $key => $value) {
		
			if(in_array($value, $httpParams) && $request->getParam($value) != '') {
// 				if($paramId == 'type') {
// 					continue;
				if($key == 'type') {
					// Kept under a non-numeric key: typ_projektu maps to a
					// project_category id, which can numerically collide with
					// a project_param id used elsewhere in this same array
					// (e.g. category 46/59 vs. param 46/59).
					$csParams['_typ_projektu'] = $request->getParam($value);
				} else {
					if($request->getParam($value) > -1) {
						$param = $request->getParam($value);
						$csParams[$key] = $param;
					}
				}
			}
		}

		return $csParams;
	}
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @return array
	 */
	private function _getSearchParams(\Point7_WebApp_Request_Filtered $request)
	{
		$searchParams = array();
		
		$tolerance = \Point7_WebApp::getConfigParam('helpers.search_tolerance');
		
		if ($request->getParam('pow_min')) {
			$searchParams[Helper\Project::getClickSearchParamsMap('area_usable')]['min'] = $request->getParam('pow_min') - $tolerance;
		}
		
		if ($request->getParam('pow_max')) {
			$searchParams[Helper\Project::getClickSearchParamsMap('area_usable')]['max'] = $request->getParam('pow_max') + $tolerance;
		}
		
		if ($request->getParam('pow_zab_min')) {
			$searchParams[Helper\Project::getClickSearchParamsMap('area_build')]['min'] = $request->getParam('pow_zab_min');
		}
		
		if ($request->getParam('pow_zab_max')) {
			$searchParams[Helper\Project::getClickSearchParamsMap('area_build')]['max'] = $request->getParam('pow_zab_max');
		}
		
		if ($request->getParam('pow_total_min')) {
			$searchParams[Helper\Project::getClickSearchParamsMap('area_total')]['min'] = $request->getParam('pow_total_min');
		}
		
		if ($request->getParam('pow_total_max')) {
			$searchParams[Helper\Project::getClickSearchParamsMap('area_total')]['max'] = $request->getParam('pow_total_max');
		}
		
		if ($request->getParam('dzialka_szer')) {
			$searchParams[Helper\Project::getClickSearchParamsMap('parcel_width')]['max'] = $request->getParam('dzialka_szer');
		}
		
		if ($request->getParam('dzialka_dl')) {
			$searchParams[Helper\Project::getClickSearchParamsMap('parcel_length')]['max'] = $request->getParam('dzialka_dl');
		}
		
		if ($request->getParam('front_szer')) {
		    $searchParams[Helper\Project::getClickSearchParamsMap('front_width')]['max'] = $request->getParam('front_szer');
		}
		
		return $searchParams;
	}
	
	
	private function _sendNewCommentNotifications($comment, $project)
	{
		$url = \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildProjectUrl($project);

		$smartyWrapper = new \Point7_WebApp_View_Smarty3_Wrapper();
		$smartyWrapper->template_dir = \Point7_WebApp::getConfigParam('views.smarty.template_dir');
		$smartyWrapper->compile_dir = \Point7_WebApp::getConfigParam('views.smarty.compile_dir');
		
		foreach($this->_daoRepository->getDiscussFinder()->getNotifications($comment->getParentId()) as $item) {
			$smartyWrapper->assign('url', $url . '#komentarze');
			$smartyWrapper->assign('unsubscribe', $this->_createDiscussUnsubscribeLink($item));
			
			$html = $smartyWrapper->render('Project/EmailCommentNotify.tpl');
				
			$this->_sendMail(
				$item->getEmail(),
				'Nowy wpis na forum STUDIA ATRIUM',
				$html,
				\Point7_WebApp::getConfigParam('mailer.sender'),
				true
			);
		}
	}
	
	private function _checkForBlockedIP()
	{
	    $blockedIpList = \StudioAtrium\Application\Helper\Discuss::getBlockedIp();
	    
	    if (!empty($blockedIpList) && array_key_exists($_SERVER['REMOTE_ADDR'], $blockedIpList)) {
	        \Point7_WebApp::getLogger('error')->error('IP ' . $_SERVER['REMOTE_ADDR'] . ' zablokowane, nie dodano wpisu na forum.');
	        return false;
	    }

	    return true;
	}
	
	private function _checkForBlockedEmail($email = false)
	{
	    if (!empty($email)) {
	        $blockedEmailList = \StudioAtrium\Application\Helper\Discuss::getBlockedEmail();
	        
	        if (!empty($blockedEmailList) && array_key_exists($email, $blockedEmailList)) {
	            \Point7_WebApp::getLogger('error')->error('Email from ' . $_SERVER['REMOTE_ADDR'] . ' zablokowany, nie dodano wpisu na forum.');
	            return false;
	        }
	    }
	    
	    return true;
	}

	/**
	 * Fallback URL builders when AppPackages/Helper/Url.php on server is outdated.
	 */
	private static function _houseListUrl($category)
	{
		if (method_exists('\\StudioAtrium\\Application\\Helper\\Url', 'buildHouseListUrl')) {
			return Helper\Url::buildHouseListUrl($category);
		}
		return '/' . trim($category, '/') . '/';
	}

	private static function _houseListPagerUrl($category, $displayType, $sortBy, $sortOrder, $page)
	{
		if (method_exists('\\StudioAtrium\\Application\\Helper\\Url', 'buildHouseListPagerUrl')) {
			return Helper\Url::buildHouseListPagerUrl($category, $displayType, $sortBy, $sortOrder, $page);
		}
		$base = '/' . trim($category, '/') . '/' . $displayType . ',' . $sortBy . ',' . $sortOrder;
		if ($page && (int)$page > 1) {
			$base .= ',' . (int)$page;
		}
		return $base;
	}

	private static function _simplePagerUrl($base, $page = null)
	{
		if ($page !== null && $page !== '' && (int)$page > 1) {
			return rtrim($base, '/') . '/,' . (int)$page;
		}
		return $base;
	}

	private static function _realizationsListUrl($page = null)
	{
		if (method_exists('\\StudioAtrium\\Application\\Helper\\Url', 'buildRealizationsListUrl')) {
			return Helper\Url::buildRealizationsListUrl($page);
		}
		return self::_simplePagerUrl('/projekty-domow/realizacje/', $page);
	}

	private static function _realizationsBuildingListUrl($page = null)
	{
		if (method_exists('\\StudioAtrium\\Application\\Helper\\Url', 'buildRealizationsBuildingListUrl')) {
			return Helper\Url::buildRealizationsBuildingListUrl($page);
		}
		return self::_simplePagerUrl('/projekty-domow/realizacje-w-budowie/', $page);
	}

	private static function _realizationsInteriorListUrl($page = null)
	{
		if (method_exists('\\StudioAtrium\\Application\\Helper\\Url', 'buildRealizationsInteriorListUrl')) {
			return Helper\Url::buildRealizationsInteriorListUrl($page);
		}
		return self::_simplePagerUrl('/projekty-domow/realizacje-wnetrz/', $page);
	}

	private static function _opinionsListUrl($page = null)
	{
		if (method_exists('\\StudioAtrium\\Application\\Helper\\Url', 'buildOpinionsListUrl')) {
			return Helper\Url::buildOpinionsListUrl($page);
		}
		return self::_simplePagerUrl('/projekty-domow/opinie/', $page);
	}

	private static function _searchListUrl()
	{
		if (method_exists('\\StudioAtrium\\Application\\Helper\\Url', 'buildSearchListUrl')) {
			return Helper\Url::buildSearchListUrl();
		}
		return '/projekty-domow/szukaj/';
	}


	/**
	 * @param array $projectParams
	 * @param array $extras
	 * @return array
	 */
	private function _getCost($projectParams, $extras)
	{
		if (!is_array($extras)) {
			$extras = array();
		}

		return Helper\Project::getDisplayCosts(
			$projectParams,
			$extras,
			$this->_daoRepository->getSettingsFinder()
		);
	}

	/**
	 * Build enriched card data for the 2026 category listing grid.
	 *
	 * @param \StudioAtrium\Entity\EntityCollection|null $list
	 * @return array
	 */
	private function _buildCategoryListCards($list)
	{
		$cards = array();
		if (!$list || !count($list)) {
			return $cards;
		}

		$ids = array();
		foreach ($list as $project) {
			$ids[] = (int) $project->getId();
		}
		$ids = array_values(array_filter($ids));
		if (empty($ids)) {
			return $cards;
		}

		$extras = array();
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

		$urlGen = new \StudioAtrium\Application\WWW\UrlGenerator();
		$paramsHelper = new \StudioAtrium\Application\WWW\ProjectParamsHelper();

		foreach ($list as $project) {
			$pid = (int) $project->getId();
			$params = $project->getParamsGeneral(true);
			$extraData = $project->getExtraData(true);
			$type = $project->getType();

			$areaRaw = isset($params['1']['value']) ? $params['1']['value'] : '';
			$rooms = isset($params['68']['value']) ? $params['68']['value'] : '';
			$area = $areaRaw !== '' ? str_replace('.', ',', (string) $areaRaw) . ' m2' : '';

			$price = (float) $project->getPrice();
			$discount = (float) $project->getDiscount();
			$priceCurrent = $discount > 0 ? ($price - $discount) : $price;
			$priceOld = $discount > 0 ? $price : null;

			$badgeLabel = '';
			$badgeVariant = '';
			if ($discount > 0) {
				$badgeLabel = 'RABAT ' . (int) round($discount) . ' zł';
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
				'id'         => $pid,
				'name'       => $project->getName(),
				'url'        => $urlGen->generateUrl($urlParams),
				'image_url'  => $imageUrl,
				'type_label' => $this->_projectTypeLabel($params, $type),
				'area'       => $area,
				'rooms'      => $rooms,
				'baths'      => isset($extras[$pid]) ? $extras[$pid]['baths'] : 0,
				'garage'     => isset($extras[$pid]) ? $extras[$pid]['garage'] : 0,
				'price'      => (int) round($priceCurrent),
				'price_old'  => $priceOld !== null ? (int) round($priceOld) : null,
				'badge_label'=> $badgeLabel,
				'badge_variant' => $badgeVariant,
				'is_favourite' => false,
				'is_compare' => false,
			);
		}

		return $cards;
	}

	/**
	 * @param array $params
	 * @param string $type
	 * @return string
	 */
	private function _projectTypeLabel(array $params, $type)
	{
		if ($type === 'garage') {
			return 'GARAŻ';
		}
		$prefix = ($type === 'skeleton') ? 'DOM SZKIELETOWY' : 'DOM';
		$hasFloor = !empty($params['18']['value']);
		$hasLoft = !empty($params['17']['value']);
		if ($type === 'skeleton') {
			return $prefix;
		}
		if ($hasFloor) {
			return $prefix . ' PIĘTROWY';
		}
		if ($hasLoft) {
			return $prefix . ' Z PODDASZEM';
		}
		return $prefix . ' PARTEROWY';
	}

	/**
	 * Prepare Smarty data for the 2026 project detail layout.
	 */
	private function _prepareHouseDetail2026(
		\Point7_WebApp_Request_Filtered $request,
		WWW\ResponseContext $responseContext,
		$project,
		array $projectParams,
		array $params,
		array $sketchParams,
		$projectSketchParams
	) {
		$mediaBase = rtrim((string) \Point7_WebApp::getConfigParam('static.project'), '/');
		$isMirror = ($request->getParam('version') == 'mirror');
		$attachments = array();
		try {
			$attachments = $project->getAttachments()->toArray();
		} catch (\Throwable $e) {
			$attachments = array();
		}

		$gallery = array();
		foreach (array('ProjectRender', 'ProjectInterior', 'ProjectElevation') as $type) {
			if (empty($attachments[$type]) || !is_array($attachments[$type])) {
				continue;
			}
			foreach ($attachments[$type] as $att) {
				$url = $this->_attachmentMediaUrl($att, $mediaBase, 'presentation');
				if ($url === '') {
					continue;
				}
				$gallery[] = array(
					'src'   => $url,
					'thumb' => $this->_attachmentMediaUrl($att, $mediaBase, 'thumb') ?: $url,
					'alt'   => isset($att['title']) ? (string) $att['title'] : $project->getName(),
					'type'  => $type,
				);
			}
		}
		if (empty($gallery)) {
			$gallery[] = array(
				'src'   => $mediaBase . '/' . (int) $project->getId() . '/render-box.jpg',
				'thumb' => $mediaBase . '/' . (int) $project->getId() . '/render-box.jpg',
				'alt'   => $project->getName(),
				'type'  => 'ProjectRender',
			);
		}

		$price = (float) $project->getPrice();
		$discount = (float) $project->getDiscount();
		$priceCurrent = $discount > 0 ? ($price - $discount) : $price;

		$baths = 0;
		if (!empty($projectParams[45]['num_value'])) {
			$baths += (int) round((float) $projectParams[45]['num_value']);
		}
		if (!empty($projectParams[46]['num_value'])) {
			$baths += (int) round((float) $projectParams[46]['num_value']);
		}
		$garage = !empty($projectParams[78]['num_value']) ? (int) round((float) $projectParams[78]['num_value']) : 0;
		$rooms = !empty($projectParams[68]['num_value'])
			? (string) (int) round((float) $projectParams[68]['num_value'])
			: (!empty($projectParams[68]['string_value']) ? (string) $projectParams[68]['string_value'] : '');
		$area = '';
		if (!empty($projectParams[1]['num_value'])) {
			$area = number_format((float) $projectParams[1]['num_value'], 2, ',', ' ');
		}

		$facts = array(
			array('label' => 'Pow. użytkowa', 'value' => $area !== '' ? $area . ' m²' : '—'),
			array('label' => 'Pokoje', 'value' => $rooms !== '' ? $rooms : '—'),
			array('label' => 'Łazienki / WC', 'value' => $baths > 0 ? (string) $baths : '—'),
			array('label' => 'Garaż', 'value' => $garage > 0 ? (string) $garage : '—'),
		);

		$showHeatPump = !empty($projectParams[97]) && (
			empty($projectParams[97]['string_value']) || $projectParams[97]['string_value'] != 'pompa ciepła'
		);

		$paramsHelper = new \StudioAtrium\Application\WWW\ProjectParamsHelper();
		$availability = 'dostępność 3–5 dni';
		if ($paramsHelper->mIsWithdrawn($projectParams)) {
			$availability = 'wycofany z oferty';
		} elseif ($paramsHelper->mIsReady7days($projectParams)) {
			$availability = 'dostępność do 7 dni';
		} elseif ($paramsHelper->mIsReady14days($projectParams)) {
			$availability = 'dostępność do 14 dni';
		} elseif ($paramsHelper->mIsWT2021needful($projectParams) || $paramsHelper->mIsWT2021needfulHeat($projectParams)) {
			$availability = 'dostępność — zapytaj o termin';
		}

		$versionLabel = ($project->getType() == 'skeleton') ? 'Wersja szkieletowa' : 'Wersja murowana';

		$techRows = array();
		$technicalList = $responseContext->get('technicalList');
		$techParamIds = array();
		if (is_object($technicalList) && method_exists($technicalList, 'getParams')) {
			$techParamIds = $technicalList->getParams();
		} elseif (is_array($technicalList) && !empty($technicalList['params'])) {
			$techParamIds = $technicalList['params'];
		} elseif (is_object($technicalList) && isset($technicalList->params)) {
			$techParamIds = $technicalList->params;
		}
		if (is_array($techParamIds)) {
			foreach ($techParamIds as $paramId) {
				if (empty($params[$paramId])) {
					continue;
				}
				$paramDef = $params[$paramId];
				if (!empty($paramDef['value_type']) && $paramDef['value_type'] == 'string') {
					$paramValue = isset($projectParams[$paramId]['string_value']) ? $projectParams[$paramId]['string_value'] : '';
				} else {
					$paramValue = isset($projectParams[$paramId]['num_value']) ? $projectParams[$paramId]['num_value'] : '';
					if ($paramValue !== '' && $paramValue !== null && !empty($paramDef['value_type']) && $paramDef['value_type'] == 'number') {
						$paramValue = number_format((float) $projectParams[$paramId]['num_value'], 2, ',', ' ');
					}
				}
				if ($paramValue === '' || $paramValue === null) {
					continue;
				}
				$unit = !empty($paramDef['unit']) ? ' ' . $paramDef['unit'] : '';
				$techRows[] = array(
					'k'    => $paramDef['name'],
					'v'    => $paramValue . $unit,
					'info' => !empty($paramDef['description']),
					'id'   => (int) $paramId,
				);
			}
		}
		$paramsGeneral = $project->getParamsGeneral(true);
		$techRows[] = array(
			'k'    => 'Minimalne wym. działki',
			'v'    => $paramsHelper->mParcelWidth($paramsGeneral)
				. ' × '
				. $paramsHelper->mParcelHeight($paramsGeneral)
				. ' m',
			'info' => true,
			'id'   => ($project->getType() == 'skeleton') ? 75 : 76,
		);
		$mid = (int) ceil(count($techRows) / 2);
		$techLeft = array_slice($techRows, 0, $mid);
		$techRight = array_slice($techRows, $mid);

		$floors = $this->_buildDetailFloors(
			$attachments,
			$mediaBase,
			$isMirror,
			$responseContext->get('sketchAuthorize'),
			$responseContext->get('roomsPoints'),
			$projectSketchParams,
			$sketchParams,
			$project
		);

		$costStages = array();
		$costTotalLabel = '';
		$noestimate = $responseContext->get('noestimate');
		$costs = $responseContext->get('costs');
		$buildCost = null;
		try {
			$buildCost = $project->getBuildCost(true);
		} catch (\Throwable $e) {
			$buildCost = null;
		}
		if (is_array($buildCost) && !empty($buildCost['open']) && (float) $buildCost['open'] > 0) {
			$costStages = array(
				array(
					'id' => 's1',
					'label' => 'Stan surowy otwarty',
					'cost' => number_format((float) $buildCost['open'], 0, ',', ' ') . ' zł',
					'details' => 'Szacunkowy koszt stanu surowego otwartego. ' . (!empty($buildCost['date']) ? $buildCost['date'] : ''),
				),
				array(
					'id' => 's2',
					'label' => 'Roboty wykończeniowe',
					'cost' => number_format((float) $buildCost['finish'], 0, ',', ' ') . ' zł',
					'details' => 'Szacunkowy koszt robót wykończeniowych.',
				),
				array(
					'id' => 's3',
					'label' => 'Instalacje',
					'cost' => number_format((float) $buildCost['fitting'], 0, ',', ' ') . ' zł',
					'details' => 'Szacunkowy koszt instalacji.',
				),
			);
			$costTotalLabel = number_format((float) $buildCost['full'], 0, ',', ' ') . ' zł';
		} elseif (!$noestimate && is_array($costs) && !empty($costs['rough']) && (float) $costs['rough'] > 0 && (float) $costs['total'] != -1) {
			$costStages = array(
				array(
					'id' => 's1',
					'label' => 'Stan surowy zamknięty — system gospodarczy',
					'cost' => number_format((float) $costs['rough'], 0, ',', ' ') . ' zł',
					'details' => 'Szacunkowy koszt stanu surowego zamkniętego w systemie gospodarczym.',
				),
				array(
					'id' => 's2',
					'label' => 'Roboty wykończeniowe — system gospodarczy',
					'cost' => number_format((float) $costs['finish'], 0, ',', ' ') . ' zł',
					'details' => 'Szacunkowy koszt robót wykończeniowych w systemie gospodarczym.',
				),
				array(
					'id' => 's3',
					'label' => 'Instalacje — system gospodarczy',
					'cost' => number_format((float) $costs['installations'], 0, ',', ' ') . ' zł',
					'details' => 'Szacunkowy koszt instalacji. Instalacje to dodatkowe ok. 20–25% wartości kosztorysu w systemie zleconym.',
				),
			);
			$costTotalLabel = number_format((float) $costs['total'], 0, ',', ' ') . ' zł';
		}

		$categoryChips = array();
		$projectCategories = $responseContext->get('projectCategories');
		if ($projectCategories) {
			foreach ($projectCategories as $cat) {
				$catArr = is_object($cat) && method_exists($cat, 'toArray') ? $cat->toArray() : (array) $cat;
				if (empty($catArr['link']) && empty($catArr['name'])) {
					continue;
				}
				$categoryChips[] = array(
					'name' => isset($catArr['name']) ? mb_strtolower((string) $catArr['name'], 'UTF-8') : '',
					'url'  => !empty($catArr['link']) ? '/' . ltrim($catArr['link'], '/') . '/' : '/projekty-domow/',
				);
			}
		}

		$featureTags = array();
		$csCloudParams = $responseContext->get('csCloudParams');
		$csCloudSelectParams = $responseContext->get('csCloudSelectParams');
		$csParamsValueNames = $responseContext->get('csParamsValueNames');
		if (is_array($csCloudParams)) {
			foreach ($csCloudParams as $key => $item) {
				if (isset($projectParams[$key]) && !empty($item[0])) {
					$featureTags[] = $item[0];
				}
			}
		}
		if (is_array($csCloudSelectParams)) {
			foreach ($csCloudSelectParams as $key => $item) {
				if (!isset($projectParams[$key]) || empty($item[0])) {
					continue;
				}
				$val = isset($projectParams[$key]['string_value']) ? $projectParams[$key]['string_value'] : '';
				$featureTags[] = $item[0] . ($val !== '' ? ': ' . $val : '');
			}
		}

		$similarCards = array();
		try {
			$similarMap = $this->_daoRepository->getProjectSimiliarFinder()->getSimiliarForProject($project->getId());
			if ($similarMap && count($similarMap)) {
				$similarIds = array_keys($similarMap->toArray('', 'similiar_id'));
				$similarList = $this->_projectFinder->getListById(
					$similarIds,
					\StudioAtrium_Entity_EntityBase_Project::STATUS_PUBLISHED,
					true
				);
				$similarCards = $this->_buildCategoryListCards($similarList);
			}
		} catch (\Throwable $e) {
			$similarCards = array();
		}

		$realizationImages = array();
		foreach (array('ProjectRealisation', 'ProjectBuildingInProgress', 'ProjectRealisationInterior') as $type) {
			if (empty($attachments[$type]) || !is_array($attachments[$type])) {
				continue;
			}
			foreach ($attachments[$type] as $att) {
				$url = $this->_attachmentMediaUrl($att, $mediaBase, 'presentation');
				if ($url === '') {
					$url = $this->_attachmentMediaUrl($att, $mediaBase, null);
				}
				if ($url !== '') {
					$realizationImages[] = array(
						'src' => $url,
						'alt' => isset($att['title']) ? (string) $att['title'] : ('Realizacja ' . $project->getName()),
					);
				}
			}
		}

		$faqItems = array();
		try {
			$faqTree = $this->_daoRepository->getProjectCommentFinder()->getTreeByProjectId(
				$project->getId(),
				\StudioAtrium\Entity\Project\Comment::TYPE_FAQ
			);
			if ($faqTree) {
				foreach ($faqTree as $faq) {
					$faqArr = is_array($faq) ? $faq : (method_exists($faq, 'toArray') ? $faq->toArray() : array());
					$q = isset($faqArr['title']) ? $faqArr['title'] : (isset($faqArr['content']) ? $faqArr['content'] : '');
					$a = isset($faqArr['answer']) ? $faqArr['answer'] : (isset($faqArr['descript']) ? $faqArr['descript'] : '');
					if ($q === '' && isset($faqArr['content'])) {
						$q = $faqArr['content'];
					}
					if (isset($faqArr['children'][0])) {
						$child = $faqArr['children'][0];
						if ($a === '' && !empty($child['content'])) {
							$a = $child['content'];
						}
					}
					if ($q !== '') {
						$faqItems[] = array('q' => $q, 'a' => $a);
					}
				}
			}
		} catch (\Throwable $e) {
			$faqItems = array();
		}
		if (empty($faqItems)) {
			$faqItems = array(
				array(
					'q' => 'Co zawiera projekt domu?',
					'a' => 'Projekt sprzedawany wyłącznie w formie papierowej zawiera 3 egzemplarze projektu architektoniczno-budowlanego z częścią opisową oraz 3 egzemplarze projektu technicznego (konstrukcja, charakterystyka energetyczna oraz instalacje).',
				),
				array(
					'q' => 'Czy projekt dostosowany jest do nowych wymagań technicznych?',
					'a' => 'Tak, wszystkie nasze projekty zgodne są z najnowszymi warunkami technicznymi obowiązującymi w kraju.',
				),
				array(
					'q' => 'Czy istnieje odbicie lustrzane tego projektu?',
					'a' => 'Tak, wszystkie projekty Studia Atrium są dostępne także w odbiciu lustrzanym, w tej samej cenie.',
				),
				array(
					'q' => 'Czy mogę dokonać zmian w projekcie?',
					'a' => 'Zmiany w projekcie są dopuszczalne. Wykonuje je zwykle lokalny architekt adaptujący. Uprawnia go do tego bezpłatna zgoda na zmiany, którą wydajemy do zamówionego projektu.',
				),
				array(
					'q' => 'Czy Studio Atrium może dokonać zmian w projekcie zgodnie z moim pomysłem?',
					'a' => 'Studio Atrium dokonuje tylko zmian w zakresie: kąta nachylenia dachu, podpiwniczenia, doprojektowania lub likwidacji garażu, przeprojektowania garażu na dwustanowiskowy oraz zbliźniaczenia budynków. Inne zmiany może wykonać lokalny architekt adaptujący.',
				),
			);
		}

		$categoryLabel = $responseContext->get('category');
		if ($categoryLabel === 'parterowe') {
			$categoryTitle = 'Domy parterowe';
		} elseif ($categoryLabel === 'piętrowe') {
			$categoryTitle = 'Domy piętrowe';
		} elseif ($categoryLabel === 'z poddaszem') {
			$categoryTitle = 'Domy z poddaszem';
		} else {
			$categoryTitle = 'Projekty domów';
		}

		$bedrooms = $rooms;
		if (!empty($projectParams[69]['num_value'])) {
			$bedrooms = (string) (int) round((float) $projectParams[69]['num_value']);
		}

		$responseContext->set('detail2026', true);
		$responseContext->set('detailGallery', $gallery);
		$responseContext->set('detailFacts', $facts);
		$responseContext->set('detailPrice', (int) round($priceCurrent));
		$responseContext->set('detailPriceOld', $discount > 0 ? (int) round($price) : null);
		$responseContext->set('detailHeatPump', $showHeatPump ? 690 : 0);
		$responseContext->set('detailAvailability', $availability);
		$responseContext->set('detailVersionLabel', $versionLabel);
		$responseContext->set('detailTechLeft', $techLeft);
		$responseContext->set('detailTechRight', $techRight);
		$responseContext->set('detailFloors', $floors);
		$responseContext->set('detailCostStages', $costStages);
		$responseContext->set('detailCostTotal', $costTotalLabel);
		$responseContext->set('detailCategoryChips', $categoryChips);
		$responseContext->set('detailFeatureTags', $featureTags);
		$responseContext->set('detailSimilar', $similarCards);
		$responseContext->set('detailRealizations', $realizationImages);
		$responseContext->set('detailFaq', $faqItems);
		$responseContext->set('detailCategoryTitle', $categoryTitle);
		$responseContext->set('detailBedrooms', $bedrooms);
		$responseContext->set('detailArea', $area);
		$responseContext->set('detailGarage', $garage);
		$responseContext->set('detailIsMirror', $isMirror);
		$responseContext->set('detailThumb', !empty($gallery[0]['thumb']) ? $gallery[0]['thumb'] : '');
	}

	/**
	 * @param array $attachment
	 * @param string $mediaBase
	 * @param string|null $preferChild
	 * @return string
	 */
	private function _attachmentMediaUrl(array $attachment, $mediaBase, $preferChild = 'presentation')
	{
		if ($preferChild && !empty($attachment['childAttachments'][$preferChild][0]['filename'])) {
			$child = $attachment['childAttachments'][$preferChild][0];
			$path = isset($child['path']) ? trim((string) $child['path'], '/') : '';
			$file = $child['filename'];
			return $mediaBase . '/' . ($path !== '' ? $path . '/' : '') . $file;
		}
		if (!empty($attachment['filename'])) {
			$path = isset($attachment['path']) ? trim((string) $attachment['path'], '/') : '';
			return $mediaBase . '/' . ($path !== '' ? $path . '/' : '') . $attachment['filename'];
		}
		return '';
	}

	/**
	 * Build interactive floor-plan data for the 2026 detail page.
	 *
	 * @return array
	 */
	private function _buildDetailFloors(
		array $attachments,
		$mediaBase,
		$isMirror,
		$sketchAuthorize,
		$roomsPoints,
		$projectSketchParams,
		array $sketchParams,
		$project
	) {
		$floors = array();
		if (empty($attachments['ProjectSketch']) || !is_array($attachments['ProjectSketch'])) {
			return $floors;
		}

		$sketchParamsById = is_array($sketchParams) ? $sketchParams : array();
		$pspBySketch = array();
		if ($projectSketchParams) {
			$pspList = is_object($projectSketchParams) && method_exists($projectSketchParams, 'toArray')
				? $projectSketchParams->toArray()
				: (array) $projectSketchParams;
			foreach ($pspList as $psp) {
				$pspArr = is_array($psp) ? $psp : (method_exists($psp, 'toArray') ? $psp->toArray() : array());
				$sid = isset($pspArr['sketch_id']) ? (int) $pspArr['sketch_id'] : 0;
				if ($sid) {
					$pspBySketch[$sid][] = $pspArr;
				}
			}
		}

		$authorizeMap = is_array($sketchAuthorize) ? $sketchAuthorize : array();
		$roomsMap = is_array($roomsPoints) ? $roomsPoints : array();

		foreach ($attachments['ProjectSketch'] as $sketch) {
			$sketchId = isset($sketch['id']) ? (int) $sketch['id'] : 0;
			$storey = isset($sketch['props']['storey']) ? $sketch['props']['storey'] : '';
			$label = \StudioAtrium\Application\Helper\SketchParamsNameMapper::mapStorey($storey);
			if ($label === '' || $label === null) {
				$label = 'Rzut';
			}
			$floorId = preg_replace('/[^a-z0-9]+/i', '-', mb_strtolower((string) $label, 'UTF-8'));
			$floorId = trim($floorId, '-') ?: ('sketch-' . $sketchId);

			$img = $this->_attachmentMediaUrl($sketch, $mediaBase, 'presentation');
			if ($img === '') {
				$img = $this->_attachmentMediaUrl($sketch, $mediaBase, null);
			}
			if ($img === '') {
				$storeySuffix = $storey !== '' && $storey !== null ? $storey : null;
				$img = $mediaBase . '/' . (int) $project->getId() . '/' . ($storeySuffix ? 'sketch-' . $storeySuffix : 'sketch') . '.jpg';
			}

			$width = !empty($authorizeMap[$sketchId]['width'])
				? (int) $authorizeMap[$sketchId]['width']
				: (!empty($sketch['props']['image_size']['width']) ? (int) $sketch['props']['image_size']['width'] : 1000);
			$height = !empty($authorizeMap[$sketchId]['height'])
				? (int) $authorizeMap[$sketchId]['height']
				: (!empty($sketch['props']['image_size']['height']) ? (int) $sketch['props']['image_size']['height'] : 1000);

			// Prefer natural image dimensions when authorize offset is used as viewBox size
			if (!empty($sketch['props']['image_size']['width'])) {
				$width = (int) $sketch['props']['image_size']['width'];
			}
			if (!empty($sketch['props']['image_size']['height'])) {
				$height = (int) $sketch['props']['image_size']['height'];
			}

			$rooms = array();
			$extra = null;
			$total = '';
			if (!empty($pspBySketch[$sketchId])) {
				$n = 0;
				foreach ($pspBySketch[$sketchId] as $psp) {
					$spid = isset($psp['sketch_param_id']) ? (int) $psp['sketch_param_id'] : 0;
					$type = isset($sketchParamsById[$spid]['type']) ? $sketchParamsById[$spid]['type'] : 'normal';
					$name = isset($sketchParamsById[$spid]['name']) ? $sketchParamsById[$spid]['name'] : '';
					$areaVal = isset($psp['area']) ? number_format((float) $psp['area'], 2, ',', '') : '';
					if ($type == 'sum') {
						$total = $areaVal;
						continue;
					}
					if ($type == 'info') {
						continue;
					}
					$n++;
					$room = array(
						'id'   => (string) (isset($psp['id']) ? $psp['id'] : $n),
						'n'    => !empty($psp['room_no']) ? (int) $psp['room_no'] : $n,
						'name' => $name,
						'area' => $areaVal,
						'ptspid' => isset($psp['id']) ? (string) $psp['id'] : '',
					);
					if (mb_stripos($name, 'garaż') !== false || mb_stripos($name, 'garaz') !== false) {
						$extra = $room;
					} else {
						$rooms[] = $room;
					}
				}
			}

			$hotspots = array();
			$rawRooms = null;
			if (!empty($roomsMap[$sketchId])) {
				$rawRooms = is_string($roomsMap[$sketchId]) ? json_decode($roomsMap[$sketchId], true) : $roomsMap[$sketchId];
			}
			if (is_array($rawRooms)) {
				foreach ($rawRooms as $roomId => $pointsObj) {
					if (!is_array($pointsObj)) {
						continue;
					}
					$pts = array();
					foreach ($pointsObj as $key => $val) {
						if (is_array($val) && isset($val['x']) && isset($val['y'])) {
							$x = (float) $val['x'];
							$y = (float) $val['y'];
							if ($isMirror && $width > 0) {
								$x = $width - $x;
							}
							$pts[] = $x . ',' . $y;
						}
					}
					if (empty($pts)) {
						continue;
					}
					$hotspots[] = array(
						'id'     => (string) $roomId,
						'name'   => isset($pointsObj['name']) ? (string) $pointsObj['name'] : '',
						'desc'   => isset($pointsObj['desc']) ? (string) $pointsObj['desc'] : '',
						'points' => implode(' ', $pts),
						'ptspid' => isset($pointsObj['ptspid']) ? (string) $pointsObj['ptspid'] : '',
					);
				}
			}

			$floors[] = array(
				'id'       => $floorId,
				'label'    => $label,
				'img'      => $img,
				'width'    => $width,
				'height'   => $height,
				'total'    => $total,
				'rooms'    => $rooms,
				'extra'    => $extra,
				'hotspots' => $hotspots,
				'sketch_id'=> $sketchId,
			);
		}

		return $floors;
	}
}
