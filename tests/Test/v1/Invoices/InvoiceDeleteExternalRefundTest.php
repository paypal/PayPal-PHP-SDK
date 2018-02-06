<?php

namespace PayPal\Test\v1\Invoices;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Invoices\InvoiceDeleteExternalRefundRequest;
use PayPal\Test\TestHarness;

class InvoiceDeleteExternalRefundTest extends TestCase
{

    public function testInvoiceDeleteExternalRefundRequest()
    {
        $createResponse = InvoiceCreateTest::create();
        $invoiceId = $createResponse->result->id;

        InvoiceSendTest::send($invoiceId);
        InvoiceRecordPaymentTest::record($invoiceId);
        InvoiceRecordRefundTest::refund($invoiceId);
        $getResponse = InvoiceGetTest::get($invoiceId);

        $request = new InvoiceDeleteExternalRefundRequest($invoiceId, $getResponse->result->refunds[0]->transaction_id);
        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(204, $response->statusCode);
    }
}
