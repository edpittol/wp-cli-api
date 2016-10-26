<?php
namespace WP_CLI\Api\Test\Dummy\Logger;

use Psr\Log\LoggerInterface;

/**
 * A dummy class for test LoggerInterface. The logger has an array to store the
 * lines output. Each array item is an output line.
 */
class Logger implements LoggerInterface
{

    /**
     *
     * @var string[] The logger output lines.
     */
    protected $output;

    /**
     * Create the logger with array that store the logger output.
     */
    public function __construct()
    {
        $this->output = array();
    }

    /**
     * It doesn't need implementation.
     *
     * {@inheritdoc}
     *
     * @see \Psr\Log\LoggerInterface::emergency()
     */
    public function emergency($message, array $context = array())
    {
        return null;
    }

    /**
     * It doesn't need implementation.
     *
     * {@inheritdoc}
     *
     * @see \Psr\Log\LoggerInterface::alert()
     */
    public function alert($message, array $context = array())
    {
        return null;
    }

    /**
     * It doesn't need implementation.
     *
     * {@inheritdoc}
     *
     * @see \Psr\Log\LoggerInterface::critical()
     */
    public function critical($message, array $context = array())
    {
        return null;
    }

    /**
     * Log an error message.
     *
     * {@inheritdoc}
     *
     * @see \Psr\Log\LoggerInterface::error()
     */
    public function error($message, array $context = array())
    {
        $this->log('error', $message);
    }

    /**
     * It doesn't need implementation
     *
     * {@inheritdoc}
     *
     * @see \Psr\Log\LoggerInterface::warning()
     */
    public function warning($message, array $context = array())
    {
        return null;
    }

    /**
     * It doesn't need implementation
     *
     * {@inheritdoc}
     *
     * @see \Psr\Log\LoggerInterface::notice()
     */
    public function notice($message, array $context = array())
    {
        return null;
    }

    /**
     * Log an info message.
     *
     * {@inheritdoc}
     *
     * @see \Psr\Log\LoggerInterface::info()
     */
    public function info($message, array $context = array())
    {
        $this->log('info', $message);
    }

    /**
     * It doesn't need implementation
     *
     * {@inheritdoc}
     *
     * @see \Psr\Log\LoggerInterface::debug()
     */
    public function debug($message, array $context = array())
    {
        return null;
    }

    /**
     * Save the log string in memory using the php://memory file descriptor.
     *
     * {@inheritdoc}
     *
     * @see \Psr\Log\LoggerInterface::log()
     */
    public function log($level, $message, array $context = array())
    {
        // Create the log string
        $log = sprintf('[%s] %s', $level, $message);
        
        // Remove end of line characters of the log string
        $log = str_replace(PHP_EOL, '', $log);
        
        // Store the log string
        $this->output[] = $log;
    }

    /**
     * Get the logger output.
     *
     * @return string[] The logger output.
     */
    public function getOutput()
    {
        return $this->output;
    }
}
