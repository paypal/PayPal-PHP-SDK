<?php

// # Record Payment Sample
// This sample code demonstrate how you can record
// an invoice as paid.

/** @var Invoice $invoice */
$invoice = require 'SendInvoice.php';

use PayPal\Api\Invoice;
use PayPal\Api\PaymentDetail;

try {
    // ### Record Object
    // Create a PaymentDetail object, and fill in the required fields
    // You can use the new way of injecting json directly to the object.
    $record = new PaymentDetail(
        '{
          "method" : "CASH",
          "date" : "2014-07-06 03:30:00 PST",
          "note" : "Cash received."
        }'
    );

    // ### Record Payment for Invoice
    // Record a payment on invoice object by calling the
    // `recordPayment` method
    // on the Invoice class by passing a valid
    // notification object
    // (See bootstrap.php for more on `ApiContext`)
    $recordStatus = $invoice->recordPayment($record, $apiContext);
} catch (Exception $ex) {
    ResultPrinter::printError("Payment for Invoice", "Invoice", null, null, $ex);
    exit(1);
}

ResultPrinter::printResult("Payment for Invoice", "Invoice", $invoice->getId(), $record, null);

return $invoice;
