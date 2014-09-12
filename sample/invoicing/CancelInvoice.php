<?php

require __DIR__ . '/../bootstrap.php';

use PayPal\Api\Invoice;
use PayPal\Api\CancelNotification;

try {
	$invoice = Invoice::get("INV2-CJL7-PF4G-BLQF-5FWG", $apiContext);

	$notify = new CancelNotification();
	$notify
		->setSubject("Past due")
		->setNote("Canceling invoice")
		->setSendToMerchant(true)
		->setSendToPayer(true);


	$cancelStatus = $invoice->cancel($notify, $apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
	echo "Exception: " . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());
	exit(1);
}

?>

<html>
<head>
	<title>Cancel Invoice</title>
</head>
<body>
	<div>Cancel Invoice:</div>
	<pre><?php var_dump($invoice);?></pre>
	<a href='../index.html'>Back</a>
</body>
</html>
