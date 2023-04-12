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
define( 'DB_NAME', 'x_u_9673_test' );

/** Database username */
define( 'DB_USER', 'x_u_9673_test' );

/** Database password */
define( 'DB_PASSWORD', 'test1234' );

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
define( 'AUTH_KEY',         '.d4wmwMm(S>*n7b2c,mb>*%6y,Q@j}::- e}G7C-Jcn5{rIzZy5?Q#-JQ--gx8Lt' );
define( 'SECURE_AUTH_KEY',  'Bi+OtLw]q6*=Sq%R4w G;NOl<{vM6?lX:;idYjOrU5$ZMsIfJUyOM%#29)HR@Q/x' );
define( 'LOGGED_IN_KEY',    '67oDx-)Sznu>,~KZ8uIW@,Xwn_Qw2TBaIHpr!(M) $ietw6`n@2VA7xd{{Xo~4w-' );
define( 'NONCE_KEY',        'D>T~{I1=6@6qMn+7N{*3K{jhPy2GX,{L&Pvj=p <a43C`Ig)J>fv)z.j|:Bn[q+[' );
define( 'AUTH_SALT',        '`7t(:H_l^6nt2NbD 8MWNm9r^m%m$rg[;YPa?-=i762WrN![Z1+#~0>Z 6t4dSWr' );
define( 'SECURE_AUTH_SALT', '!n.!]N^/%n@yvKG~Us)#+N)h`1juMfLx2DOTF?[dS]<2yQ_s1ugb<G]vAtR2}PH5' );
define( 'LOGGED_IN_SALT',   '7hdK,{1fVb^ySd9YX|9n{$:k|QuZl0/Pz~QU[eI}-{0x0<P2|xmBtDJ1%aQr1wOo' );
define( 'NONCE_SALT',       'Of?`Lr54K&5W-%X|&J.DNNkdIs,~w=l>-A)<qmOGRy)@rnA65z(7}kv*^q<Hqj4Q' );

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
