#!/bin/bash

# Do a WordPress installation to use for tests

# Change to tests directory
cd "$(dirname "$0")"

# The WP-CLI binary path
WP=./../vendor/bin/wp

# Verify if the WordPress is installed, if not download and create the
# wp-config.php
if [ ! -f wp/wp-load.php ]; then
    echo 'Downloading WordPress'
    $WP core download
fi

# Create the wp-config.php file, if not exists
if [ ! -f wp/wp-config.php ]; then
    echo 'Configuring WordPress'
    $WP core config
fi

# Install the WordPress if it isn't
if ! $WP core is-installed 2> /dev/null; then
    $WP db reset --yes 2> /dev/null || $WP db create
    $WP core install
fi

# Start the WP internal server
$WP server > /dev/null 2>&1 &

# Sleep 1 second to waiting the server up
sleep 1

# Print the webserver PID
lsof -i :8080 | sed '2q;d' | awk '{ print $2 }'
