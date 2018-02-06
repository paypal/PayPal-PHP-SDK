<?php

namespace PayPal\Test\v1\Payments;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Payments\AuthorizationVoidRequest;
use PayPal\Test\TestHarness;

class AuthorizationVoidTest extends TestCase
{

    public function testAuthorizationVoidRequest()
    {
        $authorizationCreateResponse = PaymentCreateTest::create('authorize');
        $authId = $authorizationCreateResponse->result->transactions[0]->related_resources[0]->authorization->id;

        $request = new AuthorizationVoidRequest($authId);

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
