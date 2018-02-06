<?php

namespace PayPal\Test\v1\Payments;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Payments\SaleRefundRequest;
use PayPal\Test\TestHarness;

class SaleRefundTest extends TestCase
{
    private static function buildRequestBody()
    {
        return [
            "amount" => [
                "total" => "2.34",
                "currency" => "USD"
            ]
        ];
    }

    public static function saleRefund($saleId)
    {
        $request = new SaleRefundRequest($saleId);
        $request->body = self::buildRequestBody();

        $client = TestHarness::client();
        return $client->execute($request);
    }

    public function testSaleRefundRequest()
    {
        $createResponse = PaymentCreateTest::create('sale');

        $request = new SaleRefundRequest($createResponse->result->transactions[0]->related_resources[0]->sale->id);
        $request->body = $this->buildRequestBody();

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(201, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
