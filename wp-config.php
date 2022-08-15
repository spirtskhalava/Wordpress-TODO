<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'todo_db' );

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
define( 'AUTH_KEY',         'o5*mF ClSCu{^e:WW0aBC-CrleXUG){)?u{F7,+NG?RR{.s,h!{u&6?.XrSFIRy}' );
define( 'SECURE_AUTH_KEY',  'T:/O%{)m9:A]kp*W9e=).yo&WOwTjDNfH5Mf6lK=DO?OfS&3q,^A=AWn`~_@}4-e' );
define( 'LOGGED_IN_KEY',    'M.Dw;G*R;a+;>2hGQU6/MqRLQkn!q(]J0?6q*A&j$^I)qM^$fO.,;rek>Og^NoO!' );
define( 'NONCE_KEY',        '}&3Ej4OZaDJ`2S|fmYE[@N2A3!KYd9D+=muHE_}%jMf(D|z6|w(/61]!hPh#u,Y4' );
define( 'AUTH_SALT',        'v*Nqiz:pEc~wK}$>^%kSSu l^SRfZ~xT4urORxrzB;DN%rJ:@_skqG!$%9k>jN:]' );
define( 'SECURE_AUTH_SALT', '8Set3QY:j5N0Nrxd+).o4{iCKXlr%]BM&#ntQVt|)R8uywL<0 #;vWgn;kCY/uVj' );
define( 'LOGGED_IN_SALT',   '+UbSv(PluO>LXZYYmH`~F@T;eon^P6Mxgk%NB&^ERF}/OBcuFbe`S~CCTjB<s`[y' );
define( 'NONCE_SALT',       '(*~d[VzIm09Q_:BiR}-L8p%cFc C)6qR_@@Dv8t^jK.!P<5+cmIXi]dva%0>Z[W`' );
define('FS_METHOD', 'direct');
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', true );
define( 'WP_DEBUG_LOG', true );


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
