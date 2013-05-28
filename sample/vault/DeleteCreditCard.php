<?php
require __DIR__ . '/../bootstrap.php';
use PayPal\Api\CreditCard;

// # Delete CreditCard Sample
// This sample code demonstrate how you can
//delete a saved creditcard
// using the delete API.
// API used: /v1/vault/credit-card/{<creditCardId>}
// NOTE: HTTP method used here is DELETE

$creditCard = CreditCard::get('CARD-38K23067VS968933SKGPU66Q', $apiContext);

try {
	// (See bootstrap.php for more on `ApiContext`)
	$creditCard->delete($apiContext);
} catch (\PPConnectionException $ex) {
	echo "Exception: " . $ex->getMessage() . PHP_EOL;
	exit(1);
}
?>

<html>
<body>
<div>Delete CreditCard:</div>
    <p> Credit Card deleted Successfully</p>
	<a href='../index.html'>Back</a>
</body>
</html>