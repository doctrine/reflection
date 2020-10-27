<?php

namespace Doctrine\Common\Reflection\Compatibility;

use const PHP_VERSION_ID;
use function class_alias;

if (PHP_VERSION_ID >= 80000) {
    class_alias('Doctrine\Common\Reflection\Compatibility\Php8\ReflectionMethod', 'Doctrine\Common\Reflection\Compatibility\ReflectionMethod');
} else {
    class_alias('Doctrine\Common\Reflection\Compatibility\Php7\ReflectionMethod', 'Doctrine\Common\Reflection\Compatibility\ReflectionMethod');
}

if (false) {
    class ReflectionMethod
    {
    }
}
