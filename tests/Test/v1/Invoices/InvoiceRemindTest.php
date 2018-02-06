<?php

namespace PayPal\Test\v1\Invoices;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Invoices\InvoiceRemindRequest;
use PayPal\Test\TestHarness;

class InvoiceRemindTest extends TestCase
{
    private function buildRequestBody()
    {
        return [
            "subject" => "Past Due",
            "note" => "please pay soon",
            "send_to_merchant" => true
        ];
    }

    public function testInvoiceRemindRequest()
    {
        $createResponse = InvoiceCreateTest::create();
        $invoiceId = $createResponse->result->id;

        InvoiceSendTest::send($invoiceId);

        $request = new InvoiceRemindRequest($invoiceId);
        $request->body = $this->buildRequestBody();

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(202, $response->statusCode);
    }
}
