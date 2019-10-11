<?php

// # Get Billing Agreement Sample
//
// This sample code demonstrate how you can get a billing agreement, as documented here at:
// https://developer.paypal.com/docs/api/payments.billing-agreements/v1/#billing-agreements_get
// API used: GET /v1/payments/billing-agreements/{agreement_id}
require __DIR__ . '/../bootstrap.php';

// Retrieving the Agreement object from Create Agreement From Credit Card Sample
/** @var Agreement $createdAgreement */
$createdAgreement = "your billing agreement id";

use PayPal\Api\Agreement;

try {
    $agreement = Agreement::get($createdAgreement->getId(), $apiContext);
} catch (Exception $ex) {
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
    ResultPrinter::printError("Retrieved an Agreement", "Agreement", $agreement->getId(), $createdAgreement->getId(), $ex);
    exit(1);
}

// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
ResultPrinter::printResult("Retrieved an Agreement", "Agreement", $agreement->getId(), $createdAgreement->getId(), $agreement);

return $agreement;
