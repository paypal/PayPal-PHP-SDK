<?php

// # Get Sale sample 
// Sale transactions are nothing but completed payments.
// This sample code demonstrates how you can retrieve 
// details of completed Sale Transaction.
// API used: /v1/payments/sale/{sale-id}

/** @var Payment $payment */
$payment = require __DIR__ . '/../payments/CreatePayment.php';
use PayPal\Api\Sale;
use PayPal\Api\Payment;

// ### Get Sale From Created Payment
// You can retrieve the sale Id from Related Resources for each transactions.
$transactions = $payment->getTransactions();
$relatedResources = $transactions[0]->getRelatedResources();
$sale = $relatedResources[0]->getSale();
$saleId = $sale->getId();

try {
    // ### Retrieve the sale object
    // Pass the ID of the sale
    // transaction from your payment resource.
    $sale = Sale::get($saleId, $apiContext);
} catch (Exception $ex) {
    ResultPrinter::printError("Look Up A Sale", "Sale", $sale->getId(), null, $ex);
    exit(1);
}

ResultPrinter::printResult("Look Up A Sale", "Sale", $sale->getId(), null, $sale);

return $sale;
