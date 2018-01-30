<?php

namespace PayPal\Test\v1\Invoices;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Invoices\InvoiceUpdateRequest;
use PayPal\Test\TestHarness;

class InvoiceUpdateTest extends TestCase
{
    private function buildRequestBody()
    {
        return [
            "merchant_info" => [
                "email" => "team-dx-clients-facilitator@getbraintree.com"
            ],
            "terms" => "Consider this invoice updated."
        ];
    }

    public function testInvoiceUpdateRequest()
    {
        $createResponse = InvoiceCreateTest::create();

        $request = new InvoiceUpdateRequest($createResponse->result->id);
        $request->notifyMerchant(false);
        $request->body = $this->buildRequestBody();

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
