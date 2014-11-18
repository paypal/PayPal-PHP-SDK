<?php

// # Update Invoice Sample
// This sample code demonstrate how you can update
// an invoice.

/** @var Invoice $invoice */
$invoice = require 'CreateInvoice.php';
use PayPal\Api\Invoice;

// ### Update Invoice
// Lets update some information
$invoice->setInvoiceDate("2014-11-16 PST");


// For Sample Purposes Only.
$request = clone $invoice;

try {
    // ### Update Invoice
    // Update an invoice by calling the invoice->update() method
    // with a valid ApiContext (See bootstrap.php for more on `ApiContext`)
    $invoice->update($apiContext);
} catch (Exception $ex) {
    ResultPrinter::printError("Invoice Updated", "Invoice", null, $request, $ex);
    exit(1);
}

ResultPrinter::printResult("Invoice Updated", "Invoice", $invoice->getId(), $request, $invoice);

return $invoice;
