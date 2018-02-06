<?php

namespace PayPal\Test\v1\Payments;

use BraintreeHttp\HttpException;
use PHPUnit\Framework\TestCase;
use PayPal\v1\Payments\PaymentExecuteRequest;
use PayPal\Test\TestHarness;

class PaymentExecuteTest extends TestCase
{
    private function buildRequestBody()
    {
        return [
          "payer_id" => 'some-payer-id'
        ];
    }

    public function testPaymentExecuteRequest()
    {
        $createResponse = PaymentCreateTest::create('order', 'paypal');

        $request = new PaymentExecuteRequest($createResponse->result->id);
        $request->body = $this->buildRequestBody();

        $client = TestHarness::client();
        try {
            $client->execute($request);
            $this->fail("This should have thrown an exception");
        } catch (HttpException $ex) {
            $this->assertTrue(strpos($ex->getMessage(), 'PAYMENT_NOT_APPROVED_FOR_EXECUTION') !== false);
        }
    }
}
