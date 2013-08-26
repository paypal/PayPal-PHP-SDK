<?php

// # Create payment using a saved credit card
// This sample code demonstrates how you can process a 
// Payment using a previously stored credit card token.
// API used: /v1/payments/payment

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Amount;
use PayPal\Api\CreditCardToken;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\FundingInstrument;
use PayPal\Api\Transaction;

// ### Credit card token
// Saved credit card id from a previous call to
// CreateCreditCard.php
$creditCardToken = new CreditCardToken();
$creditCardToken->setCreditCardId('CARD-29H07236G1554552FKINPBHQ');

// ### FundingInstrument
// A resource representing a Payer's funding instrument.
// For stored credit card payments, set the CreditCardToken
// field on this object.
$fi = new FundingInstrument();
$fi->setCreditCardToken($creditCardToken);

// ### Payer
// A resource representing a Payer that funds a payment
// For stored credit card payments, set payment method
// to 'credit_card'.
$payer = new Payer();
$payer->setPaymentMethod("credit_card")
	->setFundingInstruments(array($fi));

// ### Amount
// Lets you specify a payment amount.
// You can also specify additional details
// such as shipping, tax.
$amount = new Amount();
$amount->setCurrency("USD")
	->setTotal("1.00");

// ### Transaction
// A transaction defines the contract of a
// payment - what is the payment for and who
// is fulfilling it. 
$transaction = new Transaction();
$transaction->setAmount($amount)
	->setDescription("Payment description");

// ### Payment
// A Payment Resource; create one using
// the above types and intent set to 'sale'
$payment = new Payment();
$payment->setIntent("sale")
	->setPayer($payer)
	->setTransactions(array($transaction));

// ###Create Payment
// Create a payment by calling the 'create' method
// passing it a valid apiContext.
// (See bootstrap.php for more on `ApiContext`)
// The return object contains the state.
try {
	$payment->create($apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
	echo "Exception: " . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());	
	exit(1);
}
?>
<html>
<head>
	<title>Saved Credit card payments</title>
</head>
<body>
	<div>
		Created payment:
		<?php echo $payment->getId();?>
	</div>
	<pre><?php var_dump($payment->toArray());?></pre>
	<a href='../index.html'>Back</a>
</body>
</html>
