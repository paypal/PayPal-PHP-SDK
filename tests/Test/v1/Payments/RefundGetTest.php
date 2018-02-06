<?php

namespace PayPal\Test\v1\Payments;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Payments\RefundGetRequest;
use PayPal\Test\TestHarness;

class RefundGetTest extends TestCase
{

    public function testRefundGetRequest()
    {
        $createResponse = PaymentCreateTest::create('sale');
        $saleId = $createResponse->result->transactions[0]->related_resources[0]->sale->id;

        $saleRefundResponse = SaleRefundTest::saleRefund($saleId);

        $request = new RefundGetRequest($saleRefundResponse->result->id);

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
