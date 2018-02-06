<?php

namespace PayPal\Test\v1\Payments;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Payments\PaymentCreateRequest;
use PayPal\Test\TestHarness;

class PaymentCreateTest extends TestCase
{
    private static function buildRequestBody($intent, $paymentMethod = null, $invoiceNumber = null)
    {
        $body = [
            "intent" => $intent,
            "transactions" => [[
                "amount" => [
                    "total" => "10",
                    "currency" => "USD"
                ]
            ]],
            "redirect_urls" => [
                "cancel_url" => "http://paypal.com/cancel",
                "return_url" => "http://paypal.com/return"
            ]
        ];

        if ($invoiceNumber) {
            $body->transactions[0]->invoice_number = $invoiceNumber;
        }

        if ($paymentMethod == null || $paymentMethod == "credit_card") {
            $body['payer'] = [
                "payment_method" => "credit_card",
                "funding_instruments" => [
                    [
                        "credit_card" => [
                            "billing_address" => [
                                "line1" => "123 Townsend st",
                                "line2" => "Suite 600",
                                "city" => "San Francisco",
                                "state" => "CA",
                                "country_code" => "US",
                                "postal_code" => "94117"
                            ],
                            "cvv2" => "617",
                            "expire_month" => 1,
                            "expire_year" => 2020,
                            "first_name" => "Joe",
                            "last_name" => "shopper",
                            "type" => "visa",
                            "number" => "4422009910903049"
                        ]
                    ]
                ]
            ];
        } else {
            $body['payer'] = [
                "payment_method" => "paypal"
            ];
        }
        return $body;
    }

    public static function create($intent, $paymentMethod = null, $invoiceNumber = null) {
        $request = new PaymentCreateRequest();
        $request->body = self::buildRequestBody($intent, $paymentMethod, $invoiceNumber);

        $client = TestHarness::client();
        return $client->execute($request);
    }


    public function testPaymentCreateRequest()
    {
        $response = $this->create("sale");

        $this->assertEquals(201, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
