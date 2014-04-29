<?php
require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Invoice;

try {
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
	<pre><?php var_dump($invoices->toArray());?></pre>
	<a href='../index.html'>Back</a>
</body>
</html>
