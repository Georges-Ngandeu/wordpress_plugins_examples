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
define( 'DB_NAME', 'wordpress_plugins' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Y@mdeuNaom1' );

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
define( 'AUTH_KEY',         '(H*X=p7C34nFTl@gqG]zm2&qBhD85K%wB*IbMrh4fTyG*Zf.-^oD<:i(]p%m{R~Q' );
define( 'SECURE_AUTH_KEY',  'l!(B<P4MzLi$*<75c[d3~t).Ozeaa2vgmWN*)hoCnns$7C(d38D-5y/M4h>O&+]G' );
define( 'LOGGED_IN_KEY',    ')PYiJ50QV:}E8=B;Q3y6wVC{laheFOS84Kh&od/Lu:^{m7/E;I&p3Bl4<wPTF^8d' );
define( 'NONCE_KEY',        'm7dPH)Ls(bMl?a+I^?O/zT#bvAN+J[2qS dA/s@_f0l&+jclzuo#6 aX]jgK@Ox]' );
define( 'AUTH_SALT',        '#LG,TodR|TQ-?yN$P@(#}i:r2o836O[F841>Rq[s;rWyf)6z&{z,swT_pxb])=Hp' );
define( 'SECURE_AUTH_SALT', ')r2PnG=y22E%(fR(Ox?/H>hDLK^s8YLm^l0#50Qr28-@9Uwk`]v[g.|.HEFSB&20' );
define( 'LOGGED_IN_SALT',   '$x6x8SPVuD{PQ5dhFABluX6SEkAHRD{*D$!_&,&uF|Zxf_t/|K82_< KK5P]d$`]' );
define( 'NONCE_SALT',       'LIE,#PfXbD!81wN^prvDmR|u9(kPqC;Z4e[IL9].X0L7Z4.j=t9n$%*KRVF5bG@:' );

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
