<?php

namespace PayPal\Test\v1\Invoices;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Invoices\InvoiceGetRequest;
use PayPal\Test\TestHarness;

class InvoiceGetTest extends TestCase
{

    public static function get($id)
    {
        $request = new InvoiceGetRequest($id);
        $client = TestHarness::client();
        return $client->execute($request);
    }

    public function testInvoiceGetRequest()
    {
        $createResponse = InvoiceCreateTest::create();
        $response = self::get($createResponse->result->id);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
