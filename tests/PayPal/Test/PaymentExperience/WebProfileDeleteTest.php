<?php

namespace Test\PayPal\PaymentExperience;

use PayPal\Test\PaymentExperience\WebProfileCreateTest;
use PayPal\Test\TestHarness;
use PHPUnit\Framework\TestCase;
use PayPal\PaymentExperience\WebProfileDeleteRequest;


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
