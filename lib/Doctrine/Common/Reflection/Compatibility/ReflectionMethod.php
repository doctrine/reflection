<?php

namespace Doctrine\Common\Reflection\Compatibility;

use function class_alias;

use const PHP_VERSION_ID;

if (PHP_VERSION_ID >= 80000) {
    class_alias('Doctrine\Common\Reflection\Compatibility\Php8\ReflectionMethod', 'Doctrine\Common\Reflection\Compatibility\ReflectionMethod');
} else {
    class_alias('Doctrine\Common\Reflection\Compatibility\Php7\ReflectionMethod', 'Doctrine\Common\Reflection\Compatibility\ReflectionMethod');
}

if (false) {
    trait ReflectionMethod
    {
    }
}
