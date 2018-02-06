<?php

namespace PayPal\Test\v1\Payments;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Payments\CaptureRefundRequest;
use PayPal\Test\TestHarness;

class CaptureRefundTest extends TestCase
{
    private function buildRequestBody()
    {
        return [
            "amount" => [
                "total" => "2.34",
                "currency" => "USD"
            ]
        ];
    }

    public function testCaptureRefundRequest()
    {
        $authorizationCreateResponse = PaymentCreateTest::create('authorize');
        $authId = $authorizationCreateResponse->result->transactions[0]->related_resources[0]->authorization->id;

        $authorizationCaptureResponse = AuthorizationCaptureTest::capture($authId);
        $request = new CaptureRefundRequest($authorizationCaptureResponse->result->id);
        $request->body = $this->buildRequestBody();

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(201, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
