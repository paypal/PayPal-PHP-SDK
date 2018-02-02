<?php

namespace PayPal\Test\v1\Payments;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Payments\PaymentGetRequest;
use PayPal\Test\TestHarness;

class PaymentGetTest extends TestCase
{

    public function testPaymentGetRequest()
    {
        $createResponse = PaymentCreateTest::create('sale');

        $request = new PaymentGetRequest($createResponse->result->id);

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
