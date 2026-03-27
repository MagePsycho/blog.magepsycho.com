<?php
define( 'WP_CACHE', true ); // Added by WP Rocket
/**
 * The base configuration for WordPress
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 * @package WordPress
 */

// ** Database settings ** //
define( 'DB_NAME', 'magepsycho_blog' );
define( 'DB_USER', 'magepsycho_blog' );
define( 'DB_PASSWORD', 'ohZDxCSZeNJJHTlDQozyMtEpe9n6xkyH' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

/**
 * Authentication unique keys and salts.
 */
define( 'AUTH_KEY',         'S75JqMfi00hU9uC+/jAi2co03JTVeQuCn2nwwU78dP7Bnv/XiLSFD3eU6Deryj6E' );
define( 'SECURE_AUTH_KEY',  '7XimcoN6l482WeeQit3p+CDS82CAZEYvjYgXWTYft9g4hd0BLNZvvK5Iqdz3FlcF' );
define( 'LOGGED_IN_KEY',    '6LMbIXUNcC06VqE6+Un+a4YoHFLofbEZ9Hv8/no6lKsyum0FmUgPFotIfXdsTvDO' );
define( 'NONCE_KEY',        'AGsZ+q+uG8lM4AbWbaZO4giYTyAtnd5XAI/QeBPu8dYk6CKiEvq6dkxk4s4YfGiy' );
define( 'AUTH_SALT',        'D2tvAJouw/W1wqVXQ+z5/iKUBNsynOBDKSSETX0K68uaKg3uiWpuZcJdqV3xD6pv' );
define( 'SECURE_AUTH_SALT', 'eOED8uG6eZdw8m0RmDkxlcxg9GryHMZuQ/+I55A/W7L4bPncLi221+JFSGFHGH/9' );
define( 'LOGGED_IN_SALT',   'bsK0REEOa2YQsEWmAwTGMK1KYnOvaqBRScmKEEsnmc2vRrZ+8ufziD6pQUw6ejZE' );
define( 'NONCE_SALT',       'm19EG0gHq7E2IhJdgByIsSm04Zneh+8kyz44czaM/hpThgpEbS9WVnGmPPmF6+SE' );

/**
 * WordPress database table prefix.
 */
$table_prefix = 'mpb_';

/**
 * Production settings
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
define( 'DISALLOW_FILE_EDIT', true );

/** Force HTTPS */
define( 'FORCE_SSL_ADMIN', true );
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
    $_SERVER['HTTPS'] = 'on';
}

define( 'WP_HOME', 'https://blog.magepsycho.com' );
define( 'WP_SITEURL', 'https://blog.magepsycho.com' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
