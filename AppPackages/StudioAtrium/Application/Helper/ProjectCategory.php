<?php
namespace StudioAtrium\Application\Helper;

class ProjectCategory
{
    const FEATURED_CATEGORY_ID = 1;

    // type => bare category slug, mirrors Helper\Project::$categoryTypeMap in reverse.
    private static $otherCategoryByType = [
        'carport'     => 'wiaty',
        'arbor'       => 'altany',
        'tank'        => 'osadniki',
        'fence'       => 'ogrodzenia',
        'outbuilding' => 'gospodarcze',
        'small'       => 'mala-architektura',
    ];

    public static function getDefaultHouseCategory(): string
    {
        return 'projekty-domow';
    }

    public static function getDefaultGarageCategory(): string
    {
        return 'projekty-garazy';
    }

    // Bare slug (no "projekty/" prefix) - callers that need the full path
    // prepend "/projekty" themselves, matching WebContent/.htaccess's
    // ^/?projekty/(wiaty|altany|...)/... rules.
    public static function getDefaultOtherCategory(string $type): string
    {
        return self::$otherCategoryByType[$type] ?? 'wiaty';
    }
}
