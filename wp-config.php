<?php
/*
 * Check for Composer packages
 */
if( file_exists( realpath( __DIR__ . '/vendor/autoload.php' ) ) ) {
	require_once realpath( __DIR__ . '/vendor/autoload.php' );
}

/*
 * Load environment variables
 */
if( class_exists( 'Dotenv\Dotenv' ) ) {
	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
	$dotenv->load();
}
define( 'ENVIRONMENT_DEV', 'dev' );
define( 'ENVIRONMENT_STAGE', 'stage' );
define( 'ENVIRONMENT_PROD', 'prod' );
define( 'ENVIRONMENT', $_SERVER['ENVIRONMENT'] );
define( 'WP_LOCAL_DEV', $_SERVER['WP_LOCAL_DEV'] );

/*
 * Database values
 */
define( 'DB_NAME', $_SERVER['DB_NAME'] );
define( 'DB_USER', $_SERVER['DB_USER'] );
define( 'DB_PASSWORD', $_SERVER['DB_PASSWORD'] );
define( 'DB_HOST', $_SERVER['DB_HOST'] );

/*
 * Custom Content Directory
 */
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
define( 'WP_CONTENT_URL', 'https://' . $_SERVER['HTTP_HOST'] . '/content' );

/*
 * You almost certainly do not want to change these
 */
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', $_SERVER['DB_COLLATE'] );

/*
 * Salts, for security
 * Grab these from: https://api.wordpress.org/secret-key/1.1/salt
 */
define( 'AUTH_KEY',         $_SERVER['WP_AUTH_KEY'] );
define( 'SECURE_AUTH_KEY',  $_SERVER['WP_SECURE_AUTH_KEY'] );
define( 'LOGGED_IN_KEY',    $_SERVER['WP_LOGGED_IN_KEY'] );
define( 'NONCE_KEY',        $_SERVER['WP_NONCE_KEY'] );
define( 'AUTH_SALT',        $_SERVER['WP_AUTH_SALT'] );
define( 'SECURE_AUTH_SALT', $_SERVER['WP_SECURE_AUTH_SALT'] );
define( 'LOGGED_IN_SALT',   $_SERVER['WP_LOGGED_IN_SALT'] );
define( 'NONCE_SALT',       $_SERVER['WP_NONCE_SALT'] );

/*
 * Table prefix
 * Change this if you have multiple installs in the same database
 */
$table_prefix  = $_SERVER['DB_PREFIX'];

/*
 * Language
 * Leave blank for US English
 */
define( 'WPLANG', $_SERVER['WP_LANG'] );

/*
 * Debug mode
 * Debugging? Enable these in your .env
 */
ini_set( 'display_errors', $_SERVER['WP_DEBUG'] );
ini_set( 'error_reporting', $_SERVER['WP_ERROR_REPORTING'] );
define( 'SAVEQUERIES', $_SERVER['DB_SAVE_QUERIES'] );
define( 'WP_DEBUG', $_SERVER['WP_DEBUG'] );
define( 'WP_DEBUG_DISPLAY', $_SERVER['WP_DEBUG_DISPLAY'] );
define( 'WP_DEBUG_LOG', $_SERVER['WP_DEBUG_LOG'] );
define( 'WP_AUTO_UPDATE_CORE', $_SERVER['WP_AUTO_UPDATE_CORE'] );

/*
 * Load a Memcached config if we have one
 */
if ( file_exists( dirname( __FILE__ ) . '/memcached.php' ) )
	$memcached_servers = include( dirname( __FILE__ ) . '/memcached.php' );

/*
 * This can be used to programatically set the stage when deploying (e.g. production, staging)
 */
define( 'WP_STAGE', $_SERVER['ENVIRONMENT'] );
define( 'STAGING_DOMAIN', $_SERVER['WP_STAGING_DOMAIN'] ); // Does magic in WP Stack to handle staging domain rewriting
define( 'WP_SITEURL', $_SERVER['WP_SITEURL'] );
define( 'WP_HOME', $_SERVER['WP_HOME'] );

/*
 * Bootstrap WordPress
 */
if ( !defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
require_once( ABSPATH . 'wp-settings.php' );