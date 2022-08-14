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
define( 'AUTH_KEY',         '8Oouw{E;[#;>5`_KMiX&tE00zn+Z-/TONs&BW-nW(0WP~OZEZfrklie~CCW:vvqK' );
define( 'SECURE_AUTH_KEY',  ']MkHa{P(X.]eDxYWY7avkm:iuJmFutN}:mr#6gvhYZ2sZEuxE?e[IdWFq73&&po<' );
define( 'LOGGED_IN_KEY',    'mz<}]t$P= /,6$lc&& IqTxgYRe5(P-3b}B(Yui0Qm}^lB~}(=](Q^frQG4bcM;i' );
define( 'NONCE_KEY',        'c [j8xflL5.Z,[Dv,k1.E;?//Qy~FWQPhp6oYu!]-uk| +3%YBW`0[e<=TK^H/%[' );
define( 'AUTH_SALT',        '`&CYe<vg#JdI`(H%LHcYF$q_;qn<&iaaryemQ/vU3D?3#mF4-t~f<sF<2/wCON1}' );
define( 'SECURE_AUTH_SALT', 'l^~//w)j+x&TWBvVn;C&qz)?<8J3a:}rd~<^^#/n~US8&3!{?Bj#WL~eY1/]m&9V' );
define( 'LOGGED_IN_SALT',   'c{i/SQf@?;rc8DNIy*y|20o=GmIsiRapxjKV7L=jUcb*ki]#F`gHl-u_+l)ZK.?|' );
define( 'NONCE_SALT',       '6E,VR)^Y@Aky^k;pPj.-~5-7:92ggT+vOh@6<=I.XSzg#keJZmiGY3XnQGC=%t{4' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
