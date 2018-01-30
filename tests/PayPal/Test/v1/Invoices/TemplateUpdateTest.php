<?php

namespace PayPal\Test\v1\Invoices;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Invoices\TemplateUpdateRequest;
use PayPal\Test\TestHarness;

class TemplateUpdateTest extends TestCase
{
    private function buildRequestBody()
    {
        return [
        "name" => "Test Template_" . uniqid(),
		"default" => true,
		"unit_of_measure" => "HOURS",
		"template_data" => [
            "items" => [
                [
                    "name" => "Nutri Bullet",
                    "quantity" => 2,
                    "unit_price" => [
                        "currency" => "USD",
                        "value" => "50.00"
                    ]
			    ]
			],
			"merchant_info" => [
                "email" => "team-dx-clients-facilitator@getbraintree.com"
			],
			"tax_calculated_after_discount" => false,
			"tax_inclusive" => false,
			"note" => "Thank you for your business.",
			"logo_url" => "https://pics.paypal.com/v1/images/blueDot.jpeg"
		],
		"settings" => [
			[
                "field_name" => "items.date",
				"display_preference" => [
                "hidden" => true
				]
			],
			[
                "field_name" => "custom",
				"display_preference" => [
                "hidden" => true
				]
			]
		]
	];
    }

    public function testTemplateUpdateRequest()
    {
        $createResponse = TemplateCreateTest::create();

        $request = new TemplateUpdateRequest($createResponse->result->template_id);
        $request->body = $this->buildRequestBody();

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
        $this->assertEquals("https://pics.paypal.com/v1/images/blueDot.jpeg", $response->result->template_data->logo_url);
    }
}
