<?php

// # List Invoices Sample
// This sample code demonstrate how you can get
// all invoice from history.

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Invoice;

try {
    // ### Retrieve Invoices
    // Retrieve the Invoice History object by calling the
    // static `get_all` method on the Invoice class.
    // Refer the method doc for valid values for keys
    // (See bootstrap.php for more on `ApiContext`)
    $invoices = Invoice::get_all($apiContext);
} catch (Exception $ex) {
    ResultPrinter::printError("Lookup Invoice History", "Invoice", null, null, $ex);
    exit(1);
}
ResultPrinter::printResult("Lookup Invoice History", "Invoice", null, null, $invoices);
