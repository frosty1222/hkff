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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'hkff' );

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
define( 'AUTH_KEY',         '4 ^uL1C*r{-$E-.-Q Z*DU>kWhOit{eRLl}.oX~0h6x?Az.ul< @r)1* I.0ZPCi' );
define( 'SECURE_AUTH_KEY',  '>oMrG$Kw=*7.;UKY;EtWr./7&-BWY1]Y_c_;oy.2Sd7v)f,.T1]Rk=;GEo3i!Z;&' );
define( 'LOGGED_IN_KEY',    'Fk:Ptz)rLlwPO+Mz!;Zv![>;eVgx:q]h0mN0N6jtI>6#^-sTN5!dTxsX>$5y,EQ4' );
define( 'NONCE_KEY',        '<]Jne KME+!=YxiN72YU@{|ms.-212K:^?5A/l F$|wcORFAU`RG%Co4|I?u3v$4' );
define( 'AUTH_SALT',        'E(2[FmRMLq.]S]W<g*.?]v wA(DDHy0>k.YP?X.j$RV-z_>3$XpYn|pi;;e)6aR@' );
define( 'SECURE_AUTH_SALT', 'yt4##W/,a]}1{J?dD:WaWPGppbk>)8w|kM6uKS0t7e+ZoU8K>3,c06Yla7`wgyQ3' );
define( 'LOGGED_IN_SALT',   '.gjC Fl~)j|D)c|](9[`%geMm8UHa%WIAoj34lqle#*V^ii10eZLZT@-0YYSG]^w' );
define( 'NONCE_SALT',       'CYDM$XL-9DC} t=JBwpM*PyU P4L@LvV-?`%=jrQ@@I}uP%;6{+t&xZ0m#ag4{^L' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
