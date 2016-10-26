<?php
namespace WP_CLI\Api\Command\Core;

use WP_CLI\Api\Command\Command;

/**
 * http://wp-cli.org/commands/core/
 */
abstract class CoreCommand extends Command
{

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::command()
     */
    public function command()
    {
        return 'core';
    }
}
