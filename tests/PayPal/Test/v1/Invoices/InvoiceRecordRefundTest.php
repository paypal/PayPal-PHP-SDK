<?php

namespace PayPal\Test\v1\Invoices;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Invoices\InvoiceRecordRefundRequest;
use PayPal\Test\TestHarness;

class InvoiceRecordRefundTest extends TestCase
{
    private static function buildRequestBody()
    {
        return [
            "amount" => [
                "value" => "10",
                "currency" => "USD"
            ]
        ];
    }

    public static function refund($id)
    {
        $request = new InvoiceRecordRefundRequest($id);
        $request->body = self::buildRequestBody();

        $client = TestHarness::client();
        return $client->execute($request);
    }

    public function testInvoiceRecordRefundRequest()
    {
        $createResponse = InvoiceCreateTest::create();
        $invoiceId = $createResponse->result->id;

        InvoiceSendTest::send($invoiceId);

        InvoiceRecordPaymentTest::record($invoiceId);

        $response = self::refund($invoiceId);
        $this->assertEquals(204, $response->statusCode);
    }
}
