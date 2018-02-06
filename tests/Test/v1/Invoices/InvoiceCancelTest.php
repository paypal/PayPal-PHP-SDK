<?php

namespace PayPal\Test\v1\Invoices;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Invoices\InvoiceCancelRequest;
use PayPal\Test\TestHarness;

class InvoiceCancelTest extends TestCase
{
    private function buildRequestBody()
    {
        return [
            "subject" => "Past Due",
            "note" => "Nevermind!",
            "send_to_merchant" => true,
            "send_to_payer" => true,
        ];
    }

    public function testInvoiceCancelRequest()
    {
        $createResponse = InvoiceCreateTest::create();
        $sentResponse = InvoiceSendTest::send($createResponse->result->id);
        $this->assertEquals(202, $sentResponse->statusCode);

        $request = new InvoiceCancelRequest($createResponse->result->id);
        $request->body = $this->buildRequestBody();

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(204, $response->statusCode);
    }
}
