<?php
namespace WP_CLI\Api\Test\Dummy\Command;

/**
 * A dummy class for test Command astract class. This class simulate the
 * `wp cli param-dump` command return the data. The objective isn't test
 * the command. But the non-abstract Command class methods.
 *
 * This class extends the dummy class Command.
 */
class CommandEmptyArrayReturn extends Command
{
    public function __construct()
    {
        parent::__construct(array('--search=foo'));
    }
    
    public function returnClass()
    {
        return \stdClass::class;
    }
}
