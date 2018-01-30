<?php

namespace PayPal\Test\v1\Invoices;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Invoices\InvoiceRecordPaymentRequest;
use PayPal\Test\TestHarness;

class InvoiceRecordPaymentTest extends TestCase
{
    private static function buildRequestBody()
    {
        return [
            "method" => "CASH",
            "date" => "2017-07-11 00:01:00 PST",
            "amount" => [
                "value" => "10",
                "currency" => "USD"
            ]
        ];
    }

    public static function record($id)
    {
        $request = new InvoiceRecordPaymentRequest($id);
        $request->body = self::buildRequestBody();

        $client = TestHarness::client();
        return $client->execute($request);
    }

    public function testInvoiceRecordPaymentRequest()
    {
        $createResponse = InvoiceCreateTest::create();
        $invoiceId = $createResponse->result->id;

        InvoiceSendTest::send($invoiceId);

        $response = self::record($invoiceId);

        $this->assertEquals(204, $response->statusCode);
    }
}
