<?php
namespace StudioAtrium\Application\Helper;

/**
 * Encodes friendly listing params into the single-letter codes used in the
 * pretty pagination URL segment: /projekty-domow/szukaj/{display},{sort},{order},{page}
 * e.g. /projekty-domow/szukaj/b,n,a,2
 *
 * The original mapping was never documented and the original developers are
 * no longer reachable, so this was reconstructed rather than recovered —
 * but it isn't a guess: WebContent/.htaccess only ever accepts exactly
 * (b|l|e) for display_type, (i|n|u) for sort_by, and (a|d) for sort_order,
 * which line up 1:1 with the only values actually used in Modules/Project.php
 * ('box'/'list'/'detail', 'id'/'name'/'usable_area', 'asc'/'desc') with no
 * left-over letters either direction — there's no other mapping those three
 * letter sets could sensibly represent.
 */
class UrlParamMap
{
    private static $maps = [
        'display_type' => ['box' => 'b', 'list' => 'l', 'detail' => 'e'],
        'sort_by'       => ['id' => 'i', 'name' => 'n', 'usable_area' => 'u'],
        'sort_order'    => ['asc' => 'a', 'desc' => 'd'],
    ];

    public static function getMapping(string $type, $value): string
    {
        return self::$maps[$type][$value] ?? '';
    }

    public static function getReverseMapping(string $type, string $code)
    {
        $flipped = array_flip(self::$maps[$type] ?? []);
        return $flipped[$code] ?? null;
    }
}
