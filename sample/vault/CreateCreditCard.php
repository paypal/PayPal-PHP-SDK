<?php

// # Create Credit Card Sample
// You can store credit card details securely
// with PayPal. You can then use the returned
// Credit card id to process future payments.
// API used: POST /v1/vault/credit-card


require __DIR__ . '/../bootstrap.php';
use PayPal\Api\CreditCard;

// ### CreditCard
// A resource representing a credit card that is 
// to be stored with PayPal.
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
// in future payments.
// (See bootstrap.php for more on `ApiContext`)
try {
	$card->create($apiContext);	
} catch (PayPal\Exception\PPConnectionException $ex) {
	echo "Exception:" . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());
	exit(1);
}
?>
<html>
<head>
	<title>Save a credit card</title>
</head>
<body>
	<div>Saved a new credit card with id: <?php echo $card->getId();?></div>
	<pre><?php var_dump($card);?></pre>
	<a href='../index.html'>Back</a>
</body>
</html>
