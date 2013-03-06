REST API SDK for PHP  (V0.5.0)
==============================

	PayPal's PHP SDK for the RESTful APIs


Prerequisites
-------------

   * PHP 5.3 or above
   * curl, json & openssl extensions must be enabled
   * composer for running the sample out of the box (See http://getcomposer.org)


Running the sample
------------------

   * Ensure that you have composer installed on your machine.
   * Navigate to the samples folder and run 'composer update'.
   * Optionally, update the sdk_config.ini file with your own client Id and client secret.
   * Run any of the command line samples in the folder to see what the APIs can do.
    
    
Usage
-----

To write an app that uses the SDK 

   * Copy the composer.json file from the sample folder over to your project and run 'composer update' to fetch all 
dependencies
   * Copy the sample configuration file sdk_config.ini to a location of your choice and let the SDK know your config path using the following define directive
    
       define('PP_SDK_CONFIG_PATH', /path/to/your/sdk_config.ini);
    
   * Obtain your clientId and client secret from the developer portal and add them to your config file	
   * Now you are all set to make your first API call. Create a resource object as per your need and call the relevant operation or invoke one of the static methods on your resource class.
    
    $payment = new Payment();

    $payment->setIntent("Sale");

    ...
    
    $payment->create();
    
      *OR*
    
    $payment = Payment::get('payment_id');    
    
    These examples pick the client id / secret automatically from your config file. You can also set API credentials dynamically. See the sample code for how you can do this.
	

Contributing
------------

More help
---------

   * API Reference
   * Reporting issues / feature requests  
   
