<?php

namespace Doctrine\Tests\Common\Reflection;

use Doctrine\Common\Annotations\Annotation;

/**
 * @Annotation(
 *   key = "value"
 * )
 */
class AnnotationClassWithScopeResolution
{
    public const FOO = \stdClass::class;

  /**
   * Example with comment.
   */
    public const BAR = \stdClass::class;
}
