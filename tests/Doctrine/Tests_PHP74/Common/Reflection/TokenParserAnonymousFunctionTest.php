<?php

namespace Doctrine\Tests_PHP74\Common\Reflection;

use Doctrine\Common\Reflection\Psr0FindFile;
use Doctrine\Common\Reflection\StaticReflectionParser;
use Doctrine\Tests_PHP74\Common\Reflection\Dummies\TokenParserAnonymousFunctionTestClass;
use PHPUnit\Framework\TestCase;
use function strlen;
use function substr;

class TokenParserAnonymousFunctionTest extends TestCase
{
    public function testGetValue() : void
    {
        $testsRoot              = substr(__DIR__, 0, -strlen(__NAMESPACE__) - 1);
        $paths                  = [
            'Doctrine\\Tests_PHP74' => [$testsRoot],
        ];
        $staticReflectionParser = new StaticReflectionParser(TokenParserAnonymousFunctionTestClass::class, new Psr0FindFile($paths));

        self::assertEquals('', $staticReflectionParser->getDocComment());
    }
}
