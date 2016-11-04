<?php
namespace WP_CLI\Api\Test\Command\Core;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Command\Core\VerifyChecksumsCommand;
use Symfony\Component\Process\Exception\ProcessFailedException;

class VerifyChecksumsCommandTest extends TestCase
{
    private static $indexFile = __DIR__ . '/../../wp/index.php';
    
    private static $copyFile = __DIR__ . '/../../wp/index.bkp.php';
    
    public function tearDown()
    {
        // put the original file after testVerifyChecksumsFail
        if (is_file(self::$copyFile)) {
            unlink(self::$indexFile);
            rename(self::$copyFile, self::$indexFile);
        }
    }
    
    public function testVerifyChecksums()
    {
        $coreCommand = new VerifyChecksumsCommand();
        $coreCommand->run();
    }
    
    public function testVerifyChecksumsFail()
    {
        $this->expectException(ProcessFailedException::class);
        
        // create a copy of the index file
        copy(self::$indexFile, self::$copyFile);
        
        // inject some code in the index file
        $fd = fopen(self::$indexFile, 'a');
        fwrite($fd, PHP_EOL . PHP_EOL . '$injectedCode = "somestring";');
        fclose($fd);

        $coreCommand = new VerifyChecksumsCommand();
        $coreCommand->run();
    }
}
