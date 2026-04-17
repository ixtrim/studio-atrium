<?php

/* $Id: Index.php 762 2013-04-03 11:55:02Z radek $ */

namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\WWW;
use StudioAtrium\Application\Helper;

class ForumArchive extends WWW\AbstractModule 
{
	/**
	 * @var \StudioAtrium\Entity\ForumArchive\Finder
	 */
	protected $_forumArchiveFinder = null;
	
	
	/**
	 * @see Point7_WebApp_Module_Abstract::_initAction()
	 */
	protected function _initAction($action,\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext)
	{
		parent::_initAction($action, $request, $appContext, $responseContext);
		
		if (!$request->isValid()) {
			$responseContext->setErrorMessage('Wystąpił błąd. Brak wymaganych parametrów.');
			$this->_exit();
		}
		
		$this->_forumArchiveFinder = $this->_daoRepository->getForumArchiveFinder();
		$responseContext->set('noindexNofollow',1);
	}
	
	/**
	 * Display post lists and selected thread
	 */
	public function doProject(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		if ($request->isValid() && ($project = $this->_daoRepository->getProjectFinder(null)->getById($request->getParam('projectId')))) {
			$urlHelper = new \StudioAtrium\Application\Helper\Url();
			$link = $urlHelper::buildProjectUrl($project);
		} else {
			$link = '/projekty-domow/';
		}
			
		header('HTTP/1.1 301 Moved Permanently');
		header("Location: " . $link);
		header('Connection: close');
		die();
	}
	
	
	/**
	 * Display post lists and selected thread
	 */
	public function doList(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$categoryId = $request->getParam('postId') ? $request->getParam('postId') : 1;

		$forumArchive = $this->_forumArchiveFinder->getPostsByThreadId(
			$categoryId,
			$request->getParam('page'),
			$request->getParam('limit')
		);

		/* jeżeli wybrany konkretny wątek, dobierz wybrany post */
		if ($request->getParam('postId') > 4) {
			
			$forumThread = $this->_forumArchiveFinder->getThreadById($request->getParam('postId'));
			
			if (empty($forumThread)) {
				$this->_exit(false, 'thread_not_found');
			}

			$responseContext->set('forum_thread', $forumThread);
		} else {
			$url = Helper\Url::buildForumArchiveListUrl($request->getParam('postId'), substr($request->getParam('title'), 0, 70));
	
			$responseContext->set('url', str_replace('.html', '', $url));
		}

		$responseContext->set('archive', $forumArchive);
		
		$pages = 1;
		
		if($request->getParam('postId') < 5 && $forumArchive->total() > 0) {
			$pages = ceil($forumArchive->total() / $request->getParam('limit'));
			$responseContext->set('pages', $pages);
			$responseContext->set('total', $forumArchive->total());
		}
		
		$page = $request->getParam('page');
		$responseContext->set('page', $page);
		
		if($page > 1) {
			\StudioAtrium\Application\Helper\Meta::prepareArticleMeta($responseContext, $this->_name, 'List', str_replace('-', ' ', $request->getParam('title')), $page, $pages);
		} else {
			\StudioAtrium\Application\Helper\Meta::prepareArticleMeta($responseContext, $this->_name, 'List', str_replace('-', ' ', $request->getParam('title')));
		}
		
		
		if($pages > 1) {
			if ($page == 1) {
				$responseContext->set('nextUrl', \Point7_WebApp::getConfigParam('domain.fullurl') . Helper\Url::buildForumArchivePagerUrl(
						$request->getParam('postId'),
						substr($request->getParam('title'), 0, 70),
						2
					)
				);
			} else if ($page == $pages) {
					
				if($request->getParam('page') == 2) {
					$responseContext->set('prevUrl', \Point7_WebApp::getConfigParam('domain.fullurl') . Helper\Url::buildForumArchiveListUrl($request->getParam('postId'), substr($request->getParam('title'), 0, 70)));
				} else {
					$responseContext->set('prevUrl', \Point7_WebApp::getConfigParam('domain.fullurl') . Helper\Url::buildForumArchivePagerUrl(
							$request->getParam('postId'),
							substr($request->getParam('title'), 0, 70),
							$page - 1
						)
					);
				}
			} else {
				$responseContext->set('nextUrl', \Point7_WebApp::getConfigParam('domain.fullurl') . Helper\Url::buildForumArchivePagerUrl(
						$request->getParam('postId'),
						substr($request->getParam('title'), 0, 70),
						$page + 1
					)
				);
					
				if($request->getParam('page') == 2) {
					$responseContext->set('prevUrl', \Point7_WebApp::getConfigParam('domain.fullurl') . Helper\Url::buildForumArchiveListUrl($request->getParam('postId'), substr($request->getParam('title'), 0, 70)));
				} else {
					$responseContext->set('prevUrl', \Point7_WebApp::getConfigParam('domain.fullurl') . Helper\Url::buildForumArchivePagerUrl(
							$request->getParam('postId'),
							substr($request->getParam('title'), 0, 70),
							$page - 1
						)
					);
				}
			}
		}
	}
}
