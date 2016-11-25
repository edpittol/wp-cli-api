<?php
namespace WP_CLI\Api\Command\Db;

/**
 * http://wp-cli.org/commands/db/export/
 */
class ExportCommand extends DbCommand
{

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::subcommand()
     */
    public function subcommand()
    {
        return 'export';
    }

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::acceptedArguments()
     */
    public function acceptedArguments()
    {
        return array(
            'tables',
            'porcelain'
        );
    }

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::returnClass()
     */
    public function returnClass()
    {
        // find by - argument that return the SQL content in STDOUT
        foreach ($this->getArguments() as $key => $value) {
            if (is_int($key) && '-' === $value) {
                return 'raw';
            }
        }
        
        if ($this->getArgument('porcelain')) {
            return 'raw';
        }

        return null;
    }
}
