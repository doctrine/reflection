<?php

namespace Doctrine\Tests;

use function error_reporting;
use function is_file;
use function is_readable;
use function spl_autoload_register;
use function strpos;
use function strtr;

use const E_ALL;
use const E_STRICT;

error_reporting(E_ALL | E_STRICT);

// register silently failing autoloader
spl_autoload_register(static function ($class) {
    if (strpos($class, 'Doctrine\Tests\\') !== 0) {
        return;
    }

    $path = __DIR__ . '/../../' . strtr($class, '\\', '/') . '.php';
    if (is_file($path) && is_readable($path)) {
        require_once $path;

        return true;
    }
});

require_once __DIR__ . '/../../../vendor/autoload.php';
