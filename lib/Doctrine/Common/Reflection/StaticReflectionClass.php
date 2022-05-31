<?php

namespace Doctrine\Common\Reflection;

use Doctrine\Common\Reflection\Compatibility\ReflectionClass as CompatibilityReflectionClass;
use ReflectionClass;
use ReflectionException;
use ReturnTypeWillChange;

class StaticReflectionClass extends ReflectionClass
{
    use CompatibilityReflectionClass;

    /**
     * The static reflection parser object.
     *
     * @var StaticReflectionParser
     */
    private $staticReflectionParser;

    public function __construct(StaticReflectionParser $staticReflectionParser)
    {
        $this->staticReflectionParser = $staticReflectionParser;
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getName()
    {
        return $this->staticReflectionParser->getClassName();
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getDocComment()
    {
        return $this->staticReflectionParser->getDocComment();
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getNamespaceName()
    {
        return $this->staticReflectionParser->getNamespaceName();
    }

    /**
     * @return string[]
     */
    public function getUseStatements()
    {
        return $this->staticReflectionParser->getUseStatements();
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getMethod($name)
    {
        return $this->staticReflectionParser->getReflectionMethod($name);
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getProperty($name)
    {
        return $this->staticReflectionParser->getReflectionProperty($name);
    }

    /**
     * {@inheritDoc}
     */
    public static function export($argument, $return = false)
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getConstant($name)
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getConstructor()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getDefaultProperties()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getEndLine()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getExtension()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getExtensionName()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getFileName()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getInterfaceNames()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getInterfaces()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getMethods($filter = null)
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
    public function getParentClass()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getProperties($filter = null)
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getShortName()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getStartLine()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getStaticProperties()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getStaticPropertyValue($name, $default = '')
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getTraitAliases()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getTraitNames()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getTraits()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function hasConstant($name)
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function hasMethod($name)
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function hasProperty($name)
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function implementsInterface($interface)
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function inNamespace()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function isAbstract()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function isCloneable()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function isFinal()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function isInstance($object)
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function isInstantiable()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function isInterface()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function isInternal()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function isIterateable()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function isSubclassOf($class)
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function isTrait()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function isUserDefined()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function newInstanceArgs(array $args = [])
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function newInstanceWithoutConstructor()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function setStaticPropertyValue($name, $value)
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
