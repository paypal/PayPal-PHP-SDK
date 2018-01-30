<?php

namespace PayPal\Test\v1\Invoices;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Invoices\InvoiceDeleteRequest;
use PayPal\Test\TestHarness;

class InvoiceDeleteTest extends TestCase
{

    public function testInvoiceDeleteRequest()
    {
        $createResponse = InvoiceCreateTest::create();
        $request = new InvoiceDeleteRequest($createResponse->result->id);
        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(204, $response->statusCode);
    }
}
