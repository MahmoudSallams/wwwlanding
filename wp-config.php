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
define('DB_NAME', 'wwwlanding');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'JA|NaXnu)Gj~<sMDtC=f+cTt<2*_)!xe,GCse4E)HuA:urbr9w@EWfl.@s}YUh..');
define('SECURE_AUTH_KEY',  'AR*Vh9q,A@Y&yrP;U[bHldph~Y<.Y~mU0]`&~}b?C)=p 8lV<JDG #wi_XJZ%H>|');
define('LOGGED_IN_KEY',    '`/NPs9]NStxu(mY,|y+7n`TG.Z%HEla{5ch=QFpaK9v=?V,.C>#AhY^} hFn#^Ab');
define('NONCE_KEY',        '8a>mNMB~Wa|xVK%@$Jd0]z{u:(SoPQnAD>e#iB/ZdiPuouT$/:lfM4f03z>C(*md');
define('AUTH_SALT',        'YKFLWql 3ySo]~%l7&2zr%uyNjTo6~-%r6<!8LoAvr*klV$C9CMm@UG!GXYaSl:W');
define('SECURE_AUTH_SALT', 'P_O}DR%+Duvlo4,8uZBIDm2On:<H)O?V$L$^u;lZjrWZ^3eNiP0+R+^BUtrj4j`2');
define('LOGGED_IN_SALT',   'f=W&5y.fI0(:i~sH3~&5Lvio~X^9Qo9v|8;EY93f-otEB/FMi`8s#swtY1BVJdu2');
define('NONCE_SALT',       'I?T H?eCy+:~->#{%J&M#3)sa2_:D<GuB#pgr[^dvmJANjAfR.OmAyj>L`l_L?MC');

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
define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
