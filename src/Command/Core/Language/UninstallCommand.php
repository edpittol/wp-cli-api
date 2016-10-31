<?php
namespace WP_CLI\Api\Command\Core\Language;

/**
 * http://wp-cli.org/commands/core/language/uninstall
 */
class UninstallCommand extends LanguageCommand
{

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::subcommand()
     */
    public function subcommand()
    {
        return 'uninstall';
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
