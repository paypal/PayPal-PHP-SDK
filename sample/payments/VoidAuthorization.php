<?php
// # VoidAuthorization
// This sample code demonstrates how you can 
// void an authorized payment.
// API used: /v1/payments/authorization/<{authorizationid}>/void"

/** @var Authorization $authorization */
$authorization = require 'AuthorizePayment.php';

use PayPal\Api\Authorization;


// ### VoidAuthorization
// You can void a previously authorized payment
// by invoking the $authorization->void method
// with a valid ApiContext (See bootstrap.php for more on `ApiContext`)
try {

    // Lookup the authorization
    $authorization = Authorization::get($authorization->getId(), $apiContext);

    // Void the authorization
    $voidedAuth = $authorization->void($apiContext);
} catch (Exception $ex) {
    ResultPrinter::printError("Void Authorization", "Authorization", null, null, $ex);
    exit(1);
}

ResultPrinter::printResult("Void Authorization", "Authorization", $voidedAuth->getId(), null, $voidedAuth);

return $voidedAuth;
