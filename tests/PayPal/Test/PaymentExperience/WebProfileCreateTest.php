<?php

namespace PayPal\Test\PaymentExperience;

use PayPal\Test\TestHarness;
use PHPUnit\Framework\TestCase;
use PayPal\PaymentExperience\WebProfileCreateRequest;


class WebProfileCreateTest extends TestCase
{
    private static function buildRequestBody()
    {
        return json_decode('{ "name": "' . uniqid() . '", "flow_config": { "landing_page_type": "Billing", "bank_txn_pending_url": "http://www.yeowza.com/", "user_action": "commit", "return_uri_http_method": "GET" }, "presentation": { "logo_image": "http://www.yeowza.com/favico.ico", "brand_name": "YeowZa! Paypal", "locale_code": "US", "return_url_label": "Return", "note_to_seller_label": "Thanks!" }, "input_fields": { "allow_note": true, "no_shipping": 1, "address_override": 0 }, "temporary": true }', true);
    }

    public static function create() {
        $request = new WebProfileCreateRequest();
        $request->body = self::buildRequestBody();

        $client = TestHarness::client();
        return $client->execute($request);
    }

    public function testWebProfileCreateRequest()
    {
        $response = $this->create();
        $this->assertEquals(201, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
