<?php

namespace PayPal\Test\v1\Webhooks;

use PayPal\Test\TestHarness;
use PayPal\v1\Webhooks\SimulateEventRequest;
use PHPUnit\Framework\TestCase;


class SimulateEventTest extends TestCase
{
    public function testSimulateEventRequest()
    {
        $request = new SimulateEventRequest();
        $request->body = $this->buildRequestBody();

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(202, $response->statusCode);
        $this->assertNotNull($response->result);
    }

    private function buildRequestBody()
    {
        return ["url" => "https://www.ebay.com/paypal_webhook", "event_type" => "PAYMENT.AUTHORIZATION.CREATED"];
    }
}
