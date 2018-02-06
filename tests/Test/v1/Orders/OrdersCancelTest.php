<?php

namespace PayPal\Test\v1\Orders;

use BraintreeHttp\HttpException;
use PayPal\Test\TestHarness;
use PayPal\v1\Orders\OrdersCancelRequest;
use PayPal\v1\Orders\OrdersGetRequest;
use PHPUnit\Framework\TestCase;
use PayPal\Test\v1\Orders\OrderCreateTest;

class OrdersCancelTest extends TestCase
{

    public function testOrdersCancelRequest()
    {
        $client = TestHarness::client();
        $createdOrderResponse = OrdersCreateTest::create($client);

        $request = new OrdersCancelRequest($createdOrderResponse->result->id);
        $response = $client->execute($request);
        $this->assertEquals(204, $response->statusCode);

        $request = new OrdersGetRequest($createdOrderResponse->result->id);
        try {
            $response = $client->execute($request);
            $this->fail();
        } catch (HttpException $ex) {
            $this->assertEquals(404, $ex->statusCode);
        }
    }
}
