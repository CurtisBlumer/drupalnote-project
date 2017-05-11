# DrupalNote project

DrupalNote aims to become a universal, cloud-based, note-taking application, similar to Evernote or Microsoft OneNote, built using Drupal 8, an open-source content management framework ("CMF") written in PHP.


## Roadmap & notes

**Common data types**
- Notebook (Evernote & OneNote)
- Note (Evernote) or Page (OneNote)

**Special data types**
- Notebook Stack (Evernote)
- Section (OneNote)
- Section Group (OneNote)


## Git branches

### 0.1.x branch
This is an exploratory branch built using only Drupal 8 Core functionality.

Content types and vocabularies should be perfectly suited to storing the data. If they aren't, code can be easily generated with Drupal Console to create a new content or entity type.

## To-do list
- [ ] @TODO Review, re-write, and replace Drupal Composer Project readme sections.
- [ ] @TODO Setup Travis CI to test DrupalNote.

# Composer template for Drupal projects

<!--[![Build Status](https://travis-ci.org/drupal-composer/drupal-project.svg?branch=8.x)](https://travis-ci.org/drupal-composer/drupal-project)-->

This project template should provide a kickstart for managing your site
dependencies with [Composer](https://getcomposer.org/).

If you want to know how to use it as replacement for
[Drush Make](https://github.com/drush-ops/drush/blob/master/docs/make.md) visit
the [Documentation on drupal.org](https://www.drupal.org/node/2471553).

## Usage

First you need to [install composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx).

> Note: The instructions below refer to the [global composer installation](https://getcomposer.org/doc/00-intro.md#globally).
You might need to replace `composer` with `php composer.phar` (or similar) 
for your setup.

After that you can create the project:

```
composer create-project drupal-composer/drupal-project:8.x-dev some-dir --stability dev --no-interaction
```

With `composer require ...` you can download new dependencies to your 
installation.

```
cd some-dir
composer require drupal/devel:~1.0
```

The `composer create-project` command passes ownership of all files to the 
project that is created. You should create a new git repository, and commit 
all files not excluded by the .gitignore file.

## What does the template do?

When installing the given `composer.json` some tasks are taken care of:

* Drupal will be installed in the `web`-directory.
* Autoloader is implemented to use the generated composer autoloader in `vendor/autoload.php`,
  instead of the one provided by Drupal (`web/vendor/autoload.php`).
* Modules (packages of type `drupal-module`) will be placed in `web/modules/contrib/`
* Theme (packages of type `drupal-theme`) will be placed in `web/themes/contrib/`
* Profiles (packages of type `drupal-profile`) will be placed in `web/profiles/contrib/`
* Creates default writable versions of `settings.php` and `services.yml`.
* Creates `web/sites/default/files`-directory.
* Latest version of drush is installed locally for use at `vendor/bin/drush`.
* Latest version of DrupalConsole is installed locally for use at `vendor/bin/drupal`.

## Updating Drupal Core

This project will attempt to keep all of your Drupal Core files up-to-date; the 
project [drupal-composer/drupal-scaffold](https://github.com/drupal-composer/drupal-scaffold) 
is used to ensure that your scaffold files are updated every time drupal/core is 
updated. If you customize any of the "scaffolding" files (commonly .htaccess), 
you may need to merge conflicts if any of your modified files are updated in a 
new release of Drupal core.

Follow the steps below to update your core files.

1. Run `composer update drupal/core --with-dependencies` to update Drupal Core and its dependencies.
1. Run `git diff` to determine if any of the scaffolding files have changed. 
   Review the files for any changes and restore any customizations to 
  `.htaccess` or `robots.txt`.
1. Commit everything all together in a single commit, so `web` will remain in
   sync with the `core` when checking out branches or running `git bisect`.
1. In the event that there are non-trivial conflicts in step 2, you may wish 
   to perform these steps on a branch, and use `git merge` to combine the 
   updated core files with your customized files. This facilitates the use 
   of a [three-way merge tool such as kdiff3](http://www.gitshah.com/2010/12/how-to-setup-kdiff-as-diff-tool-for-git.html). This setup is not necessary if your changes are simple; 
   keeping all of your modifications at the beginning or end of the file is a 
   good strategy to keep merges easy.


## FAQ

### Should I commit the scaffolding files?

The [drupal-scaffold](https://github.com/drupal-composer/drupal-scaffold) plugin can download the scaffold files (such as
`index.php`, `update.php`, etc.) to the web/ directory of your project directory. Unless you have customized any of those files, you should automatically run the `drupal-scaffold` plugin after every install or update of your project. You may copy the following example directly into your own `composer.json` file to automatically download the scaffold files using `drupal-scaffold`. If you already have scripts defined in your `composer.json` file, you will need to adapt your current `"scripts"` section.

```json
{
    ...
    "scripts": {
        "drupal-scaffold": "DrupalComposer\\DrupalScaffold\\Plugin::scaffold",
        "post-install-cmd": [ "@drupal-scaffold" ],
        "post-update-cmd": [ "@drupal-scaffold" ]
    },
    ...
}
```
### How can I apply patches to downloaded modules?

To apply patches, use the [composer-patches plugin][composer-patches]. You
should think about submitting a pull request for your patch. Even a simple code
contribution can help make the web better for everyone.

Remember that it's the banal updates made by third-party developers, such as
clarifying a DocBlock for a class method or correcting improper grammar and
misspelled words in documentation pages, that are the most beneficial to
programming-newcomers trying to learn the language and utilize the project.

To install patching support, use Composer to download the most recent stable version of `cweagans/composer-patches`.

```
composer require cweagans/composer-patches @stable
```

To add a patch to Drupal module `foobar` insert the `"patches"` section in the
`"extra"` section of your `composer.json` file:



```json
{
  ...
  "extra": {
      "patches": {
          "drupal/foobar": {
              "Demonstrate how Composer patching works.": "https://example.com/foobar.patch"
          }
      }
  }
  ...
}
```

[Composer]: https://getcomposer.org "Composer homepage"
[TravisCI]: https://tr
[composer-patches]: https://github.com/cweagans/composer-patches