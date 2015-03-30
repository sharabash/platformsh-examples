<?php
/**
 * @file
 * Platform.sh example settings.php file for Drupal 8.
 */

// Install with the 'standard' profile for this example.
$settings['install_profile'] = 'standard';

// You should modify the hash_salt so that it is specific to your application.
$settings['hash_salt'] = '4946c1912834b8477cc70af309a2c30dcec24c2103c724ff30bf13b4c10efd82';

/**
 * Default Drupal 8 settings.
 *
 * These are already explained with detailed comments in Drupal's
 * default.settings.php file.
 *
 * See https://api.drupal.org/api/drupal/sites!default!default.settings.php/8
 */
$databases = array();
$config_directories = array();
$settings['update_free_access'] = FALSE;
$settings['container_yamls'][] = __DIR__ . '/services.yml';

// Override paths for config files in Platform.sh.
if (isset($_ENV['PLATFORM_APP_DIR'])) {
  $config_directories = array(
    CONFIG_ACTIVE_DIRECTORY => $_ENV['PLATFORM_APP_DIR'] . '/config/active',
    CONFIG_STAGING_DIRECTORY => $_ENV['PLATFORM_APP_DIR'] . '/config/staging',
  );
}

// Local settings. These are required for Platform.sh.
if (file_exists(__DIR__ . '/settings.local.php')) {
  include __DIR__ . '/settings.local.php';
}
