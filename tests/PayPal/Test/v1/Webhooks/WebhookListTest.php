<?php

namespace PayPal\Test\v1\Webhooks;

use PayPal\Test\TestHarness;
use PayPal\v1\Webhooks\WebhookListRequest;
use PHPUnit\Framework\TestCase;

class WebhookListTest extends TestCase
{

    public function testWebhookListRequest()
    {
        $request = new WebhookListRequest();

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
