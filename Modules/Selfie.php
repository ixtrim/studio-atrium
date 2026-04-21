<?php
/**
 * $Id:$
 */
namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\Helper;
use StudioAtrium\Application\WWW;

class Selfie extends WWW\AbstractModule
{
	/**
	 * @var \StudioAtrium\Entity\Project\Finder
	 */
	protected $_projectFinder = null;
	
	protected $_action = null;


	/**
	 * @see \Point7_WebApp_Module_Abstract::_initAction()
	 */
	public function _initAction(
		$action,\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		parent::_initAction($action, $request, $appContext, $responseContext);
		$this->_projectFinder = $this->_daoRepository->getProjectFinder(null);
		
		$this->_action = $action;
		$responseContext->set('noindexNofollow', true);
	}


	/**
	 * Display
	 */
	public function doDisplay(
			\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
	    $responseContext->setErrorMessage('Przepraszamy, selfie z projektem jest chwilowo niedostępne.');
	    $this->_forward('Index');
	    die();
	    
	    if (!($request->isValid()
			&& ($project = $this->_projectFinder->getById(
					$request->getParam('id'), true, true
			))
		)
		) {
			$this->_forward('Project', 'List');
		}

		$responseContext->set('project', $project);

		if ($request->getParam('version') == 'mirror') {
			$responseContext->set('mirror', 'mirror');
		}

		//get selfie types
		$finderParams = new \Point7_AbstractDAO_FinderParams();
		$finderParams->addFilter('status', \StudioAtrium\Entity\Selfie\Types::STATUS_ACTIVE);
		$types = $this->_daoRepository->getSelfieTypesDAO()->find($finderParams);
		$responseContext->set('types', $types);

		//get public selfies for gallery
		$finderParams = new \Point7_AbstractDAO_FinderParams();
		$finderParams->addFilter('status', \StudioAtrium\Entity\Selfie\Projects::STATUS_PUBLISHED);
		$finderParams->addFilter('project_id', $project->getId());
		$finderParams->setSorting('id', 'DESC');

		\StudioAtrium\Application\Helper\Meta::prepareMeta($responseContext, $this->_name, 'Display', $project);
		
		if (($selfies = $this->_daoRepository->getSelfieProjectsDAO()->find($finderParams)) && $selfies->count() > 0) {
			$selfieGalleryPath = \Point7_WebApp::getConfigParam('paths.selfie_gallery');
			$responseContext->set('selfies', $selfies);
			$responseContext->set('gallery_path', $selfieGalleryPath);
		}
		
		$responseContext->set('noindexNofollow', true);
	}


