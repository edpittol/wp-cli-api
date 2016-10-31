<?php
namespace WP_CLI\Api\Command\Core\Language;

/**
 * http://wp-cli.org/commands/core/language/update
 */
class UpdateCommand extends LanguageCommand
{

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::subcommand()
     */
    public function subcommand()
    {
        return 'update';
    }

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::acceptedArguments()
     */
    public function acceptedArguments()
    {
        return array('dry-run');
    }
}
