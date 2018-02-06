<?php

namespace PayPal\Test\v1\Orders;

use PayPal\Test\TestHarness;
use PayPal\Test\v1\Orders\OrderCreateTest;
use PayPal\v1\Orders\OrdersGetRequest;
use PHPUnit\Framework\TestCase;

class OrdersGetTest extends TestCase
{

    public function testOrdersGetRequest()
    {
        $client = TestHarness::client();
        $createdOrderResponse = OrdersCreateTest::create($client);

        $request = new OrdersGetRequest($createdOrderResponse->result->id);
        $getOrderResponse = $client->execute($request);
        $this->assertEquals(200, $getOrderResponse->statusCode);
        $this->assertNotNull($getOrderResponse->result);

        $createdOrder = $createdOrderResponse->result;
        $retrievedOrder = $getOrderResponse->result;

        $this->assertEquals($createdOrder->id, $retrievedOrder->id);
        $this->assertEquals(count($createdOrder->purchase_units), count($retrievedOrder->purchase_units));

        $this->assertEquals($createdOrder->redirect_urls->return_url, $retrievedOrder->redirect_urls->return_url);
        $this->assertEquals($createdOrder->redirect_urls->cancel_url, $retrievedOrder->redirect_urls->cancel_url);

        $this->assertEquals($createdOrder->create_time, $retrievedOrder->create_time);

        $this->assertNotNull($retrievedOrder->links);
    }
}
