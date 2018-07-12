# Zend Framework Module for denner-client

[![Build Status](https://travis-ci.org/detailnet/denner-client-module.svg?branch=master)](https://travis-ci.org/detailnet/denner-client-module)
[![Coverage Status](https://img.shields.io/coveralls/detailnet/denner-client-module.svg)](https://coveralls.io/r/detailnet/denner-client-module)
[![Latest Stable Version](https://poser.pugx.org/detailnet/denner-client-module/v/stable.svg)](https://packagist.org/packages/detailnet/denner-client-module)
[![Latest Unstable Version](https://poser.pugx.org/detailnet/denner-client-module/v/unstable.svg)](https://packagist.org/packages/detailnet/denner-client-module)

## Introduction
This module contains tools to use the [denner-client](https://github.com/detailnet/denner-client).

## Requirements
[Zend Framework Skeleton Application](http://www.github.com/zendframework/ZendSkeletonApplication) (or compatible architecture)

## Installation
Install the module through [Composer](http://getcomposer.org/) using the following steps:

  1. `cd my/project/directory`
  
  2. Create a `composer.json` file with following contents (or update your existing file accordingly):

     ```json
     {
         "require": {
             "detailnet/denner-client-module": "^3.0"
         }
     }
     ```
  3. Install Composer via `curl -s http://getcomposer.org/installer | php` (on Windows, download
     the [installer](http://getcomposer.org/installer) and execute it with PHP)
     
  4. Run `php composer.phar self-update`
     
  5. Run `php composer.phar install`
  
  6. Open `configs/application.config.php` and add following key to your `modules`:

     ```php
     'Denner\Client',
     ```

  7. Copy `vendor/detailnet/denner-client-module/config/denner_client.local.php.dist` into your application's
     `config/autoload` directory, rename it to `denner_client.local.php` and make the appropriate changes.
