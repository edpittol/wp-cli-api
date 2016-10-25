<?php
namespace WP_CLI\Api\Test\Dummy\Command;

use WP_CLI\Api\Command\Command as CommandBase;

/**
 * A dummy class for test Command astract class. This class simulate the
 * `wp cli param-dump` command without return any data. The objective isn't
 * test the command. But the non-abstract Command class methods.
 */
class CommandAssociativeReturn extends CommandBase
{
    public function command()
    {
        return 'cli';
    }

    public function subcommand()
    {
        return 'cmd-dump';
    }

    public function acceptedArguments()
    {
        return array();
    }

    public function returnClass()
    {
        return \stdClass::class;
    }
}