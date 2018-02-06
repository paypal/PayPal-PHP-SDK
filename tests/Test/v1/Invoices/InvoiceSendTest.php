<?php

namespace PayPal\Test\v1\Invoices;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Invoices\InvoiceSendRequest;
use PayPal\Test\TestHarness;

class InvoiceSendTest extends TestCase
{

    public static function send($id)
    {
        $request = new InvoiceSendRequest($id);
        $request->notifyMerchant(false);
        $client = TestHarness::client();
        return $client->execute($request);
    }

    public function testInvoiceSendRequest()
    {
        $createResponse = InvoiceCreateTest::create();
        $response = self::send($createResponse->result->id);
        $this->assertEquals(202, $response->statusCode);
    }
}
