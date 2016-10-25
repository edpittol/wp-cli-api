<?php
namespace WP_CLI\Api\Test\Dummy\Command;

use WP_CLI\Api\Command\Command as CommandBase;

/**
 * A dummy class for test Command astract class. This class simulate the 
 * `wp cli param-dump` command without return any data. The objective isn't 
 * test the command. But the non-abstract Command class methods.
 */
class Command extends CommandBase
{
    public function command()
    {
        return 'option';
    }
    
    public function subcommand()
    {
        return 'list';
    }
    
    public function acceptedArguments()
    {
        return array('search', 'autoload', 'field', 'fields', 'format');
    }
}
