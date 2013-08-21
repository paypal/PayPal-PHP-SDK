<?php

// # CreatePaymentSample
// This sample code demonstrate how you can process
// a payment with a credit card.
// API used: /v1/payments/payment

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Address;
use PayPal\Api\Amount;
use PayPal\Api\CreditCard;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\FundingInstrument;
use PayPal\Api\Transaction;

// ### Address
// Base Address object used as shipping or billing
// address in a payment. [Optional]
$addr = new Address();
$addr->setLine1("3909 Witmer Road");
$addr->setLine2("Niagara Falls");
$addr->setCity("Niagara Falls");
$addr->setState("NY");
$addr->setPostalCode("14305");
$addr->setCountryCode("US");
$addr->setPhone("716-298-1822");

// ### CreditCard
// A resource representing a credit card that can be
// used to fund a payment.
$card = new CreditCard();
$card->setType("visa");
$card->setNumber("4417119669820331");
$card->setExpireMonth("11");
$card->setExpireYear("2019");
$card->setCvv2("012");
$card->setFirstName("Joe");
$card->setLastName("Shopper");
$card->setBillingAddress($addr);

// ### FundingInstrument
// A resource representing a Payer's funding instrument.
// Use a Payer ID (A unique identifier of the payer generated
// and provided by the facilitator. This is required when
// creating or using a tokenized funding instrument)
// and the `CreditCardDetails`
$fi = new FundingInstrument();
$fi->setCreditCard($card);

// ### Payer
// A resource representing a Payer that funds a payment
// Use the List of `FundingInstrument` and the Payment Method
// as 'credit_card'
$payer = new Payer();
$payer->setPaymentMethod("credit_card");
$payer->setFundingInstruments(array($fi));

// ### Amount
// Let's you specify a payment amount.
$amount = new Amount();
$amount->setCurrency("USD");
$amount->setTotal("1.00");

// ### Transaction
// A transaction defines the contract of a
// payment - what is the payment for and who
// is fulfilling it. Transaction is created with
// a `Payee` and `Amount` types
$transaction = new Transaction();
$transaction->setAmount($amount);
$transaction->setDescription("This is the payment description.");

// ### Payment
// A Payment Resource; create one using
// the above types and intent as 'sale'
$payment = new Payment();
$payment->setIntent("sale");
$payment->setPayer($payer);
$payment->setTransactions(array($transaction));



// ### Create Payment
// Create a payment by posting to the APIService
// using a valid ApiContext (See bootstrap.php for more on `ApiContext`)
// The return object contains the status;
try {
	$payment->create($apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
	echo "Exception: " . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());
	exit(1);
}
?>
<html>
<body>
	<div>
		Created payment:
		<?php echo $payment->getId();?>
	</div>
	<pre><?php var_dump($payment->toArray());?></pre>
	<a href='../index.html'>Back</a>
</body>
</html>
