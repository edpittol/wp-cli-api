<?php
namespace WP_CLI\Api\Test\Command;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Command\Core\Language\UninstallCommand;

class InstallCommandTest extends TestCase
{
    public function testUninstall()
    {        
        $coreCommand = new UninstallCommand(array('pt_BR'));
        $coreCommand->run();
    }
}
