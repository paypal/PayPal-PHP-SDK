<?php

namespace PayPal\Test\v1\Webhooks;

use PayPal\Test\TestHarness;
use PayPal\v1\Webhooks\WebhookDeleteRequest;
use PHPUnit\Framework\TestCase;

class WebhookDeleteTest extends TestCase
{

    public function testWebhookDeleteRequest()
    {
        $response = WebhookCreateTest::create();
        $request = new WebhookDeleteRequest($response->result->id);

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(204, $response->statusCode);
    }
}
