<?php
namespace WP_CLI\Api\Test\Dummy\Command;

use WP_CLI\Api\Command\Command as BaseCommand;

/**
 * A dummy class for test Command astract class with an arg that is a flag (an
 * argument without value). This class simulate the `wp core version` command
 * without return any data. The objective isn't test the command. But the
 * non-abstract Command class methods.
 */
class CommandFlagArg extends BaseCommand
{
    public function command()
    {
        return 'core';
    }
    
    public function subcommand()
    {
        return 'version';
    }
    
    public function acceptedArguments()
    {
        return array('extra');
    }
    
    public function returnClass()
    {
        return null;
    }
}
