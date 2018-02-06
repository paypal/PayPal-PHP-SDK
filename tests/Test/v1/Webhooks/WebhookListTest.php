<?php

namespace PayPal\Test\v1\Webhooks;

use PayPal\Test\TestHarness;
use PayPal\v1\Webhooks\WebhookListRequest;
use PHPUnit\Framework\TestCase;

class WebhookListTest extends TestCase
{

    public static function all()
    {
        $request = new WebhookListRequest();

        $client = TestHarness::client();
        return $client->execute($request);
    }

    public function testWebhookListRequest()
    {
        $response = self::all();
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
