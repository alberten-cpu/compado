<?php
define( 'WP_CACHE', true );
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
define( 'DB_NAME', 'compado' );

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
define( 'AUTH_KEY',         '$jOk1C0~hnS:7kk8S(AmcV9;ui=@9,t^F`)7LB7Y))tOkKv+l4GlxfEJ0@n7d@1g' );
define( 'SECURE_AUTH_KEY',  '61Cyn0HS/w3qI8heA|JB@q+ul`GZ+2zq(LGHfj`Ev=2.%s ZpNO x:4*<{j:`R8>' );
define( 'LOGGED_IN_KEY',    'rH4a,]Up-?,UAm#Tz%O3dMr@k5D<6.;v1pr71P:G-[_e_ +[9!8U>B|!W:Me,bY2' );
define( 'NONCE_KEY',        'R^>Q|>e8/&ZGYM&[z&b~ZzmEfacj ElTp;ch>]h4,Q@n0b$y<;.Xn7pt/-)km@).' );
define( 'AUTH_SALT',        'X-;sk,VPvzJys9`lA@`KG&RLBtKKZt~96`L7,^N|s.FY#j,m.=hFEL3`T +^7qEk' );
define( 'SECURE_AUTH_SALT', '.; NuP,33GL2cB?cFED+<0A9f/_6Zb7%e`{SfXlKF#ECv@}[l%JX}YJ!GeSVQ=k9' );
define( 'LOGGED_IN_SALT',   '$GThH{b{<~In,8-IwLrC0t^;oJ^Q`GVa:(&ZYL6J};?kRb1GYF]1q`X^#jkL:^Yf' );
define( 'NONCE_SALT',       'a/BD*;PRT4l)Ev=%3ZR:?jS%WpDsa?&)}c1u4,Qj,bqV)cgX}ofHK#,@h7PXi^+C' );

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
