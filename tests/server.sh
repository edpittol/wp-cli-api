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
    $WP core config
fi

# Install the WordPress if it isn't
if ! $WP core is-installed 2> /dev/null; then
    $WP db reset --yes 2> /dev/null || $WP db create
    $WP core install
fi

$WP server
