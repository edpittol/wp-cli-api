<?php
namespace WP_CLI\Api\Command\Core;

use WP_CLI\Api\Entity\CoreUpdate;

/**
 * http://wp-cli.org/commands/core/check-update/
 */
class CheckUpdateCommand extends CoreCommand
{

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::subcommand()
     */
    public function subcommand()
    {
        return 'check-update';
    }

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::acceptedArguments()
     */
    public function acceptedArguments()
    {
        return array(
            'minor',
            'major',
            'field',
            'fields',
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
        return CoreUpdate::class;
    }
}
