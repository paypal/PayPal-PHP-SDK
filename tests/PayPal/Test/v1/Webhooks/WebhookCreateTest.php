<?php

namespace PayPal\Test\v1\Webhooks;

use PayPal\Test\TestHarness;
use PayPal\v1\Webhooks\WebhookCreateRequest;
use PHPUnit\Framework\TestCase;

class WebhookCreateTest extends TestCase
{
    public function testWebhookCreateRequest()
    {
        $response = self::create();
        $this->assertEquals(201, $response->statusCode);
        $this->assertNotNull($response->result);
    }

    public static function create()
    {
        $request = new WebhookCreateRequest();
        $request->body = self::buildRequestBody();

        $client = TestHarness::client();
        return $client->execute($request);
    }

    private static function buildRequestBody()
    {
        return [
            "url" => "https://example.com/" . uniqid(),
            "event_types" => [[
                "name" => "PAYMENT.AUTHORIZATION.CREATED"
            ], [
                "name" => "PAYMENT.AUTHORIZATION.VOIDED"
            ]]
        ];
    }
}
