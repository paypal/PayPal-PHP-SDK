<?php

require __DIR__ . '/../bootstrap.php';

use PayPal\Api\Invoice;
use PayPal\Api\Notification;

try {
	$invoice = Invoice::get("INV2-9CAH-K5G7-2JPL-G4B4", $apiContext);

	$notify = new Notification();
	$notify
		->setSubject("Past due")
		->setNote("Please pay soon")
		->setSendToMerchant(true);

	$remindStatus = $invoice->remind($notify, $apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
	echo "Exception: " . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());
	exit(1);
}

?>

<html>
<head>
	<title>Remind Invoice</title>
</head>
<body>
	<div>Remind Invoice:</div>
	<pre><?php var_dump($invoice);?></pre>
	<a href='../index.html'>Back</a>
</body>
</html>
