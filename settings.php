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

$local_settings = dirname(__FILE__) . '/settings.local.php';
if (file_exists($local_settings)) {
  require_once($local_settings);
}
