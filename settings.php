<?php

$config_directories = array(
  CONFIG_ACTIVE_DIRECTORY => '/app/config/active',
  CONFIG_STAGING_DIRECTORY => '/app/config/staging',
);

# Modify this to make it specific to your project.
$settings['hash_salt'] = 'zaAPBHIVJmNIRywCSMegjmt9ST3IpUFVWef3SQKl';

# Adjust the order of container yamls to override settings per environment.
if(!$application_home = getenv('PLATFORM_APP_DIR')) {
  $application_home = '/app';
}
$settings['container_yamls'][] = $application_home . '/services.yml';

if (file_exists(__DIR__ . '/settings.local.php')) {
  include __DIR__ . '/settings.local.php';
}
