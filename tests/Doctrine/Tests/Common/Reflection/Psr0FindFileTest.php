<?php

namespace Doctrine\Tests\Common\Reflection;

use Doctrine\Common\Reflection\Psr0FindFile;
use PHPUnit\Framework\TestCase;
use function sprintf;
use function strlen;
use function substr;

class Psr0FindFileTest extends TestCase
{
    /** @var Psr0FindFile */
    private $psr0FindFile;

    public function testFindFile() : void
    {
        $file = $this->psr0FindFile->findFile(NoParent::class);

        self::assertEquals(sprintf('%s/NoParent.php', __DIR__), $file);
    }

    public function testFindFileNotFound() : void
    {
        self::assertNull($this->psr0FindFile->findFile('DoesNotExist'));
    }

    public function testFindFileWithLeadingNamespaceSeparator() : void
    {
        $file = $this->psr0FindFile->findFile('\Doctrine\Tests\Common\Reflection\NoParent');

        self::assertEquals(sprintf('%s/NoParent.php', __DIR__), $file);
    }

    public function testFindFileFromPearLikeClassName() : void
    {
        $file = $this->psr0FindFile->findFile('Doctrine_Tests_Common_Reflection_NoParent');

        self::assertEquals(sprintf('%s/NoParent.php', __DIR__), $file);
    }

    protected function setUp() : void
    {
        $testsRoot = substr(__DIR__, 0, -strlen(__NAMESPACE__) - 1);

        $paths = [
            'Doctrine\\Tests' => ['Test', $testsRoot],
            'Doctrine_Tests' => ['Test', $testsRoot],
        ];

        $this->psr0FindFile = new Psr0FindFile($paths);
    }
}
