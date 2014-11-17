Rest API Samples
===================

This sample project is a simple web app that you can explore to understand what the payment APIs can do for you.

To try out the sample, run `composer update --no-dev` from the PayPal-PHP-SDK folder and you are all set.

#### Running on a web
* If you plan to run these samples on the web, you will need to host this project under a local server. E.g. Apache.
* Once done, you could easily open the samples by opening the matching URL. For e.g.:
`http://localhost/PayPal-PHP-SDK/sample/index.html`

You should see a sample dashboard page as shown below:
![Web Output!](/sample/images/sample_web.png)

#### Running on console
> Please note that there are few samples that requires you to have a working local server, to receive redirects when user accepts/denies PayPal Web flow

* To run on console, you need to open command prompt, and direct to samples directory.
* Execute the sample php script by using `php -f` command as shown below:
```bat
php -f payments/CreatePaymentUsingSavedCard.php
```

The result would be as shown below:
![Console Output!](/sample/images/sample_console.png)
#### Configuration

The sample comes pre-configured with a test account but in case you need to try them against your account, you must

   * Obtain your client id and client secret from the developer portal
   * Update the bootstrap.php file with your new client id and secret.

#### More Help

If you are looking for a full fledged application that uses the new RESTful APIs, check out the Pizza store sample app at https://github.com/paypal/rest-api-sample-app-php
