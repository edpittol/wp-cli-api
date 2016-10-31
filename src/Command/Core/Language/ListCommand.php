<?php
namespace WP_CLI\Api\Command\Core\Language;

use WP_CLI\Api\Entity\Language;

/**
 * http://wp-cli.org/commands/core/language/list
 */
class ListCommand extends LanguageCommand
{

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::subcommand()
     */
    public function subcommand()
    {
        return 'list';
    }

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::acceptedArguments()
     */
    public function acceptedArguments()
    {
        return array(
            'field',
            'fields',
            'format',
            'format'
        );
    }

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::fields()
     */
    public function fields()
    {
        return array(
            'language',
            'english_name',
            'native_name',
            'status',
            'update',
            'updated'
        );
    }

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::returnClass()
     */
    public function returnClass()
    {
        return Language::class;
    }
}
