<?php

namespace Doctrine\Common\Reflection;

use ReflectionProperty;
use ReturnTypeWillChange;

/**
 * PHP Typed No Default Reflection Property - special override for typed properties without a default value.
 */
class TypedNoDefaultReflectionProperty extends ReflectionProperty
{
    /**
     * {@inheritDoc}
     *
     * Checks that a typed property is initialized before accessing its value.
     * This is necessary to avoid PHP error "Error: Typed property must not be accessed before initialization".
     * Should be used only for reflecting typed properties without a default value.
     */
    #[ReturnTypeWillChange]
    public function getValue($object = null)
    {
        return $object !== null && $this->isInitialized($object) ? parent::getValue($object) : null;
    }

    /**
     * {@inheritDoc}
     *
     * Works around the problem with setting typed no default properties to
     * NULL which is not supported, instead unset() to uninitialize.
     *
     * @link https://github.com/doctrine/orm/issues/7999
     */
    #[ReturnTypeWillChange]
    public function setValue($object, $value = null)
    {
        if ($value === null && $this->hasType() && ! $this->getType()->allowsNull()) {
            $propertyName = $this->getName();

            $unsetter = function () use ($propertyName) {
                unset($this->$propertyName);
            };
            $unsetter = $unsetter->bindTo($object, $this->getDeclaringClass()->getName());
            $unsetter();

            return;
        }

        parent::setValue($object, $value);
    }
}
