<?php

require __DIR__ . '/../bootstrap.php';

use PayPal\Api\Invoice;

try {
	$invoice = Invoice::get("INV2-9DRB-YTHU-2V9Q-7Q24", $apiContext);

	$sendStatus = $invoice->send($apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
	echo "Exception: " . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());
	exit(1);
}

?>
<html>
<head>
	<title>Send Invoice</title>
</head>
<body>
	<div>Send Invoice:</div>
	<pre><?php var_dump($invoice);?></pre>
	<a href='../index.html'>Back</a>
</body>
</html>
