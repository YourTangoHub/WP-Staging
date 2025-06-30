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
define( 'DB_NAME', 'wp-staging' );

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
define( 'AUTH_KEY',         '5L{nnBx7knSSN/wW%+TH,95_>GE+a:Qi=4~mp|5L~Vh?iH:0P2EQRqs2*ApIL?L6' );
define( 'SECURE_AUTH_KEY',  '#(De7i(8mk%r7:9#PQpAa*fH^4$ p)}:D*:(rdO#T65on6@Cr-&,Potu0v6905|m' );
define( 'LOGGED_IN_KEY',    'Q&}-fV0:HQ]r!93/RJ:2=U,L7kKfC`Lsrnp~d|)nt3&p?p(@Pwz4XdO1hD`so}td' );
define( 'NONCE_KEY',        'JAXI/9Q^Tf&C2J3`5NwRV6~>3q[ch%.ruvRRc@eQy_YR|7z;y~sqAz_^)PH9Z[)9' );
define( 'AUTH_SALT',        ',N5.Yy7I;7Je,kxznWh}Exu=ciY/Ho(dXZ5lv*Zd#pYPq{TS++iOzl-(y::&)^`E' );
define( 'SECURE_AUTH_SALT', 'pl$rxW#(?@<l#z~1o!qZSG9:a)>p*9(fX o)]bbQxMr94. .fkVD55>HJ42E$/$N' );
define( 'LOGGED_IN_SALT',   '_$X*xh7M^T_wvMoiTBdnW`tlksrUI{;aCbY^c3dnn<Z~T-JQAEbX|R@;=&K4`v{n' );
define( 'NONCE_SALT',       'RHo-fx#?a4;<a~K5(zK.RM#{h lu3fel(ydV%qI(AuZz4*Z2NuCh&ES.8iHG+=*9' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
