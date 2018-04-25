<?php

// # Suspend an agreement
//
// This sample code demonstrate how you can suspend a billing agreement, as documented here at:
// https://developer.paypal.com/docs/api/#suspend-an-agreement
// API used: /v1/payments/billing-agreements/<Agreement-Id>/suspend

// Retrieving the Agreement object from Create Agreement Sample to demonstrate the List
require __DIR__ . '/../bootstrap.php';

use PayPal\Api\Agreement;
use PayPal\Api\AgreementStateDescriptor;

//Create an Agreement State Descriptor, explaining the reason to suspend.
$agreementStateDescriptor = new AgreementStateDescriptor();
$agreementStateDescriptor->setNote("Suspending the agreement");

// Fetch the agreement object
/** @var Agreement $createdAgreement */
$createdAgreement = null; // Replace this with your fetched agreement object

try {
    $createdAgreement->suspend($agreementStateDescriptor, $apiContext);

    // Lets get the updated Agreement Object
    $agreement = Agreement::get($createdAgreement->getId(), $apiContext);
} catch (Exception $ex) {
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
    ResultPrinter::printError("Suspended the Agreement", "Agreement", null, $agreementStateDescriptor, $ex);
    exit(1);
}

// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
 ResultPrinter::printResult("Suspended the Agreement", "Agreement", $agreement->getId(), $agreementStateDescriptor, $agreement);

return $agreement;
