# Example configurations for Platform.sh

This repository is a collection of various example configurations demonstrating 
the flexibility of `Platform.sh`.

## Examples

Each example is a specific branch that you can use as a starting point for your 
[Platform.sh](https://platform.sh) project.

### Drupal
You can find _a lot_ of documentation on using Platform.sh with Drupal on http://docs.platform.sh/ a getting started guide can be found here: https://docs.platform.sh/drupal/ and a guide about how to migrate an existing Drupal site here: https://docs.platform.sh/drupal_migrate/

* [drupal/7.x](https://github.com/platformsh/platformsh-examples/tree/drupal/7.x)
* [drupal/8.x](https://github.com/platformsh/platformsh-examples/tree/drupal/8.x)
* [drupal/kickstart-2.x](https://github.com/platformsh/platformsh-examples/tree/drupal/kickstart-2.x)
* [drupal/7.x-grunt](https://github.com/platformsh/platformsh-examples/tree/drupal/7.x-grunt)
* [drupal/8.x-commerce](https://github.com/platformsh/platformsh-examples/tree/drupal/8.x-commerce)

### Symfony

You can find a quick-start guide on using Symfony with Platform.sh here: https://docs.platform.sh/symfony/

* [symfony/standard-full](https://github.com/platformsh/platformsh-examples/tree/symfony/standard-full)
* [symfony/standard-dev-full](https://github.com/platformsh/platformsh-examples/tree/symfony/standard-dev-full)
* [symfony/sandbox-full](https://github.com/platformsh/platformsh-examples/tree/symfony/cmf-sandbox-full)
* [symfony/todo-mvc-full](https://github.com/platformsh/platformsh-examples/tree/symfony/todo-mvc-full)

### Misc

* [custom-php/minimal](https://github.com/platformsh/platformsh-examples/tree/custom-php/minimal)
* [custom-php/hhvm](https://github.com/platformsh/platformsh-examples/tree/custom-php/hhvm)
* [double-mysql](https://github.com/platformsh/platformsh-examples/tree/double-mysql)
* [multiapp/drupal-symfony](https://github.com/platformsh/platformsh-examples/tree/multiapp/drupal-symfony)
* [wordpress/4.x](https://github.com/platformsh/platformsh-examples/tree/wordpress/4.x)
* [sonata/2.4](https://github.com/platformsh/platformsh-examples/tree/sonata/2.4)

## How to use

Clone one of the example branch you want to start from:

    $ git clone --branch=BRANCH-NAME git@github.com:platformsh/platformsh-examples.git my-project
    $ cd my-project

If you start from a new [Platform.sh](https://platform.sh) project, choose the 
`start with an existing repository` option and copy the `remote add` command. It
will look like this:

    $ git remote add platform PROJECT-ID@git.eu.platform.sh:PROJECT-ID.git

Paste this command into your newly created folder and push it to your 
[Platform.sh](https://platform.sh) project:

    $ git push -u platform HEAD:master

To work with your new application it would be simpler for you to use the CLI or
git to clone the remote repository into another "clean" directory without all
of the other branches.

That's it!
