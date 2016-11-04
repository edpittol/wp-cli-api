<?php
namespace WP_CLI\Api\Test\Command\Core\Language;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Command\Core\Language\InstallCommand;
use WP_CLI\Api\Process\Process;

class InstallCommandTest extends TestCase
{
    public function testInstall()
    {
        $coreCommand = new InstallCommand(array('pt_BR'));
        $coreCommand->run();

        // uninstall the language
        $process = new Process('core language', 'uninstall', array('pt_BR'));
        $process->run();
    }
}
