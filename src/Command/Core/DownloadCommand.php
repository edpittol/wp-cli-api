<?php
namespace WP_CLI\Api\Command\Core;

/**
 * http://wp-cli.org/commands/core/download/
 */
class DownloadCommand extends CoreCommand
{

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::subcommand()
     */
    public function subcommand()
    {
        return 'download';
    }

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::acceptedArguments()
     */
    public function acceptedArguments()
    {
        return array(
            'path',
            'locale',
            'version',
            'force'
        );
    }
}
