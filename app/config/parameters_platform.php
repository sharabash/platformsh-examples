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

  $container->setParameter('database_driver', 'pdo_' . $endpoint['scheme']);
  $container->setParameter('database_host', $endpoint['host']);
  $container->setParameter('database_port', $endpoint['port']);
  $container->setParameter('database_name', $endpoint['path']);
  $container->setParameter('database_user', $endpoint['username']);
  $container->setParameter('database_password', $endpoint['password']);
  $container->setParameter('database_path', '');
}

# Hack.
ini_set('session.save_path', '/tmp/sessions');

foreach(json_decode(base64_decode($_ENV['PLATFORM_VARIABLES']) as $name => $variable)) {
    if (substr($name, 0, $prefix_len) == 'SYMFONY:') {
      $_ENV['SYMFONY__' . substr($name, $prefix_len)] = $value;
    }
}
