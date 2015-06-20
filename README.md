#Drupal 7.0 Example with Grunt for building Sass files for a theme

In this example we show how to include dependencies on non PHP technologies; Specifically here we add the nodejs Grunt
library and the Ruby Sass Gem.

See `.app.platform.yaml`

```yaml
dependencies:
    ruby:
        sass: "3.4.7"
    nodejs:
        grunt-cli: "~0.1.13"
```
In the "build hook" we run the grunt task.
```
hooks:
    build: |
      cd public/sites/default/themes/grunt/
      npm install
      grunt
```
