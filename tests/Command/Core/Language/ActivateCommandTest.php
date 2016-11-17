<?php
namespace WP_CLI\Api\Test\Command\Core\Language;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Command\Core\Language\ActivateCommand;
use WP_CLI\Api\Command\Core\Language\InstallCommand;
use WP_CLI\Api\Command\Core\Language\ListCommand;
use WP_CLI\Api\Command\Core\Language\UninstallCommand;

class ActivateCommandTest extends TestCase
{

    public function testActivate()
    {
        // download a new language
        $coreCommand = new InstallCommand(array('pt_BR'));
        $coreCommand->run();
        
        // verify if the language is active
        $coreCommand = new ActivateCommand(array('pt_BR'));
        $coreCommand->run();
        
        $coreCommand = new ListCommand(array('--status=active'));
        $data = $coreCommand->run();
        $this->assertEquals('pt_BR', $data[0]->getLanguage());

        // reactivate the english language
        $coreCommand = new ActivateCommand(array('en_US'));
        $coreCommand->run();
        
        // uninstall the language
        $coreCommand = new UninstallCommand(array('pt_BR'));
        $coreCommand->run();
    }
}
