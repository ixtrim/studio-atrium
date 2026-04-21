<?php
namespace StudioAtrium\Application\Exception;

class Helper
{
    public static function format404Message(string $reason, string $module, string $action): string
    {
        return sprintf(
            '404 | %s | module=%s action=%s | URI=%s',
            $reason,
            $module,
            $action,
            $_SERVER['REQUEST_URI'] ?? ''
        );
    }
}
