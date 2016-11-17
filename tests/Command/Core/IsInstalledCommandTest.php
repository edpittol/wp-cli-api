<?php
namespace WP_CLI\Api\Test\Command\Core;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Command\Core\IsInstalledCommand;
use WP_CLI\Api\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use WP_CLI\Api\Command\Core\InstallCommand;

class IsInstalledCommandTest extends TestCase
{
    /**
     * Garantee that the WordPress is installed after test
     */
    public static function tearDownAfterClass()
    {
        try {
            $coreCommand = new IsInstalledCommand();
            $coreCommand->run();
        } catch (ProcessFailedException $e) {
            $installCommand = new InstallCommand();
            $installCommand->run();
        }
    }
    
    public function testIsInstalled()
    {    
        $coreCommand = new IsInstalledCommand();
        $coreCommand->run();
    }
    
    public function testIsntInstalled()
    {
        $this->expectException(ProcessFailedException::class);
        
        // Reset the database
        $process = new Process('db', 'reset', array(
            '--yes'
        ));
        $process->run();
        
        $coreCommand = new IsInstalledCommand();
        $coreCommand->run();
        
    }
}
