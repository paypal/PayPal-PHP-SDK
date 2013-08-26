<?php

// # Sale Refund Sample
// This sample code demonstrate how you can 
// process a refund on a sale transaction created 
// using the Payments API.
// API used: /v1/payments/sale/{sale-id}/refund

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Amount;
use PayPal\Api\Refund;
use PayPal\Api\Sale;

// ### Refund amount
// Includes both the refunded amount (to Payer) 
// and refunded fee (to Payee). Use the $amt->details
// field to mention fees refund details.
$amt = new Amount();
$amt->setCurrency('USD')
	->setTotal('0.01');

// ### Refund object
$refund = new Refund();
$refund->setAmount($amt);

$saleId = '3RM92092UW5126232';

// ###Sale
// A sale transaction.
// Create a Sale object with the
// given sale transaction id.
$sale = new Sale();
$sale->setId($saleId);
try {	
	// Refund the sale
	// (See bootstrap.php for more on `ApiContext`)
	$sale->refund($refund, $apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
	echo "Exception:" . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());
	exit(1);
}
?>
<html>
<head>
	<title>Refund a sale</title>
</head>
<body>
	<div>Refunding sale id: <?php echo $saleId;?></div>
	<pre><?php var_dump($sale);?></pre>
	<a href='../index.html'>Back</a>
</body>
</html>
