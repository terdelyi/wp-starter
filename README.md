# WordPress Starter Kit

### What's this?
It's a WordPress starter kit for fresh projects based on my own observations with WordPress which is mixing modern and secure techniques with the standard way - best of both worlds.

### What does it do?
- It's using WP CLI to install and upgrade WordPress core and plugins from the official sources
- Runs WordPress installer automatically with changed admin user
- Reads an `.env` file to store sensitive data
- It has a dedicated public directory
- It's loading a custom wp-config.php file from the root
- The `wp-content` directory is moved out from the public folder to be able to do zero time deployments and created a symlink to be able to access as an url
- Avoid to commit any data from the `wp-content/uploads` folder

### Themes and custom plugins
There is a `composer.json` file preloaded in `wp-config.php` to be able to access the `.env` file variables. If you need any Composer packages or private plugins which are not available in the WordPress Plugin Directory you can install them by adding as a dependency. The only downside of this is that you need to update the plugin versions manually. Composer will know where to put the plugins if the plugin has a proper `composer.json` file.

Themes and any other project specific plugins should be part of the Git repository, therefor I would recommend you to create exceptions to exclude these folders from the wp-content directory in the `.gitignore` file.

### How to use it?
- Run `composer install`
- Fill `.env` with the right details
- Run `/bin/bash install.sh` to install WordPress

### Contributions
Bugfixes in the current code are gladly welcome, but I'll decline any pull requests which contain additional feature requests as this package is made for private purposes.