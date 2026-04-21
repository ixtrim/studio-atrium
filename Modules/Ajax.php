<?php

/* $Id: Index.php 762 2013-04-03 11:55:02Z radek $ */

namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\Helper;
use StudioAtrium\Application\WWW;
use StudioAtrium\Entity;

class Ajax extends WWW\AbstractModule 
{
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doConsultant(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) { 
		header('HTTP/1.1 301 Moved Permanently');
		header("Location: " . \Point7_WebApp::getConfigParam('domain.fullurl'));
		header('Connection: close');
		exit();
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doProjectChanges(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$url = \Point7_WebApp::getConfigParam('domain.fullurl');
		
		if ($request->getParam('id')) {
			if ($project = $this->_daoRepository->getProjectFinder()->getById($request->getParam('id'))) {
				$url .= ltrim(\StudioAtrium\Application\Helper\Url::buildProjectUrl($project, 'projekty-domow'), '/');
			}
		}	
		
		header('HTTP/1.1 301 Moved Permanently');
		header("Location: " . $url);
		header('Connection: close');
		exit();
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doSendToFriend(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		header('HTTP/1.1 301 Moved Permanently');
		header("Location: " . \Point7_WebApp::getConfigParam('domain.fullurl'));
		header('Connection: close');
		exit();
	}
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetDoc(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$responseContext->set('document', $this->_daoRepository->getDocumentFinder()->getByCharId($request->getParam('charid', \StudioAtrium\Entity\Document::DOCTYPE_PAGE)));
	}
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetParamInfo(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$param = $this->_daoRepository->getProjectParamFinder()->getById($request->getParam('id'));
		$responseContext->set('paramInfo', $param->getDescription());
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetCommentRegulations(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {

	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetCustomerRegulations(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {

	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetConsultantForm(
       \Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
    ) {
        if($request->getParam('pid')) {
            
            $projectFinder = $this->_daoRepository->getProjectFinder(\Point7_WebApp::getConfigParam('paths.clicksearch_sets'));
            
            $project = $projectFinder->getById($request->getParam('pid'));
            
            $responseContext->set('project', $project);
        }
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetConsultantRegulations(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetMailingRegulations(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
	
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetFilesRegulations(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
	
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doSelfieRules(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
	
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetUserRegulations(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
	
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetSkeletonTechnology(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
	
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doValidateDiscountCode(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$projectList = $projectPercentList = $selectedExtras = null;
		$return = false;
		$isUserVerified = true;
		
		if ($request->getParam('projects_id')) {
			$projectList = explode(",", $request->getParam('projects_id'));
		}
		
		if ($request->getParam('projects_percent_id')) {
			$projectPercentList = explode(",", $request->getParam('projects_percent_id'));
		}
		
		if ($request->getParam('selected_extras')) {
		    $selectedExtras = json_decode($request->getParam('selected_extras'));
		}
		
		if ($promoCode = $this->_daoRepository->getDiscountFinder()->getByCode($request->getParam('code'), $projectList)) {
			if($promoCode->getUserId()) {
				$user = $appContext->getUser();
				
				if($promoCode->getUserId() != $user->getId()) {
					$isUserVerified = false;
				}
			}

			if($isUserVerified) {
				if ($promoCode->getDiscountType() == \StudioAtrium\Entity\Discount::TYPE_PERCENT && $projectList) {
					if ($promoCode->getProjectsId()) {
						$promoProjects = explode(",", $promoCode->getProjectsId());
						foreach ($projectList as $projectId) {
							if (in_array($projectId, $promoProjects)) {
								$project = $this->_daoRepository->getProjectFinder(null)->getById($projectId, true, false);
								$discountValue = round(($project->getPrice() - $project->getDiscount()) * ($promoCode->getDiscountValue()/100));
								$newDiscountValue = $promoCode->getPercentDiscountValue() + $discountValue;
								$promoCode->setPercentDiscountValue($newDiscountValue);
								$return = true;
							}
						}
					} elseif ($projectPercentList) {
						foreach ($projectPercentList as $projectId) {
							$project = $this->_daoRepository->getProjectFinder(null)->getById($projectId, true, false);
							$discountValue = round(($project->getPrice() - $project->getDiscount()) * ($promoCode->getDiscountValue()/100));
							$newDiscountValue = $promoCode->getPercentDiscountValue() + $discountValue;
							$promoCode->setPercentDiscountValue($newDiscountValue);
							$return = true;
						}
					} else {
						$return = false;
					}
				} else {
					$return = true;
				}
			} else {
				$return = false;
			}
			
			//sprawdz czy rabat dotyczy PC w dodatkach (w kodzie jest -PC na koncu)
			if (strpos($promoCode->getCode(), '-PC') && $return) {
			    if ($selectedExtras) {
			        $promoProjects = explode(",", $promoCode->getProjectsId());
			        foreach ($projectList as $projectId) {
			            if (array_key_exists($projectId . '_25_', $selectedExtras)) {
			                $return = true;
			            } else {
			                $return = false;
			                $responseContext->setJSONREsponse('msg_er', 'Aby zastosować ten kod rabatowy, wybierz z dodatków pompę ciepła!');
			            }
			        }
			    } else {
			        $return = false;
			        $responseContext->setJSONREsponse('msg_er', 'Aby zastosować ten kod rabatowy, wybierz z dodatków pompę ciepła!');
			    }
			}

			if ($return) {
				$responseContext->setJSONREsponse('status', 'ok');
				$responseContext->setJSONREsponse('code', $promoCode->toArray());
			} else {
				$responseContext->setJSONREsponse('status', 'error');
			}
		} else {
			$responseContext->setJSONREsponse('status', 'error');
		}
	}
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doWolf(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		if ($project = $this->_daoRepository->getProjectFinder(\Point7_WebApp::getConfigParam('paths.clicksearch_sets'))->getById($request->getParam('id'))) {
			$responseContext->set('project', $project);
		
			$responseContext->set('link', \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildProjectUrl($project));
		
			$wolfClicksDAO = $this->_daoRepository->getWolfClicksDAO();
			$wolfClicksFinder = $this->_daoRepository->getWolfClicksFinder();
		
			$click = $wolfClicksFinder->getClicksByProjectId($project->getId());
		
			if($click) {
				$click->setClicksCount($click->getClicksCount() + 1);
			} else {
				$click = new Entity\WolfClicks();
				$click->setProjectId($project->getId());
				$click->setClicksCount(1);
			}
		
			try {
				$wolfClicksDAO->store($click);
			} catch (\Exception $e) {
		
			}
		}
	}
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetCookieInfo(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {

	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetEstimateInfo(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
	
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetEstimateInfo2(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$responseContext->set('info', 2);
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doUserPromoInfo(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$session = \Point7_WebApp::getSession();
		$user = $appContext->getUser();
		
		$props = $user->getProps(true) or $props = array();
		
		if($request->getParam('status') == 1) {
			if(isset($props['noPromoInfo'])) {
				unset($props['noPromoInfo']);
			}
		} else {
			$props['noPromoInfo'] = 1;
		}
		
		$user->setProps(json_encode($props));
		
		try {
			$this->_daoRepository->getUserDAO()->store($user);
			$session->set('user', $user);
			$appContext->setUser($user);
			
			$responseContext->setJSONREsponse('status', 'ok');
		} catch(\Exception $e) {
			$responseContext->setJSONREsponse('status', 'fail');
		}
	}
	

	/**
	 * @see \Point7_WebApp_Module_Abstract::doItem
	 */
	public function doGetSelfieRender(
			\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		if ($request->isValid()) {

			//$mirror = !$request->getParam('mirror') ? '' : '/' . \Point7_WebApp::getConfigParam('paths.mirror_prefix');
			$mirror = '';

			if ($project = $this->_daoRepository->getProjectFinder(null)->getById($request->getParam('project_id'), true, true)) {
				$projectArray = $project->toArray();
				if (!empty($projectArray['attachments']['ProjectRender'][0]['childAttachments']['presentation'])) {
					$imagePath = \Point7_WebApp::getConfigParam('paths.static.project') . $projectArray['attachments']['ProjectRender'][0]['childAttachments']['presentation'][0]['path'] . $mirror;
					$image = $imagePath . '/' . $projectArray['attachments']['ProjectRender'][0]['childAttachments']['presentation'][0]['filename'];
					
					$img = new \Imagick($image);
					$img->resizeImage(1024, 683, \Imagick::FILTER_LANCZOS, 1, true);

					$responseContext->setFilename('house.png');
					$responseContext->setFileContent($img->getImageBlob());
				}
			}
		}
	}
	

	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetRealisationInfo(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
	
	}
	

	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetBuildOfferInfo(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
	
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetNorthouseForm(
	    \Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	    ) {
	        if($request->getParam('pid')) {
	            
	            $projectFinder = $this->_daoRepository->getProjectFinder(\Point7_WebApp::getConfigParam('paths.clicksearch_sets'));
	            $project = $projectFinder->getById($request->getParam('pid'));
	            
	            $responseContext->set('project', $project);
	        }
	}
}
