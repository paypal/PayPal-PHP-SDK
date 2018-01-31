<?php

namespace PayPal\Test\v1\BillingAgreements;

use PayPal\Test\v1\BillingPlans\PlanCreateTest;
use PayPal\Test\v1\BillingPlans\PlanUpdateTest;
use PHPUnit\Framework\TestCase;
use PayPal\v1\BillingAgreements\AgreementCreateRequest;
use PayPal\Test\TestHarness;

class AgreementCreateTest extends TestCase
{
    private function buildRequestBody($planId)
    {
        return [
            "name" => "Override Agreement",
            "description" => "PayPal payment agreement that overrides merchant preferences and shipping fee and tax information.",
            "start_date" => "2018-02-19T00:37:04Z",
            "payer" => [
                "payment_method" => "paypal",
                "payer_info" => [
                    "email" => "payer@example.com"
                ]
            ],
            "plan" => [
                "id" => $planId
            ],
            "shipping_address" => [
                "line1" => "Hotel Staybridge",
                "line2" => "Crooke Street",
                "city" => "San Jose",
                "state" => "CA",
                "postal_code" => "95112",
                "country_code" => "US"
            ],
            "override_merchant_preferences" => [
                "setup_fee" => [
                    "value" => "3",
                    "currency" => "USD"
                ],
                "return_url" => "https://example.com/",
                "cancel_url" => "https://example.com/cancel",
                "auto_bill_amount" => "YES",
                "initial_fail_amount_action" => "CONTINUE",
                "max_fail_attempts" => "11"
            ]
        ];
    }

    public function testAgreementCreateRequest()
    {
        $createPlanResponse = PlanCreateTest::create();
        $planId = $createPlanResponse->result->id;

        PlanUpdateTest::activate($planId);

        $request = new AgreementCreateRequest();
        $request->body = $this->buildRequestBody($planId);

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(201, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
