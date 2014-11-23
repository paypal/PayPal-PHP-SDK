# REST API SDK for PHP

[![Build Status](https://travis-ci.org/paypal/PayPal-PHP-SDK.png?branch=master)](https://travis-ci.org/paypal/PayPal-PHP-SDK) [![Coverage Status](https://img.shields.io/coveralls/paypal/PayPal-PHP-SDK.svg)](https://coveralls.io/r/paypal/PayPal-PHP-SDK?branch=master) [![Latest Stable Version](https://poser.pugx.org/paypal/rest-api-sdk-php/v/stable.png)](https://packagist.org/packages/paypal/rest-api-sdk-php) [![Total Downloads](https://poser.pugx.org/paypal/rest-api-sdk-php/downloads.png)](https://packagist.org/packages/paypal/rest-api-sdk-php)

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

Currently, Paypal PHP Rest API SDK is available at [https://packagist.org](https://packagist.org/packages/paypal/rest-api-sdk-php). To use it in your project, you need to include it as a dependency in your project composer.json file. It can be done either:

* Running `composer require paypal/rest-api-sdk-php:*` command on your project root location (where project composer.json is located.)

* Or, manually editing composer.json file `require` field, and adding `"paypal/rest-api-sdk-php" :  "*"` inside it.

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
- Download zip archive with desired version from our [Releases](https://github.com/paypal/PayPal-PHP-SDK/releases). Each release will have a `direct-download-*.zip` that contains PHP Rest API SDK and its dependencies.

- Unzip and copy vendor directory inside your project, e.g. project root directory.

- If your application has a bootstrap/autoload file, you should add
`include '<vendor directory location>/vendor/autoload.php'` in it. The location of the `<vendor directory>` should be replaced based on where you downloaded **vendor** directory in your application.

- This *autoload.php* file registers a custom autoloader that can autoload the PayPal SDK files, that allows you to access PHP SDK system in your application.

## Samples

### View
   * Using the [htmlpreview](https://github.com/htmlpreview/htmlpreview.github.com) tool you can now [view sample source codes here](http://htmlpreview.github.io/?https://github.com/paypal/PayPal-PHP-SDK/blob/master/sample/index.php)

### Running Locally

* Clone the [PayPal-PHP-SDK repository](https://github.com/paypal/PayPal-PHP-SDK)
```
git clone https://github.com/paypal/PayPal-PHP-SDK
```
* Run Composer installer on PayPal-PHP-SDK directory
```
composer install
```
* Run PHP Built-in web server by running
```
php -f sample/index.php
```

  * If you are using PHP version older than 5.4, you can follow the instructions described [here](sample/).

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

## Testing

There are two kinds of tests that we include in our sdk package. Unit tests, and Integration Tests.

* **Unit Tests**
	* Unit tests can be executed by running this command `phpunit` at Paypal SDK root location.
	* It executes the tests with configuration stored in `phpunit.xml` file.
* **Integration Tests**
	* Integration tests make curl requests to sandbox environments by default. It would test both unit as well as integration tests. To execute, run this command `phpunit -c phpunit.integration.xml` at Paypal SDK root location.
	* It executes the tests with configuration stored in `phpunit.integration.xml` file.
	* The configurations could be changed from `tests\sdk_config.ini` file.

## Developer Notes

### API Model Constructor

You can intialize the API objects by passing JSON string or Array representation of object to the constructor. E.g.:

```
$obj = new SimpleClass('{"name":"test","description":"description"}');
$obj->getName(); // test
$obj->getDescription();  // description
```

### Accessor Validation

We recently introduced a validation to determine if Model Object contains all the appropriate accessors (Getters and Setters) when converted from json response that we receive from Server.

This validation could be configured by updating the configuration settings in your sdk_config.ini file

Please visit our [sample sdk_config.ini](https://github.com/paypal/PayPal-PHP-SDK/blob/master/sample/sdk_config.ini)
```
;Validation Configuration
[validation]
; If validation is set to strict, the PPModel would make sure that
; there are proper accessors (Getters and Setters) for each model
; objects. Accepted value is
; 'log'     : logs the error message to logger only (default)
; 'strict'  : throws a php notice message
; 'disable' : disable the validation
validation.level=strict
```

The warning message would be logged into your PayPal.log file, for e.g.:
```
PayPal\Validation\ModelAccessorValidator: WARNING: Missing Accessor: PayPal\Api\Payment:setFirstName . Please let us know by creating an issue at https://github.com/paypal/PayPal-PHP-SDK/issues
```

## Contributing

* If you find solution to an [issue/improvements](https://github.com/paypal/PayPal-PHP-SDK/issues) in sdk that would be helpful to everyone, feel free to send us a pull request.
* The best help we could get from everyone is in writing more and more samples. We have a limited set of samples, and would appreciate if the community can help us write more and more of those, covering corner cases, that may be extremely useful to anyone using this SDK.
* The ideal approach to create a fix would be to fork the repository, create a branch in your repository, and make a pull request out of it.
* It is desirable if there is enough comments/documentation and Tests included in the pull request.
* For general idea of contribution, please follow the guidelines mentioned [here](https://guides.github.com/activities/contributing-to-open-source/).

## More help

   * [Sample Source Codes](http://htmlpreview.github.io/?https://github.com/paypal/PayPal-PHP-SDK/blob/master/sample/index.php)
   * [API Reference](https://developer.paypal.com/webapps/developer/docs/api/)
   * [Reporting issues / feature requests] (https://github.com/paypal/PayPal-PHP-SDK/issues)
   * [Pizza App Using Paypal REST API] (https://github.com/paypal/rest-api-sample-app-php)
