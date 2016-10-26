<?php

/**
 * Bootstrap tests. Force to report all erros and autoload dependencies
 * libraries.
 */
error_reporting(E_ALL);

require_once 'vendor/autoload.php';

// Change to this dir to read the wp-cli.yml file
chdir(__DIR__);

// Execute the command and store the web server PID
$output = array();
exec('./server.sh', $output);
$pid = (int) $output[0];
echo sprintf('Web server started with PID %d', $pid) . PHP_EOL;

// Kill the web server when the process ends
register_shutdown_function(function () use ($pid) {
    echo sprintf('Killing web server with PID %d', $pid) . PHP_EOL;
    exec('kill ' . $pid);
});
