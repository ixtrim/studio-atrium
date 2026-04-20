<?php
/**
 * StudioAtrium application package bootstrap.
 * Registers a PSR-4 autoloader for the StudioAtrium\ namespace.
 */
spl_autoload_register(function (string $class): void {
    if (strpos($class, 'StudioAtrium\\') !== 0 && strpos($class, 'StudioAtrium_') !== 0) {
        return;
    }

    $base = __DIR__ . '/StudioAtrium/';

    // Namespace style: StudioAtrium\Foo\Bar  → StudioAtrium/Foo/Bar.php
    if (strpos($class, 'StudioAtrium\\') === 0) {
        $relative = substr($class, strlen('StudioAtrium\\'));
        $file = $base . str_replace('\\', '/', $relative) . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }

    // Legacy underscore style: StudioAtrium_Foo_Bar → StudioAtrium/Foo/Bar.php
    if (strpos($class, 'StudioAtrium_') === 0) {
        $relative = substr($class, strlen('StudioAtrium_'));
        $file = $base . str_replace('_', '/', $relative) . '.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
});
