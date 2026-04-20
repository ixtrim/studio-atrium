<?php
namespace StudioAtrium\Application\Helper;

class ProjectCategory
{
    const FEATURED_CATEGORY_ID = 1;

    public static function getDefaultHouseCategory(): string
    {
        return 'wszystkie-projekty';
    }
}
