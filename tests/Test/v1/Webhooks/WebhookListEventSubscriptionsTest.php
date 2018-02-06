<?php

namespace PayPal\Test\v1\Webhooks;

use PayPal\Test\TestHarness;
use PayPal\v1\Webhooks\WebhookListEventSubscriptionsRequest;
use PHPUnit\Framework\TestCase;

class WebhookListEventSubscriptionsTest extends TestCase
{

    public function testWebhookListEventSubscriptionsRequest()
    {
        $response = WebhookCreateTest::create();

        $request = new WebhookListEventSubscriptionsRequest($response->result->id);

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
