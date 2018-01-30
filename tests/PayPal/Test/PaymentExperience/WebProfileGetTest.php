<?php

namespace Test\PayPal\PaymentExperience;

use PayPal\Test\PaymentExperience\WebProfileCreateTest;
use PayPal\Test\TestHarness;
use PHPUnit\Framework\TestCase;
use PayPal\PaymentExperience\WebProfileGetRequest;

class WebProfileGetTest extends TestCase
{

    public static function get()
    {
        $createResponse = WebProfileCreateTest::create();

        /** @var \stdClass $webProfile */
        $webProfile = $createResponse->result;
        $request = new WebProfileGetRequest($webProfile->id);

        $client = TestHarness::client();
        return $client->execute($request);
    }

    public function testWebProfileGetRequest()
    {
        $getResponse = self::get();
        $this->assertEquals(200, $getResponse->statusCode);
        $this->assertNotNull($getResponse->result);

        // Add your own checks here
    }
}
