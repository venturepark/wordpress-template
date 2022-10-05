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

define( 'DB_NAME', 'bitnami_wordpress' );


/** Database username */

define( 'DB_USER', 'bn_wordpress' );


/** Database password */

define( 'DB_PASSWORD', '' );


/** Database hostname */

define( 'DB_HOST', 'mariadb:3306' );


/** Database charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8' );


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

define( 'AUTH_KEY',         'I$A>.cB3F|d25(utMu[&i;YC*oO.6*=1?6)hU|(g09YWT4vOZ+~u{ #S=j3Fg}oo' );

define( 'SECURE_AUTH_KEY',  'Q,2W9y`E{@R>saZZ29;.Ea=)u4;<f%`mho7*Cj.EqM@X!;]X>z^-4GnMU!(J:Yk{' );

define( 'LOGGED_IN_KEY',    'k!dBw#G8`I*_GHkM|Bb-+BjpJ@c(!x]8vS)8=r.5 sO5}O?LOO.u.p0=i4u]))lf' );

define( 'NONCE_KEY',        'zMaxr%zhj6[L*.ueH%]x<y`P-HI(aAJEssR[S ]s)`lqug62l/5YP92`Yobg)!D<' );

define( 'AUTH_SALT',        '+DYj*4pRi<Eu`uBGER*kfO@{4;+(px]:_MiP-:S7;6M`d(BS*zj=E!#:,pz[]6)2' );

define( 'SECURE_AUTH_SALT', 'f,e+Oy]|CEVzP/7l5z{~NyypxV^tAgqn)WFR)au2}*uyS3U,A7I8 3lO,}yPs>hU' );

define( 'LOGGED_IN_SALT',   'GDmEk>LG|s#x8w>`k8z|p|6g4K@s9e<e/`zhWexQoYTsXbFDm!I&Nt2GC(|P-L.c' );

define( 'NONCE_SALT',       'MMahdbf3WT@SH!#U1T1=9#nW8.@T:E1FWJC1V{0_|M0DITYWqBpXwM^g}C[4iQYO' );


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




define( 'FS_METHOD', 'direct' );
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
 */
if ( defined( 'WP_CLI' ) ) {
	$_SERVER['HTTP_HOST'] = '127.0.0.1';
}

define( 'WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_AUTO_UPDATE_CORE', false );
/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

/**
 * Disable pingback.ping xmlrpc method to prevent WordPress from participating in DDoS attacks
 * More info at: https://docs.bitnami.com/general/apps/wordpress/troubleshooting/xmlrpc-and-pingback/
 */
if ( !defined( 'WP_CLI' ) ) {
	// remove x-pingback HTTP header
	add_filter("wp_headers", function($headers) {
		unset($headers["X-Pingback"]);
		return $headers;
	});
	// disable pingbacks
	add_filter( "xmlrpc_methods", function( $methods ) {
		unset( $methods["pingback.ping"] );
		return $methods;
	});
}
