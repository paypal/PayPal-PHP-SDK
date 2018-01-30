<?php

namespace PayPal\Test\v1\PaymentExperience;

use PayPal\Test\TestHarness;
use PayPal\v1\PaymentExperience\WebProfileGetRequest;
use PHPUnit\Framework\TestCase;

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
    }
}
