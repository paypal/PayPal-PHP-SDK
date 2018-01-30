<?php

namespace PayPal\Test\v1\Webhooks;

use BraintreeHttp\HttpException;
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
        try {
            return $client->execute($request);
        } catch (HttpException $ex) {
            if ($ex->statusCode == "400" && strpos($ex->getMessage(), 'WEBHOOK_NUMBER_LIMIT_EXCEEDED') !== false) {
                self::deleteAll();
                return $client->execute($request);
            }
        }
    }

    public static function deleteAll()
    {
        $allResponse = WebhookListTest::all();
        foreach ($allResponse->result->webhooks as $webhook) {
            try {
                WebhookDeleteTest::delete($webhook->id);
            } catch (HttpException $ex) {
                // ignore
            }
        }
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
