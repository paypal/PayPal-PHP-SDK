<?php

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Invoice;

$invoiceId = "INV2-9DRB-YTHU-2V9Q-7Q24";

$invoice = Invoice::get($invoiceId, $apiContext);
?>
<html>
<head>
	<title>Lookup invoice details</title>
</head>
<body>
	<div>Retrieving Invoice: <?php echo $invoiceId;?></div>
	<pre><?php var_dump($invoice);?></pre>
	<a href='../index.html'>Back</a>
</body>
</html>
