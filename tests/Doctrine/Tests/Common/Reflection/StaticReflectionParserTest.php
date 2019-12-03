<?php

namespace Doctrine\Tests\Common\Reflection;

use Doctrine\Common\Reflection\Psr0FindFile;
use Doctrine\Common\Reflection\StaticReflectionParser;
use Doctrine\Tests\Common\Reflection\Dummies\NoParent as NoParentDummy;
use Doctrine\Tests\DoctrineTestCase;
use ReflectionException;
use function strlen;
use function substr;

class StaticReflectionParserTest extends DoctrineTestCase
{
    /**
     * @param bool   $classAnnotationOptimize
     * @param string $parsedClassName
     * @param string $expectedClassName
     *
     * @return void
     *
     * @dataProvider parentClassData
     */
    public function testParentClass($classAnnotationOptimize, $parsedClassName, $expectedClassName)
    {
        // If classed annotation optimization is enabled the properties tested
        // below cannot be found.
        if ($classAnnotationOptimize) {
            $this->expectException(ReflectionException::class);
        }

        $testsRoot              = substr(__DIR__, 0, -strlen(__NAMESPACE__) - 1);
        $paths                  = [
            'Doctrine\\Tests' => [$testsRoot],
        ];
        $staticReflectionParser = new StaticReflectionParser($parsedClassName, new Psr0FindFile($paths), $classAnnotationOptimize);
        $declaringClassName     = $staticReflectionParser->getStaticReflectionParserForDeclaringClass('property', 'test')->getClassName();
        self::assertSame($expectedClassName, $declaringClassName);
    }

    /**
     * @return mixed[]
     */
    public function parentClassData()
    {
        $data                 = [];
        $noParentClassName    = NoParent::class;
        $dummyParentClassName = NoParentDummy::class;

        foreach ([false, true] as $classAnnotationOptimize) {
            $data[] = [
                $classAnnotationOptimize,
                $noParentClassName,
                $noParentClassName,
            ];

            $data[] = [
                $classAnnotationOptimize,
                FullyClassifiedParent::class,
                $noParentClassName,
            ];

            $data[] = [
                $classAnnotationOptimize,
                SameNamespaceParent::class,
                $noParentClassName,
            ];

            $data[] = [
                $classAnnotationOptimize,
                DeeperNamespaceParent::class,
                $dummyParentClassName,
            ];

            $data[] = [
                $classAnnotationOptimize,
                UseParent::class,
                $dummyParentClassName,
            ];
        }

        return $data;
    }

    /**
     * @dataProvider classAnnotationOptimize
     */
    public function testClassAnnotationOptimizedParsing($class, $classAnnotationOptimize)
    {
        $testsRoot              = substr(__DIR__, 0, -strlen(__NAMESPACE__) - 1);
        $paths                  = [
            'Doctrine\\Tests' => [$testsRoot],
        ];
        $staticReflectionParser = new StaticReflectionParser($class, new Psr0FindFile($paths), $classAnnotationOptimize);
        $expectedDocComment     = '/**
 * @Annotation(
 *   key = "value"
 * )
 */';
        self::assertSame($expectedDocComment, $staticReflectionParser->getDocComment('class'));
    }

    /**
     * @return array<array<bool|string>>
     */
    public function classAnnotationOptimize()
    {
        return [
            [ExampleAnnotationClass::class, false],
            [ExampleAnnotationClass::class, true],
            [AnnotationClassWithScopeResolution::class, false],
            [AnnotationClassWithScopeResolution::class, true],
        ];
    }
}
