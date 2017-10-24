<?php

// # Get Sale sample 
// Sale transactions are nothing but completed payments.
// This sample code demonstrates how you can retrieve 
// details of completed Sale Transaction.
// API used: /v1/payments/sale/{sale-id}

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Payment;
use PayPal\Api\Sale;

// You can retrieve the sale Id from Related Resources for each transactions.
$saleId = "enter your sale id";

try {
    // ### Retrieve the sale object
    // Pass the ID of the sale
    // transaction from your payment resource.
    $sale = Sale::get($saleId, $apiContext);
} catch (Exception $ex) {
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
    ResultPrinter::printError("Look Up A Sale", "Sale", $sale->getId(), null, $ex);
    exit(1);
}

// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
 ResultPrinter::printResult("Look Up A Sale", "Sale", $sale->getId(), null, $sale);

return $sale;
