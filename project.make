api = 2

core = 6.x

projects[pressflow][type] = "core"
projects[pressflow][download][type] = "get"
projects[pressflow][download][url] = "https://github.com/pressflow/6/archive/pressflow-6.34.117.tar.gz"
projects[pressflow][patch][] = "https://www.drupal.org/files/issues/d6-db_url_empty_user-2444923-1.patch"
projects[pressflow][patch][] = "patches/d6-install_redirect_on_empty_database-728702.patch"
projects[pressflow][patch][] = "patches/d6-clean_urls.patch"
