<?php

namespace Test\PayPal\PaymentExperience;

use PayPal\PaymentExperience\WebProfileGetRequest;
use PayPal\Test\PaymentExperience\WebProfileCreateTest;
use PayPal\Test\TestHarness;
use PHPUnit\Framework\TestCase;
use PayPal\PaymentExperience\WebProfilePartialUpdateRequest;


class WebProfilePartialUpdateTest extends TestCase
{
    private function buildRequestBody()
    {
        return json_decode('[ { "op": "add", "path": "/presentation/brand_name", "value": "new_brand_name" }, { "op": "remove", "path": "/flow_config/landing_page_type" } ]', true);
    }

    public function testWebProfilePartialUpdateRequest()
    {
        $createResponse = WebProfileCreateTest::create();
        $webProfile = $createResponse->result;

        $request = new WebProfilePartialUpdateRequest($webProfile->id);
        $request->body = $this->buildRequestBody();

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(204, $response->statusCode);

        $getRequest = new WebProfileGetRequest($webProfile->id);

        $getResponse = $client->execute($getRequest);
        $this->assertEquals("new_brand_name", $getResponse->result->presentation->brand_name);
    }
}
