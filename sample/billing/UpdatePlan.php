<?php

// # Update a plan
//
// This sample code demonstrate how you can update a billing plan, as documented here at:
// https://developer.paypal.com/webapps/developer/docs/api/#update-a-plan
// API used:  /v1/payments/billing-plans/<Plan-Id>

// ### Making Plan Active
// This example demonstrate how you could activate the Plan.

// Retrieving the Plan object from Create Plan Sample to demonstrate the List
/** @var Plan $createdPlan */
$createdPlan = require 'CreatePlan.php';

use PayPal\Api\Plan;
use PayPal\Api\PatchRequest;
use PayPal\Api\Patch;
use PayPal\Common\PPModel;
try {
    $patch = new Patch();

    $value = new PPModel('{
	       "state":"ACTIVE"
	     }');

    $patch->setOp('replace')
        ->setPath('/')
        ->setValue($value);
    $patchRequest = new PatchRequest();
    $patchRequest->addPatch($patch);

    $createdPlan->update($patchRequest, $apiContext);

    $plan = Plan::get($createdPlan->getId(), $apiContext);

} catch (Exception $ex) {
    ResultPrinter::printError("Updated the Plan to Active State", "Plan", null, $patchRequest, $ex);
    exit(1);
}

ResultPrinter::printResult("Updated the Plan to Active State", "Plan", $plan->getId(), $patchRequest, $plan);

return $plan;
