<?php

namespace PayPal\Test\v1\Payments;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Payments\CaptureGetRequest;
use PayPal\Test\TestHarness;

class CaptureGetTest extends TestCase
{

    public function testCaptureGetRequest()
    {
        $authorizationCreateResponse = PaymentCreateTest::create('authorize');
        $authId = $authorizationCreateResponse->result->transactions[0]->related_resources[0]->authorization->id;

        $authorizationCaptureResponse = AuthorizationCaptureTest::capture($authId);
        $request = new CaptureGetRequest($authorizationCaptureResponse->result->id);

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
