<?php

// # List Invoices Sample
// This sample code demonstrate how you can get
// all invoice from history.

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Invoice;

try {
    // ### Retrieve Invoices
    // Retrieve the Invoice History object by calling the
    // static `get_all` method on the Invoice class.
    // Refer the method doc for valid values for keys
    // (See bootstrap.php for more on `ApiContext`)
    $invoices = Invoice::get_all($apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
    echo "Exception:" . $ex->getMessage() . PHP_EOL;
    var_dump($ex->getData());
    exit(1);
}
?>
<html>
<head>
	<title>Lookup invoice history</title>
</head>
<body>
	<div>Got invoices </div>
	<pre><?php echo $invoices->toJSON(JSON_PRETTY_PRINT); ?></pre>
	<a href='../index.html'>Back</a>
</body>
</html>
