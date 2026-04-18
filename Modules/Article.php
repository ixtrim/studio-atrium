<?php

/* $Id: Index.php 762 2013-04-03 11:55:02Z radek $ */

namespace StudioAtrium\Application\WWW\Module;
use StudioAtrium\Application\WWW;
use StudioAtrium\Application\Helper;

class Article extends WWW\AbstractModule 
{
	/**
	 * @var StudioAtrium_Document_Finder
	 */
	protected $_docFinder = null;
	
	
	/**
	 * @see Point7_WebApp_Module_Abstract::_initAction()
	 */
	public function _initAction($action, \Point7_WebApp_Request $request, $appContext, $responseContext): void
	{
		parent::_initAction($action, $request, $appContext, $responseContext);

		if (!$request->isValid() && !$request->isParamAllowed('skip_validation_error')) {
			$responseContext->set('error', 'Brak wymaganych parametrów.');
			
			\Point7_WebApp::getLogger('notfound')->error(
				\StudioAtrium\Application\Exception\Helper::format404Message('Błąd ogólny', 'Article', $action)
			);
			
			$this->_exit();
		}
		
		$this->_docFinder = $this->_daoRepository->getDocumentFinder();
	}
	
	
	/**
	 * @param \Point7_WebApp_Context_Response_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response_Filtered $responseContext
	 */
	public function doHashTag(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$results = 0;
		if ($request->getParam('tag')) {
			$articles = $this->_docFinder->getList(
				false,
				null,
				\StudioAtrium\Entity\Document::STATUS_PUBLISHED,
				$request->getParam('limit'),
				$request->getParam('page'),
				$request->getParam('search'),
				$request->getParam('tag'),
				true
			);

			$url = Helper\Url::buildHashTagListUrl($request->getParam('tag'));
				
		} else {
			
			$articles = $this->_docFinder->getList(
				false,
				null,
				\StudioAtrium\Entity\Document::STATUS_PUBLISHED,
				$request->getParam('limit'),
				$request->getParam('page'),
				$request->getParam('search'),
				null, 
				true
			);
			
			$url = Helper\Url::buildHashTagListUrl(null);
		}
		
		$responseContext->set('url', $url);
		
		if(strpos($_SERVER['REQUEST_URI'], '?') !== false) {
			$responseContext->set('query', substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], '?')));
			//2026-04-07 dodane na wniosek Sempai
			$responseContext->set('noindexNofollow', true);
		}
		
		$pages = 1;

		if ($articles) {
			$pages = ceil($articles->total() / $request->getParam('limit'));
			$responseContext->set('pages', $pages);
			$responseContext->set('total', $articles->total());
			
			$taggedArticles = $articles->toArray();
			$this->_daoRepository->getHashTagFinder()->getTagsForDocuments($taggedArticles);
				
			$responseContext->set('articles', $taggedArticles);
		}
		
		$allTags = $this->_daoRepository->getHashTagFinder()->getList();
		$responseContext->set('allTags', $allTags);
		
		$tagId = $request->getParam('tag');
		$tag = '';
		if(isset($allTags['main'][$tagId]) || isset($allTags['normal'][$tagId])) {
			$tag = isset($allTags['main'][$tagId]) ? $allTags['main'][$tagId] : $allTags['normal'][$tagId];
		} else {
			if ($request->getParam('search')) {
				$tag = 'wyszukiwanie: ' . $request->getParam('search');
			} else {
				$tag = 'ostatnio dodane';
			}
		}
		
		$page = $request->getParam('page');
		$responseContext->set('page', $page);
		
		if ($page > 1) {
			\StudioAtrium\Application\Helper\Meta::prepareArticleMeta($responseContext, $this->_name, 'HashTag', $tag, $page, $pages);
		} else {
			\StudioAtrium\Application\Helper\Meta::prepareArticleMeta($responseContext, $this->_name, 'HashTag', $tag);
		}
		
		if ($pages > 1) {
			if ($page == 1) {
				$responseContext->set('nextUrl', \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildHashTagPagerUrl(
					$tagId,
					2
					)
				);
			} else if ($page == $pages) {
					
				if($request->getParam('page') == 2) {
					$responseContext->set('prevUrl', \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildHashTagListUrl($tagId));
				} else {
					$responseContext->set('prevUrl', \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildHashTagPagerUrl(
						$tagId,
						$page - 1
						)
					);
				}
			} else {
				$responseContext->set('nextUrl', \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildHashTagPagerUrl(
					$tagId,
					$page + 1
					)
				);
					
				if($request->getParam('page') == 2) {
					$responseContext->set('prevUrl', \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildHashTagListUrl($tagId));
				} else {
					$responseContext->set('prevUrl', \Point7_WebApp::getConfigParam('domain.www') . Helper\Url::buildHashTagPagerUrl(
						$tagId,
						$page - 1
						)
					);
				}
			}
		}
	}
	
	/**
	 * @param \Point7_WebApp_Context_Response_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response_Filtered $responseContext
	 */
	public function doItem(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		if ($request->getParam('docId') && !$article = $this->_docFinder->getById($request->getParam('docId'), false, \StudioAtrium\Entity\Document::STATUS_PUBLISHED, true)) {
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: " . \Point7_WebApp::getConfigParam('domain.www') . "/baza-wiedzy");
		}
		
		if ($request->getParam('charId') && !$articleF = $this->_docFinder->getByCharId($request->getParam('charId'), \StudioAtrium\Entity\Document::DOCTYPE_PAGE, \StudioAtrium\Entity\Document::STATUS_PUBLISHED)) {
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: " . \Point7_WebApp::getConfigParam('domain.www') . "/baza-wiedzy");
		} elseif (!empty($articleF)) {
			$article = $articleF->current();
		}
		
		$uHelper = new \StudioAtrium\Application\Helper\Url();
		//2026-01-27 - Sempai - przekierowanie zlego adresu
		if ('/' . $uHelper->buildArticleUrl($article) != $_SERVER['REQUEST_URI']) {
		    header('HTTP/1.1 301 Moved Permanently');
		    header("Location: " . \Point7_WebApp::getConfigParam('domain.www') .'/'. $uHelper->buildArticleUrl($article));
		    header('Connection: close');
		    die();
		}
		
		$responseContext->set('allTags', $this->_daoRepository->getHashTagFinder()->getList());

		$documentTags = $this->_daoRepository->getHashTagFinder()->getTagsForDocument($article);
		$responseContext->set('documentTags', $documentTags);

		
		
		//Canonical URL
// 		$canonical = $uHelper->buildArticleUrl($article);
// 		$uri = preg_replace('/.*\/artykuly\//', '/artykuly/', $request->getRequestUri());

// 		if(strpos($request->getRequestUri(), '?module=article&action=item') !== false || $uri != $canonical) {
// 			$responseContext->set('canonicalUrl', \Point7_WebApp::getConfigParam('domain.www') . $canonical);
// 		}

        //canonical url - 2027-01-27
		$url = \Point7_WebApp::getConfigParam('domain.www') . '/' . $uHelper->buildArticleUrl($article);
		$responseContext->set('canonicalUrl', $url);
		

		$responseContext->set('article', $article);
// 		$responseContext->set('pageTitle', $article->getTitle() . ' - ' . strtoupper(StudioAtrium_Helper_String::getPathRootLabel()));

		if ($article->getMetaTitle()) {
			\StudioAtrium\Application\Helper\Meta::prepareArticleMeta($responseContext, $this->_name, 'Item', null, null, null, $article->getMetaTitle());
		} else {
			\StudioAtrium\Application\Helper\Meta::prepareArticleMeta($responseContext, $this->_name, 'Item', null, null, null, $article->getTitle());
		}
		
		//breadcrumbs for schema
		$breadcrumbs[1]['id'] = "https://www.studioatrium.pl/baza-wiedzy/";
		$breadcrumbs[1]['name'] = "Artykuły w bazie wiedzy";
		$breadcrumbs[2]['id'] = "https://www.studioatrium.pl/" . $uHelper->buildArticleUrl($article);
		$breadcrumbs[2]['name'] = $article->getTitle();
		
		$responseContext->set('schemaBreadcrumbs', $breadcrumbs);
	}
	
	
	/**
	 * @param \Point7_WebApp_Context_Response_Filtered $request
	 * @param \Point7_WebApp_Context_Application $appContext
	 * @param \Point7_WebApp_Context_Response_Filtered $responseContext
	 */
	public function doPrint(
			\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		$article = $this->_docFinder->getById($request->getParam('docId'), false, false, true);
		$responseContext->set('article', $article);
	}
	
	
	/**
	 * @param Point7_WebApp_Request $request
	 * @param Point7_WebApp_Context_Application $appContext
	 * @param Point7_WebApp_Context_Response $responseContext
	 */
	public function doSend(
		\Point7_WebApp_Request_Filtered $request, WWW\AppContext $appContext, WWW\ResponseContext $responseContext
	) {
		if (!$request->isValid()) {
			$responseContext->setJSONResponse('status', 'fail');
			$this->_exit();
		}

		$result = false;

		if ($mailerConfig = $appContext->getConfigParam('mailer.sender')) {
				
			$mailerConfig['sender']['from_email'] = $request->getParam('sender_email');

			$article = $this->_docFinder->getById($request->getParam('docId'), false, false, true);
			$url = \Point7_WebApp::getConfigParam('domain.www') .'/' . Helper\Url::buildArticleUrl($article);
			
			$content = 'Wysyłam link do ciekawego artykułu:<br><br><a href="'.$url.'">' . $url . '</a><br><br>' . $request->getParam('signature');

			if ($result = $this->_sendMail($request->getParam('receiver_email'), 'Ciekawy artykuł Studia Atrium', $content, $mailerConfig, true)) {
				$responseContext->setJSONResponse('status', 'ok');
			} else {
				$responseContext->setJSONResponse('status', 'error');
			}

		} else {
			\Point7_WebApp::getLogger('error')->error('Error during sending e-mail from article box - no mailer config');
			$responseContext->setJSONREsponse('status', 'error');
		}

		if (!$result) {
			$responseContext->setJSONResponse('status', 'fail');
		} else {
			$responseContext->setJSONResponse('status', 'ok');
		}
	}
}
