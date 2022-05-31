<?php

namespace Doctrine\Common\Reflection\Compatibility\Php8;

use ReflectionException;
use ReturnTypeWillChange;

trait ReflectionClass
{
    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getConstants(?int $filter = null)
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function newInstance(mixed ...$args)
    {
        throw new ReflectionException('Method not implemented');
    }
}
