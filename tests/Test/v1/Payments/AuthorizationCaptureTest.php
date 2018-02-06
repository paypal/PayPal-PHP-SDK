<?php

namespace PayPal\Test\v1\Payments;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Payments\AuthorizationCaptureRequest;
use PayPal\Test\TestHarness;

class AuthorizationCaptureTest extends TestCase
{
    private static function buildRequestBody()
    {
        return [
            "amount" => [
                "total" => "10",
                "currency" => "USD"
            ],
            "is_final_capture" => true
        ];
    }

    public static function capture($authId)
    {
        $request = new AuthorizationCaptureRequest($authId);
        $request->body = self::buildRequestBody();

        $client = TestHarness::client();
        return $client->execute($request);
    }

    public function testAuthorizationCaptureRequest()
    {
        $authorizationCreateResponse = PaymentCreateTest::create('authorize');
        $authId = $authorizationCreateResponse->result->transactions[0]->related_resources[0]->authorization->id;

        $response = $this->capture($authId);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
