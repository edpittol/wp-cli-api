<?php
namespace WP_CLI\Api\Test\Command\Core\Language;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Command\Core\Language\InstallCommand;
use WP_CLI\Api\Command\Core\Language\UninstallCommand;

class InstallCommandTest extends TestCase
{
    public function testInstall()
    {
        $coreCommand = new InstallCommand(array('pt_BR'));
        $coreCommand->run();

        // uninstall the language
        $coreCommand = new UninstallCommand(array('pt_BR'));
        $coreCommand->run();
    }
}
