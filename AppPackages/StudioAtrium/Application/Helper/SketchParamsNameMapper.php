<?php
namespace StudioAtrium\Application\Helper;

class SketchParamsNameMapper
{
    private static $storeyLabels = array(
        'basement'         => 'piwnica',
        'low_ground_floor' => 'przyziemie',
        'ground_floor'     => 'parter',
        '1st_floor'        => 'I piętro',
        '2nd_floor'        => 'II piętro',
        '3rd_floor'        => 'III piętro',
        '4th_floor'        => 'IV piętro',
        '5th_floor'        => 'V piętro',
        'loft'             => 'poddasze',
        'attic'            => 'poddasze',
        'strych'           => 'strych',
    );

    private static $storeyCatalogSlugs = array(
        'basement'         => 'piwnica',
        'low_ground_floor' => 'przyziemie',
        'ground_floor'     => 'parter',
        '1st_floor'        => 'pietro1',
        '2nd_floor'        => 'pietro2',
        '3rd_floor'        => 'pietro3',
        '4th_floor'        => 'pietro4',
        '5th_floor'        => 'pietro5',
        'loft'             => 'poddasze',
        'attic'            => 'poddasze',
        'strych'           => 'strych',
    );

    public static function mapStorey($storey)
    {
        $key = (string) $storey;
        return isset(self::$storeyLabels[$key]) ? self::$storeyLabels[$key] : $key;
    }

    public static function mapStoreyCatalog($storey)
    {
        $key = (string) $storey;
        return isset(self::$storeyCatalogSlugs[$key]) ? self::$storeyCatalogSlugs[$key] : $key;
    }
}
