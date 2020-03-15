<?php

namespace Doctrine\Tests_PHP74\Common\Reflection;

use Doctrine\Common\Reflection\TypedNoDefaultReflectionProperty;
use PHPUnit\Framework\TestCase;

class TypedNoDefaultReflectionPropertyTest extends TestCase
{
    public function testGetValue() : void
    {
        $object = new TypedNoDefaultReflectionPropertyTestClass();

        $reflProperty = new TypedNoDefaultReflectionProperty(TypedNoDefaultReflectionPropertyTestClass::class, 'test');

        self::assertNull($reflProperty->getValue($object));

        $object->test = 'testValue';

        self::assertSame('testValue', $reflProperty->getValue($object));

        unset($object->test);

        self::assertNull($reflProperty->getValue($object));
    }

    public function testSetValueNull() : void
    {
        $reflection = new TypedNoDefaultReflectionProperty(TypedFoo::class, 'id');
        $reflection->setAccessible(true);

        $object = new TypedFoo();
        $object->setId(1);

        $reflection->setValue($object, null);

        self::assertNull($reflection->getValue($object));
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
