<?php
namespace StudioAtrium\Application\Helper;

/**
 * URL-generation helper. Methods match WebContent/.htaccess rewrite rules.
 */
class Url
{
    public static function buildClickSearchListUrl()
    {
        return '/projekty-domow/szukaj/';
    }

    /**
     * Text-search listing base (query string appended by caller/template).
     */
    public static function buildSearchListUrl()
    {
        return '/projekty-domow/szukaj/';
    }

    /**
     * Matches:
     *   ^/?(?:projekty-domow)/(?:[^,\/]*),([0-9]+).html$
     *   ^/?(?:projekty-domow)/(?:[^,\/]*),([0-9]+),lustro.html$
     *   ^/?(?:projekty-garazy)/(?:[^,\/]*),([0-9]+).html$
     *   ^/?(?:projekty)/(wiaty|altany|...)/(?:[^,\/]*),([0-9]+).html$
     */
    public static function buildProjectUrl($project, $category = null, $mirror = false)
    {
        $category = $category ?: ProjectCategory::getDefaultHouseCategory();
        $slug = StringUtils::slug((string)$project->getName());
        $path = '/' . trim($category, '/') . '/' . ($slug !== '' ? $slug . ',' : '') . $project->getId();
        return $path . ($mirror ? ',lustro.html' : '.html');
    }

    /**
     * Legacy Facebook/share URL shape (projekt-domu-GL-…).
     */
    public static function buidOldProjectUrl($project)
    {
        $symbol = method_exists($project, 'getSymbolNum') ? $project->getSymbolNum() : $project->getId();
        $alpha = method_exists($project, 'getSymbolAlpha') ? $project->getSymbolAlpha() : 'GL';
        return 'https://www.studioatrium.pl/projekt-domu-' . $alpha . '-' . $symbol
            . ',' . $project->getId() . ',61,opis.html';
    }

    /**
     * Category list without pager: /projekty-domow/parterowe/
     */
    public static function buildHouseListUrl($category)
    {
        return '/' . trim($category, '/') . '/';
    }

    /**
     * Paginated/sorted category list:
     *   /projekty-domow/parterowe/b,i,a,2
     * Letters come from UrlParamMap (already mapped by callers).
     */
    public static function buildHouseListPagerUrl($category, $displayType, $sortBy, $sortOrder, $page)
    {
        $base = '/' . trim($category, '/') . '/' . $displayType . ',' . $sortBy . ',' . $sortOrder;
        if ($page && (int)$page > 1) {
            $base .= ',' . (int)$page;
        }
        return $base;
    }

    /**
     * /projekty-domow/realizacje/ and /projekty-domow/realizacje/,2
     */
    public static function buildRealizationsListUrl($page = null)
    {
        return self::buildSimplePagerUrl('/projekty-domow/realizacje/', $page);
    }

    public static function buildRealizationsBuildingListUrl($page = null)
    {
        return self::buildSimplePagerUrl('/projekty-domow/realizacje-w-budowie/', $page);
    }

    public static function buildRealizationsInteriorListUrl($page = null)
    {
        return self::buildSimplePagerUrl('/projekty-domow/realizacje-wnetrz/', $page);
    }

    public static function buildOpinionsListUrl($page = null)
    {
        return self::buildSimplePagerUrl('/projekty-domow/opinie/', $page);
    }

    public static function buildSelfieListUrl($page = null)
    {
        return self::buildSimplePagerUrl('/projekty-domow/selfie/', $page);
    }

    /**
     * Matches ^/?artykuly/(?:[^,]*),([0-9]+).html$ (and aktualnosci/ for news).
     */
    public static function buildArticleUrl($article)
    {
        $prefix = ($article && method_exists($article, 'getDoctype')
            && $article->getDoctype() === \StudioAtrium\Entity\Document::DOCTYPE_NEWS)
            ? 'aktualnosci'
            : 'artykuly';
        $slug = StringUtils::slug((string)$article->getTitle());
        return $prefix . '/' . ($slug !== '' ? $slug . ',' : '') . $article->getId() . '.html';
    }

    public static function buildHashTagListUrl($tagId = null)
    {
        return $tagId ? '/baza-wiedzy,' . $tagId . '/' : '/baza-wiedzy/';
    }

    public static function buildHashTagPagerUrl($tagId, $page)
    {
        return $tagId ? '/baza-wiedzy,' . $tagId . ',' . $page . '/' : '/baza-wiedzy/,' . $page . '/';
    }

    public static function buildAgentsUrl($region = null)
    {
        return $region ? '/przedstawiciele/?region=' . urlencode((string)$region) : '/przedstawiciele/';
    }

    /**
     * Slug used in paths / download filenames (Smarty modifier fixLinkTitle).
     */
    public static function fixLinkTitle($string, $changeCase = true, $replaceSlashes = true)
    {
        $text = StringUtils::polishToLatin((string)$string);
        if ($changeCase) {
            $text = strtolower($text);
        }
        if ($replaceSlashes) {
            $text = str_replace(array('/', '\\'), '-', $text);
        }
        $text = preg_replace('/[^a-zA-Z0-9\-]+/', '-', $text);
        return trim($text, '-');
    }

    private static function buildSimplePagerUrl($base, $page = null)
    {
        if ($page !== null && $page !== '' && (int)$page > 1) {
            // htaccess: /projekty-domow/realizacje/,2
            return rtrim($base, '/') . '/,' . (int)$page;
        }
        return $base;
    }
}
