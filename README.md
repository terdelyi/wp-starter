# WordPress Starter Kit

### What's this?
It's a WordPress starter kit for fresh projects based on my own observations with WordPress which is mixing modern and secure techniques with the standard way - best of both worlds.

### What does it do?
- Uses WP CLI locally to install and upgrade WordPress core and plugins from the official sources
- Plugins can be defined as a list in `wp-plugins.txt` with their slugs from the WordPress Plugin Directory
- WordPress installed to a dedicated public directory
- Runs WordPress installer from command line with your choice of an admin user (*"admin" is generally not recommended*)
- Reads the `.env` file to access any sensitive data
- Loads a custom `wp-config.php` file from the root with autoloaded Composer
- The `wp-content` directory is moved out from the public folder to be able to run zero downtime deployments and symlinked back to `public/wp-content` to be able to access it publicly
- Ignores the files in folder `wp-content/uploads`

### Themes and custom plugins
If you need any Composer packages or private plugins which are not available in the WordPress Plugin Directory you can install them by adding as a dependency. The only downside of this is that you need to update the plugin versions manually. Composer will know where to put the plugins if the plugin has a proper definition of a `wp-plugin` type in it's `composer.json` file.

Themes and any other project specific plugins should be a part of the Git repository, therefor I would recommend you to create some exceptions to exclude these folders from the `wp-content` directory rules in the `.gitignore` file.

### How to use it?
- Run `composer install`
- Fill `.env` with the right details
- Run `/bin/bash install.sh` to start the installer

### Contributions
Bugfixes in the current code are gladly welcome, but I'll decline any pull requests which contain additional feature requests as this package is made for private purposes.