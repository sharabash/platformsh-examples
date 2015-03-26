<?php
/**
 * @file
 * Platform.sh example settings.php file for Drupal 8.
 */

// Modify this to make it specific to your application.
// $settings['hash_salt'] = '';

// Override paths for config files in Platform.sh.
if (isset($_ENV['PLATFORM_APP_DIR'])) {
  $config_directories = array(
    CONFIG_ACTIVE_DIRECTORY => $_ENV['PLATFORM_APP_DIR'] . '/config/active',
    CONFIG_STAGING_DIRECTORY => $_ENV['PLATFORM_APP_DIR'] . '/config/staging',
  );
}

if (file_exists(__DIR__ . '/settings.local.php')) {
  include __DIR__ . '/settings.local.php';
}
