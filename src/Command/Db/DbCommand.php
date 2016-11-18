<?php
namespace WP_CLI\Api\Command\Db;

use WP_CLI\Api\Command\Command;

/**
 * http://wp-cli.org/commands/db/
 */
abstract class DbCommand extends Command
{

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::command()
     */
    public function command()
    {
        return 'db';
    }
}
