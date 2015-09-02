<?php


// ** MySQL settings ** //
/** The name of the database for WordPress */
define('DB_NAME', 'freshkids');

/** MySQL database username */
//define('DB_USER', 'freshkids');
define('DB_USER', 'root');

/** MySQL database password */
//define('DB_PASSWORD', '123');
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         'LN%,#G(dWkgmpBtdDfxpLJW2xUTiW?}jd M?V{G=eg+/++QSN>+/zNLLjWku/$%4');
define('SECURE_AUTH_KEY',  '|7?J+BlhjFB_/FA~AJhM80JG*b{BaE;S_En8$cTNup5/v=y[F`alEh}<F|Hn -/y');
define('LOGGED_IN_KEY',    '+Vkvc}l7.-ZFd`2We!s1K@~SpnWHh-uBq/7#K-L5uu(X|k$.X@BYFHoFqz3o|j&s');
define('NONCE_KEY',        'ZDVwwp+^[en/r2-Gf?`mBa%:0S>,7@ec-bxZV=!;~b|#-++.oOQx1T|_T}ur1+hX');
define('AUTH_SALT',        '_g=](]C$P!/iQc&TVX2Gn->q4H+%iOS0A-7{G<Un-qrwcisZ53tbkx9}?-E](?|J');
define('SECURE_AUTH_SALT', '5S:x_+y63H}eO9nh}DpUC|Fscm0/n10lHEOkV})^jo_Rqs}5}NXU4Zj@O= s4&`/');
define('LOGGED_IN_SALT',   '<M3R1mkyway!Tm^40lv&fu;Fx.=MKUt`8K(,Z3hH5l.%QEuwu5DWS/%KZ t>sbo ');
define('NONCE_SALT',       'Elr,![NwbK.rwM.[y%^Vjr,#=jQDmpEGcLAbM5H>U6Tb=IF1e]3@Y(3q@Z-AZc.%');


$table_prefix = 'wp_';

define('WPLANG', '');

define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
