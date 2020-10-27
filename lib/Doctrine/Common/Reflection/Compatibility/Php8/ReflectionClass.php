<?php

namespace Doctrine\Common\Reflection\Compatibility\Php8;

use ReflectionException;

trait ReflectionClass
{
    /**
     * {@inheritDoc}
     */
    public function getConstants(?int $filter = null)
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    public function newInstance(mixed ...$args)
    {
        throw new ReflectionException('Method not implemented');
    }
}
