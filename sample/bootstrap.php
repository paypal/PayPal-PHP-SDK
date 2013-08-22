<?php
/*
 * Sample bootstrap file.
 */

// Include the composer autoloader
if(!file_exists(__DIR__ .'/vendor/autoload.php')) {
	echo "The 'vendor' folder is missing. You must run 'composer update --no-dev' to resolve application dependencies.\nPlease see the README for more information.\n";
	exit(1);
}
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/common.php';

define("PP_CONFIG_PATH", __DIR__);

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

// ### Api Context
// Pass in a `PayPal\Rest\ApiContext` object to authenticate 
// the call. You can also send a unique request id 
// (that ensures idempotency). The SDK generates
// a request id if you do not pass one explicitly. 
$apiContext = new ApiContext(new OAuthTokenCredential(
		'EBWKjlELKMYqRNQ6sYvFo64FtaRLRR5BdHEESmha49TM',
		'EO422dn3gQLgDbuwqTjzrFgFtaRLRR5BdHEESmha49TM'));

// Uncomment this step if you want to use per request 
// dynamic configuration instead of using sdk_config.ini
/*
$apiContext->setConfig(array(
	'mode' => 'sandbox',
	'http.ConnectionTimeOut' => 30,
	'log.LogEnabled' => true,
	'log.FileName' => '../PayPal.log',
	'log.LogLevel' => 'FINE'
));
*/


