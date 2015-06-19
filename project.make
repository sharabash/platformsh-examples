api = 2
core = 6.x

projects[drupal][type] = core
projects[drupal][version] = 6.36
projects[drupal][patch][] = "patches/d6-install_redirect_on_empty_database-728702.patch"
projects[drupal][patch][] = "patches/d6-clean_urls_non_apache.patch"
