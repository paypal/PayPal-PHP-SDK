<?php

namespace PayPal\Test\v1\BillingPlans;

use PHPUnit\Framework\TestCase;
use PayPal\v1\BillingPlans\PlanGetRequest;
use PayPal\Test\TestHarness;

class PlanGetTest extends TestCase
{

    public static function get($id)
    {
        $request = new PlanGetRequest($id);
        $client = TestHarness::client();
        return $client->execute($request);
    }

    public function testPlanGetRequest()
    {
        $createResponse = PlanCreateTest::create();
        $response = self::get($createResponse->result->id);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
