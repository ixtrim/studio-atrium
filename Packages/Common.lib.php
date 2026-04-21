<?php
/**
 * Common library — loaded before Point7 framework classes.
 * Provides basic utility functions expected by Point7 ecosystem.
 */

if (!function_exists('p7_array_get')) {
    function p7_array_get(array $arr, string $key, mixed $default = null): mixed
    {
        return $arr[$key] ?? $default;
    }
}

if (!function_exists('p7_dot_get')) {
    function p7_dot_get(array $arr, string $key, mixed $default = null): mixed
    {
        $parts = explode('.', $key);
        $node  = $arr;
        foreach ($parts as $part) {
            if (!is_array($node) || !array_key_exists($part, $node)) return $default;
            $node = $node[$part];
        }
        return $node;
    }
}
