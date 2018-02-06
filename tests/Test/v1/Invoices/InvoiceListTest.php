<?php

namespace PayPal\Test\v1\Invoices;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Invoices\InvoiceListRequest;
use PayPal\Test\TestHarness;

class InvoiceListTest extends TestCase
{

    public function testInvoiceListRequest()
    {
        $request = new InvoiceListRequest();
        $request->page(3);
        $request->pageSize(7);
        $request->totalCountRequired(false);

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
