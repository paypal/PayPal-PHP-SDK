<?php
// ##Reauthorization Sample
// This sample code demonstrates how you can reauthorize a PayPal
// account payment.
// API used: v1/payments/authorization/{authorization_id}/reauthorize

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Authorization;
use PayPal\Api\Amount;

// ### Reauthorization
// Reauthorization is available only for PayPal account payments
// and not for credit card payments.

// You can reauthorize a payment only once 4 to 29
// days after the 3-day honor period for the original authorization
// has expired.

try {
	
	// ### Lookup authorization using the authorization id
	$authorization = Authorization::get('7GH53639GA425732B', $apiContext);

	$amount = new Amount();
	$amount->setCurrency("USD");
	$amount->setTotal("1.00");

	// ### Reauthorize with amount being reauthorized
	$authorization->setAmount($amount);
	$reauthorization = $authorization->reauthorize($apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
	echo "Exception: " . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());
	exit(1);
}
?>
<html>
<head>
	<title>Reauthorize a payment</title>
</head>
<body>
	<div>
		Reauthorization Id:
		<?php echo $reauthorization->getId();?>
	</div>
	<pre>
		<?php var_dump($reauthorization->toArray());?>
	</pre>
	<a href='../index.html'>Back</a>
</body>
</html>
