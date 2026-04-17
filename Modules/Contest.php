<?php
/**
 * $Id: Validator.php 762 2013-04-03 11:55:02Z radek $
 */

namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\WWW;
use StudioAtrium\Entity;

class Contest extends WWW\AbstractModule 
{
	/**
	 * @param Point7_WebApp_Request $request
	 * @param Point7_WebApp_Context_Application $appContext
	 * @param Point7_WebApp_Context_Response $responseContext
	 */
	public function doForm(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$letters = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
		$responseContext->set('dir', md5($letters[mt_rand(0, 25)] . time()));
		
		$responseContext->set('staticStockUrl', \Point7_WebApp::getConfigParam('static.stock'));
		
		$responseContext->setMeta('Konkurs fotograficzny - Studio Atrium', '');
	}
	
	
	/**
	 * @param Point7_WebApp_Request $request
	 * @param Point7_WebApp_Context_Application $appContext
	 * @param Point7_WebApp_Context_Response $responseContext
	 */
	public function doUpload(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$response = array();
		$file = $request->getFiles()->current();
		
		if($file->getError() == UPLOAD_ERR_OK) {
		
			if($file->getType() == 'image/jpeg') {
					
				$path = \Point7_WebApp::getConfigParam('paths.static.contest') . '/' . $request->getParam('dir') . '/';
					
				if(!is_dir($path)) {
					mkdir($path, 0775);
				}
		
				$fileName = 'photo_' . $request->getParam('index') . '.jpg';
		
				//upload file
				if (!$file->upload($path . $fileName)) {
					$response['status'] = 'fail';
					$response['code'] = 5;
				} else {
					chmod($path . $fileName, 0775);
						
					$image = new \Imagick();
						
					try {
						$image->readImage($path . $fileName);
		
						$image->cropThumbnailImage(120, 80);
		
						$thumbName = str_replace('photo', 'thumb', $fileName);
						$image->setImageFileName($path . $thumbName);
						$image->writeImage();
		
						$image->clear();
						$image->destroy();
		
						chmod($path . $thumbName, 0775);
		
						$response['status'] = 'ok';
						$response['thumb'] = \Point7_WebApp::getConfigParam('static.contest') . '/' . $request->getParam('dir') . '/' . $thumbName;
		
					} catch (\ImagickException $e) {
						$response['status'] = 'fail';
						$response['code'] = 2;
		
						if(is_file($path . 'photo_' . $request->getParam('index') . '.jpg')) {
							unlink($path . 'photo_' . $request->getParam('index') . '.jpg');
						}
					}
				}
		
			} else {
				$response['status'] = 'fail';
				$response['code'] = 2;
			}
		} else {
			$response['status'] = 'fail';
		
			if($file->getError() == UPLOAD_ERR_INI_SIZE || $file->getError() == UPLOAD_ERR_FORM_SIZE) {
				$response['code'] = 3;
			} else {
				$response['code'] = 4;
			}
		}
		
		$responseContext->setJSONResponse('result', $response);
	}
	
	/**
	 * @param Point7_WebApp_Request $request
	 * @param Point7_WebApp_Context_Application $appContext
	 * @param Point7_WebApp_Context_Response $responseContext
	 */
	public function doRemove(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$response = array();
		
		$path = \Point7_WebApp::getConfigParam('paths.static.contest') . '/' . $request->getParam('dir') . '/';
		
		if(is_file($path . 'photo_' . $request->getParam('index') . '.jpg')) {
			unlink($path . 'photo_' . $request->getParam('index') . '.jpg');
		}
		
		if(is_file($path . 'thumb_' . $request->getParam('index') . '.jpg')) {
			unlink($path . 'thumb_' . $request->getParam('index') . '.jpg');
		}
		
		$response['status'] = 'ok';
		
		$responseContext->setJSONResponse('result', $response);
	}
	
	
	/**
	 * @param Point7_WebApp_Request $request
	 * @param Point7_WebApp_Context_Application $appContext
	 * @param Point7_WebApp_Context_Response $responseContext
	 */
	public function doRegister(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$response = array();
		$response['status'] = 'ok';
		
		if (!$request->isValid()) {
			$response['status'] = 'fail';
			$response['fields'] = $request->getInvalidFields();
		
		} else {
			$contest = new Entity\Contest();
			
			$contest->setProjectName($request->getParam('project'));
			$contest->setFirstName($request->getParam('fname'));
			$contest->setLastName($request->getParam('lname'));
			$contest->setCity($request->getParam('city'));
			$contest->setAddress($request->getParam('address'));
			$contest->setPostalCode($request->getParam('postalcode'));
			$contest->setRegion($request->getParam('region'));
			$contest->setPhone($request->getParam('phone'));
			$contest->setEmail($request->getParam('semail'));
			$contest->setSignature($request->getParam('signature'));
			$contest->setDirectory($request->getParam('dir'));
				
			if (!$this->_daoRepository->getContestDAO()->store($contest)) {
				$response['status'] = 'error';
				$this->_exit();
			}
			
			$this->_sendNotifyEmail($appContext, $contest);
		}
		
		$responseContext->setJSONREsponse('feedback' , $response);
	}
	
	
	/**
	 * @param Point7_WebApp_Request $request
	 * @param Point7_WebApp_Context_Application $appContext
	 * @param Point7_WebApp_Context_Response $responseContext
	 */
	public function doFinish(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {

	}
	
	
	
	/**
	 * Wyślij wiadomość z informacją o aktywacji zamówienia
	 *
	 *@param WWW\AppContext $appContext,
	 * @param \StudioAtrium\Entity\Contest $contest
	 *
	 */
	private function _sendNotifyEmail(WWW\AppContext $appContext, \StudioAtrium\Entity\Contest $contest)
	{
		$smartyWrapper = new \Point7_WebApp_View_Smarty3_Wrapper();
		$smartyWrapper->template_dir = $appContext->getConfigParam('views.smarty.template_dir');
		$smartyWrapper->compile_dir = $appContext->getConfigParam('views.smarty.compile_dir');
	
		$smartyWrapper->assign('user', $contest->toArray());
		
		$html = $smartyWrapper->render('Contest/EmailNotifyOperator.tpl');
	
		$this->_sendMail(
			\Point7_WebApp::getConfigParam('mailer.receiver'),
			'Wysłano zgłoszenie do konkursu fotograficznego',
			$html,
			\Point7_WebApp::getConfigParam('mailer.sender'),
			true
		);
	}
}