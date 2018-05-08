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
define('DB_NAME', 'primarykey_db');

/** MySQL database username */
define('DB_USER', 'primarykey_db');

/** MySQL database password */
define('DB_PASSWORD', 'Primarykey123');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/* That's all, stop editing! Happy blogging. */
define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '1!/6{&qKC!%I@6sZS4ew|QmaJyhvaTiqy`F!-dv>3W2s#Gyp7YC0MY}`%4DtW5S1');
define('SECURE_AUTH_KEY',  'V<wS8LJ;^3+:o:N{FEBw#WqW:[*lj}U2|BXwC|F;jnDKSU.gXm(e=l(,oo`C<iEj');
define('LOGGED_IN_KEY',    'L<L`=F Tvi?=u]A}H:Bm7h-#^FlnYt%f<waNW)H4GO F4H_0%%g<e8ju0|&uiEyp');
define('NONCE_KEY',        '>_ur)_GTZ~58emC=32Tci6TgI#JSit]qa@NA4.X|39~u/d?{h+ubLnQ)5=J]RMII');
define('AUTH_SALT',        '^QO:}b654U<)]OD>-T`qr3?`hFN8NYA~jo|E<OLxnR<%~C4S~.@h$K|h%Q5b,~j~');
define('SECURE_AUTH_SALT', '8%Q9mEsv:]`Cuq#t)Jb{}!v($;qy-BWK)QjAK)+@O(v?}[AqA?w~mp$0KtjvTGHA');
define('LOGGED_IN_SALT',   'X8Tzh?1X0&%dXNdZnh}2.P%FBo?%({kU9pTO[zgrJ$52ywSO65Oh/LEaZI|O?h6z');
define('NONCE_SALT',       'sh]oUbIwQpe>8?G#$`S?#yMav^ z{H @!OgK)F/+%4jH_huS3%(T(J |%:7Lefa|');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
