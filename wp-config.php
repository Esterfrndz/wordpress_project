<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'wOs8geB!<4)7&}J*xR(>*;vxI.&)d1hSw!-d:?NPT!9; +Y~ML-yA Mxtx%Rl|~h' );
define( 'SECURE_AUTH_KEY',  'C#H8p|4iKatZ(/K(8Y=A?gPrZ8MBMxiv#`)K(_8hNMCGM?TS<Hw1^6{l4:vz<F4E' );
define( 'LOGGED_IN_KEY',    'lA~y{^o<H00:?f9Qt~TO+]{pU.n]fp8=4D!<xu3v&gBTFl/d^ah)YZm1N/H0`$n&' );
define( 'NONCE_KEY',        'd=W_5|.26!:x{bfDxXewfL@/{h:>uqcu}Q*p-<BA,v]xFzMf=<iWTF~]&^1[}4;*' );
define( 'AUTH_SALT',        'l=&#m5D#J)-ABIbm_n^YU]7,|519P=iv0[I|c9TgE:Mlg8f`7iD>U]XHErd: ki:' );
define( 'SECURE_AUTH_SALT', 'JS&>ck#|X*8=;YiX-3UJbohfreV!p2U+Yfo,hWNQ=jMX*_B%>#BGe=eZLd ;g7ZH' );
define( 'LOGGED_IN_SALT',   'ug3VHo)W1ul*46 0bJ:!X@-y$lx+oJmt8+gAT@Dz?sIVhtMkrs1Yr28R`BE8hW:#' );
define( 'NONCE_SALT',       '(T3+lc}cFUx0/Ct*KtL_[3FcX@V~.wJjwP:4q|R$i=m1JSZ7@jj}lq;%W]Abu||b' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
define('FS_METHOD', 'direct');