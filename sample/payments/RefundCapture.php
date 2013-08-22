<?php
// # Refund Capture Sample
// This sample code demonstrate how you can
// process a refund on a Captured transaction created
// using the Capture API.
// API used: /v1/payments/capture/{<captureID>}/refund
require __DIR__ . '/../bootstrap.php';

use PayPal\Api\Authorization;
use PayPal\Api\Capture;
use PayPal\Api\Refund;
use PayPal\Api\Amount;
use PayPal\Rest\ApiContext;


// ### Create a mock capture
try {
	// create payment to get authorization Id
	$authId = createAuthorization($apiContext);

	$amt = new Amount();
	$amt->setCurrency("USD")
		->setTotal("1.00");

	### Capture
	$captur = new Capture();
	$captur->setAmount($amt);

	// Get the authorization
	$authorization = Authorization::get($authId, $apiContext);
	
	// Create a capture
	$capt = $authorization->capture($captur, $apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
	echo "Exception: " . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());
	exit(1);
}

// ### Refund
// Create a refund object indicating
// refund amount and call the refund method

$refund = new Refund();
$refund->setAmount($amt);

try {
	// Create a new apiContext object so we send a new
	// PayPal-Request-Id (idempotency) header for this resource
	$apiContext = new ApiContext($apiContext->getCredential());
	$captureRefund = $capt->refund($refund, $apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
	echo "Exception: " . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());
	exit(1);
}
?>

<html>
<body>
	<div>Refund Capture:</div>
	<pre><?php var_dump($captureRefund);?></pre>
	<a href='../index.html'>Back</a>
</body>
</html>
