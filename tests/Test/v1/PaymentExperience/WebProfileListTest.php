<?php

namespace PayPal\Test\v1\PaymentExperience;

use PayPal\Test\TestHarness;
use PayPal\v1\PaymentExperience\WebProfileListRequest;
use PHPUnit\Framework\TestCase;


class WebProfileListTest extends TestCase
{

    public function testWebProfileListRequest()
    {
        $request = new WebProfileListRequest();

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
        $this->assertTrue(is_array($response->result));
    }
}
