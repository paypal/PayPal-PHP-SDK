<?php

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\ReportingTransactions;

// ### Retrieve payment
// Retrieve the PaymentHistory object by calling the
// static `get` method on the Payment class,
// and pass a Map object that contains
// query parameters for paginations and filtering.
// Refer the method doc for valid values for keys
// (See bootstrap.php for more on `ApiContext`)
try {
    $params = array('count' => 100, 'start_date' => '2019-03-20T00:00:00-0700', 'end_date' => '2019-04-10T23:59:59-0700', 'fields' => 'all', 'page' => 1);

    $payments = ReportingTransactions::get($params, $apiContext);
} catch (Exception $ex) {
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
    ResultPrinter::printError("List Payments", "Payment", null, $params, $ex);
    exit(1);
}

// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
ResultPrinter::printResult("List Payments", "Payment", null, $params, $payments);
