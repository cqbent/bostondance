<?php
define('WP_CACHE', true); // Added by WP Rocket
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
define('DB_NAME', 'bda');

/** MySQL database username */
define('DB_USER', 'bda_user');

/** MySQL database password */
define('DB_PASSWORD', 'bda2015');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',       '%WJcozdEsXQpvynA03lYMaXTlh(7*!0GI6qnwYnGd74elnOAZiG!Itj%!pzdO@uj');
define('SECURE_AUTH_KEY',       '3*at)QZaQ(f6bhfsnhEwV!ffAzT4#PH!EARm6e85rOHnm7I@QrxQhMqu1hIjSYat');
define('LOGGED_IN_KEY',       'h0(lKSK09q6bZx^dN3Wal*Oq!L9T^zK@yWdr)qT84n2DY(V3wIuf)bG6hca*l*2B');
define('NONCE_KEY',       '!Hj(mz4HoKKpHv(7vM#wixc#4conae^(b&1iqs*LPJO#Q3Hrj27#DrC840LpyUdv');
define('AUTH_SALT',       'XI9V1(Wn@cx^9BWYvqrjoqpIXIqG@dbE7YN(h)87(FF3nNg8#LVFUB(X7uf2bazw');
define('SECURE_AUTH_SALT',       'XihjV1xoh@V4iZ@anysvLsskfoJ#syfolRqAQMNNXcj#Bb3dO#QTBCQK30D3MBV6');
define('LOGGED_IN_SALT',       'lfZ40NTOxNBzHItAg^coCiV81sdPSF349J#ORNemY(9g9%&uxMIi**%UcAM7KmuZ');
define('NONCE_SALT',       'MB3s48#!CuCiuXRr!khp!O!6ZFgk58Z^%bOF5hfFlkY2xLaq3r0kXY2VAeTGGMit');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'bda_';

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
define('WP_DEBUG', false );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
