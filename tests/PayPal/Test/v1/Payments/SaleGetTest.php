<?php

namespace PayPal\Test\v1\Payments;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Payments\SaleGetRequest;
use PayPal\Test\TestHarness;

class SaleGetTest extends TestCase
{

    public function testSaleGetRequest()
    {
        $createResponse = PaymentCreateTest::create('sale');

        $request = new SaleGetRequest($createResponse->result->transactions[0]->related_resources[0]->sale->id );
        $client = TestHarness::client();
        $response = $client->execute($request);

        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
