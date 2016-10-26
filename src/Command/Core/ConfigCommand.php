<?php
namespace WP_CLI\Api\Command\Core;

/**
 * http://wp-cli.org/commands/core/config/
 */
class ConfigCommand extends CoreCommand
{

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::subcommand()
     */
    public function subcommand()
    {
        return 'config';
    }

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::acceptedArguments()
     */
    public function acceptedArguments()
    {
        return array(
            'dbname',
            'dbuser',
            'dbpass',
            'dbhost',
            'dbprefix',
            'dbcharset',
            'dbcollate',
            'locale',
            'extra-php',
            'skip-salts',
            'skip-check'
        );
    }
}
