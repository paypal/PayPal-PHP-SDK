<?php

/*
	Common functions used across samples
*/

use PayPal\Api\Address;
use PayPal\Api\CreditCard;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\Transaction;
use PayPal\Api\FundingInstrument;


/**
 * ### getBaseUrl function
 * // utility function that returns base url for
 * // determining return/cancel urls
 * @return string
 */
function getBaseUrl() {

	$protocol = 'http';
	if ($_SERVER['SERVER_PORT'] == 443 || (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on')) {
		$protocol .= 's';
		$protocol_port = $_SERVER['SERVER_PORT'];
	} else {
		$protocol_port = 80;
	}

	$host = $_SERVER['HTTP_HOST'];
	$port = $_SERVER['SERVER_PORT'];
	$request = $_SERVER['PHP_SELF'];
	return dirname($protocol . '://' . $host . ($port == $protocol_port ? '' : ':' . $port) . $request);
}

/**
 * Creates a new mock 'payment authorization'
 *
 * @param PayPal\Api\ApiContext apiContext
 * @return PayPal\Api\Authorization
 */
function createAuthorization($apiContext) {
	$addr = new Address();
	$addr->setLine1("3909 Witmer Road")
		->setLine2("Niagara Falls")
		->setCity("Niagara Falls")
		->setState("NY")
		->setPostalCode("14305")
		->setCountryCode("US")
		->setPhone("716-298-1822");
	
	$card = new CreditCard();
	$card->setType("visa")
		->setNumber("4417119669820331")
		->setExpireMonth("11")
		->setExpireYear("2019")
		->setCvv2("012")
		->setFirstName("Joe")
		->setLastName("Shopper")
		->setBillingAddress($addr);
	
	$fi = new FundingInstrument();
	$fi->setCreditCard($card);
	
	$payer = new Payer();
	$payer->setPaymentMethod("credit_card")
		->setFundingInstruments(array($fi));
	
	$amount = new Amount();
	$amount->setCurrency("USD")
		->setTotal("1.00");
	
	$transaction = new Transaction();
	$transaction->setAmount($amount)
		->setDescription("Payment description.");
	
	$payment = new Payment();

	// Setting intent to authorize creates a payment
	// authorization. Setting it to sale creates actual payment
	$payment->setIntent("authorize")
		->setPayer($payer)
		->setTransactions(array($transaction));
	
	$paymnt = $payment->create($apiContext);
	$resArray = $paymnt->toArray();
	
	return $authId = $resArray['transactions'][0]['related_resources'][0]['authorization']['id'];
}
