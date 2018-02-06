<?php

namespace PayPal\Test\v1\Vault;

use PayPal\Test\TestHarness;
use PHPUnit\Framework\TestCase;
use PayPal\v1\Vault\CreditCardCreateRequest;


class CreditCardCreateTest extends TestCase
{
    private static function buildRequestBody()
    {
        return [
            "number" => "4417119669820331",
            "type" => "visa",
            "expire_month" => 11,
            "expire_year" => 2055,
            "first_name" => "Joe",
            "last_name" => "Shopper",
            "billing_address" => [
                "line1" => "52 N Main St.",
                "city" => "Johnstown",
                "country_code" => "US",
                "postal_code" => "43210",
                "state" => "OH",
                "phone" => "408-334-8890"
            ]
        ];
    }

    public static function create() {
        $request = new CreditCardCreateRequest();
        $request->body = self::buildRequestBody();

        $client = TestHarness::client();
        return $client->execute($request);
    }


    public function testCreditCardCreateRequest()
    {
        $response = $this->create();

        $this->assertEquals(201, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
