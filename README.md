# Example of a multi-application for Platform.sh

This repository contains **two standalone applications**: [Drupal 7](https://github.com/platformsh/platformsh-examples/tree/drupal/7.x) and [Symfony Todo MVC](https://github.com/platformsh/platformsh-examples/tree/symfony/todo-mvc-full). 
It's an example to show you how you can use multiple applications inside a single Git repository in [Platform.sh](https://platform.sh).

Default configuration:
* **Routes**: You can access Drupal at http://{default} and Symfony at http://symfony.{default}. You can change it in ``/.platform/routes.yaml``.
* **Services**: Two MySQL databases are deployed. Each application uses its own. You can change it in ``/.platform/services.yaml``.
