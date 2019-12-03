<?php

namespace Doctrine\Common\Reflection;

use ReflectionProperty;

/**
 * PHP Typed No Default Reflection Property - special override for typed properties without a default value.
 */
class TypedNoDefaultReflectionProperty extends ReflectionProperty
{
    /**
     * {@inheritDoc}
     *
     * Checks that a typed property is initialized before accessing its value.
     * This is neccessary to avoid PHP error "Error: Typed property must not be accessed before initialization".
     * Should be used only for reflecting typed properties without a default value.
     */
    public function getValue($object = null)
    {
        return $object !== null && $this->isInitialized($object) ? parent::getValue($object) : null;
    }
}
