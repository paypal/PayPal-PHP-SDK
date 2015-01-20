<?php

// # Search Billing Transactions Sample
//
// This sample code demonstrate how you can search all billing transactions, as documented here at:
// https://developer.paypal.com/webapps/developer/docs/api/#search-for-transactions
// API used: GET /v1/payments/billing-agreements/<Agreement-Id>/transactions? start-date=yyyy-mm-dd&end-date=yyyy-mm-dd

// Retrieving the Agreement object from Create Agreement From Credit Card Sample
/** @var Agreement $agreement */
$agreement = require 'GetBillingAgreement.php';
$agreementId = $agreement->getId();
use PayPal\Api\Agreement;

try {
    $result = Agreement::searchTransactions($agreementId,array('start_date' => '2013-01-01', 'end_date' => '2015-01-20'), $apiContext);
} catch (Exception $ex) {
    ResultPrinter::printError("Search for Transactions", "AgreementTransaction", $agreementId, null, $ex);
    exit(1);
}

ResultPrinter::printResult("Search for Transactions", "AgreementTransaction", $agreementId, null, $result);

return $agreement;
