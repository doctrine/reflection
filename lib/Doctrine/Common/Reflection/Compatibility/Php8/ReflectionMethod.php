<?php

namespace Doctrine\Common\Reflection\Compatibility\Php8;

use ReflectionException;
use ReturnTypeWillChange;

trait ReflectionMethod
{
    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function invoke(?object $object, mixed ...$args)
    {
        throw new ReflectionException('Method not implemented');
    }
}
