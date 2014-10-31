<?php

// # Get Plan Sample
//
// This sample code demonstrate how you can get a billing plan, as documented here at:
// https://developer.paypal.com/webapps/developer/docs/api/#retrieve-a-plan
// API used: /v1/payments/billing-plans

// Retrieving the Plan object from Create Plan Sample
/** @var Plan $createdPlan */
$createdPlan = require 'CreatePlan.php';

use PayPal\Api\Plan;

try {
    $plan = Plan::get($createdPlan->getId(), $apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
    echo "Exception: " . $ex->getMessage() . PHP_EOL;
    var_dump($ex->getData());
    exit(1);
}

ResultPrinter::printResult("Retrieved a Plan", "Plan", $plan->getId(), null, $plan);

return $plan;
