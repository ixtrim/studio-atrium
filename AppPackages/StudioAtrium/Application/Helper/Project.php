<?php
namespace StudioAtrium\Application\Helper;

class Project
{
    private static array $paramsMap = [
        'recuperation_included' => 50,
        'under_construction'    => 51,
        'available_mirror'      => 52,
        'energy_class'          => 53,
    ];

    public static function getParamsMap(string $key): int
    {
        return self::$paramsMap[$key] ?? 0;
    }
}
