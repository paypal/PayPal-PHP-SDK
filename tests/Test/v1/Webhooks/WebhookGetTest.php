<?php

namespace PayPal\Test\v1\Webhooks;

use PayPal\Test\TestHarness;
use PayPal\v1\Webhooks\WebhookGetRequest;
use PHPUnit\Framework\TestCase;

class WebhookGetTest extends TestCase
{

    public function testWebhookGetRequest()
    {
        $response = WebhookCreateTest::create();
        $request = new WebhookGetRequest($response->result->id);

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
