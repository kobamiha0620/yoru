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
define( 'DB_NAME', '4w5iv_x4737384' );

/** MySQL database username */
define( 'DB_USER', '4w5iv_464w8787' );

/** MySQL database password */
define( 'DB_PASSWORD', 'G3S6:v54B4' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql13.onamae.ne.jp' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'w<G5{P#teX@q<*M~M1S/*k]HD%J#J?eVRF?7JmRgwAqVX2yOy^HE|Z43Jg[C3b*P' );
define( 'SECURE_AUTH_KEY',   'Yuh`2.(Z5bA<6TKDdxa*~<n)~R!pt!L>MwaAlf>lD2g1g3SUk!>B88~|iET|zf[g' );
define( 'LOGGED_IN_KEY',     'zbBMVhlxiI(Itr~KrgLVYcdupP[(AlMhMp:6[+9b=Z>xWw)E[OGPfM3z;hvdUY!.' );
define( 'NONCE_KEY',         '-S/[.b,sxL5U/!&%CP(|0%t/{`4#8Hje1e(`7O^:b0hAp5-.8pHWIq8]}y]#1(VM' );
define( 'AUTH_SALT',         '$>mUe6mR5+FS^17V#o@R`7%XO))<B>qBl[0xDtH&@_rLH$6l3!2k}$l0*3~%@.2/' );
define( 'SECURE_AUTH_SALT',  '=@hUZ!Yaw#k|BaJ@`HfEB<;s{NkT|[*N-f^:_p}<$v?m)fT8)&H[tk[O,5rDED:.' );
define( 'LOGGED_IN_SALT',    'Nenjk43k-}9Lt6FmqqGf6APC ={6,lPOxpA6@g_I;+p]YaA0iaOP{`4}h~$z{J]6' );
define( 'NONCE_SALT',        'h#GT#:tD[aXr<6VXrmxLSra X`w%D:,=7Wx2ZFF&@h2K=7WdngdA>6Qo_e-^RoF[' );
define( 'WP_CACHE_KEY_SALT', 'X?xhaodwS)C`{#~.mH4sQ`FPOr+Gmi5 uF,L_*s%IDZk [6wW_kqKm2nT&L%j9W4' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === "https") {
    $_SERVER['HTTPS'] = 'on';
    define('FORCE_SSL_LOGIN', true);
    define('FORCE_SSL_ADMIN', true);
}




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
