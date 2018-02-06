<?php

namespace PayPal\Test\v1\Payments;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Payments\PaymentUpdateRequest;
use PayPal\Test\TestHarness;

class PaymentUpdateTest extends TestCase
{
    private function buildRequestBody()
    {
        return [[
            "path" => "/transactions/0/amount",
            "op" => "replace",
            "value" => [
                "currency" => "USD",
                "total" => "11"
            ]
        ]];
    }

    public function testPaymentUpdateRequest()
    {
        $createResponse = PaymentCreateTest::create('sale', 'paypal');
        $request = new PaymentUpdateRequest($createResponse->result->id);
        $request->body = $this->buildRequestBody();

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
