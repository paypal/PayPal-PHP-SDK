<?php

namespace PayPal\Test\v1\Orders;

use PayPal\Test\TestHarness;
use PayPal\v1\Orders\OrdersPayRequest;
use PHPUnit\Framework\TestCase;


class OrdersPayTest extends TestCase
{
    public function testOrdersPayRequest()
    {
        $this->markTestSkipped("Need an approved Order ID to execute this test.");

        $orderId = "0UT805778U190581S";
        $request = new OrdersPayRequest($orderId);
        $request->body = [
            "disbursement_mode" => "INSTANT"
        ];

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);

        $this->assertEquals($orderId, $response->result->order_id);
        $this->assertEquals("APPROVED", $response->result->status);
    }
}
