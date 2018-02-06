<?php

namespace PayPal\Test\v1\Invoices;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Invoices\InvoiceQrCodeRequest;
use PayPal\Test\TestHarness;

class InvoiceQrCodeTest extends TestCase
{

    public function testInvoiceQrCodeRequest()
    {
        $createResponse = InvoiceCreateTest::create();

        $request = new InvoiceQrCodeRequest($createResponse->result->id);
        $request->height(5);
        $request->width(6);

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
