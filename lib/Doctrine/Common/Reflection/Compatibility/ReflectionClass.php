<?php

namespace Doctrine\Common\Reflection\Compatibility;

use function class_alias;

use const PHP_VERSION_ID;

if (PHP_VERSION_ID >= 80000) {
    class_alias('Doctrine\Common\Reflection\Compatibility\Php8\ReflectionClass', 'Doctrine\Common\Reflection\Compatibility\ReflectionClass');
} else {
    class_alias('Doctrine\Common\Reflection\Compatibility\Php7\ReflectionClass', 'Doctrine\Common\Reflection\Compatibility\ReflectionClass');
}

if (false) {
    trait ReflectionClass
    {
    }
}
