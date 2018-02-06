<?php

namespace PayPal\Test\v1\PaymentExperience;

use PayPal\Test\TestHarness;
use PayPal\v1\PaymentExperience\WebProfileGetRequest;
use PayPal\v1\PaymentExperience\WebProfileUpdateRequest;
use PHPUnit\Framework\TestCase;

class WebProfileUpdateTest extends TestCase
{
    public function testWebProfileUpdateRequest()
    {
        $createResponse = WebProfileCreateTest::create();

        $webProfile = $createResponse->result;

        $webProfile->flow_config->bank_txn_pending_url = "https://updated.com/";

        $request = new WebProfileUpdateRequest($webProfile->id);
        $request->body = json_decode(json_encode($webProfile), true);

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(204, $response->statusCode);

        $getRequest = new WebProfileGetRequest($webProfile->id);

        $getResponse = $client->execute($getRequest);
        $this->assertEquals("https://updated.com/", $getResponse->result->flow_config->bank_txn_pending_url);
    }
}
