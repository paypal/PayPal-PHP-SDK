<?php

namespace PayPal\Test\v1\Invoices;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Invoices\InvoiceSearchRequest;
use PayPal\Test\TestHarness;

class InvoiceSearchTest extends TestCase
{
    private function buildRequestBody()
    {
        return [
            "number" => "number"
        ];
    }

    public function testInvoiceSearchRequest()
    {
        InvoiceCreateTest::create();

        $request = new InvoiceSearchRequest();
        $request->body = $this->buildRequestBody();

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
