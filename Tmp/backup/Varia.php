<?php

/* $Id: Index.php 762 2013-04-03 11:55:02Z radek $ */

namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\WWW;
use StudioAtrium\Application\Helper;

class Varia extends WWW\AbstractModule 
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
		
		if (!$request->isValid()) {
			$responseContext->set('error', 'Brak wymaganych parametrów.');
			
			\Point7_WebApp::getLogger('notfound')->error(
				\StudioAtrium\Application\Exception\Helper::format404Message('Błąd ogólny', 'Varia', $action)
			);
			
			$this->_exit();
		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doAddons(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$extras = $this->_daoRepository->getExtrasFinder()->getExtrasList(true, true);
		$responseContext->set('extras', $extras);
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doAbout(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$aboutFinder = $this->_daoRepository->getAboutFinder();
		
		$responseContext->set('editions', $aboutFinder->getEntriesByType(\StudioAtrium\Entity\About::TYPE_EDITIONS));
		$responseContext->set('actions', $aboutFinder->getEntriesByType(\StudioAtrium\Entity\About::TYPE_ACTIONS));
		$responseContext->set('architecture', $aboutFinder->getEntriesByType(\StudioAtrium\Entity\About::TYPE_ARCHITECTURE));
		
		$responseContext->set('document', $this->_daoRepository->getDocumentFinder()->getByCharId('o_nas', \StudioAtrium\Entity\Document::DOCTYPE_PAGE)->current());
		
		// adres do static-a
		$responseContext->set('staticStockUrl', \Point7_WebApp::getConfigParam('static.stock'));
		$responseContext->set('staticAboutUrl', \Point7_WebApp::getConfigParam('static.about'));
	}
	
	/**
	 * List blog entries
	 */
	public function doGetAboutGallery(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {

		$data = array();

		if ($request->isValid()) {
			$gallery = $this->_daoRepository->getAboutFinder()->getGallery($request->getParam('entryId'), $request->getParam('gid'), true);
				
			$path = \Point7_WebApp::getConfigParam('static.about') . '/' . $request->getParam('entryId') . '/gallery' . $request->getParam('gid') . '/';
				
			foreach($gallery as $item) {
				$data[] = array('src' => $path . $item->getFile() , 'type' => 'image', 'caption' => $item->getName(), 'isDom' => false);
			}
		}

		$responseContext->setJSONResponse('data', array_reverse($data));
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doAgent(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {

		if ($request->getParam('city') && $request->getRawParam('region')) {
			$region = $request->getRawParam('region');
		} elseif ($request->getParam('city')) {
			$region = null;
		} else {
			$region = $request->getParam('region');
		}
		
		$agents = $this->_daoRepository->getRepresentativeFinder()->getRepresentativeByRegion(
			$region,
			$request->getParam('page') - 1,
			$request->getParam('limit'),
			$request->getParam('city')
		);
		
		$responseContext->set('agentList', $agents);

		if($agents->total() > 0) {
			$pages = ceil($agents->total() / $request->getParam('limit'));
			$responseContext->set('pages', $pages);
			$responseContext->set('total', $agents->total());
		}
		$responseContext->set('page', $request->getParam('page'));
		$responseContext->set('regions', \StudioAtrium\Application\Helper\Region::getRegion());
		$responseContext->set('selectedRegion', $request->getRawParam('region'));
		
		$url = Helper\Url::buildAgentsUrl($request->getParam('region'));
		$responseContext->set('url', $url);
		
		if($request->getParam('region') == 12) {
			$responseContext->set('baseUrl', Helper\Url::buildAgentsUrl());
		} else {
			$responseContext->set('baseUrl',$url);
		}
		
		$page = '';
		
		if($request->getParam('page') > 0) {
			$responseContext->set('noindex', true);
		}
		
		if ($request->getParam('page') > 1) {
			$page = ' - strona ' . $request->getParam('page');
		}
		
		$params = array('#region#' => 'województwo ' . \StudioAtrium\Application\Helper\Region::getRegion($request->getParam('region')),
						'#page#' => $page);
		
		\StudioAtrium\Application\Helper\Meta::prepareMetaWithExtraParams($responseContext, $this->_name, 'Agent', $params);
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doAgentDetail(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {

		if ($request->isValid()) {
			$agent = $this->_daoRepository->getRepresentativeFinder()->getById(
					$request->getParam('id'),
					\StudioAtrium\Entity\Representative::REPRESENTATIVE_STATUS_PUBLISHED
			);
			
			if ($agent) {
				$responseContext->set('agent', $agent);
				\StudioAtrium\Application\Helper\Meta::prepareMetaWithExtraParams($responseContext, $this->_name, 'AgentDetail', array('#name#' => $agent->getName()));
			} else {
				$responseContext->setErrorMessage('Niestety nie udało się znaleźć takiego przedstawiciela.');
				$this->_exit();
			}
		} else {
			$this->_exit();
		}

		
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doProjectHelper(
	    \Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
    ) {
	    
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doCustomProject(
	    \Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
    ) {
	        
	}
	
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doBuildOffer(
	   \Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
	    $apisListId = array(1279,1484,1281,1382,1584);
	    
	    $apiList = $this->_projectFinder->getListById(
	        $apisListId,
	        \StudioAtrium_Entity_EntityBase_Project::STATUS_PUBLISHED,
	        true
	        );
	    $responseContext->set('apiList', $apiList);
	    
	    $NewHouseListId = array(896,1380,1477,1438,1549,1538);
	    
	    $newHouseList = $this->_projectFinder->getListById(
	        $NewHouseListId,
	        \StudioAtrium_Entity_EntityBase_Project::STATUS_PUBLISHED,
	        true
	        );
	    $responseContext->set('newHouseList', $newHouseList);
	    

	    $woodDomListId = array(1484,1284,1513,1282,1493,880);
	    
	    $woodDomList = $this->_projectFinder->getListById(
	        $woodDomListId,
	        \StudioAtrium_Entity_EntityBase_Project::STATUS_PUBLISHED,
	        true
	        );
	    $responseContext->set('woodDomList', $woodDomList);
	    
	    $wolfListId = array(1291,1086,1551);
	    
	    $wolfList = $this->_projectFinder->getListById(
	        $wolfListId,
	        \StudioAtrium_Entity_EntityBase_Project::STATUS_PUBLISHED,
	        true
	        );
	    $responseContext->set('wolfList', $wolfList);
	    
	    $doomyListId = array(1282,1584,1382,1484);
	    
	    $doomyList = $this->_projectFinder->getListById(
	        $doomyListId,
	        \StudioAtrium_Entity_EntityBase_Project::STATUS_PUBLISHED,
	        true
	        );
	    $responseContext->set('doomyList', $doomyList);
	    
	    $array = array('company1','company2','company3','company4','company5');
	    shuffle($array);
	    $responseContext->set('shuffle', $array);
	        
	}
	
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doFinancing(
	   \Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
	        
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doSendCustomProject(
	    \Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
    ) {
        $response = array();
        $response['status'] = 'ok';
        
        if (!$request->isValid()) {
            $response['status'] = 'fail';
            $responseContext->setJSONREsponse('feedback' , $response);
            $this->_exit();
        }
        
        try {
            
            $content = 'Zapytanie o projekt indywidualny<br><br>';

            $content .= 'Nadawca: ' . $request->getParam('email') . '<br><br>' ;
            $content .= 'Koncepcja: ' . $request->getParam('message') ;
            
            
            $this->_sendMail(
                $appContext->getConfigParam('mailer.consultant'), 
                'Zapytanie o projekt indywidualny', 
                $content, 
                $appContext->getConfigParam('mailer.sender'), 
            true);

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
	public function doSendHelper(
	    \Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
    ) {
       
        $content = '<p><strong>Zapytanie o projekt</strong></p>';
        
        
        if($request->getParam('house_type')) {
            
            
            $houseTypes = array('ground' => 'parterowy', 'attic' => 'parterowy ze strychem do adaptacji', 'loft' => 'parterowy z poddaszem użytkowym', 'storey' => 'piętrowy');
            
            
            $content .= '<p>Typ domu: ';
            
            foreach($request->getParam('house_type') as $item) {
                $content .= $houseTypes[$item] . ', ';
            }
            
            $content = rtrim($content, ' ,');
            
            $content .= '</p>';
        }
        
        if($request->getParam('area_from') || $request->getParam('area_to')) {
            
            $content .= '<p>Powierzchnia użytkowa: ';
            
            if($request->getParam('area_from')) {
                $content .= 'od ' . $request->getParam('area_from') . ' ';
            }
            
            if($request->getParam('area_to')) {
                $content .= 'do ' . $request->getParam('area_to');
            }
            
            
            $content .= ' m<sup>2</sup></p>';
        }
        
        if($request->getParam('parcel_width')) {
            $content .= '<p>Maks. szerokość działki: ' . $request->getParam('parcel_width') . ' m</p>';
        }
        
        
        if($request->getParam('roof_type')) {
            
            $roofTypes = array('two' => 'dwuspadowy', 'multi' => 'wielospadowy', 'flat' => 'płaski');
            
            
            $content .= '<p>Typ dachu: ';
            
            foreach($request->getParam('roof_type') as $item) {
                $content .= $roofTypes[$item] . ', ';
            }
            
            $content = rtrim($content, ' ,');
            
            $content .= '</p>';
        }
        
        if($request->getParam('room_count')) {
            $content .= '<p>Ilość pokoi bez salonu: ' . $request->getParam('room_count') . '</p>';
        }
        
        if($request->getParam('garage_places')) {
            $content .= '<p>Ilość stanowisk garażowych: ' . $request->getParam('garage_places') . '</p>';
        }
        
        if($request->getParam('notice')) {
            $content .= '<p>Funkcjonalność i uwagi: ' . $request->getParam('notice') . '</p>';
        }
        
        if($request->getParam('email')) {
            $content .= '<p>E-mail: ' . $request->getParam('email') . '</p>';
        }
        
        if($request->getParam('phone')) {
            $content .= '<p>Telefon: ' . $request->getParam('phone') . '</p>';
        }
        
        
        if($request->getParam('newsletter')) {
            $this->_add2Newsletter($request->getParam('email'));
        }
        

        if ($mailerConfig = $appContext->getConfigParam('mailer.sender')) {
            if($this->_sendMail($appContext->getConfigParam('mailer.consultant'), 'Studio Atrium - mamy dla Ciebie projekt domu!', $content, $mailerConfig, true, $request->getParam('email'))) {
                $responseContext->setInfoMessage('Twoje zapytanie zostało przesłane do konsultanta. Wkrótce na nie odpowiemy.');
            } else {
                $responseContext->setErrorMessage('Niestety nie udało się wyslać e-maila do konsultanta. Prosimy o kontakt telefoniczny.');
            }
        } else {
            $responseContext->setErrorMessage('Niestety nie udało się wyslać e-maila do konsultanta. Prosimy o kontakt telefoniczny.');
        }
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
