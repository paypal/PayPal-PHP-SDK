<?php

namespace PayPal\Test\v1\Payments;

use BraintreeHttp\HttpException;
use PHPUnit\Framework\TestCase;
use PayPal\v1\Payments\AuthorizationReauthorizeRequest;
use PayPal\Test\TestHarness;

class AuthorizationReauthorizeTest extends TestCase
{
    private function buildRequestBody()
    {
        return [
            "amount" => [
                "total" => "10",
                "currency" => "USD"
            ]
        ];
    }

    public function testAuthorizationReauthorizeRequest()
    {
        $authorizationCreateResponse = PaymentCreateTest::create('authorize');
        $authId = $authorizationCreateResponse->result->transactions[0]->related_resources[0]->authorization->id;

        $request = new AuthorizationReauthorizeRequest($authId);
        $request->body = $this->buildRequestBody();

        $client = TestHarness::client();
        try {
            $client->execute($request);
            $this->fail("This should have thrown an exception");
        } catch (HttpException $ex) {
            $this->assertTrue(strpos($ex->getMessage(), 'DCC_REAUTHORIZATION_NOT_ALLOWED') !== false);
        }
    }
}
