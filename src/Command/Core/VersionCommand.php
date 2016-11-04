<?php
namespace WP_CLI\Api\Command\Core;

/**
 * http://wp-cli.org/commands/core/version/
 */
class VersionCommand extends CoreCommand
{

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::subcommand()
     */
    public function subcommand()
    {
        return 'version';
    }

    /**
     *
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::acceptedArguments()
     */
    public function acceptedArguments()
    {
        return array(
            'extra'
        );
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \WP_CLI\Api\Command\Command::returnClass()
     */
    public function returnClass()
    {
        return 'raw';
    }
}
