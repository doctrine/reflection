<?php

namespace Doctrine\Tests\Common\Reflection;

use Doctrine\Common\Reflection\StaticReflectionClass;
use Doctrine\Common\Reflection\StaticReflectionMethod;
use Doctrine\Common\Reflection\StaticReflectionParser;
use PHPStan\Testing\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use ReflectionException;

class StaticReflectionMethodTest extends TestCase
{
    /** @var StaticReflectionParser|MockObject */
    private $staticReflectionParser;

    /** @var string */
    private $methodName;

    /** @var StaticReflectionMethod */
    private $staticReflectionMethod;

    public function testGetName() : void
    {
        self::assertEquals($this->methodName, $this->staticReflectionMethod->getName());
    }

    public function testGetDeclaringClass() : void
    {
        $staticReflectionClass = $this->createMock(StaticReflectionClass::class);

        $this->staticReflectionParser->expects($this->once())
            ->method('getReflectionClass')
            ->willReturn($staticReflectionClass);

        self::assertSame($staticReflectionClass, $this->staticReflectionMethod->getDeclaringClass());
    }

    public function testGetNamespaceName() : void
    {
        $this->staticReflectionParser->expects($this->once())
            ->method('getNamespaceName')
            ->willReturn('test');

        self::assertEquals('test', $this->staticReflectionMethod->getNamespaceName());
    }

    public function testGetDocComment() : void
    {
        $staticReflectionClass = $this->createMock(StaticReflectionClass::class);

        $this->staticReflectionParser->expects($this->once())
            ->method('getDocComment')
            ->with('method', $this->methodName)
            ->willReturn('test doc comment');

        self::assertSame('test doc comment', $this->staticReflectionMethod->getDocComment());
    }

    public function testGetUseStatements() : void
    {
        $staticReflectionClass = $this->createMock(StaticReflectionClass::class);

        $this->staticReflectionParser->expects($this->once())
            ->method('getUseStatements')
            ->willReturn(['Test']);

        self::assertSame(['Test'], $this->staticReflectionMethod->getUseStatements());
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

        $this->staticReflectionMethod->$method(...$args);
    }

    /**
     * @return mixed[]
     */
    public function getNotImplementedMethods() : array
    {
        return [
            ['export', ['Test', 'Test', true]],
            ['getClosure', [$this]],
            ['getModifiers', []],
            ['getPrototype', []],
            ['invoke', [$this, null]],
            ['invokeArgs', [$this, [null, null]]],
            ['isAbstract', []],
            ['isConstructor', []],
            ['isDestructor', []],
            ['isFinal', []],
            ['isPrivate', []],
            ['isProtected', []],
            ['isPublic', []],
            ['isStatic', []],
            ['setAccessible', [true]],
            ['__toString', []],
            ['getClosureThis', []],
            ['getEndLine', []],
            ['getExtension', []],
            ['getExtensionName', []],
            ['getFileName', []],
            ['getNumberOfParameters', []],
            ['getNumberOfRequiredParameters', []],
            ['getParameters', []],
            ['getShortName', []],
            ['getStartLine', []],
            ['getStaticVariables', []],
            ['inNamespace', []],
            ['isClosure', []],
            ['isDeprecated', []],
            ['isInternal', []],
            ['isUserDefined', []],
            ['returnsReference', []],
        ];
    }

    protected function setUp() : void
    {
        $this->staticReflectionParser = $this->createMock(StaticReflectionParser::class);
        $this->methodName             = 'methodName';

        $this->staticReflectionParser->expects($this->any())
            ->method('getStaticReflectionParserForDeclaringClass')
            ->with('method', $this->methodName)
            ->willReturn($this->staticReflectionParser);

        $this->staticReflectionMethod = new StaticReflectionMethod(
            $this->staticReflectionParser,
            $this->methodName
        );
    }
}
