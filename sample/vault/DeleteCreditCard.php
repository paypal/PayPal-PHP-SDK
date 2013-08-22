<?php
// # Delete CreditCard Sample
// This sample code demonstrate how you can
//delete a saved creditcard
// using the delete API.
// API used: /v1/vault/credit-card/{<creditCardId>}
// NOTE: HTTP method used here is DELETE
require __DIR__ . '/../bootstrap.php';
use PayPal\Api\CreditCard;
use PayPal\Api\Address;

// save card for demo 
// ### CreditCard
// A resource representing a credit card that can be
// used to fund a payment.
$card = new CreditCard();
$card->setType("visa")
	->setNumber("4417119669820331")
	->setExpireMonth("11")
	->setExpireYear("2019")
	->setCvv2("012")
	->setFirstName("Joe")
	->setLastName("Shopper");

// ### Save card
// Creates the credit card as a resource
// in the PayPal vault. The response contains
// an 'id' that you can use to refer to it
// in the future payments.
// (See bootstrap.php for more on `ApiContext`)
try {
	$card = $card->create($apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
	echo "Exception:" . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());
	exit(1);
}

$creditCard = CreditCard::get($card->getId(), $apiContext);
try {
	// ### Delete Card
	// deletes saved credit card
	// (See bootstrap.php for more on `ApiContext`)
	$creditCard->delete($apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
	echo "Exception: " . $ex->getMessage() . PHP_EOL;
	exit(1);
}
?>

<html>
<body>
    <p> Credit Card deleted Successfully</p>
	<a href='../index.html'>Back</a>
</body>
</html>
