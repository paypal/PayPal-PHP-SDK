<?php

namespace PayPal\Test\v1\Invoices;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Invoices\TemplateCreateRequest;
use PayPal\Test\TestHarness;

class TemplateCreateTest extends TestCase
{
    private static function buildRequestBody()
    {
        return [
            "name" => "Test Template" . uniqid(),
            "default" => true,
            "unit_of_measure" => "Hours",
            "template_data" => [
                "items" => [
                    [
                        "name" => "Nutri Bullet",
                        "quantity" => 1,
                        "unit_price" => [
                            "currency" => "USD",
                            "value" => "50.00"
                        ]
                    ]
                ],
                "merchant_info" => [
                    "email" => "team-dx-clients-facilitator@getbraintree.com",
                ],
                "tax_calculated_after_discount" => false,
                "tax_inclusive" => false,
                "note" => "Thank you for your business.",
                "logo_url" => "https://pics.paypal.com/v1/images/redDot.jpeg",
                "allow_tip" => true
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

    public static function create()
    {
        $request = new TemplateCreateRequest();
        $request->body = self::buildRequestBody();

        $client = TestHarness::client();
        return $client->execute($request);
    }

    public function testTemplateCreateRequest()
    {
        $response = self::create();
        $this->assertEquals(201, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
