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
define( 'DB_NAME', getenv( 'WORDPRESS_DB_NAME' ) );

/** MySQL database username */
define( 'DB_USER', getenv( 'WORDPRESS_DB_USER' ) );

/** MySQL database password */
define( 'DB_PASSWORD', getenv( 'WORDPRESS_DB_PASSWORD' ) );

/** MySQL hostname */
define( 'DB_HOST', getenv( 'WORDPRESS_DB_HOST' ) );

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
define( 'AUTH_KEY',         '=D;ma9/yHgD?8:EodM%A[|!6TyOUF>3GBu;;8Su3+cxM.}0xJ`f{jY<@2)#k,#ig' );
define( 'SECURE_AUTH_KEY',  '1d8KxW=(+H <(TXw8NbrLY@. PRhMHm|U>11D9MEA1$T`,?AL;geOCdE8IT_S8Dr' );
define( 'LOGGED_IN_KEY',    '{wMCo2|0JZ!0NXe&C:H!ad$D),LQF6yW)93=6*=I(s`Ja-hf/agp1,B&W&:L3jK+' );
define( 'NONCE_KEY',        ')s{,z5Mh~)rPVX1-54f5s:sF76eD&N:&ID=XLlX7LPYrDr_p_o_P<LA?0@Okg<[P' );
define( 'AUTH_SALT',        'Am,u(2IpQe+5U,f1#u-8SDOO|$QtgqiC6fnk=xp=wmiQyZHK/$D4})DBes[jk[/[' );
define( 'SECURE_AUTH_SALT', 'bQtfoDwjT m+yV7h=|hG8$U.PQq 6E>_QInklT%KhoWVlbTe1eJBdW$b3}.ml,S]' );
define( 'LOGGED_IN_SALT',   'ahzy3!C%pmT3>/5<GaY)$g>WNa:V2q{!cC5>x4$hk-ZbG=sVQ):x|y9xA*H5`RBT' );
define( 'NONCE_SALT',       'jnH*|zKP-0UO-9v9tA>BLu1E&@!w kXnBL;F_>s1Ym3LBkD/,,Gj!DJeM/a81cR%' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = getenv( 'WORDPRESS_TABLE_PREFIX' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
