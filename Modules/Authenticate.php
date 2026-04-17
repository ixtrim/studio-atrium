<?php

/* $Id: Authenticate.php 762 2013-04-03 11:55:02Z radek $ */

namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\WWW\AbstractModule;
use StudioAtrium\Application\WWW\AppContext;
use StudioAtrium\Application\WWW\ResponseContext;
use StudioAtrium\Entity\User;


/**
 * Authenticate user
 *
 */
class Authenticate extends AbstractModule {

	/**
	* @var \StudioAtrium\Entity\User\Finder
	*/
	protected $_userFinder = null;

	/**
	* @var \Point7_WebApp_Session
	*/
	protected $_session = null;


	/**
	* @see Packages/7Point/WebApp/Module/Point7_WebApp_Module_Abstract::_initAction()
	*/
	protected function _initAction(
		$action,
		\Point7_WebApp_Request $request,
		AppContext $appContext,
		ResponseContext $responseContext
	) {
		parent::_initAction($action, $request, $appContext, $responseContext);
		$this->_userFinder = $this->_daoRepository->getUserFinder();
		$this->_session = \Point7_WebApp::getSession();
	}


	/**
	 * @param Point7_WebApp_Request $request
	 * @param Point7_WebApp_Context_Application $appContext
	 * @param Point7_WebApp_Context_Response $responseContext
	 */
	public function doLogin(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	){
		if ($appContext->isCommandResultOk('AuthenticateUserCommand')) {
			$this->_exit(false, 'authorized');
		}
		
		if ($request->getType() == 'GET') {
			$this->_forward('Panel');
		}

		// authenticate user
		if (!($request->isValid() && ($loggedUser = $this->_userFinder->authenticate(
			$request->getParam('email'), $request->getParam('password'), $appContext->getSecret())))
		) {
			
			if ($request->isValid() && $checkUser = $this->_userFinder->getByEmail($request->getParam('email'), false)) {
				if ($checkUser->getStatus() != \StudioAtrium\Entity\User::STATUS_ENABLED) {
					$responseContext->setJSONREsponse('feedback' , array('status' => 'fail', 'account_disabled' => true));
					$this->_exit();
				}
			}

			$responseContext->setJSONREsponse('feedback' , array('status' => 'fail'));
			$this->_exit();
		} else {
			if ($loggedUser->getType() != \StudioAtrium\Entity\User::TYPE_USER) {
				$responseContext->setJSONREsponse('feedback' , array('status' => 'fail'));
				$this->_exit();
			}
			
			if ($this->_session->get('user')) {
				$this->_exit(false, 'authorized');
			}

			$this->_session->set('user', $loggedUser);
			
			//remove compare projects cookie
			setcookie("saCom", "", time()-3600);

			$responseContext->setJSONREsponse('feedback' , array('status' => 'ok'));
			$responseContext->setInfoMessage('Zostałeś poprawnie zalogowany. Aby przejść do panelu użytkownika kliknij <a href="/panel">panel</a>');
		}
	}
	
	

	/**
	 * @param Point7_WebApp_Request $request
	 * @param Point7_WebApp_Context_Application $appContext
	 * @param Point7_WebApp_Context_Response $responseContext
	 */
	public function doLoginFromBackend(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	){

		if ($appContext->isCommandResultOk('AuthenticateUserCommand')) {
			$this->_redirect($appContext->getConfigParam('domain.backend'));
		}
		
		if ($request->isValid() && $request->getParam('secret') == $appContext->getSecret() && $_SERVER['REMOTE_ADDR'] == $appContext->getConfigParam('domain.ip')) {
			if ($impersonatedUser = $this->_userFinder->getByHash($request->getParam('hash'))) {
				$impersonatedUser->impersonate($request->getParam('id'));
				$this->_session->clear();
				$this->_session->set('user', $impersonatedUser);
				$this->_redirect($appContext->getConfigParam('domain.www') . '/panel');
			} else {
				$this->_redirect($appContext->getConfigParam('domain.backend'));
			}
		} else {
			$this->_redirect($appContext->getConfigParam('domain.backend'));
		}
	}

	
	/**
	 * @param Point7_WebApp_Request $request
	 * @param Point7_WebApp_Context_Application $appContext
	 * @param Point7_WebApp_Context_Response $responseContext
	 */
	public function doLogoutToBackend(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	){
		
		if (!$this->_session->get('user')->isImpersonated()) {
			$this->_exit();
		}
		
		$this->_session->destroy();
		$this->_session->clear();
		$this->_redirect($appContext->getConfigParam('domain.backend'));
	}
	


	/**
	 * @param Point7_WebApp_Request $request
	 * @param Point7_WebApp_Context_Application $appContext
	 * @param Point7_WebApp_Context_Response $responseContext
	 */
	public function doLogout(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	){
		$this->_session->destroy();
		$this->_session->clear();
		
		
		//remove compare projects cookie
		setcookie("saCom", "", time()-3600);
		$responseContext->setInfoMessage('Zostałeś poprawnie wylogowany.');
	}


	/**
	 * @param Point7_WebApp_Request $request
	 * @param Point7_WebApp_Context_Application $appContext
	 * @param Point7_WebApp_Context_Response $responseContext
	 */
	public function doAuthenticationRequired(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	){
		if ($appContext->isCommandResultOk('AuthenticateUserCommand')) {
			$this->_exit(false, 'authorized');
		} else {
			$responseContext->setErrorMessage('Nie posiadasz dostępu do tej części serwisu. <a href="javascript:" class="login-trigger">Zaloguj się</a>.');
		}
	}

	/**
	 * Authenticate user
	 *
	 * @param string $login
	 * @param string $password
	 * @return \ClStudioAtriumntity\User
	 */
	private function _authenticateUser($login, $password, $secret)
	{
		$this->_session->clear();
		// authenticate user
		if (($user = $this->_userFinder->authenticate($login, $password, $secret))
			&& ($user->getType() == User::TYPE_USER)) {

			$this->_session->set('user', $user);

			return $user;
		} else {
			return false;
		}
	}
}
