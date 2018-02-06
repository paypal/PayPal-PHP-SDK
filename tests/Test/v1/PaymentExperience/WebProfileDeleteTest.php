<?php

namespace PayPal\Test\v1\PaymentExperience;

use PayPal\Test\TestHarness;
use PayPal\v1\PaymentExperience\WebProfileDeleteRequest;
use PHPUnit\Framework\TestCase;


class WebProfileDeleteTest extends TestCase
{

    public function testWebProfileDeleteRequest()
    {
        $createResponse = WebProfileCreateTest::create();

        $request = new WebProfileDeleteRequest($createResponse->result->id);

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(204, $response->statusCode);
    }
}
