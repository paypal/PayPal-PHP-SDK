<?php
// # GetPaymentSample
// This sample code demonstrate how you can
// retrieve a list of all Payment resources
// you've created using the Payments API.
// Note various query parameters that you can
// use to filter, and paginate through the
// payments list.
// API used: GET /v1/payments/payments

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Payment;

$paymentId = "PAY-0XL713371A312273YKE2GCNI";

// ### Retrieve payment
// Retrieve the payment object by calling the
// static `get` method
// on the Payment class by passing a valid
// Payment ID
// (See bootstrap.php for more on `ApiContext`)
try {
	$payment = Payment::get($paymentId, $apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
	echo "Exception:" . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());
	exit(1);
}
?>
<html>
<head>
	<title>Lookup a payment</title>
</head>
<body>
	<div>Retrieving Payment ID: <?php echo $paymentId;?></div>
	<pre><?php var_dump($payment->toArray());?></pre>
	<a href='../index.html'>Back</a>
</body>
</html>
