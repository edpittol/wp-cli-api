<?php
namespace WP_CLI\Api\Test\Command;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Command\Core\IsInstalledCommand;
use WP_CLI\Api\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use WP_CLI\Api\Command\Core\InstallCommand;

class IsInstalledCommandTest extends TestCase
{
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
        
        // Reinstall WordPress
        $installCommand = new InstallCommand();
        $installCommand->run();
    }
}
