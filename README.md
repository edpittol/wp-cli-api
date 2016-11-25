# WP-CLI API

An API to manipulate an WordPress installation by code. This project is an interface to WP-CLI. It manipulate the core, plugins, themes, options and another data wrapping with the CLI calls.

The WP-CLI is an excellent tool to maintain WordPress sites. However the unique way of execute your code is in the terminal. It’s impossible access directly the project functions to use with another application. For example, to get a status of a plugin.

The objective of the project is solve this. Through of entity classes to represent site objects and helper classes to manipulate the packages and data. Using the WP-CLI as background to get the data and execute tasks.

This project doesn't support multisite installation and interactive commands.

## Installing

The best way to install the package is using [Composer](http://getcomposer.org/) with the following command.

	$ composer require "edpittol/wp-cli-api"

You can add the dependency directly in your `composer.json` file.

	"require": {
        "edpittol/wp-cli-api": "~0.1"
    }

## Examples

Check and update WP core.

	use WP_CLI\Api\Command\Core\CheckUpdateCommand;
	use WP_CLI\Api\Command\Core\UpdateCommand;
	use WP_CLI\Api\Command\Core\VersionCommand;
	
	$check = new CheckUpdateCommand();
	if( ! empty($check->run() ) ) {
		$version = new VersionCommand();
		echo $version->run(); // 4.5
		
		$update = new UpdateCommand();
		$update->run();
	
		echo $version->run(); // 4.6.1
	}

## Contributing

The first step of the project is cover all WP-CLI commands. After, improve and facilitate the use of the API. For a while, the commands covered are `core` and `db`.

Issues and pull requests are welcome.

## Tests

Clone the project

	$ git clone git@github.com:edpittol/wp-cli-api.git

Go to clonned project directory

	$ cd wp-cli-api

Run PHPUnit

	$ ./vendor/bin/phpunit

## License

The project is licensing under GPLv3. See the [LICENSE](LICENSE).

## Changelog

### 0.1

* Wrap the WP-CLI call using Symfony Process
* Process log interface (PSR-3)
* Implement 'core' and 'db' commands
