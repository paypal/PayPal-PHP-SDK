<?php

namespace PayPal\Test\v1\BillingPlans;

use PHPUnit\Framework\TestCase;
use PayPal\v1\BillingPlans\PlanUpdateRequest;
use PayPal\Test\TestHarness;

class PlanUpdateTest extends TestCase
{
    private static function buildRequestBody()
    {
        return [
            [
                "op" => "replace",
                "path" => "/",
                "value" => [
                    "state" => "ACTIVE"
                ]
            ]
        ];
    }

    public static function activate($id)
    {
        $request = new PlanUpdateRequest($id);
        $request->body = self::buildRequestBody();

        $client = TestHarness::client();
        return $client->execute($request);
    }

    public function testPlanUpdateRequest()
    {
        $createResponse = PlanCreateTest::create();
        $planId = $createResponse->result->id;

        $response = self::activate($planId);
        $this->assertEquals(200, $response->statusCode);

        $getResponse = PlanGetTest::get($planId);
        $this->assertEquals(200, $getResponse->statusCode);
        $this->assertEquals("ACTIVE", $getResponse->result->state);
    }
}
