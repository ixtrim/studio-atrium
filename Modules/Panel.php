<?php

/* $Id: Authenticate.php 762 2013-04-03 11:55:02Z radek $ */

namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\WWW\AbstractModule;
use StudioAtrium\Application\WWW\AppContext;
use StudioAtrium\Application\WWW\ResponseContext;
use StudioAtrium\Entity\User;
use StudioAtrium\Application\Helper;
use StudioAtrium\Application\Exception;


/**
 * Panel
 *
 */
class Panel extends AbstractModule {

	/**
	* @var \StudioAtrium\Entity\User\Finder
	*/
	protected $_userFinder = null;

	/**
	* @see Packages/7Point/WebApp/Module/Point7_WebApp_Module_Abstract::_initAction()
	*/
	public function _initAction(
		$action,
		\Point7_WebApp_Request $request,
		AppContext $appContext,
		ResponseContext $responseContext
	) {
		parent::_initAction($action, $request, $appContext, $responseContext);
		$this->_userFinder = $this->_daoRepository->getUserFinder();
	}


	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doRegister(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	){
		if ($appContext->isCommandResultOk('AuthenticateUserCommand')) {
			$this->_exit(false, 'authorized');
		}

		/* @var $user \StudioAtrium\Entity\User */
		$user = $props = null;

		if ($request->isValid()) {
			if ($request->getParam('r_password') != $request->getParam('r_repassword')) {
			    $responseContext->setJSONResponse('feedback' , array('status' => 'fail', 'message' => 'Podane hasła nie są identyczne. Wprowadź je ponownie.'));
				$this->_exit();
			}
		
			$user = new User(); //new \StudioAtrium\Entity\User();
			$user->setEmail($request->getParam('r_email'));
			$user->setPassword(User::hashPassword($request->getParam('r_password'), false));
			$user->setName($request->getParam('r_name'));
			$user->setSurname($request->getParam('r_surname'));
			$user->setStatus(User::STATUS_NEW);
			$user->setType(User::TYPE_USER);
			
			$props['newsletter_recipient'] = $request->getParam('r_accept_mailing_register');
			
			$user->setProps(json_encode($props));
		
			$sendActivationLink = true;
// 			if ($this->_session->get('fromLoginWithFacebook')) {
// 				if ($fbUserId = $this->_fbConnect->getUser()) {
// 					$user->setFacebookUid($fbUserId);
// 					$sendActivationLink = false;
// 					$user->setStatus(\SoulFashion\Entity\User::STATUS_ENABLED);
// 				}
// 			}
			
			try {
				$this->_daoRepository->getUserDAO()->store($user);
			
				$responseContext->setInfoMessage("Gratulujemy! Twoje konto zostało założone.");
				//send activation link
				if ($mailerConfig = $appContext->getConfigParam('mailer.sender')) {
					$link = $appContext->getConfigParam('domain.fullurl') . '?module=panel&action=activate&key=' . md5($user->getEmail() . $user->getId());
					
					if($request->getParam('r_relocate')) {
					    $link .= '&relocate=' . $request->getParam('r_relocate');
					}

					if ($sendActivationLink) {
					    
					    $smartyWrapper = new \Point7_WebApp_View_Smarty3_Wrapper();
					    $smartyWrapper->template_dir = $appContext->getConfigParam('views.smarty.template_dir');
					    $smartyWrapper->compile_dir = $appContext->getConfigParam('views.smarty.compile_dir');
					    
					    $smartyWrapper->assign('link', $link);
					    $smartyWrapper->assign('relocate', $request->getParam('r_relocate'));
					    $html = $smartyWrapper->render('Panel/EmailRegisterUser.tpl');
					    
						$this->_sendMail($user->getEmail(), 'Konto zostało utworzone', $html, $mailerConfig, true);
						
// 						if ($this->_sendMail($user->getEmail(), 'Konto zostało utworzone', $content, $mailerConfig, true)) {
// 							$responseContext->setInfoMessage("Na podany adres e-mail została wysłana wiadomość z linkiem aktywującym Twoje konto.");
// 						} else {
// 							$responseContext->setErrorMessage("Nie udało się wysłać wiadomości z linkiem aktywującym Twoje konto. Skontaktuj się w tym celu z nami.");
// 						}
					//login with facebook
					} else {
						//$this->_session->set('user', $user);
						//$this->_session->set('loginWithFacebook', $fbUserId);
					}
					
					$responseContext->setJSONResponse('feedback', array('status' => 'ok'));
				} else {
					\Point7_WebApp::getLogger('error')->error('Error during sending e-mail - no mailer config');
					$responseContext->setJSONResponse('feedback', array('status' => 'fail', 'message' => 'Nie udało się wysłać wiadomości z linkiem służącym aktywacji Twojego konta. Skontaktuj się w tym celu z nami.'));
				}
		
			} catch (\Exception $e) {
				if (($pdoE = $e->getBaseException()) instanceof \PDOException && \ArrayHelper::getOffset($pdoE->errorInfo, 1) == '1062') {
				    $responseContext->setJSONResponse('feedback' , array('status' => 'fail', 'message' => 'Konto nie zostało utworzone. Podany adres e-mail już istnieje w bazie użytkowników serwisu. Podaj inny adres e-mail.'));
				} else {
					\Point7_WebApp::getLogger('error')->error(
						Exception\Helper::formatLoggerMessage($e, 'Error creating user object')
					);
					$responseContext->setJSONResponse('feedback', array('status' => 'fail', 'message' => 'Konto nie zostało utworzone. Wystąpił problem z zapisem danych użytkownika. Spróbuj ponownie bądź skontaktuj się z nami.'));
				}
				$this->_exit();
			}
		} else {
		    $responseContext->setJSONResponse('feedback', array('status' => 'fail', 'message' => 'Konto nie zostało utworzone. Wypełnij wszystkie wymagane pola formularza.'));
			$this->_exit();
		}

	}
	
	
	/**
	 * Reset password form
	 *
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doCheckEmail(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	) {
		if ($request->isValid()) {
			if ($user = $this->_userFinder->getByEmail($request->getParam('email'), false)) {
				$responseContext->setJSONResponseData(
						array('status' => 'fail',
								'message' => 'Zarejestrowano już użytkownika z takim e-mailem'
						)
				);

				$this->_exit();
			}

		} else {
			$responseContext->setJSONResponseData(
					array('status' => 'fail',
							'message' => 'Nieprawidłowy e-mail'
					)
			);

			$this->_exit();
		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doActivate(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	) {
		if ($request->isValid()) {

			if (!$user = $this->_userFinder->getByHash($request->getParam('key'), false)) {
				$responseContext->setErrorMessage('Błędny link aktywacyjny, skontaktuj się z nami.');
				$this->_exit();
			}

			if ($user->getStatus() == User::STATUS_ENABLED) {
				$responseContext->setInfoMessage('Konto zostało już aktywowane. Możesz zalogować się na swoje konto.');
			} elseif ($user->getStatus() == User::STATUS_SUSPENDED) {
				$responseContext->setInfoMessage('Twoje konto zostało zawieszone. Skontaktuj się z nami.');
			} else {
				$user->setStatus(User::STATUS_ENABLED);

				try {
					$this->_daoRepository->getUserDAO()->store($user);
					
					if ($request->getParam('relocate')) {
					    $session = \Point7_WebApp::getSession();
					    $session->set('user', $user);
					    
					    $responseContext->setInfoMessage('Konto zostało aktywowane i zostałeś automatycznie zalogowany. Możesz uzupełnić dane profilowe i korzystać w pełni z przywilejów. Aby przejść do panelu użytkownika kliknij <a href="/panel">panel</a>');
					} else {
					   $responseContext->setInfoMessage('Konto zostało aktywowane. Możesz teraz zalogować się na swoje konto, uzupełnić dane profilowe i korzystać w pełni z przywilejów.');
					}
					
					//add user to newsletter recipients list if user wants to do it (2026-01-07)
					$props = $user->getProps(true);
					if (array_key_exists('newsletter_recipient', $props) && $props['newsletter_recipient'] == 1) {
    					$newsletter = new \StudioAtrium\Entity\NewsletterRecipient();
    					$newsletter->setActive(true);
    					$newsletter->setEmail($user->getEmail());
    					$newsletter->setRegisterDate($user->getRegisterDate());
    					
    					try {
    						$this->_daoRepository->getNewsletterRecipientDAO()->store($newsletter);
    					} catch (\Exception $e) {
    						if (($pdoE = $e->getBaseException()) instanceof \PDOException && \ArrayHelper::getOffset($pdoE->errorInfo, 1) == '1062') {
    							\Point7_WebApp::getLogger('error')->error(
    								Exception\Helper::formatLoggerMessage($e, 'User already in newsletter recipients list')
    							);
    						} else {
    							\Point7_WebApp::getLogger('error')->error(
    								Exception\Helper::formatLoggerMessage($e, 'Error creating user newsletter recipient')
    							);
    						}
    					}
					}
					
					if ($request->getParam('relocate')) {
					    header("Location: " . base64_decode($request->getParam('relocate')));
					    die();
					}
					
				} catch (\Exception $e) {
					\Point7_WebApp::getLogger('error')->error(
					    Exception\Helper::formatLoggerMessage($e, 'Error activating user account object')
					);

					$responseContext->setErrorMessage('Nie udało się aktywować Twojego konta. Skontaktuj się z nami.');
				}
			}
		} else {
			$responseContext->setErrorMessage('Błędny link aktywacyjny, skontaktuj się z nami.');
		}
	}
	
	/**
	 * Send link to reset password
	 *
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doSendResetPasswordLink(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	) {
	    $response = array();
	    
		// check if user with given email exists
		if (!($request->isValid() && ($user = $this->_userFinder->getByEmail($request->getParam('email'), true)))) {
		    
		    $response['status'] = 'error';
		    $response['message'] = 'W serwisie nie ma zarejestrowanego użytkownika z podanym adresem e-mail.';
		    
		    $responseContext->setJSONResponse('feedback', $response);
// 			$responseContext->setErrorMessage('W serwisie nie ma zarejestrowanego użytkownika z podanym adresem e-mail.');
			$this->_exit();
		}

		$link = $appContext->getConfigParam('domain.fullurl') . '?module=panel&action=reset_password&key=' . md5($user->getEmail() . $user->getId());
		
		$smartyWrapper = new \Point7_WebApp_View_Smarty3_Wrapper();
		$smartyWrapper->template_dir = $appContext->getConfigParam('views.smarty.template_dir');
		$smartyWrapper->compile_dir = $appContext->getConfigParam('views.smarty.compile_dir');
		
		$smartyWrapper->assign('link', $link);
		$html = $smartyWrapper->render('Panel/EmailResetPassword.tpl');
		$mailerConfig = $appContext->getConfigParam('mailer.sender');
		
		if ($this->_sendMail($user->getEmail(), 'Zmiana hasła w serwisie studioatrium.pl', $html, $mailerConfig, true)) {
		    $response['status'] = 'info';
		    $response['message'] = 'Link do zmiany hasła w serwisie został wysłany na Twój adres e-mail.';
// 		    $responseContext->setInfoMessage('Link do zmiany hasła w serwisie został wysłany na Twój adres e-mail.');
		} else {
		    $response['status'] = 'error';
		    $response['message'] = 'Link do zmiany hasła w serwisie został wysłany na Twój adres e-mail.';
// 			$responseContext->setErrorMessage('Wystąpił błąd podczas wysyłania e-maila z linkiem do zmiany hasła. Skontaktuj się z nami.');
		}
		
		$responseContext->setJSONResponse('feedback', $response);
	}
	
	
	/**
	 * Generate password from link with hash
	 *
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doResetPassword(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	) {
		// check if user with given email exists
		if (!$request->isValid()) {
			$responseContext->setErrorMessage('Wystąpił błąd podczas generowania nowego hasła - link jest niepoprawny. Skontaktuj się z nami.');
			$this->_exit();
		}

		if ($userToChange = $this->_userFinder->getByHash($request->getParam('key'), true)) {
			$daoUser = $this->_daoRepository->getUserDAO();
			$newPass = $this->_randomizePassword(10);
			$userToChange->setPassword(User::hashPassword($newPass, $appContext->getSecret()));
			$daoUser->store($userToChange);

			$smartyWrapper = new \Point7_WebApp_View_Smarty3_Wrapper();
			$smartyWrapper->template_dir = $appContext->getConfigParam('views.smarty.template_dir');
			$smartyWrapper->compile_dir = $appContext->getConfigParam('views.smarty.compile_dir');
			
			$smartyWrapper->assign('newPass', $newPass);
			$html = $smartyWrapper->render('Panel/EmailNewPassword.tpl');
			$mailerConfig = $appContext->getConfigParam('mailer.sender');

			if ($this->_sendMail($userToChange->getEmail(), 'Nowe hasło w serwisie studioatrium.pl', $html, $mailerConfig, true)) {
				$responseContext->setInfoMessage('Nowe hasło zostało wysłane na Twojego e-maila.');
			} else {
				$responseContext->setErrorMessage('Wystąpił błąd podczas wysyłania nowego hasła. Wygeneruj je ponownie bądź skontaktuj się z nami.');
			}

		} else {
			$responseContext->setErrorMessage('Wystąpił błąd podczas generowania nowego hasła - link jest niepoprawny bądź użytkownik ma nieaktywne konto. Skontaktuj się z nami.');
		}

		$this->_exit();
	}
	
	
	/**
	 * Panel - Helo
	 *
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doHelo(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	) {
	}
	
	
	/**
	 * Panel - Account
	 *
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doAccount(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	) {
		$responseContext->set('_userMenu', 'account');
		$responseContext->set('options', json_encode(array('fileName' => hash('sha256', $appContext->getUser()->getId()) . '.jpg')));
	}
	
	/**
	 * Panel - Account Store
	 *
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doAccountStore(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	) {
		if (!$request->isValid()) {
			$responseContext->setErrorMessage('Wystąpił błąd podczas zapisu danych konta. Spróbuj ponownie bądź skontaktuj się z nami.');
			$this->_exit();
		}
	
		$user = $this->_userFinder->getById($appContext->getUser()->getId(), true);
		$user->setName($request->getParam('a_name'));
		$user->setSurname($request->getParam('a_surname'));
		$user->setNick($request->getParam('a_nick'));
		$user->setEmail($request->getParam('a_email'));
		
		$props = $user->getProps(true);
		$props['phone'] = $request->getParam('a_phone');
		$user->setProps(json_encode($props));
		
		try {
			$this->_daoRepository->getUserDAO()->store($user);
			$session = \Point7_WebApp::getSession();
			$session->set('user', $user);
			
			$responseContext->setInfoMessage("Twoje dane zostały zaktualizowane.");
		} catch (\Exception $e) {
			if (($pdoE = $e->getBaseException()) instanceof \PDOException && \ArrayHelper::getOffset($pdoE->errorInfo, 1) == '1062') {
				$responseContext->setErrorMessage('Podany adres e-mail już istnieje w bazie użytkowników serwisu. Podaj inny adres e-mail.');
			} else {
				\Point7_WebApp::getLogger('error')->error(
					Exception\Helper::formatLoggerMessage($e, 'Error update user object')
				);
				
				$responseContext->setErrorMessage('Wystąpił problem z zapisem danych użytkownika. Spróbuj ponownie bądź skontaktuj się z nami.');
			}
			$this->_exit();
		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetLoginForm(
	    \Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
    ) {
	        
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetRegisterForm(
	    \Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
    ) {
	        
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetForgottenPasswordForm(
	    \Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
    ) {
	        
	}
	
	
	/**
	 * Panel - News password Store
	 *
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doPasswordStore(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	) {
		if (!$request->isValid()) {
			$responseContext->setErrorMessage('Wystąpił błąd podczas zmiany hasła. Spróbuj ponownie bądź skontaktuj się z nami.');
			$this->_exit();
		}
		
		if ($request->getParam('a_newpass') != $request->getParam('a_newpass2')) {
			$responseContext->setErrorMessage('Powtórzenie nowego hasła nie jest zgodne z nowym hasłem. Spróbuj ponownie.');
			$this->_exit();
		}
	
		$user = $this->_userFinder->getById($appContext->getUser()->getId(), true);
		
		if (User::hashPassword($request->getParam('a_pass'), $appContext->getSecret()) != $user->getPassword()) {
			$responseContext->setErrorMessage('Podano błędne aktualne hasło. Spróbuj ponownie.');
			$this->_exit();
		}
		
		$user->setPassword(User::hashPassword($request->getParam('a_newpass'), $appContext->getSecret()));
		
		try {
			$this->_daoRepository->getUserDAO()->store($user);
			
			$responseContext->setInfoMessage("Twoje hasło zostało zmienione.");
		} catch (\Exception $e) {
			\Point7_WebApp::getLogger('error')->error(
				Exception\Helper::formatLoggerMessage($e, 'Error update user object (change password)')
			);
			
			$responseContext->setErrorMessage('Wystąpił problem ze zmianą hasła. Spróbuj ponownie bądź skontaktuj się z nami.');
			$this->_exit();
		}
	}
	
	
	/**
	 * Panel - Account delete
	 *
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doAccountDelete(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	) {
		if (!$request->isValid()) {
			$responseContext->setErrorMessage('Wystąpił błąd podczas usuwania hasła. Spróbuj ponownie bądź skontaktuj się z nami.');
			$this->_exit();
		}
	
		$user = $this->_userFinder->getById($appContext->getUser()->getId(), true);
		$user->setStatus(User::STATUS_DISABLED);
		
		try {
			$this->_daoRepository->getUserDAO()->store($user);
			$session = \Point7_WebApp::getSession();
			$session->set('user', null);
			
			$responseContext->setInfoMessage("Jest nam niezmiernie przykro, ale to już fakt. Zostałeś wylogowany a Twoje konto zostało usunięte. Zapraszamy ponownie.");
			$this->_redirect("/");
			die();
		} catch (\Exception $e) {
			\Point7_WebApp::getLogger('error')->error(
				Exception\Helper::formatLoggerMessage($e, 'Error update user object (change status to delete)')
			);
			
			$responseContext->setErrorMessage('Wystąpił problem z usunięciem konta. Spróbuj ponownie bądź skontaktuj się z nami.');
			$this->_exit();
		}
	}
	
	/**
	 * Panel - Messages
	 *
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doMessages(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	) {
		$responseContext->set('_userMenu', 'message');
		
		if (!empty($_COOKIE['tmpStamp'])) {
			$responseContext->set('tmpStamp', $_COOKIE['tmpStamp']);
		
			//get Attachment if uploaded earlier
			$attachments = $this->_daoRepository->getAttachmentDAO()->getForObject($_COOKIE['tmpStamp']);
			$responseContext->set('uploadedTmp', $attachments);
		
		} else {
			$tmpStamp = time();
			$responseContext->set('tmpStamp', $tmpStamp);
			setcookie('tmpStamp', $tmpStamp, time()+3600*24*7);
		}
		
		//take message history
		if ($messages = $this->_daoRepository->getUserMessageFinder()->getByUserId($appContext->getUser()->getId(), false)) {
			$messagesArray = array();
			foreach ($messages as $message) {
				if ($message->getParentId() == 0) {
					$messagesArray[$message->getId()]['parent'] = $message->toArray();
				} else {
					$messagesArray[$message->getParentId()]['child'] = $message->toArray();
				}
				
				//mark unread messages as read
				if ($message->getStatus() == User\Message::STATUS_NEW && $message->getParentId() > 0 && !$appContext->getUser()->isImpersonated()) {
					$message->setStatus(User\Message::STATUS_READ);
					$this->_daoRepository->getUserMessageDAO()->store($message);
					
					if ($notifications = $this->_getUserCache($appContext->getUser()->getId())) {
						unset($notifications['message']);
						$this->_setUserCache($appContext->getUser()->getId(), $notifications);
					}
				}
			}

			$responseContext->set('messages', $messagesArray);
		}
		
		if ($request->getParam('pid')) {
			$project = $this->_daoRepository->getProjectFinder(null)->getById($request->getParam('pid'), true, false);
			$responseContext->set('project', $project);
		}
	}
	
	
	/**
	 * Panel - Message store
	 *
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doMessageStore(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	) {
		if (!$request->isValid()) {
			$responseContext->setErrorMessage('Wystąpił błąd podczas wysyłania wiadomości. Spróbuj ponownie bądź skontaktuj się z nami: <a href="mailto:atrium@studioatrium.pl">atrium@studioatrium.pl</a>.');
			$this->_exit();
		}
		
		$message = new User\Message();
		$message->setUserId($appContext->getUser()->getId());
		$message->setParentId(0);
		$message->setAuthor($appContext->getUser()->getName());
		$message->setTitle($request->getParam('a_topic'));
		$message->setMessage($request->getParam('a_message'));
		$message->setCreateDate(date('Y-m-d H:i:s'));
		$message->setStatus(User\Message::STATUS_NEW);
		$message->setProjectId($request->getParam('pid'));
		
		try {
			$this->_daoRepository->getUserMessageDAO()->store($message);
			$responseContext->setInfoMessage("Wiadomość została wysłana do konsultanta Studia Atrium. Wkrótce otrzymasz odpowiedź.");

			//move tmp attachments
			if ($request->getParam('isTmpUid')) {
				$this->_moveTemporaryAttachment($request->getParam('ownerUid'), $message->makeUID());
			}
			
			//notification
			$this->_sendMail(
					$appContext->getConfigParam('mailer.notify'),
					'Nowa wiadomość od ' . $appContext->getUser()->getName() . ' ' . $appContext->getUser()->getSurname(),
					"Nowa wiadomość od użytkownika <strong>" . $appContext->getUser()->getName() . " " . $appContext->getUser()->getSurname() ."</strong>.".
					"<br>Zobacz ją i odpowiedz w <a href='".$appContext->getConfigParam('domain.backend')."/?module=users&action=message&id=".$message->getId()."'>panelu administratora</a>.",
					$appContext->getConfigParam('mailer.sender'), true);
		
			if (!empty($_COOKIE['tmpStamp'])) {
				setcookie('tmpStamp', null, -1);
			}
			
		} catch (\Exception $e) {
			\Point7_WebApp::getLogger('error')->error(
				Exception\Helper::formatLoggerMessage($e, 'Error create user message')
			);
				
			$responseContext->setErrorMessage('Wystąpił błąd podczas wysyłania wiadomości. Spróbuj ponownie bądź skontaktuj się z nami: <a href="mailto:atrium@studioatrium.pl">atrium@studioatrium.pl</a>.');
			$this->_exit();
		}
	}
	
	
	/**
	 * Panel - Promo
	 *
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doPromo(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	) {
		$responseContext->set('_userMenu', 'promo');

		//other promo
		$docs = $this->_daoRepository->getDocumentFinder()->getByCharId('upromo', \StudioAtrium\Entity\Document::DOCTYPE_PAGE, \StudioAtrium\Entity\Document::STATUS_PUBLISHED);
		$responseContext->set('promo', $docs);	
		
		//discount
		$discount = $this->_daoRepository->getDiscountFinder()->getList(\StudioAtrium\Entity\Discount::STATUS_ENABLED, true, null, true, $appContext->getUser()->getId());
		$responseContext->set('discount', $discount);	
		$responseContext->set('default_start_date', \StudioAtrium\Entity\Discount::DEFAULT_START_DATE);	
		$responseContext->set('default_stop_date', \StudioAtrium\Entity\Discount::DEFAULT_STOP_DATE);	
		
		if ($discount) {
			$projectsId = array();
			foreach ($discount as $d) {
				if ($d->getProjectsId()) {
					$projectsId = array_merge_recursive($projectsId, explode(",", $d->getProjectsId()));
				}
			}
			
			if ($projectsId) {
				$projects = $this->_daoRepository->getProjectFinder(null)->getListById($projectsId, \StudioAtrium\Entity\Project::STATUS_PUBLISHED, true);
				$responseContext->set('projects', $projects->toArray(array(), 'id'));
			}
		}
		
		if ($notifications = $this->_getUserCache($appContext->getUser()->getId())) {
			unset($notifications['promo']);
			$this->_setUserCache($appContext->getUser()->getId(), $notifications);
		}
	}
	
	
	/**
	 * Panel - Comment
	 *
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doDiscuss(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	) {
		$responseContext->set('_userMenu', 'comment');
	}
	
	
	/**
	 * Panel - Comment
	 *
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doComment(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	) {
		$responseContext->set('_userMenu', 'comment');
	
		if (($comments = $this->_daoRepository->getProjectCommentFinder()->getByUserId($appContext->getUser()->getId(), false, null, true)) && $comments->count() > 0) {
			$responseContext->set('comments', $comments);
		
			$projectsId = $parents = array();
			foreach ($comments as $comment) {
				$projectsId[$comment->getProjectId()] = $comment->getProjectId();
				
				if ($comment->getParentId() > 0) {
					$parent = $this->_daoRepository->getProjectCommentFinder()->getComment($comment->getParentId(), true, false, false);
					$parents[$parent->getId()] = $parent->toArray();
				}
			}
			
			$projects = $this->_daoRepository->getProjectFinder(null)->getListById($projectsId, false, true);
			$responseContext->set('projects', $projects->toArray(array(), 'id'));
			$responseContext->set('parents', $parents);
			
			if ($notifications = $this->_getUserCache($appContext->getUser()->getId()) && !$appContext->getUser()->isImpersonated()) {
				unset($notifications['comment']);
				$this->_setUserCache($appContext->getUser()->getId(), $notifications);
			}
		}
	}
	
	
	/**
	 * Panel - Comment
	 *
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doForum(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	) {
		$responseContext->set('_userMenu', 'comment');

		if (($forum = $this->_daoRepository->getDiscussFinder()->getUserPosts(
				$appContext->getUser()->getId(),
				$request->getParam('page') - 1,
				$request->getParam('limit'))
		)) {
			
			$responseContext->set('url', Helper\Url::buildPanelForumUrl());
			$responseContext->set('pages', ceil($forum->total() / $request->getParam('limit')));
			$responseContext->set('page', $request->getParam('page'));
				
			$responseContext->set('forum', $forum);
		}
		
		$responseContext->set('categories', Helper\Discuss::getCategories());
	}
	
	
	/**
	 * Panel - Comment
	 *
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doForumMessage(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	) {
		$responseContext->set('_userMenu', 'comment');
		
		if (($messages = $this->_daoRepository->getDiscussFinder()->getUserMessages($appContext->getUser()->getId()))) {
			$list = array();
			$sendersIds = array();
			
			$idx = 0;
			$idxToThreadMap = array();
			
			foreach($messages as $message) {
				if($message->getParentId()) {
					if(in_array($message->getParentId(), $idxToThreadMap)) {
						$list[array_search($message->getParentId(), $idxToThreadMap)][] = $message->toArray();
					} else {
						$list[$idx][] = $message->toArray();
						$idxToThreadMap[$idx] = $message->getParentId();
					}
				} else {
					if(in_array($message->getId(), $idxToThreadMap)) {
						array_unshift($list[array_search($message->getId(), $idxToThreadMap)], $message->toArray());
					} else {
						$list[$idx][] = $message->toArray();
						$idxToThreadMap[$idx] = $message->getId();
					}
				}
				
				$sendersIds[] = $message->getSenderId();
				$sendersIds[] = $message->getReceiverId();
				
				$idx++;
			}
			
			foreach($list as $key => $value) {
				if (count($value) > 1) {
					$sub = array_reverse($value);
					array_unshift($sub, array_pop($sub));
					$list[$key] = $sub;
				}
			}

			$responseContext->set('list', $list);
			
			$senders = $this->_daoRepository->getUserFinder()->getListById(array_unique($sendersIds));
			$responseContext->set('senders', $senders->toArray('', 'id'));
			
			$responseContext->set('adminIds', Helper\User::getAdmins());
		}
	}
	
	
	/**
	 * Panel - Transactions
	 *
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doTransaction(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	) {
		$responseContext->set('_userMenu', 'transaction');
	
		$transactions = $transactions2 = array();
		
		if ($transactionsCollection = $this->_daoRepository->getTransactionFinder()->getTransactions('project', false, null, null, false, $appContext->getUser()->getId())) {
			$transactions = $transactionsCollection->toArray(array(), 'id');
		}
		
		if ($transactionsCollection2 = $this->_daoRepository->getTransactionFinder()->getTransactions('extras', false, null, null, false, $appContext->getUser()->getId())) {
			$transactions2 = $transactionsCollection2->toArray(array(), 'id');
		}
	
		$results = $transactions + $transactions2;
		arsort($results);
		$responseContext->set('transactions', $results);
	}
	
	

	public function doLanding(
	    \Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
    ) {

	}
	
	
	/**
	 * Randomize new password
	 *
	 * @param Integer $numberOfCharacters
	 */
	private function _randomizePassword($numberOfCharacters)
	{
		$characters = array('a','b','c','d','e','f','g','h','j','k','m','n','p','q','r','s','t','u','w','x','y','z','1','2','3','4','5','6','7','8','9');
	
		$return = '';
		for ($i = 1; $i <= $numberOfCharacters; $i++) {
			$return .= $characters[array_rand($characters)];
		}
	
		return $return;
	}
}
