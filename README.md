Sonata Standard Edition
=======================

Install on Platform.sh
----------------------

After you have pushed for the first time to Platform.sh, log in via SSH to your PHP container and run:

* ``php bin/load_data.php``

We could have put that in a deploy hook but you don't want to reinstall the project after every Git push so you'd need a proper condition to check if the site is already installed or not.


More information about the Sonata sandbox project [here](https://github.com/sonata-project/sandbox).