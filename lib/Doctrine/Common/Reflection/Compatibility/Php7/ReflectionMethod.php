<?php

namespace Doctrine\Common\Reflection\Compatibility\Php7;

use ReflectionException;

trait ReflectionMethod
{
    /**
     * {@inheritDoc}
     */
    public function invoke($object, $parameter = null)
    {
        throw new ReflectionException('Method not implemented');
    }
}
