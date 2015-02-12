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
    ->setNumber("4917912523797702")
    ->setExpireMonth("11")
    ->setExpireYear("2019")
    ->setCvv2("012")
    ->setFirstName("Joe")
    ->setLastName("Shopper");

// For Sample Purposes Only.
$request = clone $card;

// ### Save card
// Creates the credit card as a resource
// in the PayPal vault. The response contains
// an 'id' that you can use to refer to it
// in future payments.
// (See bootstrap.php for more on `ApiContext`)
try {
    $card->create($apiContext);
} catch (Exception $ex) {
    ResultPrinter::printError("Create Credit Card", "Credit Card", null, $request, $ex);
    exit(1);
}

ResultPrinter::printResult("Create Credit Card", "Credit Card", $card->getId(), $request, $card);

return $card;
