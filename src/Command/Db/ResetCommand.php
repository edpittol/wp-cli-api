<?php
namespace WP_CLI\Api\Command\Db;

/**
 * http://wp-cli.org/commands/db/reset/
 */
class ResetCommand extends DbCommand
{

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::subcommand()
     */
    public function subcommand()
    {
        return 'reset';
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

    /**
     * 
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::confirmPrompts()
     */
    public function confirmPrompts()
    {
        return true;
    }
}
