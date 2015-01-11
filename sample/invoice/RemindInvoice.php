<?php

// # Remind Invoice Sample
// This sample code demonstrate how you can remind
// an invoice to the payer

/** @var Invoice $invoice */
$invoice = require 'SendInvoice.php';

use PayPal\Api\Invoice;
use PayPal\Api\Notification;

try {

    // ### Notification Object
    // This would send a notification to both merchant as well
    // the payer. The information of merchant
    // and payer is retrieved from the invoice details
    $notify = new Notification();
    $notify
        ->setSubject("Past due")
        ->setNote("Please pay soon")
        ->setSendToMerchant(true);

    // ### Remind Invoice
    // Remind the notifiers by calling the
    // `remind` method
    // on the Invoice class by passing a valid
    // notification object
    // (See bootstrap.php for more on `ApiContext`)
    $remindStatus = $invoice->remind($notify, $apiContext);
} catch (Exception $ex) {
    ResultPrinter::printError("Remind Invoice", "Invoice", null, $notify, $ex);
    exit(1);
}

ResultPrinter::printResult("Remind Invoice", "Invoice", null, $notify, null);

// ### Retrieve Invoice
// Retrieve the invoice object by calling the
// static `get` method
// on the Invoice class by passing a valid
// Invoice ID
// (See bootstrap.php for more on `ApiContext`)
try {
    $invoice = Invoice::get($invoice->getId(), $apiContext);
} catch (Exception $ex) {
    ResultPrinter::printError("Get Invoice (Not Required - For Sample Only)", "Invoice", $invoice->getId(), $invoice->getId(), $ex);
    exit(1);
}

ResultPrinter::printResult("Get Invoice (Not Required - For Sample Only)", "Invoice", $invoice->getId(), $invoice->getId(), $invoice);

return $invoice;
