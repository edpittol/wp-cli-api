<?php
namespace WP_CLI\Api\Command\Db;

/**
 * http://wp-cli.org/commands/db/import/
 */
class ImportCommand extends DbCommand
{

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::subcommand()
     */
    public function subcommand()
    {
        return 'import';
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
