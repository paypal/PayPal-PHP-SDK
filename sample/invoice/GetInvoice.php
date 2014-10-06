<?php

// # Get Invoice Sample
// This sample code demonstrate how you can retrieve
// an invoice.

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Invoice;

$invoiceId = "INV2-9DRB-YTHU-2V9Q-7Q24";

// ### Retrieve Invoice
// Retrieve the invoice object by calling the
// static `get` method
// on the Invoice class by passing a valid
// Invoice ID
// (See bootstrap.php for more on `ApiContext`)
try {
    $invoice = Invoice::get($invoiceId, $apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
    echo "Exception:" . $ex->getMessage() . PHP_EOL;
    var_dump($ex->getData());
    exit(1);
}
?>
<html>
<head>
	<title>Lookup invoice details</title>
</head>
<body>
	<div>Retrieving Invoice: <?php echo $invoiceId;?></div>
	<pre><?php echo $invoice->toJSON(JSON_PRETTY_PRINT); ?></pre>
	<a href='../index.html'>Back</a>
</body>
</html>
