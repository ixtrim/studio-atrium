<?php
namespace StudioAtrium\Application\Helper;

/**
 * URL-generation helper. Modules/Project.php calls 30+ methods on this class
 * (buildProjectUrl, buildHouseListUrl, buildRealizationsListUrl, etc.) that
 * were never ported during the rewrite — this class didn't exist at all.
 *
 * Only buildClickSearchListUrl() is implemented for real (needed to unblock
 * /wynik-wyszukiwania/, matching WebContent/.htaccess line 446). The other
 * methods below are still called from other, currently-unaudited pages
 * (individual project pages, paginated house listings, realizations,
 * opinions) — implementing those correctly requires mapping each one
 * against its own .htaccess rewrite rule, which hasn't been done yet.
 */
class Url
{
    public static function buildClickSearchListUrl(): string
    {
        return '/projekty-domow/szukaj/';
    }
}
