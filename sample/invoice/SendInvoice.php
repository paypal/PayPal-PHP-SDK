<?php

// # Create Invoice Sample
// This sample code demonstrate how you can send
// a legitimate invoice to the payer

/** @var Invoice $invoice */
$invoice = require 'CreateInvoice.php';

use PayPal\Api\Invoice;

try {
    // ### Retrieve Invoice
    // Retrieve the invoice object by calling the
    // static `get` method
    // on the Invoice class by passing a valid
    // Invoice ID
    // (See bootstrap.php for more on `ApiContext`)
    $invoice = Invoice::get($invoice->getId(), $apiContext);

    // ### Send Invoice
    // Send a legitimate invoice to the payer
    // with a valid ApiContext (See bootstrap.php for more on `ApiContext`)
    $sendStatus = $invoice->send($apiContext);
} catch (Exception $ex) {
    ResultPrinter::printResult("Send Invoice", "Invoice", null, null, $ex);
    exit(1);
}

ResultPrinter::printResult("Send Invoice", "Invoice", $invoice->getId(), null, null);

return $invoice;
