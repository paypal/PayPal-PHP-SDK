<?php

namespace PayPal\Test\v1\Vault;

use PayPal\Test\TestHarness;
use PHPUnit\Framework\TestCase;

use PayPal\v1\Vault\CreditCardUpdateRequest;

class CreditCardUpdateTest extends TestCase
{
    private function buildRequestBody()
    {
        return [
            [ "op" => "add", "path" => "/billing_address/line1", "value" => "53 N Main St." ]
        ];
    }

    public function testCreditCardUpdateRequest()
    {
        $createResponse = CreditCardCreateTest::create();

        $request = new CreditCardUpdateRequest($createResponse->result->id);
        $request->body = $this->buildRequestBody();

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
