<?php

// Decode Platform relationships.
$relationships = json_decode(base64_decode($_ENV['PLATFORM_RELATIONSHIPS']), TRUE);

// We are using the first database found in your relationships.
define('DB_NAME', $relationships['database'][0]['path']);
define('DB_USER', $relationships['database'][0]['username']);
define('DB_PASSWORD', $relationships['database'][0]['password']);
define('DB_HOST', $relationships['database'][0]['host']);
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

// Decode Platform routes.
$routes = json_decode(base64_decode($_ENV['PLATFORM_ROUTES']), TRUE);

// Change site URL per environment.
define('WP_HOME', key($routes));
define('WP_SITEURL', key($routes));

// Since you can have multiple installations in one database, you need a unique prefix.
$table_prefix  = 'wp_';

// Default PHP settings.
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100);
ini_set('session.gc_maxlifetime', 200000);
ini_set('session.cookie_lifetime', 2000000);
ini_set('pcre.backtrack_limit', 200000);
ini_set('pcre.recursion_limit', 200000);

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
