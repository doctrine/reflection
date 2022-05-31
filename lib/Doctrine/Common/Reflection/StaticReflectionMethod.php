<?php

namespace Doctrine\Common\Reflection;

use Doctrine\Common\Reflection\Compatibility\ReflectionMethod as CompatibilityReflectionMethod;
use ReflectionException;
use ReflectionMethod;
use ReturnTypeWillChange;

class StaticReflectionMethod extends ReflectionMethod
{
    use CompatibilityReflectionMethod;

    /**
     * The PSR-0 parser object.
     *
     * @var StaticReflectionParser
     */
    protected $staticReflectionParser;

    /**
     * The name of the method.
     *
     * @var string
     */
    protected $methodName;

    /**
     * @param string $methodName
     */
    public function __construct(StaticReflectionParser $staticReflectionParser, $methodName)
    {
        $this->staticReflectionParser = $staticReflectionParser;
        $this->methodName             = $methodName;
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getName()
    {
        return $this->methodName;
    }

    /**
     * @return StaticReflectionParser
     */
    protected function getStaticReflectionParser()
    {
        return $this->staticReflectionParser->getStaticReflectionParserForDeclaringClass('method', $this->methodName);
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
    public function getNamespaceName()
    {
        return $this->getStaticReflectionParser()->getNamespaceName();
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getDocComment()
    {
        return $this->getStaticReflectionParser()->getDocComment('method', $this->methodName);
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
    public function getClosure($object = null)
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
    public function getPrototype()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function invokeArgs($object, array $args)
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
    public function isConstructor()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function isDestructor()
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
    public function __toString()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getClosureThis()
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
    public function getNumberOfParameters()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getNumberOfRequiredParameters()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function getParameters()
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
    public function getStaticVariables()
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
    public function isClosure()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function isDeprecated()
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
    public function isUserDefined()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     * {@inheritDoc}
     */
    #[ReturnTypeWillChange]
    public function returnsReference()
    {
        throw new ReflectionException('Method not implemented');
    }
}
