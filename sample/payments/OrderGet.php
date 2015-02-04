<?php
// #Get Order Sample
// Specify an order ID to get details about an order.
// API used: GET /v1/payments/orders/<Order-Id>

/** @var \PayPal\Api\Payment $payment */
$payment = require __DIR__ . '/ExecutePayment.php';

// ### Approval Status
// Determine if the user approved the payment or not
if (isset($_GET['success']) && $_GET['success'] == 'true') {

    $transactions = $payment->getTransactions();
    $transaction = $transactions[0];
    $relatedResources = $transaction->getRelatedResources();
    $relatedResource = $relatedResources[0];
    $order = $relatedResource->getOrder();

    try {
        $result = \PayPal\Api\Order::get($order->getId(), $apiContext);
        ResultPrinter::printResult("Get Order", "Order", $result->getId(), null, $result);
    } catch (Exception $ex) {
        ResultPrinter::printError("Get Order", "Order", null, null, $ex);
        exit(1);
    }

    return $result;

} else {
    ResultPrinter::printResult("User Cancelled the Approval", null);
    exit;
}
