<?php
namespace StudioAtrium\Application\Helper;

class Project
{
    const MAX_USER_FILES_DOWNLOAD = 3;
    const EXTRAS_RECUPERATION_ID  = 1;

    private static $paramsMap = [
        'recuperation_included' => 50,
        'under_construction'    => 51,
        'available_mirror'      => 52,
        'energy_class'          => 53,
        'alternative_link'      => 95,
        'realisations_link'     => 91,
    ];
    private static $clickSearchParamsMap = [
        'area_usable'   => 1,
        'area_build'    => 23,
        'area_total'    => 22,
        'parcel_width'  => 75,
        'parcel_length' => 76,
        'front_width'   => 117,
    ];
    private static $categoryTypeMap = [
        'projekty-domow'     => 'house',
        'projekty-garazy'    => 'garage',
        'wiaty'              => 'carport',
        'altany'             => 'arbor',
        'osadniki'           => 'tank',
        'ogrodzenia'         => 'fence',
        'gospodarcze'        => 'outbuilding',
        'mala-architektura'  => 'small',
    ];
    private static $typeNames = [
        'house'       => 'Projekt domu',
        'skeleton'    => 'Projekt domu szkieletowego',
        'garage'      => 'Projekt garażu',
        'carport'     => 'Projekt wiaty',
        'arbor'       => 'Projekt altany',
        'tank'        => 'Projekt osadnika',
        'fence'       => 'Projekt ogrodzenia',
        'outbuilding' => 'Projekt budynku gospodarczego',
        'export'      => 'Projekt eksportowy',
    ];
    private static $orderTimesMap = [
        '1' => 'do miesiąca',
        '2' => 'do 6 miesięcy',
        '3' => 'do roku',
        '4' => 'powyżej roku',
    ];
    public static function getParamsMap(string $key): int
    {
        return self::$paramsMap[$key] ?? 0;
    }

    public static function getClickSearchParamsMap(string $key): int
    {
        return self::$clickSearchParamsMap[$key] ?? 0;
    }

    public static function getTypeForCategory(string $category): string
    {
        foreach (self::$categoryTypeMap as $slug => $type) {
            if (strpos($category, $slug) !== false) {
                return $type;
            }
        }
        return 'house';
    }

    public static function getTypes(string $type): string
    {
        return self::$typeNames[$type] ?? 'Projekt';
    }

    /**
     * Admin panel plural labels ({$type|projectType:true}).
     */
    public static function getTypesPlural(string $type): string
    {
        $map = [
            'house'       => 'Projekty domów',
            'skeleton'    => 'Projekty domów szkieletowych',
            'garage'      => 'Projekty garaży',
            'carport'     => 'Wiaty',
            'arbor'       => 'Altany',
            'tank'        => 'Osadniki',
            'fence'       => 'Ogrodzenia',
            'outbuilding' => 'Budynki gospodarcze',
            'small'       => 'Mała architektura',
            'export'      => 'Projekty eksportowe',
        ];
        return $map[$type] ?? 'Projekty';
    }

    /**
     * Catalog path segment for {url ... catalog=$type|projectCatalog}.
     */
    public static function getCatalogForType(string $type): string
    {
        if ($type === 'house' || $type === 'skeleton') {
            return ProjectCategory::getDefaultHouseCategory();
        }
        if ($type === 'garage') {
            return ProjectCategory::getDefaultGarageCategory();
        }
        return 'projekty/' . ProjectCategory::getDefaultOtherCategory($type);
    }

    /**
     * Bare category slug for other-project URLs ({projectType:true:true} in Other.tpl).
     */
    public static function getCategorySlugForType(string $type): string
    {
        if ($type === 'house' || $type === 'skeleton') {
            return 'domow';
        }
        if ($type === 'garage') {
            return 'garazy';
        }
        return ProjectCategory::getDefaultOtherCategory($type);
    }

    public static function getDisplayListTypes(string $type): string
    {
        if ($type === 'house' || $type === 'skeleton') {
            return 'house';
        }
        if ($type === 'garage') {
            return 'garage';
        }
        return 'other';
    }

    public static function getNarrowPlotCategoryId(): int
    {
        return 25;
    }

    public static function getOrderTimes(string $time): string
    {
        return self::$orderTimesMap[$time] ?? $time;
    }

    public static function getSkeletonPriceAddition(float $area): float
    {
        return 0.0;
    }

    public static function getProjectUID(int $id): int
    {
        return $id;
    }

    public static function getCsCloudParams(): array
    {
        return [];
    }

    public static function getCsCloudSelectParams(): array
    {
        return [];
    }

    public static function getCsTagParam(string $key)
    {
        return null;
    }

    public static function getCsTagSelectParam(string $key)
    {
        return null;
    }
}
