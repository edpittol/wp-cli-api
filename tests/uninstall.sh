#!/bin/bash

# Remove the Test WordpPress instalation. This script remove the WordPress
# directory and drop the database. It isn't executed automatically. It's only
# to make easier the instalation removal.

# Change to tests directory
cd "$(dirname "$0")"

# Define the WP-CLI configuration file
WP_CLI_CONFIG_PATH=wp-cli.test.yml

# The WP-CLI binary path
WP=./../vendor/bin/wp

# Drop the database
$WP db drop --yes &> /dev/null

# Remove wp directory
rm -rf wp/