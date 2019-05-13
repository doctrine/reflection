<?php

namespace Doctrine\Tests\Common\Reflection;

use Doctrine\Common\Annotations\Annotation;
use stdClass;

/**
 * @Annotation(
 *   key = "value"
 * )
 */
class AnnotationClassWithAnonymousClass
{
    public function foo() {

        $new_class = new class () {};

    }
}
