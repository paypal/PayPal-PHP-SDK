<?php

namespace PayPal\Test\v1\Webhooks;

use PayPal\Test\TestHarness;
use PayPal\v1\Webhooks\WebhookGetRequest;
use PayPal\v1\Webhooks\WebhookUpdateRequest;
use PHPUnit\Framework\TestCase;

class WebhookUpdateTest extends TestCase
{
    public function testWebhookUpdateRequest()
    {
        $url = "https://updated.com/" . uniqid();

        $response = WebhookCreateTest::create();
        $webhookId = $response->result->id;
        $request = new WebhookUpdateRequest($webhookId);

        $request->body = self::buildRequestBody($url);

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);

        $request = new WebhookGetRequest($webhookId);
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
        $this->assertEquals($url, $response->result->url);
    }

    private static function buildRequestBody($url)
    {
        return [
            ["op" => "replace", "path" => "/url", "value" => $url]
        ];
    }
}
