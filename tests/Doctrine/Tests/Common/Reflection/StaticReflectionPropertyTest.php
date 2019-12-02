<?php

namespace Doctrine\Tests\Common\Reflection;

use Doctrine\Common\Reflection\StaticReflectionClass;
use Doctrine\Common\Reflection\StaticReflectionParser;
use Doctrine\Common\Reflection\StaticReflectionProperty;
use PHPStan\Testing\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use ReflectionException;

class StaticReflectionPropertyTest extends TestCase
{
    /** @var StaticReflectionParser|MockObject */
    private $staticReflectionParser;

    /** @var string */
    private $propertyName;

    /** @var StaticReflectionProperty */
    private $staticReflectionProperty;

    public function testGetName() : void
    {
        self::assertSame($this->propertyName, $this->staticReflectionProperty->getName());
    }

    public function testGetDeclaringClass() : void
    {
        $staticReflectionClass = $this->createPartialMock(StaticReflectionClass::class, []);

        $this->staticReflectionParser->expects($this->once())
            ->method('getReflectionClass')
            ->willReturn($staticReflectionClass);

        self::assertSame($staticReflectionClass, $this->staticReflectionProperty->getDeclaringClass());
    }

    public function testGetDocComment() : void
    {
        $staticReflectionClass = $this->createPartialMock(StaticReflectionClass::class, []);

        $this->staticReflectionParser->expects($this->once())
            ->method('getDocComment')
            ->with('property', $this->propertyName)
            ->willReturn('test doc comment');

        self::assertSame('test doc comment', $this->staticReflectionProperty->getDocComment());
    }

    public function testGetUseStatements() : void
    {
        $staticReflectionClass = $this->createPartialMock(StaticReflectionClass::class, []);

        $this->staticReflectionParser->expects($this->once())
            ->method('getUseStatements')
            ->willReturn(['Test']);

        self::assertSame(['Test'], $this->staticReflectionProperty->getUseStatements());
    }

    /**
     * @param mixed[] $args
     *
     * @dataProvider getNotImplementedMethods
     */
    public function testNotImplemented(string $method, array $args) : void
    {
        $this->expectException(ReflectionException::class);
        $this->expectExceptionMessage('Method not implemented');

        $this->staticReflectionProperty->$method(...$args);
    }

    /**
     * @return mixed[]
     */
    public function getNotImplementedMethods() : array
    {
        return [
            ['export', ['Test', 'Test', true]],
            ['getModifiers', []],
            ['getValue', []],
            ['isDefault', []],
            ['isPrivate', []],
            ['isProtected', []],
            ['isPublic', []],
            ['isStatic', []],
            ['setAccessible', [true]],
            ['setValue', [$this, true]],
            ['__toString', []],
        ];
    }

    protected function setUp() : void
    {
        $this->staticReflectionParser = $this->createMock(StaticReflectionParser::class);
        $this->propertyName           = 'propertyName';

        $this->staticReflectionParser->expects($this->any())
            ->method('getStaticReflectionParserForDeclaringClass')
            ->with('property', $this->propertyName)
            ->willReturn($this->staticReflectionParser);

        $this->staticReflectionProperty = new StaticReflectionProperty(
            $this->staticReflectionParser,
            $this->propertyName
        );
    }
}
