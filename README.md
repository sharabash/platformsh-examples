# Double Mysql
This is a simple configuration example to show you how to have two MySql instances for the same project.

We decalre two services in `.platform/services.yaml`, one is called "**mysql**" the other "**mysql2**", both are of type "mysql".

Now in `.platform.app.yaml` we declare two relationships, one is called "**database" (it will represent in our application
the service "**mysql**") the other we called "**database2**" which will represent "**mysql**2" we will be able to connect to both.

These will be available with their connection information (host, username, password) in the environment variable `$PLATFORM_RELATIONSHIPS`

