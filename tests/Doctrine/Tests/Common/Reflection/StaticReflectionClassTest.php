<?php

namespace Doctrine\Tests\Common\Reflection;

use Doctrine\Common\Reflection\StaticReflectionClass;
use Doctrine\Common\Reflection\StaticReflectionMethod;
use Doctrine\Common\Reflection\StaticReflectionParser;
use Doctrine\Common\Reflection\StaticReflectionProperty;
use PHPStan\Testing\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use ReflectionException;

class StaticReflectionClassTest extends TestCase
{
    /** @var StaticReflectionParser|MockObject */
    private $staticReflectionParser;

    /** @var StaticReflectionClass */
    private $staticReflectionClass;

    public function testGetName() : void
    {
        $this->staticReflectionParser->expects($this->once())
            ->method('getClassName')
            ->willReturn('ClassName');

        self::assertEquals('ClassName', $this->staticReflectionClass->getName());
    }

    public function testGetDocComment() : void
    {
        $this->staticReflectionParser->expects($this->once())
            ->method('getDocComment')
            ->willReturn('test doc comment');

        self::assertEquals('test doc comment', $this->staticReflectionClass->getDocComment());
    }

    public function testGetNamespaceName() : void
    {
        $this->staticReflectionParser->expects($this->once())
            ->method('getNamespaceName')
            ->willReturn('Namespace');

        self::assertEquals('Namespace', $this->staticReflectionClass->getNamespaceName());
    }

    public function testGetUseStatements() : void
    {
        $this->staticReflectionParser->expects($this->once())
            ->method('getUseStatements')
            ->willReturn(['ClassName']);

        self::assertEquals(['ClassName'], $this->staticReflectionClass->getUseStatements());
    }

    public function testGetMethod() : void
    {
        $staticReflectionMethod = $this->createMock(StaticReflectionMethod::class);

        $this->staticReflectionParser->expects($this->once())
            ->method('getReflectionMethod')
            ->with('method')
            ->willReturn($staticReflectionMethod);

        self::assertEquals($staticReflectionMethod, $this->staticReflectionClass->getMethod('method'));
    }

    public function testGetProperty() : void
    {
        $staticReflectionProperty = $this->createMock(StaticReflectionProperty::class);

        $this->staticReflectionParser->expects($this->once())
            ->method('getReflectionProperty')
            ->with('property')
            ->willReturn($staticReflectionProperty);

        self::assertEquals($staticReflectionProperty, $this->staticReflectionClass->getProperty('property'));
    }

    /**
     * @dataProvider getNotImplementedMethods
     *
     * @param mixed[] $args
     */
    public function testNotImplemented(string $method, array $args) : void
    {
        $this->expectException(ReflectionException::class);
        $this->expectExceptionMessage('Method not implemented');

        $this->staticReflectionClass->$method(...$args);
    }

    /**
     * @return mixed[]
     */
    public function getNotImplementedMethods() : array
    {
        return [
            ['export', ['Test', 'Test', true]],
            ['getConstant', [null]],
            ['getConstants', []],
            ['getConstructor', []],
            ['getDefaultProperties', []],
            ['getEndLine', []],
            ['getExtension', []],
            ['getExtensionName', []],
            ['getFileName', []],
            ['getInterfaceNames', []],
            ['getInterfaces', []],
            ['getMethods', [null]],
            ['getModifiers', []],
            ['getParentClass', []],
            ['getProperties', [null]],
            ['getShortName', []],
            ['getStartLine', []],
            ['getStaticProperties', []],
            ['getStaticPropertyValue', ['test', 'test']],
            ['getTraitAliases', []],
            ['getTraitNames', []],
            ['getTraits', []],
            ['hasConstant', ['test']],
            ['hasMethod', ['method']],
            ['hasProperty', ['property']],
            ['implementsInterface', ['Interface']],
            ['inNamespace', []],
            ['isAbstract', []],
            ['isCloneable', []],
            ['isFinal', []],
            ['isInstance', [$this]],
            ['isInstantiable', []],
            ['isInterface', []],
            ['isInternal', []],
            ['isIterateable', []],
            ['isSubclassOf', [self::class]],
            ['isTrait', []],
            ['isUserDefined', []],
            ['newInstance', [[]]],
            ['newInstanceArgs', [[]]],
            ['newInstanceWithoutConstructor', []],
            ['setStaticPropertyValue', ['name', 'value']],
            ['__toString', []],
        ];
    }

    protected function setUp() : void
    {
        $this->staticReflectionParser = $this->createMock(StaticReflectionParser::class);

        $this->staticReflectionClass = new StaticReflectionClass(
            $this->staticReflectionParser
        );
    }
}
