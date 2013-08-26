<?php
// # Refund Capture Sample
// This sample code demonstrates how you can
// process a refund on a Captured transaction.
// API used: /v1/payments/capture/{<captureID>}/refund

require __DIR__ . '/../bootstrap.php';

use PayPal\Api\Authorization;
use PayPal\Api\Capture;
use PayPal\Api\Refund;
use PayPal\Api\Amount;
use PayPal\Rest\ApiContext;


try {
	// Create a mock authorization to get authorization Id
	$authId = createAuthorization($apiContext);

	// Get the authorization
	$authorization = Authorization::get($authId, $apiContext);
	
	
	// ### Capture
	
	$amt = new Amount();
	$amt->setCurrency("USD")
		->setTotal("1.00");
	
	// Create a capture
	$captureInfo = new Capture();
	$captureInfo->setAmount($amt);

	$capture = $authorization->capture($captureInfo, $apiContext);
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
	$apiContext = getApiContext();

	$captureRefund = $capture->refund($refund, $apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
	echo "Exception: " . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());
	exit(1);
}
?>

<html>
<head>
	<title>Refund a captured payment</title>
</head>
<body>
	<div>Refund Capture:</div>
	<pre><?php var_dump($captureRefund);?></pre>
	<a href='../index.html'>Back</a>
</body>
</html>
