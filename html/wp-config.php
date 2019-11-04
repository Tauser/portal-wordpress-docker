<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'exampledb');

/** MySQL database username */
define( 'DB_USER', 'exampleuser');

/** MySQL database password */
define( 'DB_PASSWORD', 'examplepass');

/** MySQL hostname */
define( 'DB_HOST', 'db');

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'e2aab291c96bb215a9b6fb7383779fa7e7fd899c');
define( 'SECURE_AUTH_KEY',  '7a516689fbe5b7304df4356ee5d65b8fce194d73');
define( 'LOGGED_IN_KEY',    'ef5a5a468e314a09fed19ebbecb91cc49af00613');
define( 'NONCE_KEY',        'c8c00b3f935e0144085a16de2ead720bea442609');
define( 'AUTH_SALT',        '7c3af0abffa6ea4f8ad5f06c8506d91ddafddf06');
define( 'SECURE_AUTH_SALT', '5dfa68dc9af4a384f6fc858a5b0cdb11c1fac96c');
define( 'LOGGED_IN_SALT',   'b11c663905336edd3963a60288e6b6291c44859b');
define( 'NONCE_SALT',       '47b5e4efb303bc7a5a1dffd9cd73eba54f7967ef');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';
define('FS_METHOD', 'direct');
define('VIDEO_UPLOAD_DIR', '/var/www/html/wp-content/uploads/midias/videos');
define('VIDEO_UPLOAD_URL', 'http://localhost:8081/wp-content/uploads/midias/videos');
define('IMAGE_UPLOAD_DIR', '/var/www/html/wp-content/uploads/midias/images');
define('IMAGE_UPLOAD_URL', 'http://localhost:8081/wp-content/uploads/midias/images');
define('AUDIO_UPLOAD_DIR', '/var/www/html/wp-content/uploads/midias/audios');
define('AUDIO_UPLOAD_URL', 'http://localhost:8081/wp-content/uploads/midias/audios');
define('FILE_UPLOAD_DIR', '/var/www/html/wp-content/uploads/midias/files');
define('FILE_UPLOAD_URL', 'http://localhost:8081/wp-content/uploads/midias/files');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

// If we're behind a proxy server and using HTTPS, we need to alert Wordpress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
