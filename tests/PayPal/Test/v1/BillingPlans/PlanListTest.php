<?php

namespace PayPal\Test\v1\BillingPlans;

use PHPUnit\Framework\TestCase;
use PayPal\v1\BillingPlans\PlanListRequest;
use PayPal\Test\TestHarness;

class PlanListTest extends TestCase
{

    public function testPlanListRequest()
    {
        $request = new PlanListRequest();

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