	/**
	 * Upload
	 */
	public function doUpload(
			\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {

		if (!($request->isValid())) {
			$responseContext->setJSONResponse('status', 'error');
			$responseContext->setJSONResponse('message', 'Wypełnij wszystkie niezbędne pola formularza, sprawdź poprawność adresu e-mail i zaakceptuj regulamin.');
			$this->_exit();
		}

		if ($request->getParam('accept') != 1) {
			$responseContext->setJSONResponse('status', 'error');
			$responseContext->setJSONResponse('message', 'Aby wygenerować swoje selfie zaakceptuj regulamin.');
			$this->_exit();
		}

		$uploadPath = \Point7_WebApp::getConfigParam('paths.selfie_uploads');

		if (!file_exists($uploadPath . '/' . $request->getParam('project_id'))) {
			if (!mkdir($uploadPath . '/' . $request->getParam('project_id'))) {
				$responseContext->setJSONResponse('status', 'error');
				$responseContext->setJSONResponse('message', 'Wystąpił problem podczas generowania selfie. Spróbuj ponownie bądź skontaktuj się z nami.');
				$this->_exit();
			}
		}

		$newFileName = time() . md5($request->getParam('email')) . '.jpg';

		try {
			$filteredData = substr($request->getParam('generated_img'), strpos($request->getParam('generated_img'), ",")+1);
			$unencodedData = base64_decode($filteredData);
			$fp = fopen($uploadPath . '/' . $request->getParam('project_id') . '/' . $newFileName, 'wb');
			fwrite($fp, $unencodedData);
			fclose($fp);
		} catch (\Exception $e) {
			$responseContext->setJSONResponse('status', 'error');
			$responseContext->setJSONResponse('message', 'Wystąpił problem podczas generowania selfie. Spróbuj ponownie bądź skontaktuj się z nami.');
			$this->_exit();
		}

		$currentUrl = $_SERVER['HTTP_REFERER'];

		$selfieProject = new \StudioAtrium\Entity\Selfie\Projects();
		$selfieProject->setProjectId($request->getParam('project_id'));
		$selfieProject->setSelfieTypeId($request->getParam('type_id'));
		$selfieProject->setTitle($request->getParam('name'));
		$selfieProject->setEmail($request->getParam('email'));
		$selfieProject->setSelfieImgUrl($request->getParam('project_id') . '/' . $newFileName);
		$selfieProject->setSelfieUrl('');
		$selfieProject->setStatus(\StudioAtrium\Entity\Selfie\Projects::STATUS_NEW);
		$selfieProject->setCreateDate(date('Y-m-d H:i:s'));

		try {
			$this->_daoRepository->getSelfieProjectsDAO()->store($selfieProject);
		} catch (\Exception $e) {
			$responseContext->setJSONResponse('status', 'error');
			$responseContext->setJSONResponse('message', 'Wystąpił problem podczas generowania selfie. Spróbuj ponownie bądź skontaktuj się z nami.');
			$this->_exit();
		}

		$result = false;
		//send email with needed information
		if ($mailerConfig = $appContext->getConfigParam('mailer.sender')) {
			$smartyWrapper = new \Point7_WebApp_View_Smarty3_Wrapper();
			$smartyWrapper->template_dir = \Point7_WebApp::getConfigParam('views.smarty.template_dir');
			$smartyWrapper->compile_dir = \Point7_WebApp::getConfigParam('views.smarty.compile_dir');
	
			$project = $this->_projectFinder->getById($request->getParam('project_id'), true, true);
	
			$smartyWrapper->assign('link_project', str_replace("selfie", "selfie-" . md5($selfieProject->getEmail()) . strtotime($selfieProject->getCreateDate()) .'-' . $selfieProject->getId(), $currentUrl));
			$smartyWrapper->assign('link_project_delete', str_replace("selfie", "selfieD-" . md5($selfieProject->getEmail()) . strtotime($selfieProject->getCreateDate()) .'-' . $selfieProject->getId(), $currentUrl));
			$smartyWrapper->assign('project', $project->getName());
			$smartyWrapper->assign('selfie', $request->getParam('name'));
	
			$content = $smartyWrapper->render('Selfie/EmailSelfieInfo.tpl');
			
			$result = $this->_sendMail($request->getParam('email'), 'Selfie z projektem Studio Atrium', $content, $mailerConfig, true);
		}
			
		if (!$result) {
			\Point7_WebApp::getLogger('error')->error('Nie udało się wysłać wiadomości do ' . $request->getParam('email'). ' z info o selfie nr' . $selfieProject->getId());
			$responseContext->setJSONResponse('status', 'error');
			$responseContext->setJSONResponse('message', 'Wystąpił problem podczas wysyłania wiadomości. Spróbuj ponownie bądź skontaktuj się z nami.');
			$this->_exit();
		}

		$responseContext->setJSONResponse('status', 'ok');
	}



	/**
	 * Show current selfie project
	 */
	public function doCurrent(
			\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		if (!($request->isValid()
				&& ($project = $this->_projectFinder->getById(
						$request->getParam('id'), true, true
				))
		)
		) {
			$this->_forward('Project', 'List');
		}

		$responseContext->set('project', $project);

		$md5Email = substr($request->getParam('stamp'), 0, 32);
		$timeStamp = substr($request->getParam('stamp'), 32, 10);
		$currentUrl = $_SERVER['REQUEST_URI'];

		//get selfie
		$finderParams = new \Point7_AbstractDAO_FinderParams();
		$finderParams->addFilter('id', $request->getParam('sid'));
		$finderParams->addExplicitFilter('md5(email) = "'.$md5Email . '"');
		$finderParams->addExplicitFilter('UNIX_TIMESTAMP(create_date) = "' . $timeStamp . '"');
		$finderParams->addFilter('project_id', $project->getId());
		if (($selfie = $this->_daoRepository->getSelfieProjectsDAO()->find($finderParams)) && $selfie->count() == 1) {
			if ($selfie[0]->getStatus() == \StudioAtrium\Entity\Selfie\Projects::STATUS_NEW) {
				$selfie[0]->setStatus(\StudioAtrium\Entity\Selfie\Projects::STATUS_CONFIRMED);
				$selfie[0]->setSelfieUrl($currentUrl);
				$this->_daoRepository->getSelfieProjectsDAO()->store($selfie[0]);

				$uHelper = new \StudioAtrium\Application\Helper\Url();
				$url = $uHelper->buildProjectUrl($project);

				$this->_redirect(str_replace('projekty-domow', 'selfie-' . $selfie[0]->getid(), $url));
			} else {

				if (!$request->getParam('delete')) {
					$uHelper = new \StudioAtrium\Application\Helper\Url();
					$url = $uHelper->buildProjectUrl($project);

					$this->_redirect(str_replace('projekty-domow', 'selfie-' . $selfie[0]->getid(), $url));
				}
			}

			$responseContext->setMeta('Projekty domów - STUDIO ATRIUM - selfie ' . $selfie[0]->getTitle() . ' z projektem domu ' . $project->getName(), '');
			$responseContext->set('selfie', $selfie[0]);
			$responseContext->set('selfie_path', \Point7_WebApp::getConfigParam('paths.selfie_gallery'));


			$imageData = base64_encode(file_get_contents(\Point7_WebApp::getConfigParam('paths.selfie_gallery').'/'.$selfie[0]->getSelfieImgUrl()));
			$src = 'data:application/octet-stream;base64,'.$imageData;
			$responseContext->set('fileToSave', $src);

			if ($request->getParam('delete')) {
				$responseContext->set('forceDelete', 1);
				$responseContext->set('returnUrl', str_replace("selfieD", "selfie", $_SERVER['REQUEST_URI']));
				$responseContext->set('md5Email', $md5Email);
				$responseContext->set('timeStamp', $timeStamp);
			}

		} else {
			$this->_exit();
		}
	}


	/**
	 * Show current public selfie project
	 */
	public function doPublic(
			\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		if (!($request->isValid()
				&& ($project = $this->_projectFinder->getById(
						$request->getParam('id'), true, true
				))
		)
		) {
			$this->_forward('Project', 'List');
		}
			
		$responseContext->set('project', $project);

		//get selfie
		$finderParams = new \Point7_AbstractDAO_FinderParams();
		$finderParams->addFilter('id', $request->getParam('sid'));
		$finderParams->addFilter('status', \StudioAtrium\Entity\Selfie\Projects::STATUS_NEW, \Point7_AbstractDAO_FinderParams::OPERATOR_NOT_EQUAL);
		$finderParams->addFilter('project_id', $project->getId());

		if (($selfie = $this->_daoRepository->getSelfieProjectsDAO()->find($finderParams)) && $selfie->count() == 1) {
			$responseContext->setMeta('Projekty domów - STUDIO ATRIUM - selfie ' . $selfie[0]->getTitle() . ' z projektem domu ' . $project->getName(), '');
			$responseContext->set('selfie', $selfie[0]);
			$responseContext->set('selfie_path', \Point7_WebApp::getConfigParam('paths.selfie_gallery'));

			$imageData = base64_encode(file_get_contents(\Point7_WebApp::getConfigParam('paths.selfie_gallery').'/'.$selfie[0]->getSelfieImgUrl()));
			$src = 'data:application/octet-stream;base64,'.$imageData;
			$responseContext->set('fileToSave', $src);

			$currentUrl = $_SERVER['REQUEST_URI'];
			$responseContext->set('currentUrl', $currentUrl);

		} else {
			$this->_exit();
		}
	}


	/**
	 * Delete project
	 */
	public function doDelete(
			\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
	if (!($request->isValid())) {
			$responseContext->setJSONResponse('status', 'error');
			$responseContext->setJSONResponse('message', 'Nie udało się usunąć projektu selfie.');
			$this->_exit();
		}

		//get selfie
		$finderParams = new \Point7_AbstractDAO_FinderParams();
		$finderParams->addFilter('id', $request->getParam('id'));
		$finderParams->addExplicitFilter('md5(email) = "'.$request->getParam('hash') . '"');
		$finderParams->addExplicitFilter('UNIX_TIMESTAMP(create_date) = "' . $request->getParam('stamp') . '"');
		if (($selfie = $this->_daoRepository->getSelfieProjectsDAO()->find($finderParams)) && $selfie->count() == 1) {
			$path = \Point7_WebApp::getConfigParam('paths.selfie_uploads');

			try {
				unlink($path . '/' . $selfie[0]->getSelfieImgUrl());
				$this->_daoRepository->getSelfieProjectsDAO()->delete($selfie[0]);
			} catch (\Exception $e) {
				$responseContext->setJSONResponse('status', 'error');
				$responseContext->setJSONResponse('message', 'Nie udało się usunąć projektu selfie.');
				$this->_exit();
			}

			$responseContext->setJSONResponse('status', 'ok');

		} else {
			$responseContext->setJSONResponse('status', 'error');
			$responseContext->setJSONResponse('message', 'Nie udało się usunąć projektu selfie.');
			$this->_exit();
		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doGallery(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$finder =  $this->_daoRepository->getSelfieFinder();

		$selfies = $finder->getList(
			\StudioAtrium_Entity_EntityBase_Selfie_Projects::STATUS_PUBLISHED,
			true,
			$request->getParam('limit'),
			$request->getParam('page') - 1
		);
		
		$responseContext->set('url', Helper\Url::buildSelfieListUrl());
		
		$responseContext->set('list', $selfies);
		
		$selfieGalleryPath = \Point7_WebApp::getConfigParam('paths.selfie_gallery');
		$responseContext->set('gallery_path', $selfieGalleryPath);

		$pages = 1;

		if($selfies->total() > 0) {
			$pages = ceil($selfies->total() / $request->getParam('limit'));
			$responseContext->set('pages', $pages);
			$responseContext->set('total', $selfies->total());
		}

		$page = $request->getParam('page');
		$responseContext->set('page', $page);

		if ($page > 1) {
			\StudioAtrium\Application\Helper\Meta::prepareMeta($responseContext, $this->_name, $this->_action, null, $page, $pages);
		} else {
			\StudioAtrium\Application\Helper\Meta::prepareMeta($responseContext, $this->_name, $this->_action);
		}
		
		//breadcrumbs for schema
		$breadcrumbs[1]['id'] = "https://www.studioatrium.pl/projekty-domow/";
		$breadcrumbs[1]['name'] = "Projekty domów";
		$breadcrumbs[2]['id'] = "https://www.studioatrium.pl/projekty-domow/selfie/";
		$breadcrumbs[2]['name'] = "Selfie z projektami domów";
			
		$responseContext->set('schemaBreadcrumbs', $breadcrumbs);

		if ($pages > 1) {
			if ($page == 1) {
				$responseContext->set('nextUrl', \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildSelfieListUrl(2));
			} else if ($page == $pages) {
					
				if ($request->getParam('page') == 2) {
					$responseContext->set('prevUrl', \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildSelfieListUrl());
				} else {
					$responseContext->set('prevUrl', \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildSelfieListUrl($page - 1));
				}
			} else {
				$responseContext->set('nextUrl', \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildSelfieListUrl($page + 1));
					
				if ($request->getParam('page') == 2) {
					$responseContext->set('prevUrl', \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildSelfieListUrl());
				} else {
					$responseContext->set('prevUrl', \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildSelfieListUrl($page - 1));
				}
			}
		}
	}
}