<?php
namespace WP_CLI\Api\Process;

use Symfony\Component\Process\ProcessBuilder;
use Symfony\Component\Process\Exception\ProcessFailedException;
use WP_CLI\Api\Composer\Factory;

/**
 * Build and run the WP-CLI process to retrieve some data or execute a task.
 * To do it is used the Symfony Process builder.
 *
 * http://symfony.com/doc/2.8/components/process.html
 * http://api.symfony.com/2.8/Symfony/Component/Process/ProcessBuilder.html
 *
 * WP-CLI require Symfony Components in the version 2.8. Because the
 * dependency, the project use these components too.
 */
class Process
{

    /**
     *
     * @var ProcessBuilder The process builder to manage the command creation.
     */
    protected $builder;

    /**
     * Create the WP-CLI process.
     *
     * @param string $command
     *            The WP-CLI command to run.
     * @param string $subcommand
     *            The subcommand.
     * @param array $arguments
     *            The command arguments.
     */
    public function __construct($command, $subcommand, $arguments = array())
    {
        // Create the builder and set the WP-CLI binary to be executed
        $this->builder = new ProcessBuilder();
        $this->builder->setPrefix($this->getWpCliBin());
        
        array_unshift($arguments, $command, $subcommand);
        
        $this->builder->setArguments($arguments);
    }

    /**
     * Get the WP-CLI binary path. The function use the Composer object to get
     * the vendor dir. And verify the plataform (Unix or Windows) to load the
     * right binary.
     *
     * The project isn't supporting the Windows plataform.
     *
     * @return string The binary path.
     */
    public function getWpCliBin()
    {
        // Create a minimal Composer object, without do a full packages
        $composer = Factory::createMinimal();
        
        // Get the vendor dir and append the WP-CLI binary path
        $vendorDir = $composer->getConfig()->get('bin-dir');
        $binPath = $vendorDir . "/wp";
        
        return $binPath;
    }

    /**
     * Run the process.
     *
     * @throws ProcessFailedException If the process run fail.
     */
    public function run()
    {
        $process = $this->builder->getProcess();
        $process->run();
        
        // Throw an exception if the process return a non-zero code
        if (! $process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
    }

    /**
     * Get the process builder.
     *
     * @return ProcessBuilder The process builder.
     */
    public function getBuilder()
    {
        return $this->builder;
    }
}
