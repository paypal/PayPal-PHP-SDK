# REST API SDK for PHP

[![Build Status](https://travis-ci.org/paypal/rest-api-sdk-php.png?branch=master)](https://travis-ci.org/paypal/rest-api-sdk-php) [![Coverage Status](https://coveralls.io/repos/paypal/rest-api-sdk-php/badge.png?branch=master)](https://coveralls.io/r/paypal/rest-api-sdk-php?branch=master) [![Latest Stable Version](https://poser.pugx.org/paypal/rest-api-sdk-php/v/stable.png)](https://packagist.org/packages/paypal/rest-api-sdk-php) [![Total Downloads](https://poser.pugx.org/paypal/rest-api-sdk-php/downloads.png)](https://packagist.org/packages/paypal/rest-api-sdk-php)

This repository contains PayPal's PHP SDK and samples for REST API.

> **Before starting to use the sdk, please be aware of the [existing issues and currently unavailable or upcoming features](https://github.com/paypal/rest-api-sdk-python/wiki/Existing-Issues-and-Unavailable%5CUpcoming-features) for the REST APIs. (which the sdks are based on)** 

## Prerequisites

   - PHP 5.3 or above
   - [curl](http://php.net/manual/en/book.curl.php), [json](http://php.net/manual/en/book.json.php) & [openssl](http://php.net/manual/en/book.openssl.php) extensions must be enabled

## Installation

### - Using Composer
[**composer**](https://getcomposer.org/) is the recommended way to install the SDK. To use the SDK with project, add the following dependency to your application's composer.json and run `composer update --no-dev` to fetch the SDK. 

You can download composer using instructions on [Composer Official Website.](https://getcomposer.org/download/)

#### Prerequisites
- *composer* for fetching dependencies (See [http://getcomposer.org](http://getcomposer.org))

#### Steps to Install :

Currently, Paypal PHP Rest API SDK is available at [https://packagist.org](https://packagist.org/packages/paypal/rest-api-sdk-php). To use it in your project, you need to include it as a dependency in your project composer.json file. It can be done in two ways :

* Running `composer require paypal/rest-api-sdk-php:*` command on your project root location (where project composer.json is located.)

* Or, manually editing composer.json file `require` field, and adding `"paypal\rest-api-sdk-php" :  "*"` inside it.

The resultant sample *composer.json* would look like this:

```php
{
  ...
  
  "name": "sample/website",
  "require": {
  	"paypal/rest-api-sdk-php" : "*"
  }
  
  ...
}
```

### - Direct Download (without using Composer)

If you do not want to use composer, you can grab the SDK zip that contains Paypal PHP Rest API SDK with all its dependencies with it. 

#### Steps to Install :
- Download zip archive with desired version from our [Releases](https://github.com/paypal/rest-api-sdk-php/releases). Each release will have a `direct-download-*.zip` that contains PHP Rest API SDK and its dependencies.

- Unzip and copy vendor directory inside your project, e.g. project root directory.

- If your application has a bootstrap/autoload file, you should add 
`include '<vendor directory location>/vendor/autoload.php'` in it. The location of the `<vendor directory>` should be replaced based on where you downloaded **vendor** directory in your application.
 
- This *autoload.php* file registers a custom autoloader that can autoload the PayPal SDK files, that allows you to access PHP SDK system in your application.

## Running the sample

   * Clone the repo and navigate to the samples folder.
   * Samples have dependency on the sdk and you can use [`composer`](http://getcomposer.org) to get the dependencies. Ensure that you have composer installed on your machine, navigate to the samples folder and run `composer update --no-dev`  to fetch the SDK.
   * Optionally, update the bootstrap.php file with your own client Id and client secret, that you could find from the [developer portal](https://developer.paypal.com)
   * Run any of the samples in the 'samples' folder to see what the APIs can do.
    
    
## Usage

To write an app that uses the SDK 

   * Update your project's composer.json file, and add dependency on PHP Rest API SDK by running `composer require paypal/rest-api-sdk-php:*` and run `composer update --no-dev` to fetch all dependencies.
   * Copy the sample configuration file `sdk_config.ini` to a location of your choice and let the SDK know your config path using the following define directive.

```php
    define('PP_CONFIG_PATH', /path/to/your/sdk_config.ini);
```
   * Obtain your clientId and client secret from the [developer portal](https://developer.paypal.com). You will use them to create a `OAuthTokenCredential` object.
   * Now you are all set to make your first API call. Create a resource object as per your need and call the relevant operation or invoke one of the static methods on your resource class.
    
```php

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payment;

 
   $apiContext = new ApiContext(new OAuthTokenCredential('<clientId>', '<clientSecret>'));
		
    $payment = new Payment();

    $payment->setIntent("Sale");

    ...

    $payment->create($apiContext);

      *OR*

    $payment = Payment::get('payment_id', $apiContext);
```

## SDK Configuration

The samples in this repo pick the SDK configuration from the `sdk_config.ini` file. If you do not want to use an ini file or want to pick your configuration dynamically, you can use the `$apiContext->setConfig()` method to pass in the configuration as a hashmap. See the `sample/bootstrap.php` file for an example.
	

## Contributing

## More help

   * [API Reference](https://developer.paypal.com/webapps/developer/docs/api/)
   * [Reporting issues / feature requests] (https://github.com/paypal/rest-api-sdk-php/issues)
   
[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/paypal/rest-api-sample-app-php/trend.png)](https://bitdeli.com/free "Bitdeli Badge")
