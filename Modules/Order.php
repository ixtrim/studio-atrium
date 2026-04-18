<?php

/* $Id: Index.php 762 2013-04-03 11:55:02Z radek $ */

namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\WWW;
use StudioAtrium\Application\Helper;

class Order extends WWW\AbstractModule 
{
	/**
	 * @var \StudioAtrium\Entity\Project\Finder 
	 */
	protected $_projectFinder = null;
	
	
	/**
	 * @see \Point7_WebApp_Module_Abstract::_initAction()
	 */
	public function _initAction($action, \Point7_WebApp_Request $request, $appContext, $responseContext): void
	{
		parent::_initAction($action, $request, $appContext, $responseContext);
		$this->_projectFinder = $this->_daoRepository->getProjectFinder(\Point7_WebApp::getConfigParam('paths.clicksearch_sets'));
	
		if (!$request->isValid()) {
			$responseContext->set('error', 'Brak wymaganych parametrów.');
			
			\Point7_WebApp::getLogger('notfound')->error(
				\StudioAtrium\Application\Exception\Helper::format404Message('Błąd ogólny', 'Order', $action)
			);
			$this->_exit();
		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doCart(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$basket = $responseContext->get('basket');
		if (!$basket) {
			$responseContext->setErrorMessage('Twój koszyk jest pusty. Dodaj najpierw produkt do koszyka.');
			$this->_exit();
		}
		
		$allProjectsAvailable = true;
		$isProject = false;
		
		$extras = $extras2 = $projects = $params = $recuperationIncluded = array();
		
		foreach ($basket as $basketItem) {
			if (!empty($basketItem['pid'])) {
			    $isProject = true;
				$currentProject = $this->_daoRepository->getProjectFinder(null)->getById($basketItem['pid'], true, true)->toArray();
				$projects[$basketItem['pid']] = $currentProject;
				
				$currentProjectParams = $this->_daoRepository->getProjectToParamFinder()->getParamsForProject($basketItem['pid'])->toArray('', 'project_param_id');
				$params[$basketItem['pid']] = $currentProjectParams;
				
				if ($currentProject['type'] == 'house' || $currentProject['type'] == 'skeleton') {
					$extras[$basketItem['pid']] = $this->_daoRepository->getExtrasFinder()->getListings(
							\StudioAtrium\Entity\Extras\Listing::TYPE_PACKAGE, 
							\StudioAtrium\Entity\Extras\Listing::STATUS_ENABLED, 
							true, 
							$basketItem['pid'])->toArray();
				}
				
				$recuperationIncluded[$basketItem['pid']] = false;
				
				if ($projectParam = $this->_daoRepository->getProjectToParamFinder()->getParamForProject($basketItem['pid'], \StudioAtrium\Application\Helper\Project::getParamsMap('recuperation_included'))) {
					if ($projectParam->getNumValue() == 1) {
						$recuperationIncluded[$basketItem['pid']] = true;
					}
				}
				
				if ($allProjectsAvailable && $projectParam = $this->_daoRepository->getProjectToParamFinder()->getParamForProject($basketItem['pid'], \StudioAtrium\Application\Helper\Project::getParamsMap('under_construction'))) {
					if ($projectParam->getNumValue() == 1) {
						$allProjectsAvailable = false;
					}
				}
				
			} else {
				$extras2[$basketItem['eid']] = $this->_daoRepository->getExtrasFinder()->getExtrasById($basketItem['eid'])->toArray();
				if (!empty($basketItem['epid']) && !array_key_exists($basketItem['epid'], $projects)) {
					$projects[$basketItem['epid']] = $this->_daoRepository->getProjectFinder(null)->getById($basketItem['epid'], true, false)->toArray();
				}
			}
		}

		if ($extras) {
			$projectsForExtras = array();
			foreach ($extras as $pid => $extList) {
				foreach ($extList as $m => $ext) {
					if ($ext['extras_id'] == \StudioAtrium\Application\Helper\Project::EXTRAS_RECUPERATION_ID && $recuperationIncluded[$pid]) {
						unset($extras[$pid][$m]);			
					} else {
						if ($ext['extras']['is_group'] && $ext['extras']['project_list_id']) {
							foreach (explode(",", $ext['extras']['project_list_id']) as $pr) {
								$projectsForExtras[$pr] = $pr;
							}
						}
					}
				}
			}
			if ($projectsForExtras) {
				$projectsForExtrasCollection = $this->_daoRepository->getProjectFinder(null)->getListById($projectsForExtras, \StudioAtrium\Entity\Project::STATUS_PUBLISHED);
				$responseContext->set('projectsForExtras', $projectsForExtrasCollection->toArray(array(), 'id'));
			}
		}
		
		$responseContext->set('extras', $extras);
		$responseContext->set('mainExtras', $extras2);
		$responseContext->set('projects', $projects);
		$responseContext->set('params', $params);
		$responseContext->set('allProjectsAvailable', $allProjectsAvailable);
		
		if($isProject) {
            $responseContext->set('paymentMethods', Helper\Delivery::getPayment());
		} else {
		    $responseContext->set('paymentMethods', Helper\Delivery::getAddonPayment());
		}
		
		$responseContext->set('deliveryMethods', Helper\Delivery::getDelivery());
		$responseContext->set('deliveryCosts', Helper\Delivery::getCost());
		
		$responseContext->set('minPayment', Helper\Delivery::MIN_PAYMENT_TO_FREE_SHIPPING);
		
		//Fotowoltaika etc
		$session = \Point7_WebApp::getSession();
		if ($session->get('basketFormData')) {
		    
		    $formData = json_decode($session->get('basketFormData'), 1);
		    $fw = array();
	    
		    foreach($formData as $key => $value) {
		        if(strpos($key, 'fw') === 0) {
		            preg_match('/\[([0-9]+)\]\[([a-z_]+)\]/', $key, $m);
		            $fw[$m[1]][$m[2]] = $value;
		        }
		    }

		    $responseContext->set('fw', $fw);
		    
		    $responseContext->set('dispatchType', $formData['dispatch_type']);
		    $responseContext->set('paymentType', $formData['payment_type']);
		}
		
		
		//Sandbox mode
// 		if($appContext->getConfigParam('przelewy24.test_mode') == 1) {
// 		    $responseContext->set('sandbox', 1);
// 		    if($_SERVER['REMOTE_ADDR'] == $appContext->getConfigParam('domain.ip')) {
// 		        $responseContext->set('allowOnlinePayment', 1);
// 		    }
// 		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doCartStore(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$session = \Point7_WebApp::getSession();
		$session->set('basketFormData', $request->getParam('data'));
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doData(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$basket = $responseContext->get('basket');
		if (!$basket) {
			$responseContext->setErrorMessage('Twój koszyk jest pusty. Dodaj najpierw produkt do koszyka.');
			$this->_forward('index');
		}
		
		$session = \Point7_WebApp::getSession();
		if (!$session->get('basketFormData')) {
			$responseContext->setErrorMessage('Wystąpił błąd zawartości koszyka. Wybierz ponownie elementy Twojego zamówienia.');
			$this->_exit();
		}
		
		$responseContext->set('basketUserData', json_decode($session->get('basketUserData'), 1));
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doDataStore(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$session = \Point7_WebApp::getSession();
		if (!$session->get('basketFormData')) {
			$responseContext->setErrorMessage('Wystąpił błąd zawartości koszyka. Wybierz ponownie elementy Twojego zamówienia.');
			$this->_exit();
		}
		
		$session->set('basketUserData', json_encode($request->toArray()));
		
		if (!$request->isValid()) {
			$responseContext->setErrorMessage('Wypełnij wszystkie wymagane pola formularza.');
			$this->_exit();
		}
		
		if ($request->getParam('client_type') == \StudioAtrium\Entity\Transaction\User::TYPE_COMPANY && (!$request->getParam('company_name') || !$request->getParam('nip'))) {
			$responseContext->setErrorMessage('Wybrałeś firmę jako podmiot zamawiający. Wypełnij poprawnie nazwę firmy oraz NIP.');
			$this->_exit();
		}
		
		if ($request->getParam('send_data') == 1 && (
				!$request->getParam('send_fname') || 
				!$request->getParam('send_postal_code') || 
				!$request->getParam('send_city') || 
				!$request->getParam('send_address') || 
				!$request->getParam('send_lname'))) {
			$responseContext->setErrorMessage('Zaznaczyłeś inne dane do wysyłki. Wypełnij poprawnie dane do wysyłki.');
			$this->_exit();
		}
		
		$responseContext->setInfoMessage('Dane do zamówienia zostały poprawnie zapisane. Sprawdź teraz poniżej wszystkie dane i potwierdź zamówienie.');
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doSummary(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$this->doCart($request, $appContext, $responseContext);
		
		$session = \Point7_WebApp::getSession();
		if (!$session->get('basketFormData')) {
			$responseContext->setErrorMessage('Wystąpił błąd zawartości koszyka. Wybierz ponownie elementy Twojego zamówienia.');
			$this->_exit();
		}
		
		if (!$session->get('basketUserData')) {
			$responseContext->setErrorMessage('Wystąpił błąd zawartości koszyka. Wypisz ponownie swoje dane niezbędne do zrealizowania zamówienia.');
			$this->_exit(true, 'userData');
		}
		
		$formData = json_decode($session->get('basketFormData'), 1);

		if (!empty($formData['discount_code']) && !empty($formData['projectsId'])) {
			$return = false;
			$projectList =  explode(",", $formData['projectsId']);
			$projectPercentList =  explode(",", $formData['projectsPercentId']);
			if ($promoCode = $this->_daoRepository->getDiscountFinder()->getByCode($formData['discount_code'],  $projectList)) {
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
				
				if ($return) {
					$responseContext->set('promoCode', $promoCode);
				}
			}
		}
		
		$projects = null;

		foreach ($formData as $key => $value) {
			if (preg_match('/extras4project\[.*\]\[(.*)\]/', $key, $found)) {
				$foundKey = explode("_", $found[1]);
				$projects[$foundKey[0]] = $this->_daoRepository->getProjectFinder(null)->getById($value, true, false)->toArray();	
			}
		}

		$responseContext->set('projects4extras', $projects);
		$responseContext->set('basketUserData', json_decode($session->get('basketUserData'), 1));
		$responseContext->set('basketFormData', $formData);
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doStoreSummary(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$session = \Point7_WebApp::getSession();
		
		if (!$session->get('basketFormData')) {
			$responseContext->setErrorMessage('Wystąpił błąd zawartości koszyka. Wybierz ponownie elementy Twojego zamówienia.');
			$this->_exit();
		}
		
		if (!$session->get('basketUserData')) {
			$responseContext->setErrorMessage('Wystąpił błąd zawartości koszyka. Wypisz ponownie swoje dane niezbędne do zrealizowania zamówienia.');
		}
		
		$userData = json_decode($session->get('basketUserData'), 1);
		$formData = json_decode($session->get('basketFormData'), 1);

		$transactionUser = new \StudioAtrium\Entity\Transaction\User();
		
		if ($appContext->getUser()) {
			$transactionUser->setUserId($appContext->getUser()->getId());
		}
		
		$userDataForEmail = '';
		
		if ($userData['client_type'] == 'company') {
			$userType = \StudioAtrium\Entity\Transaction\User::TYPE_COMPANY;
			$transactionUser->setCompany($userData['company_name']);
			$transactionUser->setNip($userData['nip']);
			
			$userDataForEmail .= 'Nazwa firmy: <b>' . $userData['company_name'] . '</b><br>';
			$userDataForEmail .= 'NIP: <b>' . $userData['nip'] . '</b><br>';
		} else {
			$userType = \StudioAtrium\Entity\Transaction\User::TYPE_INDIVIDUAL;
		}
		
		$transactionUser->setEmail($userData['email']);
		$transactionUser->setType($userType);
		$transactionUser->setName($userData['fname']);
		$transactionUser->setSurname($userData['lname']);
		$transactionUser->setAddress($userData['address']);
		$transactionUser->setPostCode($userData['postal_code']);
		$transactionUser->setCity($userData['city']);
		$transactionUser->setPhone($userData['phone']);
		
		$userDataForEmail .= 'Imię i nazwisko: <b>' . $userData['fname'] . ' ' . $userData['lname'] . '</b><br>';
		$userDataForEmail .= 'Adres: <b>' . $userData['address'] . '</b><br>';
		$userDataForEmail .= 'Kod pocztowy: <b>' . $userData['postal_code'] . '</b><br>';
		$userDataForEmail .= 'Miasto: <b>' . $userData['city'] . '</b><br>';
		$userDataForEmail .= 'Telefon: <b>' . $userData['phone'] . '</b><br>';
		$userDataForEmail .= 'E-mail: <b>' . $userData['email'] . '</b><br>';
		
		if (!empty($userData['send_data']) && $userData['send_data'] == 1) {
			$sendData = $userData['send_fname'] . " " . $userData['send_lname'] . "\n";
			$sendData .= $userData['send_postal_code'] . " " . $userData['send_city'] . "\n";
			$sendData .= $userData['send_address'];
			
			$transactionUser->setSendAddress($sendData);
			
			$userDataForEmail .= '<br>Dane do wysyłki:<br><br>';
			$userDataForEmail .= nl2br($sendData);
		}
		
		try {
			$this->_daoRepository->getTransactionUserDAO()->store($transactionUser);
			
			//add uer to newsletter
			if (!empty($userData['accept_mailing']) && $userData['accept_mailing'] == 1) {
				$newsletter = new \StudioAtrium\Entity\NewsletterRecipient();
				$newsletter->setActive(1);
				$newsletter->setEmail($userData['email']);
				$newsletter->setRegisterDate(date('Y-m-d H:i:s'));
				
				try {
					$this->_daoRepository->getNewsletterRecipientDAO()->store($newsletter);
				} catch (\Exception $e) {
					if (($pdoE = $e->getBaseException()) instanceof \PDOException && \ArrayHelper::getOffset($pdoE->errorInfo, 1) == '1062') {
					} else {
						\Point7_WebApp::getLogger('error')->error(
							\StudioAtrium\Application\Exception\Helper::formatLoggerMessage($e, 'Error creating newsletter recipient object during transaction store')
						);
					}
				}
			}
			
		} catch (\Exception $e) {
			$responseContext->setErrorMessage('Wystąpił błąd podczas składania zamówienia. Błąd zapisu danych do faktury. Spróbuj ponownie, bądź skonaktuj się z nami telefonicznie.');
				\Point7_WebApp::getLogger('error')->error(
					\StudioAtrium\Application\Exception\Helper::formatLoggerMessage($e, 'Error during store transaction user')
				);
			$this->_exit();
		}
		
		//transaction store
		$transaction = new \StudioAtrium\Entity\Transaction();
		$transaction->setTransactionUserId($transactionUser->getId());
		$transaction->setAddDate(date('Y-m-d H:i:s'));
		$transaction->setModifyDate(date('Y-m-d H:i:s'));
		$transaction->setStatus(\StudioAtrium\Entity\Transaction::STATUS_NEW);
		
		if (!empty($userData['notes'])) {
			$transaction->setNote($userData['notes']);
			$userDataForEmail .= '<br>Uwagi do zamówienia:<br><br>' . nl2br($userData['notes']);
		}
		
		$props = null;
		
		if (!empty($formData['discount_code'])) {
			$props['promoCode'] = $formData['discount_code'];
			if (!empty($formData['projectsId'])) {
				if ($promoCode = $this->_daoRepository->getDiscountFinder()->getByCode($formData['discount_code'],  explode(",", $formData['projectsId']))) {
					$props['discountValue'] = $promoCode->getDiscountValue();
					$props['discountType'] = $promoCode->getDiscountType();
				}
			}
		}
		
		if (!empty($formData['registerUserDiscount']) && $appContext->getUser()) {
			$props['registerUserDiscount'] = $formData['registerUserDiscount'];
		}
		
		$props['paymentType'] = $formData['payment_type'];
		$props['dispatchType'] = $formData['dispatch_type'];
		$props['deliveryPrice'] = $formData['deliveryPrice'];
		$props['totalPayment'] = $formData['total'];
		
		if($formData['payment_type'] == 'online') {
			$props['sid'] = md5(session_id() . date('YmdHis'));
		}
		
		$paymentMethod = Helper\Delivery::getPayment($formData['payment_type']);
		$deliveryMethod = Helper\Delivery::getDelivery($formData['dispatch_type']) . ': <b>' . $formData['deliveryPrice'] .'</b> zł';
		
		$transaction->setProps(json_encode($props));
		
		try {
			$this->_daoRepository->getTransactionDAO()->store($transaction);
			
			$this->_checkAdwordsCookie($transaction->getId());
			$responseContext->setForwardParam('i', $transaction->getId());
			
		} catch (\Exception $e) {
			$responseContext->setErrorMessage('Wystąpił błąd podczas składania zamówienia. Błąd zapisu transakcji. Spróbuj ponownie, bądź skonaktuj się z nami telefonicznie.');
			$this->_daoRepository->getTransactionUserDAO()->delete($transactionUser);
				\Point7_WebApp::getLogger('error')->error(
					\StudioAtrium\Application\Exception\Helper::formatLoggerMessage($e, 'Error during store transaction')
				);
			$this->_exit();
		}
		
		
		$projectsMailContent = '';
		
		//obejcie na zerowanie props
		$propsToEmail = $props;
		
		//transaction items
		foreach ($responseContext->get('basket') as $basket) {
			$extras = null;
			$props = array();
			
			$transactionItem = new \StudioAtrium\Entity\Transaction\Item();
			$transactionItem->setTransactionId($transaction->getId());
			$transactionItem->setAmount(1);
			$transactionItem->setNetPrice($basket['price']);
			$transactionItem->setGrossPrice($basket['price']);
			
			if (!empty($basket['pid'])) {
				if ($project = $this->_daoRepository->getProjectFinder(null)->getById($basket['pid'], true, false)) {
					
					if ($project->getType() == 'house' || $project->getType() == 'skeleton') {
						$extras = $this->_daoRepository->getExtrasFinder()->getListings(
								\StudioAtrium\Entity\Extras\Listing::TYPE_PACKAGE,
								\StudioAtrium\Entity\Extras\Listing::STATUS_ENABLED,
								true,
								$basket['pid'])->toArray();
					}

					$transactionItem->setType('project');
					$description = Helper\Project::getTypes($project->getType()) . ' ' . $project->getSymbolAlpha() . ' ' . $project->getSymbolNum();
					if ($project->getName()) {
						$description .= ' ' . $project->getName();
					}
					$props['projectId'] = $project->getId();
					
					$projectsMailContent .= '<br><br>* ' . $description;
					
					if (!empty($basket['version'])) {
						$props['projectVersion'] = ($basket['version'] == 'normal') ? 'wersja podstawowa' : 'odbicie lustrzane';
						$projectsMailContent .= ' (' . $props['projectVersion'] . ')';
					}
					
					$transactionItem->setDescription($description);
					$extrasForProject = array();
					$selectedProjectName = '';
					$props['cliSelExtras'] = array();
					
					foreach ($formData as $key => $value) {
						 if (preg_match('/cliSelExtras\[(.*)\]\[(.*)\]/', $key, $found)) {
							$pid = $found[1];
							if ($pid == $basket['pid']) {
								$props['cliSelExtras'][$value] = $value;					
								
								if (!empty($extras)) {
									foreach ($extras as $extra) {
										if ($extra['extras']['id'] == $value) {
											$extrasPrice = ($extra['package_price'] >= 0) ? $extra['package_price'] : $extra['extras']['price'];
											$extrasForProject[$extra['extras']['id']] = '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&gt; ' . $extra['extras']['name'] . ': <b>' . $extrasPrice . '</b> zł';
										}
									}
									
								}
							}
						}
					}
					
					foreach ($formData as $key => $value) {
						if (preg_match('/extras4project\[(.*)\]\[(.*)\]/', $key, $found)) {
							$pid = $found[1];
							if ($pid == $basket['pid']) {
								$foundKey = explode("_", $found[2]);
								$props['selectedProject4Extras'] = $value;
						
								$selectedProjectObject = $this->_daoRepository->getProjectFinder(null)->getById($value, true, false);
								$selectedProjectName = $selectedProjectObject->getSymbolAlpha() . ' ' . $selectedProjectObject->getSymbolNum();
								if ($selectedProjectObject->getName()) {
									$selectedProjectName .= ' ' . $selectedProjectObject->getName();
								}
						
								if (!empty($extras) && array_key_exists($foundKey[0], $props['cliSelExtras'])) {
									foreach ($extras as $extra) {
										if ($extra['extras']['id'] == $foundKey[0]) {
											$extrasPrice = ($extra['package_price'] >= 0) ? $extra['package_price'] : $extra['extras']['price'];
											$extrasForProject[$extra['extras']['id']] = '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&gt; ' . $extra['extras']['name'] . ' ' . $selectedProjectName .': <b>' . $extrasPrice . '</b> zł';
										}
									}
								}
						
							}
						}
					}
					
					//Fotowoltaika propsy
					if(isset($props['cliSelExtras'][23])) {
    					foreach ($formData as $key => $value) {
    					    $found = array();
    					    if (preg_match('/fw\[(.*)\]\[(.*)\]/', $key, $found)) {
    					        $pid = $found[1];
    					        if ($pid == $basket['pid']) {
    					            
    					            $fwPropValue = $value;
    					            
    					            switch($found[2]) {
    					                case 'lodger_count':
    					                    $fwProp = 'lokatorzy';
    				                    break;
    				                    
    					                case 'orientation':
    					                    $fwProp = 'orientacja';
    				                    break;
    				                    
    					                case 'shaders':
    					                    $fwProp = 'zacienienie';
    				                    break;
    					                    
    					                case 'co': 
    				                    case 'cwu':
    					                    $fwProp = $found[2];
    					                    
    					                    switch($fwPropValue) {
    					                        case 1:
    					                            $fwPropValue = 'kocioł stałopalny';
    				                            break;
    					                        case 2:
    					                            $fwPropValue = 'kocioł gazowy';
    				                            break;
    					                        case 3:
    					                            $fwPropValue = 'pompa ciepła';
    				                            break;
    					                    }
    					            }
    					            
    					            $props['fotowoltaika'][$fwProp] = $fwPropValue;
    					        }
    					    }
    					}
					}
					
					
					$transactionItem->setProps(json_encode($props));
					$projectsMailContent .= '<br>&nbsp;&nbsp;&nbsp;- cena projektu: <b>' . $basket['price'] . '</b> zł';
					
					if ($extrasForProject) {
						$projectsMailContent .= '<br>&nbsp;&nbsp;&nbsp;- wybrane dodatki:' . implode(" ", $extrasForProject);
					}
					
					if(isset($props['fotowoltaika'])) {
					    $projectsMailContent .= '<br><br>&nbsp;&nbsp;&nbsp;- Dane do projektu fotowoltaiki:';
					    foreach($props['fotowoltaika'] as $fwkey => $fwvalue) {
					        $projectsMailContent .= '<br>&nbsp;&nbsp;&nbsp;&nbsp' . $fwkey . ': ' . $fwvalue;
					    }
					}
					
				} else {
					$responseContext->setErrorMessage('Wystąpił błąd podczas składania zamówienia. Spróbuj ponownie, bądź skonaktuj się z nami telefonicznie.');
					$this->_daoRepository->getTransactionUserDAO()->delete($transactionUser);
					$this->_daoRepository->getTransactionDAO()->delete($transaction);
					\Point7_WebApp::getLogger('error')->error('Error during store transaction item (project): ' . print_r($basket,1));
					$this->_exit();
				}
			} elseif (!empty($basket['eid'])) {
				if ($extrasMain = $this->_daoRepository->getExtrasFinder()->getExtrasById($basket['eid'])) {
					$transactionItem->setType('extras');
					$description = $extrasMain->getName();
					$propsExtras['extrasId'] = $basket['eid'];
					
					if (!empty($basket['epid'])) {
						$project4Extras = $this->_daoRepository->getProjectFinder(null)->getById($basket['epid'], true, false);
						$props['projectIdForExtras'] = $basket['epid'];
						$name = $project4Extras->getSymbolAlpha() . ' ' . $project4Extras->getSymbolNum();
						$projectName = ($project4Extras->getName()) ? $project4Extras->getName() . ' ' . $name : $name;
						$description .= ' dla projektu ' . $projectName;
					}
					
					$projectsMailContent .= '<br><br>* ' . $description;
					$projectsMailContent .= '<br>&nbsp;&nbsp;&nbsp;- cena: <b>' . $basket['price'] . '</b> zł';
					
					$transactionItem->setProps(json_encode($propsExtras));
					$transactionItem->setDescription($description);
				} else {
					$responseContext->setErrorMessage('Wystąpił błąd podczas składania zamówienia. Spróbuj ponownie, bądź skonaktuj się z nami telefonicznie.');
					$this->_daoRepository->getTransactionUserDAO()->delete($transactionUser);
					$this->_daoRepository->getTransactionDAO()->delete($transaction);
					\Point7_WebApp::getLogger('error')->error('Error during store transaction item (extras): ' . print_r($basket,1));
					$this->_exit();
				}
			}
			
			try {
				$this->_daoRepository->getTransactionItemDAO()->store($transactionItem);
			} catch (\Exception $e) {
				$responseContext->setErrorMessage('Wystąpił błąd podczas składania zamówienia. Spróbuj ponownie, bądź skonaktuj się z nami telefonicznie.');
				$this->_daoRepository->getTransactionUserDAO()->delete($transactionUser);
				$this->_daoRepository->getTransactionDAO()->delete($transaction);
				\Point7_WebApp::getLogger('error')->error(
					\StudioAtrium\Application\Exception\Helper::formatLoggerMessage($e, 'Error during store transaction item')
				);
				$this->_exit();
			}
		}
		
		//send emails
		if ($mailerConfig = $appContext->getConfigParam('mailer.sender')) {
				
			$paymentType = '<br>Sposób płatności: ' . $paymentMethod;
			$paymentInfo = '';
			
			if($formData['payment_type'] == 'transfer') {
				$paymentInfo = '<br>Nr konta: PKO BP O/Bielsko-Biała 81 1020 1390 0000 6102 0134 5404';
				$paymentInfo .= '<br>W tytule przelewu prosimy podać nazwę projektu lub dodatku.';
				$paymentInfo .= '<br>Zakupione towary zostaną wysłane po zaksięgowaniu wpłaty.';
			}
			
			$deliveryAndDiscount = '<br><br>Sposób wysyłki: ' . $deliveryMethod;
				
			if (!empty($propsToEmail['promoCode']) && !empty($propsToEmail['discountValue'])) {
			    $deliveryAndDiscount .= '<br>Kod promocyjny: <b>' . $propsToEmail['promoCode'] . '</b>';
			    $deliveryAndDiscount .= '<br>Przyznany rabat: <b>' . $propsToEmail['discountValue'] . '</b> ';
			    if ($propsToEmail['discountType'] == 'percent') {
					$deliveryAndDiscount .= '%';
				} else {
					$deliveryAndDiscount .= 'zł';
				}
			}
				
			if (!empty($formData['registerUserDiscount']) && $appContext->getUser()) {
			    $deliveryAndDiscount .= '<br>Przyznany rabat za rejestrację konta: <b>' . $formData['registerUserDiscount'] . '</b> zł';
			}
				
			$deliveryAndDiscount .= '<br><br><span style="color: #cc1000;">Razem do zapłaty: <b>' . $formData['total'] . '</b> zł</span>';
		
			$content = 'Twoje zamówienie w serwisie studioatrium.pl zostało złożone.';
			
			if($formData['payment_type'] == 'cash') {
				$content .= '<br>Nasz konsultant wkrótce wyśle do Ciebie wiadomość e-mail z potwierdzeniem złożonego zamówienia i numerem listu przewozowego. Oto szczegóły zamówienia:';
			}
			
			$content .= '<br><br>Numer zamówienia: <strong style="font-weight: 700;">'. $transaction->getId() . '</strong>' . '<br>Zawartość:';
			$content .= $projectsMailContent;
			$content .= '<br><p style="border-top: 1px solid #cc1000; padding: 5px; padding-top: 10px; vertical-align: middle; line-height: 34px;">Dane do faktury:</p>';
			$content .= $userDataForEmail;
			$content .= $paymentType;
			$content .= $paymentInfo;
			$content .= $deliveryAndDiscount;
			$content .= '<br><br>Dziękujemy za złożone zamówienie!';
				
			$smartyWrapper = new \Point7_WebApp_View_Smarty3_Wrapper();
			$smartyWrapper->template_dir = $appContext->getConfigParam('views.smarty.template_dir');
			$smartyWrapper->compile_dir = $appContext->getConfigParam('views.smarty.compile_dir');
			
			$smartyWrapper->assign('content', $content);
			$smartyWrapper->assign('transaction', $transaction->getId());
			$html = $smartyWrapper->render('Order/EmailOrder.tpl');
			
			
			if ($this->_sendMail($userData['email'], 'Zamówienie nr: ' . $transaction->getId() . ' w studioatrium.pl', $html, $mailerConfig, true)) {
				$responseContext->setForwardParam('e', 1);
			} else {
				$responseContext->setForwardParam('e', 0);
			}
				
			$content2 = 'Nowe zamówienie na studioatrium.pl<br><br>Zawartość:';
			$content2 .= $projectsMailContent;
			$content2 .= '<br><hr><br>Dane do faktury:<br><br>';
			$content2 .= $userDataForEmail;
			$content2 .= $paymentType;
			$content2 .= $deliveryAndDiscount;
				
			$this->_sendMail($appContext->getConfigParam('mailer.order'), 'Zamówienie nr: ' . $transaction->getId(), $content2, $mailerConfig, true);
			
			if($formData['payment_type'] == 'online') {
				
				//clear basket
// 				setcookie('SA_basket', null, -1, '/');
// 				$session->remove('basketUserData');
// 				$session->remove('basketFormData');
				
				$this->_forward('order', 'online_payment');
			}
			
		
		} else {
			\Point7_WebApp::getLogger('error')->error('Error during sending e-mail - no mailer config');
			$responseContext->setForwardParam('e', 0);
		}
			
		//clear basket
// 		setcookie('SA_basket', null, -1, '/');
// 		$session->remove('basketUserData');
// 		$session->remove('basketFormData');
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doFinish(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		if ($request->isValid()) {
			$transaction = $this->_daoRepository->getTransactionFinder()->getById($request->getParam('i'));
			if ($transaction && $transaction->getStatus() == \StudioAtrium\Entity\Transaction::STATUS_NEW) {
				$responseContext->set('clear', 1);
				$transaction->setStatus(\StudioAtrium\Entity\Transaction::STATUS_AWAITING);
				$this->_daoRepository->getTransactionDAO()->store($transaction);
				
				$responseContext->set('transaction', $transaction);
				$responseContext->set('deliveryDate', Date('Y-m-d', strtotime("+3 days")));
			} else {
				$responseContext->setErrorMessage('Zamówienie o numerze ' . $request->getParam('i') . ' nie istnieje bądź jest już w trakcie realizacji.');
				$this->_exit();
			}
			
			$session = \Point7_WebApp::getSession();
			
			$formData = json_decode($session->get('basketFormData'), 1);
			
			$responseContext->set('total', $formData['total']);
			
			//clear basket
			setcookie('SA_basket', null, -1, '/');
			$session->remove('basketUserData');
			$session->remove('basketFormData');
		}
	}
	
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
    public function doOnlinePayment(
        \Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
    ) {
        //transaction
        $transaction = $this->_daoRepository->getTransactionDAO()->get($request->getParam('i'));
        $props = $transaction->getProps(true) or $props = array();
        
        //sndbox|production settings
        if($appContext->getConfigParam('przelewy24.test_mode') == 1) {
            $url = $appContext->getConfigParam('przelewy24.sandbox_api_url');
            $salt = $appContext->getConfigParam('przelewy24.sandbox_salt');
        } else {
            $url = $appContext->getConfigParam('przelewy24.api_url');
            $salt = $appContext->getConfigParam('przelewy24.salt');
        }

        $merchantId = $appContext->getConfigParam('przelewy24.user_id');
        $sessionId = $props['sid'];
        $amount = $props['totalPayment'] * 100;

        //authentication
        $credentials = $appContext->getConfigParam('przelewy24.user_id') . ':' . $appContext->getConfigParam('przelewy24.api_key');
        
        
        if($request->getParam('mode') == 'register') {

            $transactionUser = $this->_daoRepository->getTransactionUserDAO()->get($transaction->getTransactionUserId());
            $urlReturn = $appContext->getConfigParam('domain.fullurl') . 'index.php?module=order&action=finish&i=' . $request->getParam('i') . '&e=' . $request->getParam('e');
            $urlStatus = $appContext->getConfigParam('domain.fullurl') . 'index.php?module=order&action=online_payment&i=' . $request->getParam('i') . '&mode=verify';
            
            //CRC
            $signString = '{"sessionId":"' . $sessionId . '","merchantId":' . $merchantId . ',"amount":' . $amount . ',"currency":"PLN","crc":"' . $salt . '"}';
            $sign = hash('sha384', $signString);
            
            
            $data = array(
                "merchantId" => $merchantId,
                "posId" => $merchantId,
                "sessionId" => $sessionId,
                "amount" => $amount,
                "currency" => "PLN",
                "description" => "Zamówienie nr " . $request->getParam('i'),
                "email" => $transactionUser->getEmail(),
                "client" => $transactionUser->getName() . " " . $transactionUser->getSurname(),
                "address" => $transactionUser->getAddress(),
                "zip" => $transactionUser->getPostCode(),
                "city" => $transactionUser->getCity(),
                "country" => "PL",
                "phone" => $transactionUser->getPhone(),
                "language" => "pl",
                "method" => 0,
                "urlReturn" => $urlReturn,
                "urlStatus" => $urlStatus,
                "sign" => $sign,
                "encoding" => "UTF-8"
            );

            
            if($curl = curl_init($url . '/api/v1/transaction/register')) {
//                 curl_setopt($curl, CURLOPT_URL, $url);
//                 curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_USERPWD, $credentials);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                
                if($resp = curl_exec($curl)) {

                    curl_close($curl);
                    
                    $result = json_decode($resp);

                    if($result->responseCode === 0)
                    {
                        \Point7_WebApp::getLogger()->info('Przelewy24: Transakcja została zarejestrowana poprawnie, id: ' . $request->getParam('i'));
                    } else {
                        $this->_sendOnlinePaymentErrorEmail($appContext, $request->getParam('i'));
                        \Point7_WebApp::getLogger('error')->error('Przelewy24: Błędna rejestracja transakcji, id: ' . $request->getParam('i') . ', code: ' . $result->responseCode);
                        
                        $this->_forward('order', 'error');
                    }
                    
                    $token = $result->data->token;
                    header("Location: " . $url . "/trnRequest/". $token);
                    
                } else {
                    curl_close ($curl);
                    \Point7_WebApp::getLogger('error')->error('Przelewy24: Błędna rejestracja transakcji, id: ' . $request->getParam('i') . '. Curl exec error');
                }

            } else {
                \Point7_WebApp::getLogger('error')->error('Przelewy24: Błędna rejestracja transakcji, id: ' . $request->getParam('i') . '. Curl init error');
            }
            

        } else {
            
            //Get orderId from Przelewy24
            $orderInfo = $this->getP24OrderInfo($request->getParam('i'), $sessionId, $credentials, $url);
            
            
            
            //Verify transaction
            if(isset($orderInfo['status']) && $orderInfo['status'] == 'ok') {
                
                if(in_array($_SERVER['REMOTE_ADDR'], array('91.216.191.181', '91.216.191.182', '91.216.191.183', '91.216.191.184', '91.216.191.185', '5.252.202.255', '5.252.202.254', '20.215.81.124'))) {
                    
                    $url .= "/api/v1/transaction/verify";
                    
                    $orderId = $orderInfo['result']->data->orderId;
                    
                    //CRC
                    $signString = '{"sessionId":"' . $sessionId . '","orderId":' . $orderId . ',"amount":' . $amount . ',"currency":"PLN","crc":"' . $salt . '"}';
                    $sign = hash('sha384', $signString);
                    
                    $data = array
                    (
                        "merchantId" => $merchantId,
                        "posId" => $merchantId,
                        "sessionId" => $sessionId,
                        "amount" => $amount,
                        "currency" => "PLN",
                        "orderId" => $orderId,
                        "sign" => $sign
                    );
                    
                    
                    if($curl = curl_init($url)) {
                        
                        curl_setopt($curl, CURLOPT_URL, $url);
                        curl_setopt($curl, CURLOPT_HTTPHEADER, array('X-HTTP-Method-Override: PUT'));
                        curl_setopt($curl, CURLOPT_USERPWD, $credentials);
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        
                        
                        if($resp = curl_exec($curl)) {
                            
                            $result = json_decode($resp);
                            
                            if($result->responseCode === 0)
                            {
                                $this->_sendOnlinePaymentOKEmail($appContext, $request->getParam('i'));
                                \Point7_WebApp::getLogger()->info('Przelewy24: Transakcja została zweryfikowana poprawnie, id: ' . $request->getParam('i') . ' | p24ID: ' . $orderId);
                            } else {
                                $this->_sendOnlinePaymentFailEmail($appContext, $request->getParam('i'));
                                \Point7_WebApp::getLogger('error')->error('Przelewy24: Błędna weryfikacja transakcji, id: ' . $request->getParam('i') . ' | p24ID: ' . $orderId . ' | error code ' . $result->responseCode);
                                
                                $this->_forward('order', 'error');
                            }

                        } else {
                            curl_close ($curl);
                            \Point7_WebApp::getLogger('error')->error('Przelewy24: Błędna weryfikacja transakcji, id: ' . $request->getParam('i') . ' | p24ID: ' . $orderId .  '. Curl exec error');
                        }
                        
                    } else {
                        \Point7_WebApp::getLogger('error')->error('Przelewy24: Błędna weryfikacja transakcji, id: ' . $request->getParam('i') . ' | p24ID: ' . $orderId . '. Curl init error');
                    }
                    
                } else {
                    \Point7_WebApp::getLogger('error')->error('Przelewy24: Błędna weryfikacja transakcji, id: ' . $request->getParam('i') . ' | p24ID: ' . $orderId . ' - adres spoza zakresu');
                }
            }
        }
	}
	
	
	private function getP24OrderInfo($transactionId, $sessionId, $credentials, $url) 
	{
    	//Get orderId from Przelewy24
    	$url .= "/api/v1/transaction/by/sessionId/" . $sessionId;
    	
    	
    	if($curl = curl_init($url)) {
    	    curl_setopt($curl, CURLOPT_URL, $url);
    	    curl_setopt($curl, CURLOPT_USERPWD, $credentials);
    	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    	    
    	    
    	    if($resp = curl_exec($curl)) {
    	        
    	        curl_close($curl);
    	        
    	        $result = json_decode($resp);
    	        
    	        if($result->responseCode === 0)
    	        {
    	            \Point7_WebApp::getLogger()->info('Przelewy24: Odczytano orderId, id: ' . $transactionId . ' | p24ID: ' . $result->data->orderId);
    	            return array('status' => 'ok', 'result' => $result);
    	        } else {
    	            \Point7_WebApp::getLogger('error')->error('Przelewy24: Bład odczytu orderId, id: ' . $transactionId . ' | error code: ' . $result->responseCode);
    	            return array('status' => 'fail', 'result' => $result);
    	        }
    	        
    	    } else {
    	        curl_close ($curl);
    	        \Point7_WebApp::getLogger('error')->error('Przelewy24: Bład odczytu orderId, id: ' . $transactionId . '. Curl exec error');
    	        return array('status' => 'error');
    	    }
    	} else {
    	    \Point7_WebApp::getLogger('error')->error('Przelewy24: Bład odczytu orderId, id: ' . $transactionId . '. Curl init error');
    	    return array('status' => 'error');
    	}
	}
	
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function _doOnlinePayment(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {

		$P24 = new \Przelewy24(
			$appContext->getConfigParam('przelewy24.user_id'),
			$appContext->getConfigParam('przelewy24.user_id'),
 			$appContext->getConfigParam('przelewy24.salt')
		);
		
		$transaction = $this->_daoRepository->getTransactionDAO()->get($request->getParam('i'));
		$props = $transaction->getProps(true) or $props = array();
		
		$data = array();
		
		if(isset($props['sid'])) {
			$data['p24_session_id'] = $props['sid'];
		} else {
			//WYGENEROWAĆ NOWY sid zapisać itd?
		}
		
		$data['p24_amount'] = $props['totalPayment'] * 100;
		$data['p24_currency'] = 'PLN';
		
		$data['p24_sign'] = md5($data['p24_session_id'] . '|' . $appContext->getConfigParam('przelewy24.user_id') . '|' . $data['p24_amount'] . '|PLN|' . $appContext->getConfigParam('przelewy24.salt'));
		
		if($request->getParam('mode') == 'register') {
			$transactionUser = $this->_daoRepository->getTransactionUserDAO()->get($transaction->getTransactionUserId());

			$data['p24_description'] = 'Zamówienie nr ' . $request->getParam('i');
			$data['p24_email'] = $transactionUser->getEmail();
			$data['p24_client'] = $transactionUser->getName() . ' ' . $transactionUser->getSurname();
			$data['p24_address'] = $transactionUser->getAddress();
			$data['p24_zip'] = $transactionUser->getPostCode();
			$data['p24_city'] = $transactionUser->getCity(); 
			$data['p24_country'] = 'PL';
			$data['p24_phone'] = $transactionUser->getPhone();
			$data['p24_language'] = 'pl';
			$data['p24_encoding'] = 'UTF-8';
			$data['p24_url_status'] = $appContext->getConfigParam('domain.fullurl') . 'index.php?module=order&action=online_payment&i=' . $request->getParam('i') . '&mode=verify';
			$data['p24_url_return'] = $appContext->getConfigParam('domain.fullurl') . 'index.php?module=order&action=finish&i=' . $request->getParam('i') . '&e=' . $request->getParam('e');

			foreach($data as $key => $value) $P24->addValue($key, $value);

			$result = $P24->trnRegister(true);
			
			\Point7_WebApp::getLogger()->info('Przelewy24: mode register: ' . $request->getParam('i') .  ' | ' . print_r($result, true));
			
			if(isset($result["error"]) && $result["error"] === 0)
			{
				\Point7_WebApp::getLogger()->info('Przelewy24: Transakcja została zarejestrowana poprawnie, id: ' . $request->getParam('i'));
			} else {
			    $this->_sendOnlinePaymentErrorEmail($appContext, $request->getParam('i'));
				\Point7_WebApp::getLogger('error')->error('Przelewy24: Błędna rejestracja transakcji, id: ' . $request->getParam('i') . ' ' . $result["error"]);
				
				$this->_forward('order', 'error');
			}
		} else {
			$rawParams = $request->getRawParams();
			
			$data['p24_order_id'] = $rawParams['p24_order_id'];
			foreach($data as $key => $value) $P24->addValue($key, $value);
			
			// adresy przelewy24
			if(in_array($_SERVER['REMOTE_ADDR'], array('91.216.191.181', '91.216.191.182', '91.216.191.183', '91.216.191.184', '91.216.191.185', '5.252.202.255', '5.252.202.254', '20.215.81.124'))) {
				$result = $P24->trnVerify();
				
				\Point7_WebApp::getLogger()->info('Przelewy24: mode verify: ' . $request->getParam('i') . ' | p24ID: ' . $rawParams['p24_order_id'] . ' | ' . print_r($result, true));
				
				
				if(isset($result["error"]) && $result["error"] == 0)
				{
					$this->_sendOnlinePaymentOKEmail($appContext, $request->getParam('i'));
					\Point7_WebApp::getLogger()->info('Przelewy24: Transakcja została zweryfikowana poprawnie, id: ' . $request->getParam('i') . ' | p24ID: ' . $rawParams['p24_order_id']);
				} else {
					$this->_sendOnlinePaymentFailEmail($appContext, $request->getParam('i'));
					\Point7_WebApp::getLogger('error')->error('Przelewy24: Błędna weryfikacja transakcji, id: ' . $request->getParam('i') . ' | p24ID: ' . $rawParams['p24_order_id']);
					
					$this->_forward('order', 'error');
				}
			} else {
				\Point7_WebApp::getLogger('error')->error('Przelewy24: Błędna weryfikacja transakcji, id: ' . $request->getParam('i') . ' - adres spoza zakresu');
			}
		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doError(
	    \Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
    ) { }
	
	
	private function _checkAdwordsCookie($transId, $phoneEmail = null)
	{
		if (!empty($_COOKIE['adw'])) {
			$clickCounter = unserialize($_COOKIE['adw']);
	
			$min = 0;
			$campaign = 0;
			$start = null;
			$clickSum = 0;
			foreach ($clickCounter as $campaignNo => $click) {
				if (strtotime($click['first']) < $min || $min == 0) {
					$min = strtotime($click['first']);
					$start = $click;
					$campaign = $campaignNo;
				}
				$clickSum += $click['amount'];
			}
	
			$adwordSale = new \StudioAtrium\Entity\Adwords\Sales();
			$adwordSale->setSaleDate(date('Y-m-d'));
			$adwordSale->setClickDate($start['first']);
			$adwordSale->setClickAmount($clickSum);
			$adwordSale->setCampaignNo($campaign);

			$detect = new \Mobile_Detect;
	
			if ($detect->isMobile()) {
				$adwordSale->setIsMobile(1);
			} elseif ($detect->isTablet()) {
				$adwordSale->setIsTablet(1);
			} else {
				$adwordSale->setisDesktop(1);
			}
			
			if ($phoneEmail) {
				$clickCounter[9999] = $phoneEmail;
			}
	
			$adwordSale->setTransactionId($transId);
			$adwordSale->setProps(json_encode($clickCounter));
	
			$this->_daoRepository->getAdwordsSalesDAO()->store($adwordSale);
		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doConfirm(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {

		if ($request->isValid()) {
			$params = new \Point7_AbstractDAO_FinderParams();
			$params->addFilter('hash', $request->getParam('hash'));
			
			if (($result = $this->_daoRepository->getTransactionPhoneDAO()->find($params)) && $result->count() == 1) {
				if ($result[0]->getStatus() == \StudioAtrium\Entity\Transaction\Phone::STATUS_SEND) {
					$result[0]->setStatus(\StudioAtrium\Entity\Transaction\Phone::STATUS_CLICKED);
					
					$this->_daoRepository->getTransactionPhoneDAO()->store($result[0]);
					
					$this->_checkAdwordsCookie($result[0]->getId(), $result[0]->getEmail());
					
					
				} else {
					$responseContext->setErrorMessage('Twoje zamówienie zostało już potwierdzone, dziękujemy.');
					$this->_exit();
				}
			} else {
				$responseContext->setErrorMessage('Wystąpił problem z potwierdzeniem zamówienia. Zamówienie nie istnieje w naszym systemie. Skontaktuj się z nami telefonicznie.');
				$this->_exit();
			}
			
		} else {
			$responseContext->setErrorMessage('Wystąpił problem z potwierdzeniem zamówienia. Skontaktuj się z nami telefonicznie.');
			$this->_exit();
		}
	}
	
	private function _sendOnlinePaymentOKEmail(WWW\AppContext $appContext, $transId)
	{
		if ($mailerConfig = $appContext->getConfigParam('mailer.sender')) {
			
			$content = 'Potwierdzenie płatności online za zamówienie nr ' . $transId;
			$content .= '<br><br>Płatność zrealizowana - należy się upewnić w panelu Płatności24<br><br>';
			
			$this->_sendMail($appContext->getConfigParam('mailer.order'), 'Potwierdzenie płatności online - zamówienie nr: ' . $transId, $content, $mailerConfig, true);
		} else {
			\Point7_WebApp::getLogger('error')->error('Error during sending online payment confirmation e-mail - no mailer config');
		}
	}
	
	private function _sendOnlinePaymentFailEmail(WWW\AppContext $appContext, $transId)
	{
		if ($mailerConfig = $appContext->getConfigParam('mailer.sender')) {
				
			$content = 'Brak potwierdzenia płatności online za zamówienie nr ' . $transId;
			$content .= '<br><br>Płatność nie została zrealizowana - należy się upewnić w panelu Płatności24<br><br>';
				
			$this->_sendMail($appContext->getConfigParam('mailer.order'), 'Brak potwierdzenia płatności online - zamówienie nr: ' . $transId, $content, $mailerConfig, true);
		} else {
			\Point7_WebApp::getLogger('error')->error('Error during sending online payment confirmation e-mail - no mailer config');
		}
	}
	
	private function _sendOnlinePaymentErrorEmail(WWW\AppContext $appContext, $transId)
	{
	    if ($mailerConfig = $appContext->getConfigParam('mailer.sender')) {
	        
	        $content = 'Nie udało się zarejestrować płatności online za zamówienie nr ' . $transId;
	        $content .= '<br><br>Płatność nie została zrealizowana. Nie udało się zarejestrować płatności.<br><br>';
	        
	        $this->_sendMail($appContext->getConfigParam('mailer.order'), 'Brak rejestracji płatności online - zamówienie nr: ' . $transId, $content, $mailerConfig, true);
	    } else {
	        \Point7_WebApp::getLogger('error')->error('Error during sending online payment confirmation e-mail - no mailer config');
	    }
	}
}
