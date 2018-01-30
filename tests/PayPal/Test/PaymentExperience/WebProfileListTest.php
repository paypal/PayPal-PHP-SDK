<?php

namespace Test\PayPal\PaymentExperience;

use PayPal\Test\TestHarness;
use PHPUnit\Framework\TestCase;
use PayPal\PaymentExperience\WebProfileListRequest;


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
