<?php
// # Refund Capture Sample
// This sample code demonstrates how you can
// process a refund on a Captured transaction.
// API used: /v1/payments/capture/{<captureID>}/refund
/** @var Capture $capture */


use PayPal\Api\Capture;
use PayPal\Api\Refund;
use PayPal\Api\RefundRequest;

// ### Refund
// Create a refund object indicating
// refund amount and call the refund method
$amount = new Amount();
$amount->setCurrency("USD")
    ->setTotal(20);

$refundRequest = new RefundRequest();
$refundRequest->setAmount($amount);

// Replace $captureId with any static Id you might already have. 
$captureId = "<your authorization id here>";



try {
    // Create a new apiContext object so we send a new
    // PayPal-Request-Id (idempotency) header for this resource
    $apiContext = getApiContext($clientId, $clientSecret);

    // ### Retrieve Capture details
    $capture = Capture::get($captureId, $apiContext);

    // ### Refund the Capture 
    $captureRefund = $capture->refundCapturedPayment($refundRequest, $apiContext);

} catch (Exception $ex) {
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
    ResultPrinter::printError("Refund Capture", "Capture", null, $refundRequest, $ex);
    exit(1);
}

// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
ResultPrinter::printResult("Refund Capture", "Capture", $captureRefund->getId(), $refundRequest, $captureRefund);
