<?php
// # GetCapture
// This sample code demonstrates how you can lookup the details 
// of a captured payment.
// API used: /v1/payments/capture/<$captureId>

use PayPal\Api\Capture;

// Replace $captureId with any static Id you might already have. 
$captureId = "<your authorization id here>";

// ### Retrieve Capture details
// You can look up a capture by invoking the Capture::get method 
// with a valid ApiContext (See bootstrap.php for more on `ApiContext`)
try {
    $capture = Capture::get($captureId, $apiContext);
} catch (Exception $ex) {
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
    ResultPrinter::printError("Get Captured Payment", "Capture", $captureId, null, $ex);
    exit(1);
}

// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
 ResultPrinter::printResult("Get Captured Payment", "Capture", $capture->getId(), null, $capture);
