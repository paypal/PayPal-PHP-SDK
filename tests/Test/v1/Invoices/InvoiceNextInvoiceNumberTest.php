<?php

namespace PayPal\Test\v1\Invoices;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Invoices\InvoiceNextInvoiceNumberRequest;
use PayPal\Test\TestHarness;

class InvoiceNextInvoiceNumberTest extends TestCase
{

    public function testInvoiceNextInvoiceNumberRequest()
    {
        $request = new InvoiceNextInvoiceNumberRequest();

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
