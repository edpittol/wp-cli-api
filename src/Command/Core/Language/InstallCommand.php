<?php
namespace WP_CLI\Api\Command\Core\Language;

/**
 * http://wp-cli.org/commands/core/language/install
 */
class InstallCommand extends LanguageCommand
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
        return array('activate');
    }
}
