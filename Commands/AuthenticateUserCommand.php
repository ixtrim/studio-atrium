<?php

/**
 * @author void
 */
class AuthenticateUserCommand extends Point7_WebApp_Command_Abstract
{
	/**
	 * @see Point7_WebApp_Command_Abstract::_doExecute()
	 */
	protected function _doExecute(
		Point7_WebApp_Request $request,
		Point7_WebApp_Context_Application $appContext,
		Point7_WebApp_Context_Response $responseContext
	) {
		$session = \Point7_WebApp::getSession();
		$user = $session->get('user');

		if ($user instanceof \StudioAtrium\Entity\User
			&& $user->getType() == \StudioAtrium\Entity\User::TYPE_USER
			&& $user->getStatus() == \StudioAtrium\Entity\User::STATUS_ENABLED) {
			$appContext->setUser($user);
			$responseContext->setOnce('user', $user);
			return self::STATE_OK;
		} else {
			return self::STATE_ERROR;
		}
	}
}