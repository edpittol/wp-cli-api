<?php
namespace WP_CLI\Api\Command\Core;

/**
 * http://wp-cli.org/commands/core/install/
 */
class InstallCommand extends CoreCommand
{

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::subcommand()
     */
    public function subcommand()
    {
        return 'install';
    }

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::acceptedArguments()
     */
    public function acceptedArguments()
    {
        return array(
            'url',
            'title',
            'admin_user',
            'admin_password',
            'admin_email',
            'skip-email'
        );
    }
}
