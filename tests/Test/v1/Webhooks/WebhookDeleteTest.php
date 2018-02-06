<?php

namespace PayPal\Test\v1\Webhooks;

use PayPal\Test\TestHarness;
use PayPal\v1\Webhooks\WebhookDeleteRequest;
use PHPUnit\Framework\TestCase;

class WebhookDeleteTest extends TestCase
{

    public static function delete($id)
    {
        $request = new WebhookDeleteRequest($id);

        $client = TestHarness::client();
        return $client->execute($request);
    }

    public function testWebhookDeleteRequest()
    {
        $createResponse = WebhookCreateTest::create();

        $response = self::delete($createResponse->result->id);
        $this->assertEquals(204, $response->statusCode);
    }
}
