<?php

/* $Id: Index.php 762 2013-04-03 11:55:02Z radek $ */

namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\WWW;
use StudioAtrium\Application\Helper;

class Discuss extends WWW\AbstractModule 
{
	/**
	 * @var \StudioAtrium\Entity\Discuss\Finder
	 */
	protected $_discussFinder = null;
	
	/**
	 * @var
	 */
	protected $_loggedUserId = null;
	
	
	/**
	 * @see \Point7_WebApp_Module_Abstract::_initAction()
	 */
	public function _initAction($action,\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext)
	{
		parent::_initAction($action, $request, $appContext, $responseContext);
		$this->_discussFinder = $this->_daoRepository->getDiscussFinder();
	
		if ($appContext->getUser()) {
			$this->_loggedUserId = $appContext->getUser()->getId();
		}

		if (!$request->isValid() && !$request->isParamAllowed('skip_validation_error')) {
			$responseContext->set('error', 'Brak wymaganych parametrów.');
		
			\Point7_WebApp::getLogger('notfound')->error(
				\StudioAtrium\Application\Exception\Helper::format404Message('Błąd ogólny', 'Discuss', $action)
			);

			$this->_exit();
		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doForum(
			\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$responseContext->set('categories', Helper\Discuss::getCategories());
		$responseContext->set('posts', $this->_discussFinder->getLastThreads()->toArray('', 'cat_id'));
				
		//admin ids for comments
		$responseContext->set('adminIds', Helper\User::getAdmins());
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doSearch(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$responseContext->set('categories', Helper\Discuss::getCategories());
		
		$query = $request->getParam('query') ? $request->getParam('query') : false;
		$query = str_replace(array("\\", "/"), "", $query);
		$sqlQuery = $query ? addslashes($query) : false;
		$categoryId = $request->getParam('cid') ? $request->getParam('cid') : false;
		$projectId = $request->getParam('pid') ? $request->getParam('pid') : false;
	
		$posts = false;
		
		if (!$categoryId && !$projectId && !$query) {
			$responseContext->setInfoMessage('Nie zadałeś żadnych kryteriów wyszukiwania na forum.');
			$this->_forward($this->_name, 'forum');
		}
		

		if($categoryId === false) {
			if($query) {
				$posts = $this->_daoRepository->getDiscussPostDAO()->search($sqlQuery, $projectId, ($request->getParam('page') - 1) * $request->getParam('limit'), $request->getParam('limit'));
			} else {
				if($projectId) {
					$posts = $this->_daoRepository->getDiscussPostDAO()->searchProject($projectId, ($request->getParam('page') - 1) * $request->getParam('limit'), $request->getParam('limit'));
				}
			}
		} else {
			$posts = $this->_daoRepository->getDiscussPostDAO()->searchCategory($sqlQuery, $categoryId, $projectId, ($request->getParam('page') - 1) * $request->getParam('limit'), $request->getParam('limit'));
		}

		if($posts) {
			
			$projectIds = array();
			
			foreach($posts['list'] as $key => $item) {
				if($item['project_id']) {
					$projectIds[] = $item['project_id'];
				}
			}
				
			if ($projectIds) {
				$projectFinder = $this->_daoRepository->getProjectFinder(\Point7_WebApp::getConfigParam('paths.clicksearch_sets'));
				$responseContext->set('projects', $projectFinder->getListById($projectIds)->toArray('', 'id'));
			}
			
			if($query) {
				
				$modQuery = str_replace(array('+', '-', '*', '~', '>', '<'), '', $query);
				
				preg_match_all('/\"([^"]*)\"/', $modQuery, $matches);
				
				$phrases = array();
				$words = array();
				
				if($matches) {
					$phrases = $matches[1];
					$queryWithoutPhrases = trim(str_replace($matches[0], '', $modQuery));
				} else {
					$queryWithoutPhrases = $modQuery;
				}
				
				if($queryWithoutPhrases) {
					$words = explode(' ', $queryWithoutPhrases);
				}
				
				$words = array_merge($words, $phrases);
		
				$reps = array();
				
				$excludes = Helper\StringUtils::getHiliteExcludes();
				
				foreach($words as $key => $word) {
					if(!in_array($word, $excludes)) {
						$words[$key] = '/(\s)?(' . $word . ')(\s)?/i';
						$reps[$key] = '$1<mark>$2</mark>$3';
					} else {
						unset($words[$key]);
					}
				}

				foreach($posts['list'] as $key => $post) {
					$txt = preg_replace($words, $reps, $post['content']);
					$txt = str_replace('</mark> <mark>', ' ', $txt); 
					$posts['list'][$key]['content'] = $txt;
				}
			}
			
			$responseContext->set('posts', $posts);

			$responseContext->set('url', Helper\Url::buildForumSearchUrl($request->getParam('page')));
			$responseContext->set('pages', ceil($posts['count'] / $request->getParam('limit')));
			$responseContext->set('page', $request->getParam('page'));
			
			$responseContext->set('total', $posts['count']);
		} else {
			$responseContext->set('total', 0);
		}

		//admin ids for comments
		$responseContext->set('adminIds', Helper\User::getAdmins());
		
		$responseContext->set('query', str_replace('"', '&quot;', $query));
		
		$queryPart = $request->getParam('query') ? '?query=' . $request->getParam('query') : '?query=';
		$queryPart .= $request->getParam('cid') ? '&cid=' . $request->getParam('cid') : '&cid=0';
		$queryPart .= $request->getParam('pid') ? '&pid=' . $request->getParam('pid') : '&pid=0';
		
		$responseContext->set('queryPart', $queryPart);
		$responseContext->set('noindexNofollow', true);
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doCategory(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$responseContext->set('categories', Helper\Discuss::getCategories());
		
		$category = Helper\Discuss::getCategories($request->getParam('id'));
		
		if(!isset($category['title'])) {
			$responseContext->setErrorMessage('Nie ma takiej kategorii');
			$this->_forward($this->_name, 'forum');
		}
		
		$responseContext->set('category', $category);
		
		$threads = $this->_daoRepository->getDiscussPostDAO()->getLastPosts(
			$request->getParam('id'), 
			($request->getParam('page') - 1) * $request->getParam('limit'), 
			$request->getParam('limit')
		);
		
		if($threads) {
			$responseContext->set('threads', $threads['list']);
	
			$pages = ceil($threads['count'] / $request->getParam('limit'));
			
			$responseContext->set('url', Helper\Url::buildForumCategoryUrl($request->getParam('id')));
			$responseContext->set('pages', $pages);
			$responseContext->set('page', $request->getParam('page'));
			
			if ($request->getParam('page') > 1) {
				\StudioAtrium\Application\Helper\Meta::prepareDiscussMeta($responseContext, $this->_name, 'Category', Helper\Discuss::getCategories($request->getParam('id')), $request->getParam('page'), $pages);
			} else {
				\StudioAtrium\Application\Helper\Meta::prepareDiscussMeta($responseContext, $this->_name, 'Category', Helper\Discuss::getCategories($request->getParam('id')));
			}
			
			$projectIds = array();

			foreach($threads['list'] as $key => $item) {
				if($item['project_id']) {
					$projectIds[] = $item['project_id'];
				}
			}
			
			if($projectIds) {
				$projectFinder = $this->_daoRepository->getProjectFinder(\Point7_WebApp::getConfigParam('paths.clicksearch_sets'));
				$responseContext->set('projects', $projectFinder->getListById($projectIds)->toArray('', 'id'));
			}
		}
		
		//admin ids for comments
		$responseContext->set('adminIds', Helper\User::getAdmins());
		
		if (!empty($_COOKIE['tmpDiscussStamp'])) {
			$responseContext->set('tmpStamp', $_COOKIE['tmpDiscussStamp']);
		
			//get Attachment if uploaded earlier
			$attachments = $this->_daoRepository->getAttachmentDAO()->getForObject($_COOKIE['tmpDiscussStamp']);
			$responseContext->set('uploadedTmp', $attachments);
		
		} else {
			$tmpStamp = time();
			$responseContext->set('tmpStamp', $tmpStamp);
			setcookie('tmpDiscussStamp', $tmpStamp, time()+3600*24*7);
		}
		
		if($request->getParam('id') == 100) {
			$responseContext->set('noindex', 1);
		}
		
		//breadcrumbs for schema
		$breadcrumbs[1]['id'] = "https://www.studioatrium.pl/forum/";
		$breadcrumbs[1]['name'] = "Forum dyskusyjne";
		$breadcrumbs[2]['id'] = "https://www.studioatrium.pl" . Helper\Url::buildForumCategoryUrl($request->getParam('id'));
		$breadcrumbs[2]['name'] = $category['title'];
		
		$responseContext->set('schemaBreadcrumbs', $breadcrumbs);
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doAddThread(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
	    if ($this->_checkForBlockedIP() && $this->_checkForBlockedEmail($request->getParam('email'))) {
	    
    		/* @var \StudioAtrium\Entity\Discuss\Post $post */
    		$post = new \StudioAtrium\Entity\Discuss\Post();
    		
    		$post->setCatId($request->getParam('categoryId'));
    		if ($appContext->getUser()) {
    			$post->setAuthorId($appContext->getUser()->getId());
    		}
    		if ($request->getParam('projectId')) {
    			$post->setProjectId($request->getParam('projectId'));
    		}
    		$post->setNick(strip_tags($request->getParam('nick')));
    
    		$post->setTopic(strip_tags($request->getParam('subject')));
    		$post->setContent(strip_tags($request->getParam('content')));
    		$post->setCreateDate(date('Y-m-d H:i:s'));
    		$post->setModifyDate(date('Y-m-d H:i:s'));
    		$post->setStatus(\StudioAtrium_Entity_EntityBase_Discuss_Post::STATUS_PUBLISHED);
    
    		try {
    			$this->_daoRepository->getDiscussPostDAO()->store($post);
    			
    			$responseContext->setInfoMessage('Dodano nowy wpis na forum');
    			
    			if (!empty($_COOKIE['tmpDiscussStamp'])) {
    				setcookie('tmpDiscussStamp', null, -1);
    			}
    			
    			if ($appContext->getUser()) {
    				$this->_modifyUser($appContext->getUser());
    			}
    			
    			if ($request->getParam('notify')) {
    				if ($appContext->getUser()) {
    					$this->_storeNotify($post->getId(), $appContext->getUser()->getEmail(), $appContext->getUser()->getId());
    				} else {
    					$this->_storeNotify($post->getId(), $request->getParam('email'));
    				}
    			}
    			
    			//move tmp attachments
    			if ($request->getParam('isTmpUid')) {
    				$this->_moveTemporaryAttachment($request->getParam('ownerUid'), $post->makeUID(), true);
    			}
    			
    
    		} catch (\Exception $e) {
    			\Point7_WebApp::getLogger('error')->error(
    				\StudioAtrium\Application\Exception\Helper::formatLoggerMessage($e, 'Nie udało się zapisać postu na forum.')
    			);
    			
    			$responseContext->setErrorMessage('Nie udało się dodać nowego wpisu na forum');
    		}
	    } else {
	        $responseContext->setErrorMessage('Nie udało się dodać nowego wpisu na forum, nie masz odpowiednich uprawnień.');
	    }
	    
		
		$responseContext->setForwardParam('id', $request->getParam('categoryId'));
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doThread(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$responseContext->set('categories', Helper\Discuss::getCategories());
		
		$post = $this->_discussFinder->getById($request->getParam('id'), true, false, true);
		
		if($post) {
			if($post->getParentId() > 0) {
				$this->_forward($this->_name, 'thread', array('id' => $post->getParentId()));
			} else {
				$responseContext->set('post', $post);
			
				$thread = $this->_discussFinder->getThread(
					$request->getParam('id'),
					$request->getParam('page') - 1,
					$request->getParam('limit')
				);
				
				if($thread) {
						
					$pagesCount = ceil($thread->total() / $request->getParam('limit'));
					
					$responseContext->set('pages', $pagesCount);
					
					if($request->getParam('ostatni')) {
						
						$thread = $this->_discussFinder->getThread(
							$request->getParam('id'),
							$pagesCount - 1,
							$request->getParam('limit')
						);
						
						$responseContext->set('page', $pagesCount);
						$responseContext->set('noindexNofollow', true);
					} else {
						$responseContext->set('page', $request->getParam('page'));
					}
					
					$responseContext->set('thread', $thread);
					$responseContext->set('url', Helper\Url::buildForumPostUrl($post));
				}
				
				//breadcrumbs for schema
				$breadcrumbs[1]['id'] = "https://www.studioatrium.pl/forum/";
				$breadcrumbs[1]['name'] = "Forum dyskusyjne";
				$breadcrumbs[2]['id'] = "https://www.studioatrium.pl" . Helper\Url::buildForumCategoryUrl($post->getCatId());
				$cat = Helper\Discuss::getCategories($post->getCatId());
				$breadcrumbs[2]['name'] = $cat['title'];
				$breadcrumbs[3]['id'] = "https://www.studioatrium.pl" . Helper\Url::buildForumPostUrl($post);
				$breadcrumbs[3]['name'] = $post->getTopic();
					
				$responseContext->set('schemaBreadcrumbs', $breadcrumbs);
				
				if ($request->getParam('page') > 1) {
					\StudioAtrium\Application\Helper\Meta::prepareDiscussMeta($responseContext, $this->_name, 'Thread', Helper\Discuss::getCategories($post->getCatId()), $request->getParam('page'), $pagesCount, $post->getTopic());
				} else {
					\StudioAtrium\Application\Helper\Meta::prepareDiscussMeta($responseContext, $this->_name, 'Thread', Helper\Discuss::getCategories($post->getCatId()), null, null, $post->getTopic());
				}
				
				if($post->getProjectId()) {
					$projectFinder = $this->_daoRepository->getProjectFinder(\Point7_WebApp::getConfigParam('paths.clicksearch_sets'));
					$responseContext->set('project', $projectFinder->getById($post->getProjectId()));
				}
				
				//for logged user option for adding/removing notify
				$user = $appContext->getUser();
				if($user) {
					$responseContext->set('postNotifcation', $this->_discussFinder->getUserPostNotification($user->getId(), $post->getId()));
				}
				
				//admin ids for comments
				$responseContext->set('adminIds', Helper\User::getAdmins());
				
				if (!empty($_COOKIE['tmpDiscussStamp'])) {
					$responseContext->set('tmpStamp', $_COOKIE['tmpDiscussStamp']);
				
					//get Attachment if uploaded earlier
					$attachments = $this->_daoRepository->getAttachmentDAO()->getForObject($_COOKIE['tmpDiscussStamp']);
					$responseContext->set('uploadedTmp', $attachments);
				
				} else {
					$tmpStamp = time();
					$responseContext->set('tmpStamp', $tmpStamp);
					setcookie('tmpDiscussStamp', $tmpStamp, time()+3600*24*7);
				}
			}
			
			if($post->getProjectId()) {
				$responseContext->set('noindex', 1);
			}
		} else {
			$responseContext->setErrorMessage('Nie ma takiego wątku na forum.');
			$this->_forward($this->_name, 'forum');
		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doAddPost(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
	    if ($this->_checkForBlockedIP() && $this->_checkForBlockedEmail($request->getParam('email'))) {

    		/* @var \StudioAtrium\Entity\Discuss\Post $post */
    		$post = new \StudioAtrium\Entity\Discuss\Post();
    
    		$post->setCatId($request->getParam('categoryId'));
    		$post->setParentId($request->getParam('parentId'));
    		if($appContext->getUser()) {
    			$post->setAuthorId($appContext->getUser()->getId());
    		}
    		if($request->getParam('projectId')) {
    			$post->setProjectId($request->getParam('projectId'));
    		}
    		$post->setNick(strip_tags($request->getParam('nick')));
    
    		$post->setContent(strip_tags($request->getParam('content')));
    		$post->setCreateDate(date('Y-m-d H:i:s'));
    		$post->setModifyDate(date('Y-m-d H:i:s'));
    		$post->setStatus(\StudioAtrium_Entity_EntityBase_Discuss_Post::STATUS_PUBLISHED);
    
    		try {
    			$this->_daoRepository->getDiscussPostDAO()->store($post);
    			
    			$responseContext->setInfoMessage('Dodano nowy wpis na forum');
    			
    			$this->_sendNewPostNotifications($post);
    			
    			if ($appContext->getUser()) {
    				$this->_modifyUser($appContext->getUser());
    			}
    				
    			if ($request->getParam('notify')) {
    				if ($appContext->getUser()) {
    					$this->_storeNotify($request->getParam('parentId'), $appContext->getUser()->getEmail(), $appContext->getUser()->getId());
    				} else {
    					$this->_storeNotify($request->getParam('parentId'), $request->getParam('email'));
    				}
    			}
    			
    			//move tmp attachments
    			if ($request->getParam('isTmpUid')) {
    				$this->_moveTemporaryAttachment($request->getParam('ownerUid'), $post->makeUID(), true);
    			}
    				
    		} catch (\Exception $e) {
    			\Point7_WebApp::getLogger('error')->error(
    				\StudioAtrium\Application\Exception\Helper::formatLoggerMessage($e, 'Nie udało się zapisać postu na forum.')
    			);
    			
    			$responseContext->setErrorMessage('Nie udało się dodać nowego wpisu na forum');
    		}
	    } else {
	        $responseContext->setErrorMessage('Nie udało się dodać nowego wpisu na forum, nie masz odpowiednich uprawnień.');
	    }
		
		$responseContext->setForwardParam('cid', $request->getParam('categoryId'));
		$responseContext->setForwardParam('id', $request->getParam('parentId'));
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doEditThread(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$post = $this->_discussFinder->getById($request->getParam('id'), true, true, true);
		$responseContext->set('post', $post);
		
		$responseContext->set('notification', $this->_discussFinder->getUserPostNotification($post->getAuthorId(), $post->getId()));
	}
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doStoreThread(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {

		/* @var \StudioAtrium\Entity\Discuss\Post $post */
		$post = $this->_daoRepository->getDiscussPostDAO()->get($request->getParam('postId'));
		
		$children = $this->_discussFinder->getThread($request->getParam('postId'), $page = 0, $limit = false, $status = false);

		if($request->getParam('projectId')) {
			$post->setProjectId($request->getParam('projectId'));
			
			if($children) {
				foreach($children as $item) {
					$item->setProjectId($request->getParam('projectId'));
				}
			}
			
		} else {
			$post->setProjectId(0);
			
			if($children) {
				foreach($children as $item) {
					$item->setProjectId(0);
				}
			}
		}
		
		$post->setTopic(strip_tags($request->getParam('subject')));
		$post->setContent(strip_tags($request->getParam('content')));
		$post->setModifyDate(date('Y-m-d H:i:s'));
		$post->setIsModerated(0);

		try {
			$this->_daoRepository->getDiscussPostDAO()->store($post);
				
			$responseContext->setInfoMessage('Wpis na forum został zmieniony');
			
			try {
				$this->_daoRepository->getDiscussPostDAO()->store($children);
			} catch (\Exception $e) {
				\Point7_WebApp::getLogger('error')->error(
					\StudioAtrium\Application\Exception\Helper::formatLoggerMessage($e, 'Nie udał się update project id w postach wątku.')
				);
			}
			
			$user = $appContext->getUser();
			
			$notify = $this->_discussFinder->getUserPostNotification($post->getAuthorId(), $post->getId());
				
			if($request->getParam('notify')) {
				if(!$notify && $user) {
					$this->_storeNotify($post->getId(), $user->getEmail(), $user->getId());
				}
			} else {
				if($notify) {
					try {
						$this->_daoRepository->getDiscussNotifyDAO()->delete($notify);
					} catch (\Exception $e) {
						\Point7_WebApp::getLogger('error')->error(
							\StudioAtrium\Application\Exception\Helper::formatLoggerMessage($e, 'Nie udało się usunąć powiadomień usera na forum.')
						);
					}
				}
			}
				
		} catch (\Exception $e) {
			\Point7_WebApp::getLogger('error')->error(
				\StudioAtrium\Application\Exception\Helper::formatLoggerMessage($e, 'Nie udało się zapisać edycji postu na forum.')
			);
				
			$responseContext->setErrorMessage('Nie udało się zmienić wpisu na forum');
		}

		$responseContext->setForwardParam('cid', $post->getCatId());
		$responseContext->setForwardParam('id', $post->getId());
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doEditPost(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$post = $this->_discussFinder->getById($request->getParam('id'), false, false, false, true);
		$responseContext->set('post', $post);

		$responseContext->set('notification', $this->_discussFinder->getUserPostNotification($post->getAuthorId(), $post->getParentId()));
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doStorePost(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		/* @var \StudioAtrium\Entity\Discuss\Post $post */
		$post = $this->_daoRepository->getDiscussPostDAO()->get($request->getParam('postId'));

		$post->setContent(strip_tags($request->getParam('content')));
		$post->setModifyDate(date('Y-m-d H:i:s'));
		$post->setIsModerated(0);

		try {
			$this->_daoRepository->getDiscussPostDAO()->store($post);

			$responseContext->setInfoMessage('Wpis na forum został zmieniony');
				
			$user = $appContext->getUser();
				
			$notify = $this->_discussFinder->getUserPostNotification($post->getAuthorId(), $post->getParentId());

			if($request->getParam('notify')) {
				if(!$notify && $user) {
					$this->_storeNotify($post->getParentId(), $user->getEmail(), $user->getId());
				}
			} else {
				if($notify) {
					try {
						$this->_daoRepository->getDiscussNotifyDAO()->delete($notify);
					} catch (\Exception $e) {
						\Point7_WebApp::getLogger('error')->error(
							\StudioAtrium\Application\Exception\Helper::formatLoggerMessage($e, 'Nie udało się usunąć powiadomień usera na forum.')
						);
					}
				}
			}

		} catch (\Exception $e) {
			\Point7_WebApp::getLogger('error')->error(
				\StudioAtrium\Application\Exception\Helper::formatLoggerMessage($e, 'Nie udało się zapisać edycji postu na forum.')
			);

			$responseContext->setErrorMessage('Nie udało się zmienić wpisu na forum.');
		}

		$responseContext->setForwardParam('cid', $post->getCatId());
		$responseContext->setForwardParam('id', $post->getParentId());
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doSendMessage(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		if (!$request->isValid()) {
			$responseContext->setJSONResponse('status', 'fail');
			$this->_exit();
		}

		/* @var \StudioAtrium\Entity\Discuss\Post $post */
		$message = new \StudioAtrium\Entity\Discuss\Message();
		$message->setParentId($request->getParam('parentId'));
		$message->setSenderId($request->getParam('senderId'));
		$message->setReceiverId($request->getParam('receiverId'));
		$message->setTopic($request->getParam('title'));
		$message->setContent($request->getParam('content'));
		$message->setCreateDate(date('Y-m-d H:i:s'));
		
		try {
			$this->_daoRepository->getDiscussMessageDAO()->store($message);
			
			$smartyWrapper = new \Point7_WebApp_View_Smarty3_Wrapper();
			$smartyWrapper->template_dir = \Point7_WebApp::getConfigParam('views.smarty.template_dir');
			$smartyWrapper->compile_dir = \Point7_WebApp::getConfigParam('views.smarty.compile_dir');
				
			$html = $smartyWrapper->render('Discuss/EmailNewMessage.tpl');
			
			$receiver = $this->_daoRepository->getUserFinder()->getById($request->getParam('receiverId'), false);
				
			if($receiver) {
				$this->_sendMail(
					$receiver->getEmail(),
					'Nowa wiadomość od użytkownika forum STUDIA ATRIUM',
					$html,
					\Point7_WebApp::getConfigParam('mailer.sender'),
					true
				);
			}
			
			$responseContext->setJSONResponse('status', 'ok');
		} catch (\Exception $e) {
			\Point7_WebApp::getLogger('error')->error(
				\StudioAtrium\Application\Exception\Helper::formatLoggerMessage($e, 'Nie udało się zapisać widomości na forum.')
			);
				
			$responseContext->setJSONResponse('status', 'error');
		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doUnsubscribe(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		if ($request->isValid()) {
			
			$md5Id = substr($request->getParam('hash'), 0, 32);
			$md5Email = substr($request->getParam('hash'), 32, 32);
			
			$params = new \Point7_AbstractDAO_FinderParams();
			$params->addFunctionFilter('id', $md5Id, 'md5(id)');
			$params->addFunctionFilter('email', $md5Email, 'md5(email)');

			/* @var \StudioAtrium\Entity\Discuss\Notify $notify */
			if (($notify = $this->_daoRepository->getDiscussNotifyDAO()->find($params)) && $notify->count() == 1) {
				$this->_daoRepository->getDiscussNotifyDAO()->delete($notify[0]);
				$responseContext->setInfoMessage('Zostałeś wypisany z obserwujących ten wątek na forum.');
			} else {
				$responseContext->setErrorMessage('Nie udało się wypisać z obserwujących wątek na forum. Zostałeś już wypisany bądź wątek został usunięty.');
				$this->_exit();
			}
			
		} else {
			$responseContext->setErrorMessage('Nie udało się wypisać z obserwujących wątek na forum. Błędny link. Skontaktuj się z nami.');
			$this->_exit();
		}
	}
	
	
	/**
	 * @param \Point7_WebApp_Request_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response $responseContext
	 */
	public function doSetNotification(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		if (!$request->isValid()) {
			$responseContext->setJSONResponse('status', 'fail');
			$this->_exit();
		}
		
		$result = 'ok';
		
		$user = $appContext->getUser();
		
		if($user) {
			if($request->getParam('notify') == 'yes') {
				$isStored = $this->_storeNotify($request->getParam('pid'), $user->getEmail(), $user->getId());
				
				if(!$isStored) {
					$result = 'fail';
				}
 			} else {
				$notify = $this->_discussFinder->getUserPostNotification($user->getId(), $request->getParam('pid'));
				
				try {
					$this->_daoRepository->getDiscussNotifyDAO()->delete($notify);
				} catch (\Exception $e) {
					\Point7_WebApp::getLogger('error')->error(
						\StudioAtrium\Application\Exception\Helper::formatLoggerMessage($e, 'Nie udało się zapisać widomości na forum.')
					);
					
					$result = 'fail';
				}
			}
		} else {
			$result = 'fail';
		}
		
		$responseContext->setJSONResponse('status', $result);
	}
	
	
	private function _checkForBlockedIP()
	{
	    $blockedIpList = \StudioAtrium\Application\Helper\Discuss::getBlockedIp();
	    
	    if (!empty($blockedIpList) && array_key_exists($_SERVER['REMOTE_ADDR'], $blockedIpList)) {
	        \Point7_WebApp::getLogger('error')->error('IP ' . $_SERVER['REMOTE_ADDR'] . ' zablokowane, nie dodano wpisu na forum.');
	       return false;   
	    }
	    return true;
	}
	
	
	private function _checkForBlockedEmail($email = false)
	{
	    if (!empty($email)) {
    	    $blockedEmailList = \StudioAtrium\Application\Helper\Discuss::getBlockedEmail();
    	    
    	    if (!empty($blockedEmailList) && array_key_exists($email, $blockedEmailList)) {
    	        \Point7_WebApp::getLogger('error')->error('Email from ' . $_SERVER['REMOTE_ADDR'] . ' zablokowany, nie dodano wpisu na forum.');
    	       return false;
    	    }
	    }
	    
    	return true;
	}
	
	
	/**
	 * @param \StudioAtrium\Entity\User $user
	 */
	private function _modifyUser($user)
	{
		$props = $user->getProps(true) or $props = array();
			
		$forumProps = isset($props['forum']) ? $props['forum'] : array();
			
		if(isset($forumProps['count'])) {
			$forumProps['count']++;
		} else {
			$forumProps['count'] = 1;
			$forumProps['date'] = date('d-m-Y');
		}
			
		$props['forum'] = $forumProps;
		
		$user->setProps(json_encode($props));
		
		try {
			$this->_daoRepository->getUserDAO()->store($user);
		} catch (\Exception $e) {
			\Point7_WebApp::getLogger('error')->error(
				\StudioAtrium\Application\Exception\Helper::formatLoggerMessage($e, 'Nie udało się zapisać propsów usera na forum.')
			);
		}
	}
	
	
	/**
	 * @param integer $postId
	 * @param string $email
	 * @param integer $userId
	 */
	private function _storeNotify($postId, $email, $userId = false)
	{
		$notify = new \StudioAtrium\Entity\Discuss\Notify();
		
		if($userId) {
			$notify->setUserId($userId);
		}
		
		$notify->setEmail($email);
		$notify->setDiscussPostId($postId);
		
		try {
			$this->_daoRepository->getDiscussNotifyDAO()->store($notify);
		} catch (\Exception $e) {
			if($e->getCode() != 23000) {
				\Point7_WebApp::getLogger('error')->error(
					\StudioAtrium\Application\Exception\Helper::formatLoggerMessage($e, 'Nie udało się zapisać powiadomień usera na forum.')
				);
				
				return false;
			}
		}
		
		return true;
	}
	
	private function _sendNewPostNotifications($post)
	{
		$url = \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildForumPostUrl($post);
		
		$smartyWrapper = new \Point7_WebApp_View_Smarty3_Wrapper();
		$smartyWrapper->template_dir = \Point7_WebApp::getConfigParam('views.smarty.template_dir');
		$smartyWrapper->compile_dir = \Point7_WebApp::getConfigParam('views.smarty.compile_dir');
		
		foreach($this->_discussFinder->getNotifications($post->getParentId()) as $item) {
			if (($item->getUserId() && $item->getUserId() != $this->_loggedUserId) || !$item->getUserId()) {
				$smartyWrapper->assign('url', $url);
				$smartyWrapper->assign('author', $post->getNick());
				$smartyWrapper->assign('unsubscribe', $this->_createDiscussUnsubscribeLink($item));
	
				$html = $smartyWrapper->render('Discuss/EmailNotify.tpl');
				
				$this->_sendMail(
					$item->getEmail(),
					'Nowy post na forum STUDIA ATRIUM',
					$html,
					\Point7_WebApp::getConfigParam('mailer.sender'),
					true
				);
			}
		}
	}
}
