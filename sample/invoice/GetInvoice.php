<?php

// # Get Invoice Sample
// This sample code demonstrate how you can retrieve
// an invoice.

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Invoice;

$invoiceId = "INV2-W4LC-6QS9-JZ62-VE4P";

// ### Retrieve Invoice
// Retrieve the invoice object by calling the
// static `get` method
// on the Invoice class by passing a valid
// Invoice ID
// (See bootstrap.php for more on `ApiContext`)
try {
    $invoice = Invoice::get($invoiceId, $apiContext);
} catch (Exception $ex) {
    ResultPrinter::printError("Get Invoice", "Invoice", $invoice->getId(), $invoiceId, $ex);
    exit(1);
}

ResultPrinter::printResult("Get Invoice", "Invoice", $invoice->getId(), $invoiceId, $invoice);
