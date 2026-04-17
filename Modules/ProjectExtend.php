<?php

/* $Id: Index.php 762 2013-04-03 11:55:02Z radek $ */

namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\WWW;
use StudioAtrium\Application\Helper;

class ProjectExtend extends WWW\AbstractModule 
{
	/**
	 * @var \StudioAtrium\Entity\Project\Finder
	 */
	protected $_projectFinder = null;
	
	
	/**
	 * @see \Point7_WebApp_Module_Abstract::_initAction()
	 */
	protected function _initAction($action,\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext)
	{
		parent::_initAction($action, $request, $appContext, $responseContext);
		$this->_projectFinder = $this->_daoRepository->getProjectFinder(\Point7_WebApp::getConfigParam('paths.clicksearch_sets'));
	
		if (!$request->isValid() && !$request->isParamAllowed('skip_validation_error')) {
			$responseContext->set('error', 'Brak wymaganych parametrów.');
			
			\Point7_WebApp::getLogger('notfound')->error(
				\StudioAtrium\Application\Exception\Helper::format404Message('Błąd ogólny', 'ProjectExtend', $action)
			);
			$this->_exit();
		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doPlan(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		
		if(!$project = $this->_projectFinder->getById($request->getParam('id'))) {
			$this->_forward('project', 'list');
		}
		
		//Tylko po to, żeby sprawdzić, czy jest wersja lustrzana - może jakos to inaczej
		$projectParams = $this->_daoRepository->getProjectToParamFinder()->getParamsForProject($request->getParam('id'))->toArray('', 'project_param_id');
		$responseContext->set('projectParams', $projectParams);
		
		$responseContext->set('project', $project);
		
		Helper\Meta::prepareMeta($responseContext, $this->_name, 'Plan', $project, null);
		
		$responseContext->set('noindexNofollow', true);
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetSituation(
	\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		if (!$project = $this->_projectFinder->getById($request->getParam('id'))) {
			$responseContext->setJSONResponse('status', 'error');
			$this->_exit();
		}
		
		$extras = json_decode($project->getExtraData(), true);
		
		$situationFinder = $this->_daoRepository->getHouseSituationFinder();
		
		if (($situation = $situationFinder->getByProjectId($project->getId(), 0, true, true)) && $situation->count() == 1) {
		    $situationArray = array();
			$situationArray['corner_points'] = $situation[0]->getCornerPoints();
			$situationArray['wall_n'] = $situation[0]->getWallN();
			$situationArray['wall_e'] = $situation[0]->getWallE();
			$situationArray['wall_s'] = $situation[0]->getWallS();
			$situationArray['wall_w'] = $situation[0]->getWallW();
			$responseContext->setJSONResponse('situation', $situationArray);
	
			$responseContext->setJSONResponse('image', '/index.php?module=project_extend&action=get_plot_image&project_id=' . $request->getParam('id'));
			$responseContext->setJSONResponse('mirror', '/index.php?module=project_extend&action=get_plot_image&project_id=' . $request->getParam('id') . '&mirror=1');
			
			if(isset($extras['sun_ratio'])) {
			    $responseContext->setJSONResponse('plot_ratio', $extras['sun_ratio']);
			}
		
			//check for other storey
			$storeys = 1;
			if (($other = $situationFinder->getByProjectId($request->getParam('id'), 1, true, true)) && $other->count() == 1) {
				if ($other[0]->getRooms()) {
					$storeys++;
				}
			}
		
			if (($other = $situationFinder->getByProjectId($request->getParam('id'), 2, true, true)) && $other->count() == 1) {
				if ($other[0]->getRooms()) {
					$storeys++;
				}
			}
		
			$responseContext->setJSONResponse('storeys', $storeys);
			$responseContext->setJSONResponse('status', 'ok');
		} else {
			$responseContext->setJSONResponse('status', 'error');
		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetPlotImage(
	\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {

		if ($request->isValid()) {
			$imagePath = \Point7_WebApp::getConfigParam('paths.static.app') . 'situation';
		
			$image = $imagePath . '/' . $request->getParam('project_id') . '-0';
		
			if ($request->getParam('mirror') == 1) {
				$image .= '-m.png';
			} else {
				$image .= '.png';
			}
			$responseContext->setFilename('plot.png');
			$responseContext->setFileContent(file_get_contents($image));
		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetRooms(
	\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {

		if (($situation = $this->_daoRepository->getHouseSituationFinder()->getByProjectId($request->getParam('id'), $request->getParam('storey'), true, true)) && $situation->count() == 1) {
			$responseContext->setJSONResponse('rooms', $situation[0]->getRooms()->toArray());
			$responseContext->setJSONResponse('status', 'ok');
		
			$imageUrl = \Point7_WebApp::getConfigParam('static.app') . '/situation/' . $request->getParam('id') . '-' . $request->getParam('storey');
		
			$responseContext->setJSONResponse('image', $imageUrl . '.png');
			$responseContext->setJSONResponse('mirror', $imageUrl . '-m.png');
		
		} else {
			$responseContext->setJSONResponse('status', 'error');
		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doSketch(
			\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {

		if(!$project = $this->_projectFinder->getById($request->getParam('id'))) {
			$this->_forward('project', 'list');
		}
		
		$attachments = $project->getAttachmentsByType('ProjectSketch');
		
		
		while($item = $attachments->next()) {
			
			$props = json_decode($item->getProps(), true);
			
			if($props['storey'] == $request->getParam('storey')) {
				
				$responseContext->set('sketchId', $item->getId());
				
				//1.41 - to się bierze stąd, że 100m budynku = 7086px czyli 625px = 882cm => 625 * 1.41 = 882
				
				if($request->getParam('version') == 'mirror') {
					if($props['mirror_scale'] <= 1) {
						$props['factor'] = 1.41;
					} else {
						$props['factor'] = ((float)(str_replace(',', '.', $props['mirror_scale']))) * 1.41;
					}
				} else {
					if($props['scale'] <= 1) {
						$props['factor'] = 1.41;
					} else {
						$props['factor'] = ((float)(str_replace(',', '.', $props['scale']))) * 1.41;
					}
				}
				
				$props['height'] = ceil(($props['image_size']['height'] * 625) / $props['image_size']['width']);
				$attachmentProps = $props;
				break;
			}
		}
	
		
		//Tylko po to, żeby sprawdzić, czy jest wersja lustrzana - może jakos to inaczej
		$projectParams = $this->_daoRepository->getProjectToParamFinder()->getParamsForProject($request->getParam('id'))->toArray('', 'project_param_id');
		
		$sketchParams = $this->_daoRepository->getSketchParamFinder()->getList()->toArray('', 'id');
		$projectSketchParams = $this->_daoRepository->getSketchParamFinder()->getParamsForProject($request->getParam('id'), $request->getParam('storey'));

		$responseContext->set('projectParams', $projectParams);
		$responseContext->set('sketchParams', $sketchParams);
		$responseContext->set('projectSketchParams', $projectSketchParams);

		$responseContext->set('project', $project);
		$responseContext->set('storey', $request->getParam('storey'));
		
		$responseContext->set('props', $attachmentProps);
		
		$floor = false;
		switch ($request->getParam('storey')) {
			case 'basement': $floor = 'piwnicy'; break;
			case 'low_ground_floor': $floor = 'przyziemia'; break;
			case '1st_floor': $floor = 'I piętra'; break;
			case '2nd_floor': $floor = 'II piętra'; break;
			case 'loft': $floor = 'poddasza'; break;
			case 'strych': $floor = 'strychu'; break;
			case 'ground_floor': $floor = 'parteru'; break;
		}
		
		
		Helper\Meta::prepareMeta($responseContext, $this->_name, 'Sketch', $project, null, ($request->getParam('version') == 'mirror'), $floor);
		
		$url = \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildProjectUrl($project);
		$responseContext->set('canonicalUrl', $url);
	}
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doAddons(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		if ($request->isValid()) {
			$extras = $this->_daoRepository->getExtrasFinder()->getListings(\StudioAtrium\Entity\Extras\Listing::TYPE_NORMAL, \StudioAtrium\Entity\Extras\Listing::STATUS_ENABLED, true, $request->getParam('id'));
			$responseContext->set('extras', $extras);
		
			$project = $this->_projectFinder->getById($request->getParam('id'), true, false);
			$responseContext->set('project', $project);
			
			Helper\Meta::prepareMeta($responseContext, $this->_name, 'Addons', $project);
		} else {
			$responseContext->setErrorMessage('Wystąpił błąd. Nie znaleziono dodatków dla takiego projektu.');
			$this->_exit();
		}
	}
	
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doPromoInfoNotify(
	    \Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	    ) {
	        
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doProjectAddons(
	    \Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	    ) {
	    
	        if(!$project = $this->_projectFinder->getById($request->getParam('id'))) {
	            $this->_forward('project', 'list');
	        }
	        
	        $responseContext->set('project', $project);
	        
	        $projectParams = $this->_daoRepository->getProjectToParamFinder()->getParamsForProject($request->getParam('id'))->toArray('', 'project_param_id');
	        $responseContext->set('projectParams', $projectParams);

	        $extras = $this->_daoRepository->getExtrasFinder()->getListings(
	            \StudioAtrium\Entity\Extras\Listing::TYPE_PACKAGE,
	            \StudioAtrium\Entity\Extras\Listing::STATUS_ENABLED,
	            true,
	            $request->getParam('id'));
	        
	        $responseContext->set('extras', $extras);
	        
	        $extrasNormal = $this->_daoRepository->getExtrasFinder()->getListings(
	            \StudioAtrium\Entity\Extras\Listing::TYPE_NORMAL,
	            \StudioAtrium\Entity\Extras\Listing::STATUS_ENABLED,
	            true,
	            $request->getParam('id'));
	        
	        $responseContext->set('extras_normal', $extrasNormal);
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doPromoNotify(
	    \Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
    ) {
        $status = 'ok';

        if (!$request->isValid()) {
            $status = 'error';
        } else {
            
            $entity = new \StudioAtrium\Entity\Project\Promo\Notify();

            $entity->setProjectId($request->getParam('pid'));
            $entity->setEmail($request->getParam('email'));
            $entity->setCreateDate(date('Y-m-d H:i:s'));

            try {
                $this->_daoRepository->getProjectPromoNotifyDAO()->store($entity);
                
                if($request->getParam('newsletter')) {
                    $this->_add2Newsletter($request->getParam('email'));
                }
            } catch (\Exception $e) {
                if($e->getCode() == 23000) {
                    $status = 'duplicated';
                } else {
                    \Point7_WebApp::getLogger('error')->error(
                        \StudioAtrium\Application\Exception\Helper::formatLoggerMessage($e, 'Error during store promo notify - pid: ' . $request->getParam('pid') . ', email: ' . $request->getParam('email'))
                    );

                    $status = 'fail';
                }
            }
        }

        $responseContext->setJSONResponse('status', $status);
	}
	
	/**
	 * Dodanie usera do listy newslettera
	 *
	 * @param string $email
	 *
	 */
	private function _add2Newsletter($email)
	{
	    $recipient = new \StudioAtrium\Entity\NewsletterRecipient();
	    $recipient->setActive(true);
	    $recipient->setEmail($email);
	    
	    try {
	        $this->_daoRepository->getNewsletterRecipientDAO()->store($recipient);
	    } catch (\Exception $e) {
	        if($e->getCode() != 23000) {
	            \Point7_WebApp::getLogger('error')->error('Nie udało się dodać do newslettera ' . print_r($e->getMessage(), 1));
	        }
	    }
	}
}
