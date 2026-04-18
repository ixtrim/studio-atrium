<?php

/* $Id: Index.php 762 2013-04-03 11:55:02Z radek $ */

namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\WWW;

class Catalog extends WWW\AbstractModule 
{
	/**
	 * @see \Point7_WebApp_Module_Abstract::_initAction()
	 */
	public function _initAction($action,\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext)
	{
		parent::_initAction($action, $request, $appContext, $responseContext);
	
		if (!$request->isValid()) {
			$responseContext->set('error', 'Brak wymaganych parametrów.');
			
			\Point7_WebApp::getLogger('notfound')->error(
				\StudioAtrium\Application\Exception\Helper::format404Message('Błąd ogólny', 'Catalog', $action)
			);
			
			$this->_exit();
		}
		
		$responseContext->set('isPayAvailable', \Point7_WebApp::getConfigParam('helpers.pay_catalog_available'));
	}
	
		
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doForm(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
	    $user = $appContext->getUser();
	    
	    //if($user) {
        //    $responseContext->set('description', $this->_daoRepository->getDocumentFinder()->getByCharId('catalog', \StudioAtrium\Entity\Document::DOCTYPE_PAGE)->current());
	    //} else {
	        $responseContext->set('description', $this->_daoRepository->getDocumentFinder()->getByCharId('catalog2', \StudioAtrium\Entity\Document::DOCTYPE_PAGE)->current());
	    //}
		$responseContext->set('staticDocs', \Point7_WebApp::getConfigParam('static.documents'));
	}
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doPayForm(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$responseContext->set('description', $this->_daoRepository->getDocumentFinder()->getByCharId('pla_cat', \StudioAtrium\Entity\Document::DOCTYPE_PAGE)->current());
		$responseContext->set('staticDocs', \Point7_WebApp::getConfigParam('static.documents'));
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doOrder(
	\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
	
		$transactionUser = new \StudioAtrium\Entity\Transaction\User();
		$transactionUser->setName($request->getParam('fname'));
		$transactionUser->setSurname($request->getParam('lname'));
		$transactionUser->setType(\StudioAtrium\Entity\Transaction\User::TYPE_INDIVIDUAL);
		$transactionUser->setAddress($request->getParam('street') . ' ' . $request->getParam('number'));
		$transactionUser->setPostCode($request->getParam('postalcode'));
		$transactionUser->setCity($request->getParam('city'));
		$transactionUser->setPhone($request->getParam('phone'));
		$transactionUser->setEmail($request->getParam('email'));
		
		$user = $appContext->getUser();
		
		if($user) {
			$transactionUser->setUserId($user->getId());
		}
			
		$transactionBuilder = $this->_daoRepository->getTransactionBuilder();
		$transactionBundle = $transactionBuilder->create($transactionUser);
		// 2017-07-07 - wywalamy koniecznosc potwierdzania zamowienia katalogu
		//$transactionBundle->setStatus(\StudioAtrium\Entity\Transaction::STATUS_AWAITING);
		$transactionBundle->setStatus(\StudioAtrium\Entity\Transaction::STATUS_NEW);
			
		$item = new \StudioAtrium\Entity\Transaction\Item\Catalog();
		$item->setAmount(1);
		$item->setNetPrice(0);
		$item->setGrossPrice(0);
		
		$transactionBundle->addItem($item);
			
		try {
			$transId = $transactionBuilder->store($transactionBundle);
				
			/* zapisanie usera do newslettera */
			$this->_add2Newsletter($transactionUser->getEmail());
			
			\Point7_WebApp::getLogger()->info('Zamówienie katalogu|id: ' . $transId . '|email: ' . $transactionUser->getEmail());
			
			/* wysyłanie maila z informacją o zamówieniu */
			$this->_sendEmail($request, $appContext, $transactionUser, $transId);
				
		} catch (\Exception $e) {
			\Point7_WebApp::getLogger('error')->error('Nie udało się zamówić katalogu ' . print_r($e->getMessage(), 1));
		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doPayOrder(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {

		$transactionUser = new \StudioAtrium\Entity\Transaction\User();
		$transactionUser->setName($request->getParam('fname'));
		$transactionUser->setSurname($request->getParam('lname'));
		$transactionUser->setType(\StudioAtrium\Entity\Transaction\User::TYPE_INDIVIDUAL);
		$transactionUser->setAddress($request->getParam('street') . ' ' . $request->getParam('number'));
		$transactionUser->setPostCode($request->getParam('postalcode'));
		$transactionUser->setCity($request->getParam('city'));
		$transactionUser->setPhone($request->getParam('phone'));
		$transactionUser->setEmail($request->getParam('email'));

		$user = $appContext->getUser();

		if($user) {
			$transactionUser->setUserId($user->getId());
		}
			
		$transactionBuilder = $this->_daoRepository->getTransactionBuilder();
		$transactionBundle = $transactionBuilder->create($transactionUser);
		$transactionBundle->setStatus(\StudioAtrium\Entity\Transaction::STATUS_NEW);
			
		$item = new \StudioAtrium\Entity\Transaction\Item\PayCatalog();
		$item->setAmount(1);
		$item->setNetPrice($appContext->getConfigParam('prices.catalog'));
		$item->setGrossPrice($appContext->getConfigParam('prices.catalog'));

		$transactionBundle->addItem($item);
			
		try {
			$transId = $transactionBuilder->store($transactionBundle);

			/* zapisanie usera do newslettera */
			$this->_add2Newsletter($transactionUser->getEmail());
				
			\Point7_WebApp::getLogger()->info('Zamówienie płatnego katalogu|id: ' . $transId . '|email: ' . $transactionUser->getEmail());

			/* wysyłanie maila z informacją o zamówieniu */
			$this->_sendPayEmail($request, $appContext, $transactionUser, $transId);
			
			/* wysyłanie maila z informacją o zamówieniu */
			$this->_sendInfoEmail($request, $appContext, $transactionUser, $transId);
			
			$responseContext->setForwardParam('ref', 'platny');

		} catch (\Exception $e) {
			\Point7_WebApp::getLogger('error')->error('Nie udało się zamówić katalogu ' . print_r($e->getMessage(), 1));
		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doInfo(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
	
	}
	
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doOnline(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
	
	}

	
	/**
	 * Aktywacja zamówienia
	 *
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doActivate(
			\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {

		$transactionBuilder = $this->_daoRepository->getTransactionBuilder();
		$result = $transactionBuilder->activateTransaction($request->getParam('trans_id'), $request->getParam('email'));

		$transactionFinder = $this->_daoRepository->getTransactionFinder();
		$transaction = $transactionFinder->getById($result['trans_id']);

		if ($result['status'] == true) {

			if ($transaction instanceof \StudioAtrium\Entity\Transaction) {

				$this->_sendActivateInfoEmail($appContext, $result['trans_id'], $result['email']);
				$responseContext->set('result', 'ok');

				\Point7_WebApp::getLogger()->info('Potwierdzenie zamówienia katalogu|id: ' . $result['trans_id'] . '|email: ' . $result['email']);

			} else {
				$responseContext->set('result', 'failed');
			}
		} else {
			$responseContext->set('result', 'failed');
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
	
	
	/**
	 * Wyślij wiadomość z informacją o zamówieniu
	 *
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \StudioAtrium\Entity\Transaction\User $user
	 * @param Integer $transId
	 *
	 */
	private function _sendEmail(\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, \StudioAtrium\Entity\Transaction\User $user, $transId)
	{
		$smartyWrapper = new \Point7_WebApp_View_Smarty3_Wrapper();
		$smartyWrapper->template_dir = $appContext->getConfigParam('views.smarty.template_dir');
		$smartyWrapper->compile_dir = $appContext->getConfigParam('views.smarty.compile_dir');
		
		$smartyWrapper->assign('user', $user->toArray());
		//http:
		$smartyWrapper->assign('link', $appContext->getConfigParam('domain.fullurl') . 'katalog/potwierdzenie,' .
				md5($transId) . ',' .
		        ns_str2bigint($user->getEmail()) . '.html');
		
		$html = $smartyWrapper->render('Catalog/EmailFreeUser.tpl');
		
		$this->_sendMail(
				$user->getEmail(),
				'Zamówienie katalogu projektów Studio Atrium',
				$html,
				$appContext->getConfigParam('mailer.sender'),
				true
		);
	}
	
	
	/**
	 * Wyślij wiadomość z informacją o zamówieniu
	 *
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \StudioAtrium\Entity\Transaction\User $user
	 * @param Integer $transId
	 *
	 */
	private function _sendPayEmail(\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, \StudioAtrium\Entity\Transaction\User $user, $transId)
	{
		$smartyWrapper = new \Point7_WebApp_View_Smarty3_Wrapper();
		$smartyWrapper->template_dir = $appContext->getConfigParam('views.smarty.template_dir');
		$smartyWrapper->compile_dir = $appContext->getConfigParam('views.smarty.compile_dir');
	
		$smartyWrapper->assign('user', $user->toArray());
		$smartyWrapper->assign('price', $appContext->getConfigParam('prices.catalog'));
		$smartyWrapper->assign('transaction_id', $transId);
	
		$html = $smartyWrapper->render('Catalog/EmailPayUser.tpl');
	
		$this->_sendMail(
			$user->getEmail(),
			'Zamówienie płatnego katalogu projektów Studio Atrium',
			$html,
			$appContext->getConfigParam('mailer.sender'),
			true
		);
	}
	
	
	/**
	 * Wyślij wiadomość z informacją o zamówieniu do operatorta
	 *
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \StudioAtrium\Entity\Transaction\User $user
	 * @param Integer $transId
	 *
	 */
	private function _sendInfoEmail(\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, \StudioAtrium\Entity\Transaction\User $user, $transId)
	{
		$smartyWrapper = new \Point7_WebApp_View_Smarty3_Wrapper();
		$smartyWrapper->template_dir = $appContext->getConfigParam('views.smarty.template_dir');
		$smartyWrapper->compile_dir = $appContext->getConfigParam('views.smarty.compile_dir');
	
		$smartyWrapper->assign('user', $user->toArray());
		$smartyWrapper->assign('transaction_id', $transId);
	
		$html = $smartyWrapper->render('Catalog/EmailPayNotifyOperator.tpl');
	
		$this->_sendMail(
			$appContext->getConfigParam('mailer.notify2'),
			'Zamówienie płatnego katalogu projektów Studio Atrium',
			$html,
			$appContext->getConfigParam('mailer.sender'),
			true
		);
	}
	
	
	/**
	 * Wyślij wiadomość z informacją o aktywacji zamówienia
	 *
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param integer $transId
	 * @param string $email
	 *
	 */
	private function _sendActivateInfoEmail(WWW\AppContext $appContext, $transId, $email)
	{
		$smartyWrapper = new \Point7_WebApp_View_Smarty3_Wrapper();
		$smartyWrapper->template_dir = $appContext->getConfigParam('views.smarty.template_dir');
		$smartyWrapper->compile_dir = $appContext->getConfigParam('views.smarty.compile_dir');
		
		$html = $smartyWrapper->render('Catalog/EmailCatalogActivated.tpl');
		
		$this->_sendMail(
				$email,
			'Potwierdzenie zamówienia katalogu projektów Studio Atrium',
			$html,
			$appContext->getConfigParam('mailer.sender'),
			true
		);
	}
}
