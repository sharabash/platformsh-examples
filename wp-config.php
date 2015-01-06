<?php

$local_settings = dirname(__FILE__) . '/wp-config.local.php';
if (file_exists($local_settings)) {
  require_once($local_settings);
}
