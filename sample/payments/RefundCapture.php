<?php
require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Capture;
use PayPal\Api\Refund;
use PayPal\Api\Amount;

// # Refund Capture Sample
// This sample code demonstrate how you can
// process a refund on a Captured transaction created
// using the Capture API.
// API used: /v1/payments/capture/{<captureID>}/refund


// ### Refund
// Create a refund object indicating
// refund amount
 $amount = new Amount();
 $amount->setCurrency("USD");
 $amount->setTotal("1.00");


$refund = new Refund();
$refund->setId('7BA08426L46375838');
$refund->setAmount($amount);


$capture = Capture::get('7BA08426L46375838', $apiContext);
try {
	// (See bootstrap.php for more on `ApiContext`)
	$captureRefund = $capture->refund($refund, $apiContext);
} catch (\PPConnectionException $ex) {
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

