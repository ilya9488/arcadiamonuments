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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'arcadiamemorial' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'O6yuSvQ]Jfj8:{j)iT`c0v|4k+z>[-Z[:2^zPvTb<#~z@Qn|D{d`G:V$u{ QxIP*' );
define( 'SECURE_AUTH_KEY',  'IvrzjF(+>yQ>o^64d2O7#YRwX,3tDOrVCL*fMXG*&W!KZd$z(@)5${zhLe]}7p2[' );
define( 'LOGGED_IN_KEY',    'qV1W@*MqtFOUcP6<,RTA><`?e2#xnT|I.>_lB.@`#8u[m5(hnBH%X`O=M*0&M3+K' );
define( 'NONCE_KEY',        '@d{N?P8^fUG*m%|pFZW6A1 8YHpZ4Txf2a|}_GtWuJ*L$7k@kFI)$`M`*tYz,!OI' );
define( 'AUTH_SALT',        '<Dtr$D}W/D<#d)SR)cXe6?a*:}aU^E=JGN-c1KdtVy:V1?5B}y_ULj3N9)?:sT=8' );
define( 'SECURE_AUTH_SALT', 't%m{)NJ r[X6B3tZ*AO!7RW<eb{8Qr>!W]T}%{-jPQ.M[FM(|ZRhnhFW6N+&)ENL' );
define( 'LOGGED_IN_SALT',   '`;*Pfr=)BXsiqgz:JyS_o%XG46{cuKR+ G%~q:QZ9w?h-Hh^=#{$B*f?|aHowhtV' );
define( 'NONCE_SALT',       'KC:n K4:u<e4O`hy S^m6;.Uqv_-Fi@ybM~_|9>E[x.o*i,hf3aoSFq..fHgi+/u' );

define('WP_HOME','http://arcadiamemorial.com.loc/');
define('WP_SITEURL','http://arcadiamemorial.com.loc/');
/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
