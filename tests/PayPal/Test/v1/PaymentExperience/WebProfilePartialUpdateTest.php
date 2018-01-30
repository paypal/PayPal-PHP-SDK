<?php

namespace PayPal\Test\v1\PaymentExperience;

use PayPal\Test\TestHarness;
use PayPal\v1\PaymentExperience\WebProfileGetRequest;
use PayPal\v1\PaymentExperience\WebProfilePartialUpdateRequest;
use PHPUnit\Framework\TestCase;

class WebProfilePartialUpdateTest extends TestCase
{
    private function buildRequestBody()
    {
        return [
            [ "op" => "add", "path" => "/presentation/brand_name", "value" => "new_brand_name" ],
            [ "op" => "remove", "path" => "/flow_config/landing_page_type" ]
        ];
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
