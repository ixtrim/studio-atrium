<?php

/* $Id:$ */

namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\WWW;
use StudioAtrium\Application\WWW\AbstractModule;
use StudioAtrium\Application\WWW\AppContext;
use StudioAtrium\Application\WWW\ResponseContext;

/**
 * FileManager
 *
 */
class FileManager extends AbstractModule {

	/**
	 * @var \Point7_CMS_Attachment_DAO_PDOMySQL
	 */
	protected $_attachmentDAO = null;

	/**
	 * @see AbstractModule::_initAction()
	 */
	protected function _initAction(
		$action, \Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	) {
		parent::_initAction($action, $request, $appContext, $responseContext);
		$this->_attachmentDAO = $this->_daoRepository->getAttachmentDAO();
	}


	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doListFiles(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	) {

		if (!$request->isValid()) {
			$this->_exit();
		}

		$uploadProfileName = "\StudioAtrium\Entity\Attachment\Upload\Profile\\" . $request->getParam('profile');
		try {
			\StudioAtrium\StudioAtrium::load($uploadProfileName);
			$profile = new $uploadProfileName();
		} catch (\StudioAtrium\Exception $e) {
			$this->_exit();
		}

		$responseContext->set('attachments',
			$this->_attachmentDAO->getForObject(
				$request->getParam('owner_uid')
			)->getAttachmentsByType($request->getParam('profile'))
		);

		$responseContext->set('profile', $profile);
	}


	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetWysiwygImages(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$responseContext->setHTTPResponseHeader('pragma', 'no-cache');
		$responseContext->setHTTPResponseHeader('expires', '0');

		$response = array();

		if ($request->isValid()) {
			$profile = new \StudioAtrium\Entity\Attachment\Upload\Profile\DocumentImage();

			$attachments = $this->_attachmentDAO->getForObject(
				$request->getParam('owner_uid')
			)->getAttachmentsByType(
				$profile->getProfileName()
			);

			if($attachments) {
				$resPath = str_replace(ROOT_PATH, '', \Point7_WebApp::getConfigParam('paths.res_www'));

				/* @var $attachment \Point7_CMS_Attachment */
				foreach ($attachments as $attachment) {
					$response[] = '{title: \'' . $attachment->getFilename() . '\', value: \'' . $resPath . '/' . $attachment->getPath() . '/' . $attachment->getFilename() . '\'}';
				}
			}
		}

		$str = json_encode($response);
		$str = str_replace(array('"{', '}"'), array('{', '}'), $str);

		$responseContext->setJavaScriptResponse($str);
	}


	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGetWysiwygFiles(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$responseContext->setHTTPResponseHeader('pragma', 'no-cache');
		$responseContext->setHTTPResponseHeader('expires', '0');

		$response = "var tinyMCELinkList = new Array(\n";

		if ($request->isValid()) {
			$profile = new \StudioAtrium\Entity\Attachment\Upload\Profile\DocumentFile();

			$attachments = $this->_attachmentDAO->getForObject(
				$request->getParam('owner_uid')
			)->getAttachmentsByType(
				$profile->getProfileName()
			);

			$resPath = str_replace(ROOT_PATH, '', \Point7_WebApp::getConfigParam('paths.res_www'));

			/* @var $attachment \Point7_CMS_Attachment */
			foreach ($attachments as $attachment) {
				$response .= "[\"{$attachment->getFilename()}\", \"{$resPath}/\{%RES_PATH%\}{$attachment->getPath()}/{$attachment->getFilename()}\"],";
			}

			$response = trim($response, ',');
		}

		$response .= ');';

		$responseContext->setJavaScriptResponse($response);
	}


	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doUploadFile(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		if (!$request->isValid()) {

			$errorMessages = array();
			foreach ($request->getErrorMessages() as $errors) {
				$errorMessages += $errors;
			}

			$responseContext->setJSONResponse('fileUpload', array(
				'status' => 'error',
				'message' =>  join("\n", $errorMessages)
			));
			$this->_exit();
		}

		// Create upload profile
		try {
			$uploadProfileName = "\StudioAtrium\Entity\Attachment\Upload\Profile\\" . $request->getParam('profile');
			\StudioAtrium\StudioAtrium::load($uploadProfileName);

			/* @var $uploadProfile \Point7_CMS_Attachment_Upload_Profile */
			$uploadProfile = new $uploadProfileName($request->getParam('upload_options'));

		} catch (\StudioAtrium\Exception $e) {
			$responseContext->setJSONResponse('fileUpload', array(
				'status' => 'error',
				'message' => 'Upload profile does not exist'
			));
			$this->_exit();
		}

		// If single-file profile, delete existing attachment
		if ($uploadProfile->isSingleFile()) {
			$attachmentsToDelete = $this->_attachmentDAO->getForObject(
				$request->getParam('owner_uid')
			)->reorganize()->getAttachmentsByType($uploadProfile->getProfileName());

			if ($attachmentsToDelete && !$attachmentsToDelete->isEmpty()) {
				$attachmentHelper = new \Point7_CMS_Attachment_DeleteHelper(
					$this->_attachmentDAO, \Point7_WebApp::getConfigParam('paths.res')
				);
				$attachmentHelper->deleteAttachment($attachmentsToDelete->current());
			}
		}

		$uploadManager = new \Point7_CMS_Attachment_Upload_Manager(
			$request->getParam('owner_uid'),
			\Point7_WebApp::getConfigParam('paths.tmp_uploads'),
			\Point7_WebApp::getConfigParam('paths.res')
		);
		
		$uploadManager->setDirMode(0775);

		try {
			$attachment = $uploadManager->processFile($uploadedFile = $request->getFile('upfile'), $uploadProfile);
			
			@chmod($targetPath .  $attachment->getPath() . '/' . $attachment->getFilename(), 0775);
			
			if ($uploadProfile->hasDescription()) {
				$attachment->setDescription($request->getParam('description'));
			}

			if ($uploadProfile->hasTitle()) {
				$attachment->setTitle($request->getParam('title'));
			}

			if (method_exists($uploadProfile, 'hasLink') && $request->getParam('link')) {
				$attachment->setProperty('link', $request->getParam('link'));
			}

			$this->_attachmentDAO->store($attachment);
		} catch (\Point7_CMS_Attachment_Upload_Exception $e) {
			//TODO: handle error file processing

			switch ($e->getCode()) {
				case \Point7_CMS_Attachment_Upload_Exception::ERR_WRONG_FILE_EXTENSION: {
					$errorMessage = 'Nieprawidłowy format pliku';
				} break;

				default: {
					$errorMessage = 'Błąd przesyłania pliku';
				}
			}

			$responseContext->setJSONResponse('fileUpload', array(
				'status' => 'error',
				'message' => $errorMessage,
				'exception' => $e->getMessage()

			));
			$this->_exit();

		}

		$responseContext->setJSONResponse('fileUpload', array(
			'status' => 'ok',
			'message' => 'Plik ' . $uploadedFile->getOriginalName() . ' został przesłany'
		));

	}



	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doUploadSingleFile(
			\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	) {
		if (!$request->isValid()) {
			$errorMessages = array();
			foreach ($request->getErrorMessages() as $errors) {
				$errorMessages += $errors;
			}

			$responseContext->setJSONResponse('fileUpload', array(
					'status' => 'error',
					'message' =>  join("\n", $errorMessages),
					'profile' =>  $request->getParam('profile'),
					'invalid_fields' => join(",", array_keys($request->getInvalidFields()))
			));
			$this->_exit();
		}

		//zabezpieczenie 26.02.2020
		if ($request->getParam('profile') == 'DiscussImage' 
		    || $request->getParam('profile') == 'UserAvatar'
		    || $request->getParam('profile') == 'UserMessageFile'
		) { 
		    $responseContext->setJSONResponse('fileUpload', array(
	            'status' => 'error',
	            'message' =>  'forbidden',
	            'profile' =>  $request->getParam('profile'),
	            'invalid_fields' => ''
	        ));
	        $this->_exit();
		}
		
		
		// Create upload profile
		try {
			$uploadProfileName = "\StudioAtrium\Entity\Attachment\Upload\Profile\\" . $request->getParam('profile');
			\StudioAtrium\StudioAtrium::load($uploadProfileName);

			/* @var $uploadProfile \Point7_CMS_Attachment_Upload_Profile */
			$uploadProfile = new $uploadProfileName($request->getParam('upload_options'));

		} catch (\StudioAtrium\Exception $e) {
			$responseContext->setJSONResponse('fileUpload', array(
					'status' => 'error',
					'profile' =>  $request->getParam('profile'),
					'message' => 'Upload profile does not exist'
			));
			$this->_exit();
		}

		
		$dPath = ($request->getParam('isTmpUid') == 1) ? \Point7_WebApp::getConfigParam('paths.static.tmp_uploads') : \Point7_WebApp::getConfigParam('paths.static.uploads');
		$dPathWWW = ($request->getParam('isTmpUid') == 1) ? \Point7_WebApp::getConfigParam('static.tmp_uploads') : \Point7_WebApp::getConfigParam('static.uploads');
		
		if (method_exists($uploadProfile, 'getFilePath') && $request->getParam('isTmpUid') != 1) {
			$dPath = $uploadProfile->getFilePath();
		}
		
		if (method_exists($uploadProfile, 'getFilePathWWW') && $request->getParam('isTmpUid') != 1) {
			$dPathWWW = $uploadProfile->getFilePathWWW();
		}
		
		$uploadManager = new \Point7_CMS_Attachment_Upload_Manager(
				$request->getParam('owner_uid'),
				\Point7_WebApp::getConfigParam('paths.tmp_uploads'),
				$dPath);

		$storeInDb = true;
		
		if (method_exists($uploadProfile, 'doNotStoreInDb')) {
			$storeInDb = false;
		}
		
		if (method_exists($uploadProfile, 'getHashMethod') && $uploadProfile->getHashMethod() instanceof \Point7_CMS_Attachment_Upload_Manager_HashFileToFolderMethod) {
			$uploadManager->setHashFileMethod($uploadProfile->getHashMethod());
		} else {
			$uploadManager->setHashFileMethod(\StudioAtrium\StudioAtrium::getFileManagerHasher());
			$uploadManager->setFolderBuckets(\StudioAtrium\StudioAtrium::FILEMANAGER_FOLDER_BUCKETS);
		}

		try {
			$attachment = $uploadManager->processFile($uploadedFile = $request->getFile('upfile'), $uploadProfile);

			// If single-file profile, delete existing attachment
			if ($uploadProfile->isSingleFile()) {
				$attachmentsToDelete = $this->_attachmentDAO->getForObject(
						$request->getParam('owner_uid')
				)->reorganize()->getAttachmentsByType($uploadProfile->getProfileName());

				if ($attachmentsToDelete && !$attachmentsToDelete->isEmpty()) {
					$attachmentHelper = new \Point7_CMS_Attachment_DeleteHelper(
							$this->_attachmentDAO, $dPath
					);
					$attachmentHelper->deleteAttachment($attachmentsToDelete->current());
				}
			}
			
			if ($request->getParam('isTmpUid') == 1) {
				$props = $attachment->getProps(true);
				$props['isTmp'] = 1;
				$attachment->setProps(json_encode($props));
			}
			
			if ($storeInDb) {
				$this->_attachmentDAO->store($attachment);
			}
	
		} catch (\Point7_CMS_Attachment_Upload_Exception $e) {
			switch ($e->getCode()) {
				case \Point7_CMS_Attachment_Upload_Exception::ERR_WRONG_FILE_EXTENSION: {
					$errorMessage = 'Zły format pliku. Obsługiwane pliki to .jpg, .png, .jpeg, .doc, .pdf.';
				} break;

				default: {
					$errorMessage = 'Wystąpił błąd podczas wysyłania pliku.';
				}
			}

			$responseContext->setJSONResponse('fileUpload', array(
					'status' => 'error',
					'message' => $errorMessage,
					'exception' => $e->getMessage(),
					'profile' =>  $request->getParam('profile')
			));
			$this->_exit();
		}

		$childAttachments = array();
		foreach ($attachment->getChildAttachments() as $child) {
			$childAttachments[$child->getParentRelationship()] = $child->getPath() . '/' . $child->getFileName();
		}
		
		$clickId = '';
		
		if ($attachment->getProfileName() == 'DiscussImage' && ($request->getParam('isTmpUid') == 0 || !$request->getParam('isTmpUid'))) {
			$status = 'ok_click';
			$clickId = 'publish-trigger';
		} else {
			$status = 'ok';
		}

		$responseContext->setJSONResponse('fileUpload', array(
				'status' => $status,
				'message' => 'Plik ' . $uploadedFile->getOriginalName() . ' został poprawnie załadowany.',
				'file_with_path' => $attachment->getPath() . '/' . $attachment->getFileName(),
				'child_attachments' => $childAttachments,
				'file_original_filename' => $attachment->getProperty('original_filename'),
				'file_size' => $attachment->getProperty('file_size'),
				'file_type' => $attachment->getProperty('type'),
				'profile' => $attachment->getProfileName(),
				'dest_path' => $dPathWWW,
				'id' => $attachment->getId(),
				'click_id' => $clickId
		));
	}

	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doDeleteAttachment(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		if (!$request->isValid()) {
			$errorMessages = array();
			foreach ($request->getErrorMessages() as $errors) {
				$errorMessages += $errors;
			}

			$responseContext->setJSONResponse('fileDelete', array(
				'status' => 'error',
				'message' =>  join("\n", $errorMessages)
			));
			$this->_exit();
		}

		$uploadProfileName = "\AduioTrip\Entity\Attachment\Upload\Profile\\" . $request->getParam('profile');
		try {
			\StudioAtrium\StudioAtrium::load($uploadProfileName);
		} catch (\StudioAtrium\Exception $e) {
			$responseContext->setJSONResponse('fileDelete', array(
				'status' => 'error',
				'message' => 'Upload profile does not exist'
			));
			$this->_exit();
		}

		/* @var $attachment \Point7_CMS_Attachment */
		$attachment = $this->_attachmentDAO->getWithChildren($request->getParam('id'));

		if (!$attachment || $attachment->getOwnerUid() != $request->getParam('owner_uid') || $attachment->getProfileName() != $request->getParam('profile')) {
			$responseContext->setJSONResponse('fileDelete', array(
				'status' => 'error',
				'message' => 'Błędny plik do usunięcia'
			));
			$this->_exit();
		}

		try {
			$attachmentHelper = new \Point7_CMS_Attachment_DeleteHelper(
				$this->_attachmentDAO, \Point7_WebApp::getConfigParam('paths.res')
			);
			$attachmentHelper->deleteAttachment($attachment);
		} catch (\Point7_CMS_Attachment_Exception $e) {
			$responseContext->setJSONResponse('fileDelete', array(
				'status' => 'error',
				'message' => 'Nie można usunąć pliku ' . $attachment->getFilename()
			));
			$this->_exit();
		}

		$responseContext->setJSONResponse('fileDelete', array(
			'status' => 'error',
			'message' => 'Usunięto plik ' . $attachment->getFilename()
		));

	}


	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doRemoveSingleFile(
		\Point7_WebApp_Request_Filtered $request, AppContext $appContext, ResponseContext $responseContext
	) {
		if (!$request->isValid()) {
			$errorMessages = array();
			foreach ($request->getErrorMessages() as $errors) {
				$errorMessages += $errors;
			}

			$responseContext->setJSONResponse('fileDelete', array(
				'status' => 'error',
				'message' =>  join("\n", $errorMessages)
			));
			$this->_exit();
		}

		/* @var $attachment \Point7_CMS_Attachment */
		$attachments = $this->_attachmentDAO->getForObject($request->getParam('owner_uid'));

		//gdyby głowny plik miał dzieci trzeba w pętli
		foreach ($attachments as $attachment) {
			if ($attachment->getId() == $request->getParam('id')) {
				try {
	
					$dPath = ($request->getParam('is_tmp') == 1) ? \Point7_WebApp::getConfigParam('paths.static.tmp_uploads') : \Point7_WebApp::getConfigParam('paths.static.uploads');
	
					$attachmentHelper = new \Point7_CMS_Attachment_DeleteHelper(
						$this->_attachmentDAO, $dPath
					);
					$attachmentHelper->deleteAttachment($attachment);
					
				} catch (\Point7_CMS_Attachment_Exception $e) {
					$responseContext->setJSONResponse('fileDelete', array(
						'status' => 'error',
						'message' => 'Nie można usunąć pliku ' . $attachment->getFilename()
					));
					$this->_exit();
				}
	
				$responseContext->setJSONResponse('fileDelete', array(
					'status' => 'ok',
					'message' => 'Usunięto plik ' . $attachment->getFilename()
				));
			}
		}

	}


	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doSortFiles(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		if (!$request->isValid()) {
			$responseContext->setJSONResponse('status', 'error');
			$this->_exit();
		}

		parse_str(json_decode($request->getParam('current_sorting')), $currentSorting);

		$idx = 1;
		$sorted = array();
		foreach ($currentSorting['FileList_' . $request->getParam('profile')] as $sort) {
			if (!empty($sort)) {
				$sorted[$idx] = $sort;
				$idx++;
			}
		}

		if ($this->_attachmentDAO->sortFileList($sorted)) {
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
	public function doUpdateInfo(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		if (!$request->isValid()) {
			$responseContext->setJSONResponse('status', 'error');
			$this->_exit();
		}

		$info = json_decode($request->getParam('info'));

		/* @var $attachment \Point7_CMS_Attachment */
		$attachment = $this->_attachmentDAO->getWithChildren($request->getParam('id'));

		if (isset($info->description)) {
			$attachment->setDescription($info->description);
		}
		if (isset($info->title)) {
			$attachment->setDescription($info->title);
		}
		$this->_attachmentDAO->store($attachment);

		$responseContext->setJSONResponse('status', 'ok');
	}
}
