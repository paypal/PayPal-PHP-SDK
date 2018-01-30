<?php

namespace PayPal\Test\v1\Invoices;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Invoices\InvoiceDeleteExternalPaymentRequest;
use PayPal\Test\TestHarness;

class InvoiceDeleteExternalPaymentTest extends TestCase
{

    public function testInvoiceDeleteExternalPaymentRequest()
    {
        $createResponse = InvoiceCreateTest::create();
        $invoiceId = $createResponse->result->id;

        InvoiceSendTest::send($invoiceId);
        InvoiceRecordPaymentTest::record($invoiceId);

        $getResponse = InvoiceGetTest::get($invoiceId);

        $request = new InvoiceDeleteExternalPaymentRequest($invoiceId, $getResponse->result->payments[0]->transaction_id);
        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(204, $response->statusCode);
    }
}
