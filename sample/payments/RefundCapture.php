<?php
// # Refund Capture Sample
// This sample code demonstrates how you can
// process a refund on a Captured transaction.
// API used: /v1/payments/capture/{<captureID>}/refund
/** @var Capture $capture */
$capture = require 'AuthorizationCapture.php';

use PayPal\Api\Authorization;
use PayPal\Api\Capture;
use PayPal\Api\Refund;
use PayPal\Api\Amount;

// ### Refund
// Create a refund object indicating
// refund amount and call the refund method

$refund = new Refund();
$refund->setAmount($amt);

try {
    // Create a new apiContext object so we send a new
    // PayPal-Request-Id (idempotency) header for this resource
    $apiContext = getApiContext($clientId, $clientSecret);

    $captureRefund = $capture->refund($refund, $apiContext);
} catch (Exception $ex) {
    ResultPrinter::printError("Refund Capture", "Capture", null, $refund, $ex);
    exit(1);
}

ResultPrinter::printResult("Refund Capture", "Capture", $captureRefund->getId(), $refund, $captureRefund);
