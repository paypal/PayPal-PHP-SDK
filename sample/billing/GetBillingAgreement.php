<?php

// # Get Billing Agreement Sample
//
// This sample code demonstrate how you can get a billing agreement, as documented here at:
// https://developer.paypal.com/webapps/developer/docs/api/#retrieve-an-agreement
// API used: /v1/payments/billing-agreements/<Agreement-Id>

// Retrieving the Agreement object from Create Agreement From Credit Card Sample
/** @var Agreement $createdAgreement */
$createdAgreement = require 'CreateBillingAgreementWithCreditCard.php';

use PayPal\Api\Agreement;

try {
    $agreement = Agreement::get($createdAgreement->getId(), $apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
    echo "Exception: " . $ex->getMessage() . PHP_EOL;
    var_dump($ex->getData());
    exit(1);
}

ResultPrinter::printResult("Retrieved an Agreement", "Agreement", $agreement->getId(), $createdAgreement->getId(), $agreement);

return $agreement;
