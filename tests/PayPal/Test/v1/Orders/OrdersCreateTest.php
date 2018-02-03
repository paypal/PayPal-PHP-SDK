<?php

namespace PayPal\Test\v1\Orders;

use PayPal\Test\TestHarness;
use PayPal\v1\Orders\OrdersCreateRequest;
use PHPUnit\Framework\TestCase;

class OrdersCreateTest extends TestCase
{
    private static function buildRequestBody()
    {
        return [
            "intent" => "SALE",
            "purchase_units" => [[
                "reference_id" => "test_ref_id1",
                "amount" => [
                    "total" => "100.00",
                    "currency" => "USD"
                ]
            ], [
                "reference_id" => "test_ref_id2",
                "amount" => [
                    "total" => "50.00",
                    "currency" => "USD"
                ]
            ]],
            "redirect_urls" => [
                "cancel_url" => "https://example.com/cancel",
                "return_url" => "https://example.com/return"
            ]
        ];
    }

    public static function create($client) {
        $request = new OrdersCreateRequest();
        $request->body = self::buildRequestBody();

        return $client->execute($request);
    }

    public function testOrdersCreateRequest()
    {
        $client = TestHarness::client();
        $response = self::create($client);
        $this->assertEquals(201, $response->statusCode);
        $this->assertNotNull($response->result);

        $createdOrder = $response->result;
        $this->assertNotNull($createdOrder->id);
        $this->assertNotNull($createdOrder->purchase_units);
        $this->assertEquals(2, count($createdOrder->purchase_units));

        $firstPurchaseUnit = $createdOrder->purchase_units[0];
        $this->assertEquals("test_ref_id1", $firstPurchaseUnit->reference_id);
        $this->assertEquals("USD", $firstPurchaseUnit->amount->currency);
        $this->assertEquals("100.00", $firstPurchaseUnit->amount->total);
        $this->assertEquals("NOT_PROCESSED", $firstPurchaseUnit->status);

        $secondPurchaseUnit = $createdOrder->purchase_units[1];
        $this->assertEquals("test_ref_id2", $secondPurchaseUnit->reference_id);
        $this->assertEquals("USD", $secondPurchaseUnit->amount->currency);
        $this->assertEquals("50.00", $secondPurchaseUnit->amount->total);
        $this->assertEquals("NOT_PROCESSED", $secondPurchaseUnit->status);

        $this->assertEquals("https://example.com/return", $createdOrder->redirect_urls->return_url);
        $this->assertEquals("https://example.com/cancel", $createdOrder->redirect_urls->cancel_url);

        $this->assertNotNull($createdOrder->create_time);
        $this->assertNotNull($createdOrder->links);

        $foundApprovalUrl = false;

        foreach ($createdOrder->links as $link) {
            if ("approval_url" === $link->rel) {
                $foundApprovalUrl = true;
                $this->assertNotNull($link->href);
                $this->assertEquals("REDIRECT", $link->method);
            }
        }
        $this->assertTrue($foundApprovalUrl);

        $this->assertEquals("CREATED", $createdOrder->status);
    }
}
