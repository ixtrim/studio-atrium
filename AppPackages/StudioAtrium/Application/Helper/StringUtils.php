<?php
namespace StudioAtrium\Application\Helper;

class StringUtils
{
    private static array $map = [
        'ą'=>'a','ć'=>'c','ę'=>'e','ł'=>'l','ń'=>'n','ó'=>'o','ś'=>'s','ź'=>'z','ż'=>'z',
        'Ą'=>'A','Ć'=>'C','Ę'=>'E','Ł'=>'L','Ń'=>'N','Ó'=>'O','Ś'=>'S','Ź'=>'Z','Ż'=>'Z',
    ];

    public static function polishToLatin(string $text): string
    {
        return strtr($text, self::$map);
    }

    public static function slug(string $text): string
    {
        $text = self::polishToLatin($text);
        $text = strtolower($text);
        $text = preg_replace('/[^a-z0-9]+/', '-', $text);
        return trim($text, '-');
    }
}
