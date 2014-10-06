<?php

// # Create Payment using PayPal as payment method
// This sample code demonstrates how you can process a 
// PayPal Account based Payment.
// API used: /v1/payments/payment

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
session_start();

// ### Payer
// A resource representing a Payer that funds a payment
// For paypal account payments, set payment method
// to 'paypal'.
$payer = new Payer();
$payer->setPaymentMethod("paypal");

// ### Amount
// Lets you specify a payment amount.
// You can also specify additional details
// such as shipping, tax.
$amount = new Amount();
$amount->setCurrency("USD")
    ->setTotal("0.17");

// ### Transaction
// A transaction defines the contract of a
// payment - what is the payment for and who
// is fulfilling it. 
$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setDescription("Payment description");

// ### Redirect urls
// Set the urls that the buyer must be redirected to after 
// payment approval/ cancellation.
$baseUrl = getBaseUrl();
$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl("$baseUrl/ExecutePayment.php?success=true")
    ->setCancelUrl("$baseUrl/ExecutePayment.php?success=false");

// ### Payment
// A Payment Resource; create one using
// the above types and intent set to 'sale'
$payment = new Payment();
$payment->setIntent("authorize")
    ->setPayer($payer)
    ->setRedirectUrls($redirectUrls)
    ->setTransactions(array($transaction));

// ### Get Refresh Token
// You need to get a permanent refresh token from the authorization code, retrieved from the mobile sdk.

// authorization code from mobile sdk
$authorizationCode = 'EF4Ds2Wv1JbHiU_UuhR5v-ftTbeJD03RBX-Zjg9pLCAhdLqLeRR6YSKTNsrbQGX7lFoZ3SxwFyxADEZbBOxpn023W9SA0JzSQAy-9eLdON5eDPAyMyKlHyNVS2DqBR2iWVfQGfudbd9MDoRxMEjIZbY';

// correlation id from mobile sdk
$correlationId = '123123456';

try {
    // Exchange authorization_code for long living refresh token. You should store
    // it in a database for later use
    $refreshToken = $apiContext->getCredential()->getRefreshToken($apiContext->getConfig(), $authorizationCode);

    // Update the access token in apiContext
    $apiContext->getCredential()->updateAccessToken($apiContext->getConfig(), $refreshToken);

    // ### Create Future Payment
    // Create a payment by calling the 'create' method
    // passing it a valid apiContext.
    // (See bootstrap.php for more on `ApiContext`)
    // The return object contains the state and the
    // url to which the buyer must be redirected to
    // for payment approval
    // Please note that currently future payments works only with Paypal as a funding instrument.
    $payment->create($apiContext, $correlationId);

} catch (PayPal\Exception\PPConnectionException $ex) {
    echo "Exception: " . $ex->getMessage() . PHP_EOL;
    var_dump($ex->getData());
    exit(1);
}
?>

<html>
<head>
    <title>Future payments</title>
</head>
<body>
<div>
    Created payment:
    <?php echo $payment->getId();?>
</div>
<pre><?php echo $payment->toJSON(JSON_PRETTY_PRINT);?></pre>
<a href='../index.html'>Back</a>
</body>
</html>
