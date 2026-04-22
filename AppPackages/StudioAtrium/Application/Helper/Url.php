<?php
namespace StudioAtrium\Application\Helper;

/**
 * URL-generation helper. Modules/Project.php, Article.php, Varia.php etc. call
 * 30+ methods on this class (buildProjectUrl, buildHouseListUrl,
 * buildRealizationsListUrl, etc.) that were never ported during the rewrite —
 * this class didn't exist at all.
 *
 * Implemented so far, each checked against its WebContent/.htaccess rewrite
 * rule: buildClickSearchListUrl() (/wynik-wyszukiwania/), buildProjectUrl()
 * (house/garage/other detail pages, incl. mirror variant), buildArticleUrl(),
 * buildHashTagListUrl()/buildHashTagPagerUrl() (baza-wiedzy listing), and
 * buildAgentsUrl(). These cover Project, Article and Varia::doAgent*.
 *
 * The rest (buildHouseListUrl, buildRealizationsListUrl, buildOpinionsListUrl,
 * buildForum*, buildSelfieListUrl, buidOldProjectUrl, fixLinkTitle, ...) are
 * still called from other, currently-unaudited pages (Discuss, ForumArchive,
 * Selfie, paginated house listings, realizations, opinions) - implementing
 * those correctly requires mapping each one against its own .htaccess rule,
 * which hasn't been done yet.
 */
class Url
{
    public static function buildClickSearchListUrl(): string
    {
        return '/projekty-domow/szukaj/';
    }

    /**
     * Matches WebContent/.htaccess:
     *   ^/?(?:projekty-domow)/(?:[^,\/]*),([0-9]+).html$              -> action=house
     *   ^/?(?:projekty-domow)/(?:[^,\/]*),([0-9]+),lustro.html$       -> action=house&version=mirror
     *   ^/?(?:projekty-garazy)/(?:[^,\/]*),([0-9]+).html$             -> action=garage
     *   ^/?(?:projekty)/(wiaty|altany|osadniki|ogrodzenia|gospodarcze)/(?:[^,\/]*),([0-9]+).html$ -> action=other
     *
     * $category is used as the literal first path segment(s) - callers pass
     * 'projekty-domow', 'projekty-garazy', a bare 'wiaty'/'altany'/... (see
     * ProjectCategory::getDefaultOtherCategory(), prepending "/projekty"
     * themselves) or a full "projekty/wiaty" (Relocator301.php). A falsy
     * $category (null, false, '') defaults to the house category.
     */
    public static function buildProjectUrl($project, $category = null, bool $mirror = false): string
    {
        $category = $category ?: ProjectCategory::getDefaultHouseCategory();
        $slug = StringUtils::slug((string)$project->getName());
        $path = '/' . trim($category, '/') . '/' . ($slug !== '' ? $slug . ',' : '') . $project->getId();
        return $path . ($mirror ? ',lustro.html' : '.html');
    }

    /**
     * Matches ^/?artykuly/(?:[^,]*),([0-9]+).html$ (and aktualnosci/ for news).
     */
    public static function buildArticleUrl($article): string
    {
        $prefix = ($article && method_exists($article, 'getDoctype')
            && $article->getDoctype() === \StudioAtrium\Entity\Document::DOCTYPE_NEWS)
            ? 'aktualnosci'
            : 'artykuly';
        $slug = StringUtils::slug((string)$article->getTitle());
        return $prefix . '/' . ($slug !== '' ? $slug . ',' : '') . $article->getId() . '.html';
    }

    /**
     * Matches ^/?baza-wiedzy,([0-9]+)/?$ and ^/?baza-wiedzy/?$.
     */
    public static function buildHashTagListUrl($tagId = null): string
    {
        return $tagId ? '/baza-wiedzy,' . $tagId . '/' : '/baza-wiedzy/';
    }

    /**
     * Matches ^/?baza-wiedzy,([0-9]+),([0-9]+)/?$ and ^/?baza-wiedzy/,([0-9]+)/?$.
     */
    public static function buildHashTagPagerUrl($tagId, int $page): string
    {
        return $tagId ? '/baza-wiedzy,' . $tagId . ',' . $page . '/' : '/baza-wiedzy/,' . $page . '/';
    }

    /**
     * Varia::doAgent - no matching relocator/canonical .htaccess rule was
     * found for this one; kept intentionally simple (region query param)
     * since the module only uses it to build its own pager/canonical links,
     * not to validate the incoming request URL like buildProjectUrl() does.
     */
    public static function buildAgentsUrl($region = null): string
    {
        return $region ? '/przedstawiciele/?region=' . urlencode((string)$region) : '/przedstawiciele/';
    }
}
