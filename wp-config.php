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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ticket-system' );

/** Database username */
define( 'DB_USER', 'admin10' );

/** Database password */
define( 'DB_PASSWORD', 'admin' );

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
define( 'AUTH_KEY',         '#*9$aH[8<hfVYqiN<4;YNS2T&ImPam89tz2@_tUHT#!6kRA&djxzIs )u!&43FF+' );
define( 'SECURE_AUTH_KEY',  'Zjg5L`jT)L.XB2Qd(.SDHjFP6oGDB1l,B/9/G6#[e)B=Q@=OIzb1[dMl~a!5m{Uq' );
define( 'LOGGED_IN_KEY',    'LfQJ}R WKi^H`Y#APg(~?HDUAt`Q%JaC*w}9qzm_G&w{Uk?W[yKVi^`Y?mK:q.qr' );
define( 'NONCE_KEY',        ']8w`>d##Eu:1K-IBGBS2B}y*DpUf_zkZ4*62J45.gCXMj-p,N4IS>]$Cw+Chja@@' );
define( 'AUTH_SALT',        'Ci<h?x9SdIwJ-~4fk])Gq03VJO)XaX8m7rU(qQm?xX%k;NOQd;Gx`$FD{+kK O]j' );
define( 'SECURE_AUTH_SALT', '1+9z`fxhRL2+HR[g#<1h8[bHv#8bwlqpEs++U#JR]jt+/E8 ;rs?a`c)4Zr8??O[' );
define( 'LOGGED_IN_SALT',   '.EIL0A,15]Xsc$9HNc{PjLs_L<lBdzoEF-tn*`^wTSB,jOddX%y-h.O%.N:cx90B' );
define( 'NONCE_SALT',       'P.YWz+l#_]/P-{Idw-sTZ{Un|PM?hS}_(Wr~YGKB_C=&5viq%<%6,ibISEl)wQ*?' );

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
