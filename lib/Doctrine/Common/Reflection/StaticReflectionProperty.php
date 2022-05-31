<?php

namespace Doctrine\Common\Reflection;

use ReflectionException;
use ReflectionProperty;
use ReturnTypeWillChange;

class StaticReflectionProperty extends ReflectionProperty
{
    /**
     * The PSR-0 parser object.
     *
     * @var StaticReflectionParser
     */
    protected $staticReflectionParser;

    /**
     * The name of the property.
     *
     * @var string|null
     */
    protected $propertyName;

    /**
     * @param string|null $propertyName
     */
    public function __construct(StaticReflectionParser $staticReflectionParser, $propertyName)
    {
        $this->staticReflectionParser = $staticReflectionParser;
        $this->propertyName           = $propertyName;
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getName()
    {
        return $this->propertyName;
    }

    /**
     * @return StaticReflectionParser
     */
    protected function getStaticReflectionParser()
    {
        return $this->staticReflectionParser->getStaticReflectionParserForDeclaringClass('property', $this->propertyName);
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getDeclaringClass()
    {
        return $this->getStaticReflectionParser()->getReflectionClass();
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getDocComment()
    {
        return $this->getStaticReflectionParser()->getDocComment('property', $this->propertyName);
    }

    /**
     * @return string[]
     */
    public function getUseStatements()
    {
        return $this->getStaticReflectionParser()->getUseStatements();
    }

    /**
     * {@inheritDoc}
     */
    public static function export($class, $name, $return = false)
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getModifiers()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getValue($object = null)
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function isDefault()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function isPrivate()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function isProtected()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function isPublic()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function isStatic()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function setAccessible($accessible)
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function setValue($object, $value = null)
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        throw new ReflectionException('Method not implemented');
    }
}
