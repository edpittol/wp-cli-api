<?php
namespace WP_CLI\Api\Test\Command\Core\Language;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Command\Core\Language\UninstallCommand;
use WP_CLI\Api\Command\Core\Language\InstallCommand;

class UninstallCommandTest extends TestCase
{
    public function testUninstall()
    {        
        $coreCommand = new InstallCommand(array('pt_BR'));
        $coreCommand->run();
        
        $coreCommand = new UninstallCommand(array('pt_BR'));
        $coreCommand->run();
    }
}
