<?php

class LoadMenuCommand extends Point7_WebApp_Command_Abstract
{
    protected function _doExecute(
        Point7_WebApp_Request $request,
        Point7_WebApp_Context_Application $appContext,
        Point7_WebApp_Context_Response $responseContext
    ) {
        $cache = \Point7_WebApp::getCache();
        $cacheKey = 'site_menu_tree';

        if (!$menu = $cache->get($cacheKey)) {
            $finder = \Point7_WebApp::getDAORepository()->getProjectCategoryFinder();
            $menu = $finder->buildMenuTree();
            $cache->set($cacheKey, $menu, 3600);
        }

        $responseContext->set('siteMenu', $menu);

        return self::STATE_OK;
    }
}
