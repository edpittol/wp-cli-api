<?php
namespace WP_CLI\Api\Command\Db;

/**
 * http://wp-cli.org/commands/db/tables/
 */
class TablesCommand extends DbCommand
{

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::subcommand()
     */
    public function subcommand()
    {
        return 'tables';
    }

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::acceptedArguments()
     */
    public function acceptedArguments()
    {
        return array(
            'scope',
            'network',
            'all-tables-with-prefix',
            'all-tables',
            'format'
        );
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::returnClass()
     */
    public function returnClass()
    {
        return 'raw';
    }
}
