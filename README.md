# Platform.sh Example With Double MySQL
This is a simple configuration example to show you how to have two MySql instances for the same project.

We declare two services in `.platform/services.yaml`, one is called "**database1**" the other "**database2**", both are of type "mysql".

For fun and profit we gave the first one 2GB of disk while the second has
a single Gigabyte.

Now in `.platform.app.yaml` we declare two relationships, one is called "**first_database**" (it will represent in our application
the service "**database1**") the other we called "**second_database**" which will represent "**database2**" we will be able to connect to both.

These will be available with their connection information (host, username, password) in the environment variable `$PLATFORM_RELATIONSHIPS`

Services are project wide. And you can have multiple applications in the 
same project. This way you can call for each application the database by
its relative role in the project.

If we imagine we have a project composed of a Drupal and a Symfony application
in the same project. In the Symfony application we could call its main database
simply "database" while calling the Drupal database "drupal_database". This way
its clear to what we are connecting.

>Note: It would be sufficient not to add a service relationship to an >application if you do not want that application to have access to the service.


