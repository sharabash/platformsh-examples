<?php
$relationships = getenv("PLATFORM_RELATIONSHIPS");
if (!$relationships) {
  return;
}

$relationships = json_decode(base64_decode($relationships), TRUE);

foreach ($relationships['database'] as $endpoint) {
  if (empty($endpoint['query']['is_master'])) {
    continue;
  }

  /* Set default database credentials using platform environment variables. */
  define('_DB_SERVER_', $endpoint['host']);
  define('_DB_NAME_', $endpoint['path']);
  define('_DB_USER_', 'web');
  define('_DB_PASSWD_', $endpoint['password']);
  define('_DB_PREFIX_', 'ps_');
  define('_MYSQL_ENGINE_', 'InnoDB');

  if (!defined('_PS_VERSION_'))
  define('_PS_VERSION_', '1.6.0.11');
}
