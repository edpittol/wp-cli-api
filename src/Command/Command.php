<?php
namespace WP_CLI\Api\Command;

use WP_CLI\Api\Process\Process;
use WP_CLI\Api\Serializer\Factory;

/**
 * This class abstract a WP-CLI command. This is an abstract class. It must
 * extend for each cammand class.
 */
abstract class Command
{
    /**
     *
     * @var string[] The command arguments in flat mode.
     */
    private $arguments;

    /**
     *
     * @var string|null[string] The command extrated to separate key and value.
     *  If the argument is a flag (without value). The value of the array item
     *  will be null.
     */
    private $extractedArguments = array();

    /**
     *
     * @var string Pass some data to the command by STDIN.
     */
    private $input;

    /**
     * Instantiate a command. The constructor extract the arguments to a
     * key/value array, validate if the arguments is valid and set the
     * default commands.
     *
     * The default values is defined to arguments that override the WP-CLI
     * defaults. Instead maintain the WP-CLI defaults. For example, the format
     * argument is overrided by JSON. In WP-CLI, the default is table.
     *
     * @param string[] $args The command arguments. They must be passed in the
     *  flat format. For example: '--foo=bar'.
     */
    public function __construct(array $args = array(), $input = '')
    {
        $this->arguments = $args;
        $this->extractArguments();
        $this->validateArguments();
        $this->setDefaults();
        $this->input = $input;
    }

    /**
     * Execute the command. If the command has a return class, will be returned
     * null, if the command output is empty, an array of the return class
     * objects, if the command return a set of registers, or a return class
     * object if the command return a individual item.
     *
     * @return mixed
     */
    public function run()
    {
        $process = new Process($this->command(), $this->subcommand(), $this->arguments);
        
        if ($this->input) {
            $process->getBuilder()->setInput($this->input);
        }
        
        $data = $process->run();
        
        if (! is_null($this->returnClass())) {
            $serializer = Factory::create();
            $return = $serializer->deserialize($data, $this->returnClass(), 'json');
            return $return;
        }
    }

    /**
     * Extract flat arguments and convert to an associative array. The array
     * is stored in the extractedArguments property.
     */
    private function extractArguments()
    {
        $this->extractedArguments = array();
        foreach ($this->arguments as $argument) {
            $extracted = $this->extractArgumentValue($argument);
            $this->extractedArguments[$extracted['key']] = $extracted['value'];
        }
    }

    /**
     * Extract from a string the name and the value of the argument. Exist two
     * kinds of the argument. With and without value. If the argument hasn't
     * value, the value in the return will be null.
     *
     * @param string $argument The command argument.
     * @return string|null[string] The extracted values.
     *      string[name] The name of the argument.
     *      string|null[value] The value of the argument. Null if the argument
     *          hasn't value.
     */
    private function extractArgumentValue($argument)
    {
        $matches = array();
        preg_match_all('/--([^=]*)(=(.*))?/', $argument, $matches);
    
        return array(
            'key' => $matches[1][0],
            'value' => $matches[3][0] ?: null
        );
    }

    /**
     * Validade if the arguments is valid for the command.
     *
     * @throws \InvalidArgumentException If the argument is invalid.
     */
    private function validateArguments()
    {
        foreach (array_keys($this->extractedArguments) as $arg) {
            if (! in_array($arg, $this->acceptedArguments())) {
                $message = 'Argument \'%s\' is invalid to command \'%s %s\'';
                throw new \InvalidArgumentException(sprintf($message, $arg, $this->command(), $this->subcommand()));
            }
        }
    }

    /**
     * Merge the command arguments with this library default values.
     *
     * The format is changed to JSON to facilitate the data manipulation. For
     * the command line, the default output is table.
     *
     * @param array $arguments The arguments passed by the process.
     * @return array The arguments including default values.
     */
    private function setDefaults()
    {
        $newArguments = array();
        
        // set format to JSON if the the command accept format and it not setted
        if (in_array('format', $this->acceptedArguments())) {
            if (! array_key_exists('format', $this->extractedArguments)) {
                $newArguments['format'] = 'json';
            }
        }
        
        // Fill the arguments arrays with the defaults arguments
        foreach ($newArguments as $argKey => $argValue) {
            $this->arguments[] = is_null($argValue) ? sprintf('--%s', $argKey) : sprintf('--%s=%s', $argKey, $argValue);
            $this->extractedArguments[$argKey] = $argValue;
        }
    }

    /**
     * Return the command arguments.
     *
     * @return string[] The argument list.
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * Get the value of an argument
     *
     * @param string $arg The argument name
     * @return boolean|string True, if the argument is a flag. An string if the
     *  argument has value. False, if not found the argument.
     */
    public function getArgument($arg)
    {
        if (key_exists($arg, $this->extractedArguments)) {
            if (is_null($this->extractedArguments[$arg])) {
                return true;
            }
            
            return $this->extractedArguments[$arg];
        }
        
        return false;
    }

    /**
     * Get the value that will be passed to the command by STDIN.
     *
     * @return string
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * Set the value that will be passed to the command by STDIN.
     *
     * @param string $input The new input command.
     */
    public function setInput($input)
    {
        $this->input = $input;
    }

    /**
     * The class that represents the command return object. If the command
     * hasn't return, the return of the function must be null.
     *
     * Use the ::class keyword as return.
     *
     * @link http://php.net/manual/en/language.oop5.basic.php#language.oop5.basic.class.class
     *
     * @return null|string The class name
     */
    public function returnClass()
    {
        return null;
    }

    /**
     * The command name.
     *
     * @return string The command name.
     */
    abstract public function command();

    /**
     * The subcommand name.
     *
     * @return string The subcommand name.
     */
    abstract public function subcommand();

    /**
     * The arguments that are accepted by the subcommand.
     *
     * @return string[] The accepted arguments name.
     */
    abstract public function acceptedArguments();
}
