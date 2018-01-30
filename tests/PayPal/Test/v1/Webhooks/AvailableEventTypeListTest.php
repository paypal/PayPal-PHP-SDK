<?php

namespace PayPal\Test\v1\Webhooks;

use PayPal\Test\TestHarness;
use PayPal\v1\Webhooks\AvailableEventTypeListRequest;
use PHPUnit\Framework\TestCase;


class AvailableEventTypeListTest extends TestCase
{

    public function testAvailableEventTypeListRequest()
    {
        $request = new AvailableEventTypeListRequest();

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
        $this->assertTrue(is_array($response->result->event_types));
    }
}
