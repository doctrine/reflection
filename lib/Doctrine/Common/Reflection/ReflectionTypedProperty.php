<?php

namespace Doctrine\Common\Reflection;

use ReflectionProperty;

class ReflectionTypedProperty extends ReflectionProperty
{
    public function getValue($object = null)
    {
        if (!parent::isInitialized($object)) {
            return null;
        }

        return parent::getValue($object);
    }
}
