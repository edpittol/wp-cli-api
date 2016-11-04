<?php
namespace WP_CLI\Api\Test\Command\Core\Language;

use PHPUnit\Framework\TestCase;
use WP_CLI\Api\Process\Process;
use WP_CLI\Api\Command\Core\Language\ActivateCommand;

class ActivateCommandTest extends TestCase
{

    public function testActivate()
    {
        // download a new language
        $process = new Process('core language', 'install', array('pt_BR'));
        $process->run();
        
        $coreCommand = new ActivateCommand(array('pt_BR'));
        $coreCommand->run();
        
        // uninstall the language
        $process = new Process('core language', 'uninstall', array('pt_BR'));
        $process->run();
    }
}
