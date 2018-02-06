<?php

namespace PayPal\Test\v1\Payments;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Payments\PaymentListRequest;
use PayPal\Test\TestHarness;

class PaymentListTest extends TestCase
{

    public function testPaymentListRequest()
    {
        $request = new PaymentListRequest();
        $request->count(2);

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
