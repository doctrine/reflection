<?php

namespace Doctrine\Tests_PHP74\Common\Reflection\Dummies;

trait TokenParserAnonymousFunctionTestClass
{
    protected function method()
    {
        return static function ($value) {
            return $value;
        };
    }
}
