<?php
namespace StudioAtrium\Application\Helper;

class Project
{
    const MAX_USER_FILES_DOWNLOAD = 3;
    const EXTRAS_RECUPERATION_ID  = 1;

    private static $paramsMap = [
        'usable_area'           => 1,
        'basement'              => 2,
        'garage'                => 3,
        'loft_net'              => 17,
        'floor_net'             => 18,
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

    /**
     * Backend AJAX preview (Project::doGenerateCost).
     *
     * @param string $type       bungalow|storeyed|loft
     * @param float  $usableArea
     * @param float  $basementArea
     * @param float  $garageArea
     * @return array rough, finish, installations, total
     */
    public static function getBuildingCosts($type, $usableArea, $basementArea, $garageArea)
    {
        $finder = \Point7_WebApp::getRegistryObject('dao::settings');
        if (!$finder) {
            $finder = new \StudioAtrium\Entity\Settings\Finder(\Point7_WebApp::getPDO());
        }

        $usableArea = (float) str_replace(',', '.', $usableArea);
        $basementArea = (float) str_replace(',', '.', $basementArea);
        $garageArea = (float) str_replace(',', '.', $garageArea);

        $isStoreyed = ($type === 'storeyed');
        $hasCellar = $basementArea > 0;
        $hasGarage = $garageArea > 0;

        if ($isStoreyed) {
            if ($hasCellar) {
                $prefix = 'twoStoreysCellar';
                $factorKey = $hasGarage ? 'twoStoreysCellarGarageCost' : 'twoStoreysCellarCost';
            } else {
                $prefix = 'twoStoreys';
                $factorKey = $hasGarage ? 'twoStoreysGarageCost' : 'twoStoreysCost';
            }
        } else {
            if ($hasCellar) {
                $prefix = 'oneStoreyCellar';
                $factorKey = $hasGarage ? 'oneStoreyCellarGarageCost' : 'oneStoreyCellarCost';
            } else {
                $prefix = 'oneStorey';
                $factorKey = $hasGarage ? 'oneStoreyGarageCost' : 'oneStoreyCost';
            }
        }

        $total = $usableArea * self::getSettingNum($finder, $factorKey);
        if ($hasCellar) {
            $total += $basementArea * self::getSettingNum($finder, 'cellarCost');
        }
        if ($hasGarage) {
            $total += $garageArea * self::getSettingNum($finder, 'garageCost');
        }

        return self::splitCostByPrefix($total, $prefix, $finder);
    }

    /**
     * House.tpl / PDF cost box (Project::_getCost).
     *
     * @param array $projectParams keyed by project_param_id
     * @param array $extras        decoded project extra_data
     * @param mixed $settingsFinder
     * @return array rough, finish, installations, total
     */
    public static function getDisplayCosts(array $projectParams, array $extras, $settingsFinder)
    {
        if (isset($extras['cost']) && $extras['cost'] !== '' && $extras['cost'] !== null) {
            $total = (float) str_replace(',', '.', $extras['cost']);
        } elseif (isset($extras['cost_corrected']) && $extras['cost_corrected'] !== '' && $extras['cost_corrected'] !== null) {
            $total = (float) str_replace(',', '.', $extras['cost_corrected']);
        } else {
            $total = self::calculateNettoCost($projectParams, $settingsFinder);
        }

        if ($total == -1) {
            return array(
                'rough'          => -1,
                'finish'         => -1,
                'installations'  => -1,
                'total'          => -1,
            );
        }

        $prefix = self::resolveEstimatePrefix($projectParams);
        return self::splitCostByPrefix($total, $prefix, $settingsFinder);
    }

    private static function calculateNettoCost(array $projectParams, $settingsFinder)
    {
        $nettoArea = 0.0;
        if (isset($projectParams[16])) {
            $nettoArea += self::paramNum($projectParams[16]);
        }
        if (isset($projectParams[17])) {
            $nettoArea += self::paramNum($projectParams[17]);
        }
        if (isset($projectParams[18])) {
            $nettoArea += self::paramNum($projectParams[18]);
        }

        $hasSecondFloor = isset($projectParams[17]) || isset($projectParams[18]);
        $hasCellar = isset($projectParams[20]) || isset($projectParams[21]);
        $hasGarage = isset($projectParams[3]);

        if ($hasCellar) {
            if (isset($projectParams[20])) {
                $nettoArea += self::paramNum($projectParams[20]);
            }
            if (isset($projectParams[21])) {
                $nettoArea += self::paramNum($projectParams[21]);
            }
        }

        if ($hasSecondFloor) {
            if ($hasCellar) {
                $factorKey = $hasGarage ? 'twoStoreysCellarGarageCost' : 'twoStoreysCellarCost';
            } else {
                $factorKey = $hasGarage ? 'twoStoreysGarageCost' : 'twoStoreysCost';
            }
        } else {
            if ($hasCellar) {
                $factorKey = $hasGarage ? 'oneStoreyCellarGarageCost' : 'oneStoreyCellarCost';
            } else {
                $factorKey = $hasGarage ? 'oneStoreyGarageCost' : 'oneStoreyCost';
            }
        }

        return $nettoArea * self::getSettingNum($settingsFinder, $factorKey);
    }

    private static function resolveEstimatePrefix(array $projectParams)
    {
        $hasSecondFloor = isset($projectParams[17]) || isset($projectParams[18]);
        $hasCellar = isset($projectParams[20]) || isset($projectParams[21]);
        $hasGarage = isset($projectParams[3]);

        if ($hasSecondFloor) {
            if ($hasCellar) {
                return 'twoStoreysCellar';
            }
            return 'twoStoreys';
        }

        if ($hasCellar) {
            return 'oneStoreyCellar';
        }

        return 'oneStorey';
    }

    private static function splitCostByPrefix($total, $prefix, $settingsFinder)
    {
        $total = (float) $total;
        $roughPct = self::getSettingNum($settingsFinder, $prefix . 'RoughPercent');
        $finishPct = self::getSettingNum($settingsFinder, $prefix . 'FinishPercent');
        $instPct = self::getSettingNum($settingsFinder, $prefix . 'InstallationsPercent');

        $rough = round($total * $roughPct / 100);
        $finish = round($total * $finishPct / 100);
        $installations = round($total * $instPct / 100);

        return array(
            'rough'         => $rough,
            'finish'        => $finish,
            'installations' => $installations,
            'total'         => round($rough + $finish + $installations),
        );
    }

    private static function paramNum($param)
    {
        if (is_array($param) && isset($param['num_value'])) {
            return (float) str_replace(',', '.', $param['num_value']);
        }

        return (float) str_replace(',', '.', $param);
    }

    private static function getSettingNum($settingsFinder, $charId)
    {
        if (!$settingsFinder || !method_exists($settingsFinder, 'getByCharId')) {
            return 0.0;
        }

        $setting = $settingsFinder->getByCharId($charId);
        if (!$setting || $setting->getNumValue() === null) {
            return 0.0;
        }

        return (float) $setting->getNumValue();
    }
}
