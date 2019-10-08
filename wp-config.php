<?php
/**
 * The base configuration for WordPress 5.2.3
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Composer autoload
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

/**
 * Composer autoload
 */
require dirname( __FILE__ ) . '/vendor/autoload.php';

/**
 * Initialise Dotenv
 * @var Dotenv\Dotenv
 */
$dotenv = Dotenv\Dotenv::create(dirname( __FILE__ ));
$dotenv->load();

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', getenv('DB_NAME') );

/** MySQL database username */
define( 'DB_USER', getenv('DB_USER') );

/** MySQL database password */
define( 'DB_PASSWORD', getenv('DB_PASSWORD') );

/** MySQL hostname */
define( 'DB_HOST', getenv('DB_HOST') );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          getenv('AUTH_KEY') );
define( 'SECURE_AUTH_KEY',   getenv('SECURE_AUTH_KEY') );
define( 'LOGGED_IN_KEY',     getenv('LOGGED_IN_KEY') );
define( 'NONCE_KEY',         getenv('NONCE_KEY') );
define( 'AUTH_SALT',         getenv('AUTH_SALT') );
define( 'SECURE_AUTH_SALT',  getenv('SECURE_AUTH_SALT') );
define( 'LOGGED_IN_SALT',    getenv('LOGGED_IN_SALT') );
define( 'NONCE_SALT',        getenv('NONCE_SALT') );
define( 'WP_CACHE_KEY_SALT', getenv('WP_CACHE_KEY_SALT') );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );
define( 'WP_CONTENT_URL', getenv('SITE_URL') . '/wp-content' );
define( 'WP_PLUGIN_DIR', dirname( __FILE__ ) . '/wp-content/plugins' );
define( 'WP_PLUGIN_URL', WP_CONTENT_URL . '/plugins');
define( 'PLUGINDIR', WP_PLUGIN_DIR );


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
