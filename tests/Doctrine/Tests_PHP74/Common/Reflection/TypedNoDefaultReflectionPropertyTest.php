<?php

namespace Doctrine\Tests_PHP74\Common\Reflection;

use Doctrine\Common\Reflection\TypedNoDefaultReflectionProperty;
use PHPUnit\Framework\TestCase;

class TypedNoDefaultReflectionPropertyTest extends TestCase
{
    public function testGetValue(): void
    {
        $object = new TypedNoDefaultReflectionPropertyTestClass();

        $reflProperty = new TypedNoDefaultReflectionProperty(TypedNoDefaultReflectionPropertyTestClass::class, 'test');

        self::assertNull($reflProperty->getValue($object));

        $object->test = 'testValue';

        self::assertSame('testValue', $reflProperty->getValue($object));

        unset($object->test);

        self::assertNull($reflProperty->getValue($object));
    }

    public function testSetValueNull(): void
    {
        $reflection = new TypedNoDefaultReflectionProperty(TypedFoo::class, 'id');
        $reflection->setAccessible(true);

        $object = new TypedFoo();
        $object->setId(1);

        self::assertTrue($reflection->isInitialized($object));

        $reflection->setValue($object, null);

        self::assertNull($reflection->getValue($object));
        self::assertFalse($reflection->isInitialized($object));
    }

    public function testSetValueNullOnNullableProperty(): void
    {
        $reflection = new TypedNoDefaultReflectionProperty(TypedNullableFoo::class, 'value');
        $reflection->setAccessible(true);

        $object = new TypedNullableFoo();

        $reflection->setValue($object, null);

        self::assertNull($reflection->getValue($object));
        self::assertTrue($reflection->isInitialized($object));
        self::assertNull($object->getValue());
    }
}

class TypedNoDefaultReflectionPropertyTestClass
{
    public string $test;
}

class TypedFoo
{
    private int $id;

    public function setId($id)
    {
        $this->id = $id;
    }
}

class TypedNullableFoo
{
    private ?string $value;

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}
