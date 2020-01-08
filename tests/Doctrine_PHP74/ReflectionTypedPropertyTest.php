<?php

namespace Doctrine_PHP74;

use PHPUnit\Framework\TestCase;
use Doctrine\Common\Reflection\ReflectionTypedProperty;

class ReflectionTypedPropertyTest extends TestCase
{
    public function testGetValue() : void
    {
        $reflectionProperty = new ReflectionTypedProperty(TypedPropertyClass::class, 'value');
        $object = new TypedPropertyClass();

        $this->assertNull($reflectionProperty->getValue($object));
    }
}

class TypedPropertyClass
{
    public int $value;
}
