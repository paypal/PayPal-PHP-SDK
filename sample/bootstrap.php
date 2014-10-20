<?php
/*
 * Sample bootstrap file.
 */

// Include the composer autoloader
// The location of your project's vendor autoloader.
$composerAutoload = dirname(dirname(dirname(__DIR__))) . '/autoload.php';
if (!file_exists($composerAutoload)) {
    //If the project is used as its own project, it would use rest-api-sdk-php composer autoloader.
    $composerAutoload = dirname(__DIR__) . '/vendor/autoload.php';


    if (!file_exists($composerAutoload)) {
        echo "The 'vendor' folder is missing. You must run 'composer update' to resolve application dependencies.\nPlease see the README for more information.\n";
        exit(1);
    }
}
require $composerAutoload;
require __DIR__ . '/common.php';

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

error_reporting(E_ALL);
ini_set('display_errors', '1');

// Replace these values by entering your own ClientId and Secret by visiting https://developer.paypal.com/webapps/developer/applications/myapps
$clientId = 'AYSq3RDGsmBLJE-otTkBtM-jBRd1TCQwFf9RGfwddNXWz0uFU9ztymylOhRS';
$clientSecret = 'EGnHDxD_qRPdaLdZz8iCr8N7_MzF-YHPTkjs6NKYQvQSBngp4PTTVWkPZRbL';

/** @var \Paypal\Rest\ApiContext $apiContext */
$apiContext = getApiContext($clientId, $clientSecret);

return $apiContext;
/**
 * Helper method for getting an APIContext for all calls
 *
 * @return PayPal\Rest\ApiContext
 */
function getApiContext($clientId, $clientSecret)
{

    // ### Api context
    // Use an ApiContext object to authenticate
    // API calls. The clientId and clientSecret for the
    // OAuthTokenCredential class can be retrieved from
    // developer.paypal.com

    $apiContext = new ApiContext(
        new OAuthTokenCredential(
            $clientId,
            $clientSecret
        )
    );


    // #### SDK configuration

    // Comment this line out and uncomment the PP_CONFIG_PATH
    // 'define' block if you want to use static file
    // based configuration

    $apiContext->setConfig(
        array(
            'mode' => 'sandbox',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => '../PayPal.log',
            'log.LogLevel' => 'FINE',
            'validation.level' => 'log'
        )
    );

    /*
    // Register the sdk_config.ini file in current directory
    // as the configuration source.
    if(!defined("PP_CONFIG_PATH")) {
        define("PP_CONFIG_PATH", __DIR__);
    }
    */

    return $apiContext;
}
