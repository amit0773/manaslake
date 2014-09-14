<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'manas');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'R~w7.Y-z?7ZWIkLAIQGzKsUCo~9l[b`yJ=fd(,aD]*NjD+mxU`Y~rEWM_6A2 5#s');
define('SECURE_AUTH_KEY',  '>r_1-N=4f[<,}>UH8A3~~/~tGyfBq#vtZq?s|#`iCM;gii=A90+I&%eKJH.G<C^%');
define('LOGGED_IN_KEY',    ';qx2eY;}*3k^rN@90fyTT%Gsig?c;a}12-a=,?^vF3[@MlsW_Q-s*gJ8^E:XnFHO');
define('NONCE_KEY',        'Le#3n(uZYurs9dNF$=uIulmh`Dog{KgA8A6o-jc5hxTs`[Y`l%I32@L,J*w>K*hL');
define('AUTH_SALT',        'fS}]ddD_W2#%U25qEJr,$Po8/kUjEOmg=}9JLBX(92zZhxNCn{P}iUfiI0lU21M5');
define('SECURE_AUTH_SALT', '<XBoj&U[o>%M,~+?tvWFQ/ADF~dY}ifS(z(>8PKvDt>WqLkC7DcE[OFh|PDPn-$A');
define('LOGGED_IN_SALT',   'F@0K9-9NhNt!Z.X&SO:Bt&,s<9BPk&I,1v:fT}_dEwL}cIABX9m=9~%M~4`ZmdpM');
define('NONCE_SALT',       'e:V`7^M<<[$rFBNX@imo7JQcazv*]ptHV~]CxzbH$wu<#C`hM{Xp=yCm_jr0mY.4');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
