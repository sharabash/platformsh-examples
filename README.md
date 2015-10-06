Joomla 3.4.4 Example
====================

After pushing this to platform.sh, if you visit the site immediately you'll get an error about missing database tables.
We aren't using the Joomla installer interface but rather assuming we're in a post-installation state for this example,
so just import the database dump using the platform CLI tool then refresh the page:

    platform environment:sql < dump.sql


The basic ingredients here are

    .platform.app.yaml
    .platform/services.yaml
    .platform/routes.yaml
    configuration.php

The platform setup is very basic -- we just define a mysql instance in .platform/services.yaml, and define
the relationship alias in .platform.app.yaml as well as specify basic mountpoints for cache, logs and tmp.
