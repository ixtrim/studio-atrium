<?php
/**
 * $Id: Validator.php 762 2013-04-03 11:55:02Z radek $
 */

namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\WWW;


class Contact extends WWW\AbstractModule 
{
    /**
     * @param \Point7_WebApp_Request_Filtered $request
     * @param \Point7_WebApp_Context_Application $appContext
     * @param \Point7_WebApp_Context_Response $responseContext
     */
    public function doForm(
        \Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
        ) {
            $docFinder = $this->_daoRepository->getDocumentFinder();
            $article = $docFinder->getById(1103, false, \StudioAtrium\Entity\Document::STATUS_PUBLISHED, true);
            $responseContext->set('article', $article);
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
		
// 		$result = false;
		
		//\Point7_WebApp::getLogger('consultant')->info("Email: " . $request->getParam('email') . "\nQuery: " . $request->getParam('query') . "\n----------------------------\n");
		\Point7_WebApp::getLogger('consultant')->info(\StudioAtrium\Application\Helper\Logger::formatLoggerMessage('Wiadomo�� od: ' . $request->getParam('email'), $request->getParam('query')));

		if ($mailerConfig = $appContext->getConfigParam('mailer.sender')) {
			
			$content = $request->getParam('email') . ' napisał: <br><br> ' . nl2br($request->getParam('query'));
			if ($request->getParam('project_id')) {
				if ($project = $this->_daoRepository->getProjectFinder(null)->getById($request->getParam('project_id'), false, false)) {
					$content .= '<br><br>Zapytanie dotyczy projektu: <strong>' . $project->getSymbolAlpha() . ' ' . $project->getSymbolNum() . ' ' . $project->getName() . '</strong>';
				}
			}
// 			$result = 
			if ($this->_sendMail($appContext->getConfigParam('mailer.consultant'), 'Konsultant studioatrium.pl', $content, $mailerConfig, true, $request->getParam('email'))) {
				$responseContext->setJSONResponse('status', 'ok');
			} else {
				$responseContext->setJSONResponse('status', 'error');
			}
			
			$this->_exit();
			
		} else {
			\Point7_WebApp::getLogger('error')->error('Error during sending e-mail from consultant box - no mailer config');
			$responseContext->setJSONREsponse('status', 'error');
			$this->_exit();
		}
		
		
// 		if (!$result) {
// 			$responseContext->setJSONResponse('status', 'fail');
// 		} else {
// 			$responseContext->setJSONResponse('status', 'ok');
// 		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doSkeleton(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		if (!$request->isValid()) {
			$responseContext->setJSONResponse('status', 'fail');
			$this->_exit();
		}

		$result = false;

		\Point7_WebApp::getLogger('consultant')->info("Skeleton query: Email: " . $request->getParam('email') . "\nPhone: " . $request->getParam('phone') . "\nName: " . $request->getParam('client') . "\n----------------------------\n");

		if ($mailerConfig = $appContext->getConfigParam('mailer.sender')) {
				
			if ($request->getParam('project_type') == 'skeleton') {
				$content = $request->getParam('client') . ': ' . $request->getParam('email') . ': tel.' . $request->getParam('phone') . ' pyta o wersję murowaną projektu ' . $request->getParam('project_name') . ' <br><br> ';
			} else {
				$content = $request->getParam('client') . ': ' . $request->getParam('email') . ': tel.' . $request->getParam('phone') . ' pyta o wersję szkieletową projektu ' . $request->getParam('project_name') . ' <br><br> ';
			}
				
			if ($result = $this->_sendMail($appContext->getConfigParam('mailer.consultant'), 'Konsultant studioatrium.pl', $content, $mailerConfig, true, $request->getParam('email'))) {
				$responseContext->setJSONResponse('status', 'ok');
			} else {
				$responseContext->setJSONResponse('status', 'error');
			}
				
		} else {
			\Point7_WebApp::getLogger('error')->error('Error during sending e-mail from skeleton consultant box - no mailer config');
			$responseContext->setJSONREsponse('status', 'error');
		}


		if (!$result) {
			$responseContext->setJSONResponse('status', 'fail');
		} else {
			$responseContext->setJSONResponse('status', 'ok');
		}
	}
}