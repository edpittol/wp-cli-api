<?php
namespace WP_CLI\Api\Command\Core;

/**
 * http://wp-cli.org/commands/core/update-db/
 */
class UpdateDbCommand extends CoreCommand
{

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::subcommand()
     */
    public function subcommand()
    {
        return 'update-db';
    }

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::acceptedArguments()
     */
    public function acceptedArguments()
    {
        return array(
            'dry-run'
        );
    }
}
