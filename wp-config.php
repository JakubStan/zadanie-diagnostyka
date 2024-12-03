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
define( 'DB_NAME', 'diagnostyka' );

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
define( 'AUTH_KEY',         '!$g1XO<3Mx<pE4*.%_7{,pJ/9g:Hxj6DM>GiDW,bnCfGPNhQ&EA]!,XG;UA0|b9s' );
define( 'SECURE_AUTH_KEY',  '/w70_F+}3;qXs.p)7j8>.qW27#sO`RvX<Un?Vl=`PXEl1YpPs>#KJ*VHr(&^>?[$' );
define( 'LOGGED_IN_KEY',    '1)@o62/za=R#P9y]/m6CZ[|i-`W5@&l&b>u6jd|pgRXD&K@zNOypN2`sws@cpQHR' );
define( 'NONCE_KEY',        'E6ArkQLw=0TODTkE20BHK_%]+rkAOc9^HQn#9PmA7Kx:TDS@!3/ymJ9v5sP!y%?X' );
define( 'AUTH_SALT',        'Rmk#TW~P/b?{Fyv!C(0)FkD2GB4Qeo(gq=O:_O%LriB.sJ[<.!j~@sU5Zu=TrdM}' );
define( 'SECURE_AUTH_SALT', '3$PD$-|33m :7u3/^7Fv<}E@(+VLnIV vLSoDgMc3svF18I91f>Y9U4l/p{UL4Ur' );
define( 'LOGGED_IN_SALT',   'IO]Hjnypzu/-w(kobWY}8 VrMDqiN3uO]%jRV/q]BVuv^jDz+[bVYWB=7yjq4=z`' );
define( 'NONCE_SALT',       't;E_uZl./Qp_oPeT!P @UE$=B1<j_J~zLZ6[44eV)<zC ]TgBVaihUh&x0Bc9VoR' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
