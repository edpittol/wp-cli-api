<?php
namespace WP_CLI\Api\Command\Db;

/**
 * http://wp-cli.org/commands/db/create/
 */
class CreateCommand extends DbCommand
{

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::subcommand()
     */
    public function subcommand()
    {
        return 'create';
    }

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::acceptedArguments()
     */
    public function acceptedArguments()
    {
        return array();
    }
}
