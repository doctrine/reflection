<?php

namespace Doctrine\Tests\Common\Reflection;

use Doctrine\Common\Reflection\Psr0FindFile;
use PHPUnit\Framework\TestCase;

use function sprintf;
use function strlen;
use function substr;

use const DIRECTORY_SEPARATOR;

class Psr0FindFileTest extends TestCase
{
    /** @var Psr0FindFile */
    private $psr0FindFile;

    public function testFindFile(): void
    {
        $file = $this->psr0FindFile->findFile(NoParent::class);

        self::assertSame(sprintf('%s%sNoParent.php', __DIR__, DIRECTORY_SEPARATOR), $file);
    }

    public function testFindFileNotFound(): void
    {
        self::assertNull($this->psr0FindFile->findFile('DoesNotExist'));
    }

    public function testFindFileWithLeadingNamespaceSeparator(): void
    {
        $file = $this->psr0FindFile->findFile('\Doctrine\Tests\Common\Reflection\NoParent');

        self::assertSame(sprintf('%s%sNoParent.php', __DIR__, DIRECTORY_SEPARATOR), $file);
    }

    public function testFindFileFromPearLikeClassName(): void
    {
        $file = $this->psr0FindFile->findFile('Doctrine_Tests_Common_Reflection_NoParent');

        self::assertSame(sprintf('%s%sNoParent.php', __DIR__, DIRECTORY_SEPARATOR), $file);
    }

    protected function setUp(): void
    {
        $testsRoot = substr(__DIR__, 0, -strlen(__NAMESPACE__) - 1);

        $paths = [
            'Doctrine\\Tests' => ['Test', $testsRoot],
            'Doctrine_Tests' => ['Test', $testsRoot],
        ];

        $this->psr0FindFile = new Psr0FindFile($paths);
    }
}
