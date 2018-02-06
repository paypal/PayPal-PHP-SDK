<?php

namespace PayPal\Test\v1\BillingPlans;

use PHPUnit\Framework\TestCase;
use PayPal\v1\BillingPlans\PlanCreateRequest;
use PayPal\Test\TestHarness;

class PlanCreateTest extends TestCase
{
    private static function buildRequestBody()
    {
        return [
            "payment_definitions" => [[
                "amount" => [
                    "value" => "100",
                    "currency" => "USD"
                ],
                "frequency" => "MONTH",
                "cycles" => "12",
                "frequency_interval" => "2",
                "type" => "REGULAR",
                "name" => "Regular Payments",
                "charge_models" => [[
                    "type" => "SHIPPING",
                    "amount" => [
                        "value" => "10",
                        "currency" => "USD"
                    ]
                ], [
                    "type" => "TAX",
                    "amount" => [
                        "value" => "12",
                        "currency" => "USD"
                    ]
                ]]
            ]],
            "merchant_preferences" => [
                "return_url" => "http://localhost:3000/subscription/success",
                "cancel_url" => "http://localhost:3000/subscription/cancel"
            ],
            "name" => "T-Shirt of the Month Club Plan",
            "description" => "Template creation.",
            "type" => "fixed"
        ];
    }

    public static function create() {
        $request = new PlanCreateRequest();
        $request->body = self::buildRequestBody();

        $client = TestHarness::client();
        return $client->execute($request);
    }


    public function testPlanCreateRequest()
    {
        $response = self::create();
        $this->assertEquals(201, $response->statusCode);
        $this->assertNotNull($response->result);

        // Add your own checks here
    }
}
