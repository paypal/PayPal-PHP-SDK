<?php

// # Get Third Invoice Sample
// This sample code demonstrate how you can retrieve
// a third party invoice.

/** @var Invoice $invoice */
$invoice = require 'CreateThirdPartyInvoice.php';
use PayPal\Api\Invoice;

$invoiceId = $invoice->getId();

// Step 1. This would be refresh token retrieved from http://paypal.github.io/PayPal-PHP-SDK/sample/doc/lipp/ObtainUserConsent.html
$refreshToken = "SCNWVZfdg43XaOmoEicazpkXyda32CGnP208EkuQ_QBIrXCYMhlvORFHHyoXPT0VbEMIHYVJEm0gVf1Vf72YgJzPScBenKoVPq__y1QRT7wwJo3WYADwUW4Q5ic";

try {
    // ### Step 2
    // Update your apiContext with refresh token obtained from Step 1.
    $apiContext->getCredential()->updateAccessToken($apiContext->getConfig(), $refreshToken);

    // ### Retrieve Invoice
    // Retrieve the invoice object by calling the
    // static `get` method
    // on the Invoice class by passing a valid
    // Invoice ID
    // (See bootstrap.php for more on `ApiContext`)
    // Similar calls can be done to search invoices, delete, and update.
    $retrievedInvoice = Invoice::get($invoiceId, $apiContext);

    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
    ResultPrinter::printResult("Get Third Party Invoice", "Invoice", $retrievedInvoice->getId(), $invoiceId, $retrievedInvoice);
} catch (Exception $ex) {
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
    ResultPrinter::printError("Get Third Party Invoice", "Invoice", $invoiceId, $invoiceId, $ex);
    exit(1);
}

return $retrievedInvoice;
