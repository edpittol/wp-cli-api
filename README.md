# WP-CLI API

An API to manipulate an WordPress installation by code. This project is an interface to WP-CLI. It manipulate the core, plugins, themes, options and another data wrapping with the CLI calls.

The WP-CLI is an excellent tool to maintain WordPress sites. However the unique way of execute your code is in the terminal. It’s impossible access directly the project functions to use with another application. For example, to get a status of a plugin.

The objective of the project is solve this. Through of entity classes to represent site objects and helper classes to manipulate the packages and data. Using the WP-CLI as background to get the data and execute tasks.