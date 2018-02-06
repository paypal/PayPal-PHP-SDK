<?php

namespace PayPal\Test\v1\Vault;

use PayPal\Test\TestHarness;
use PHPUnit\Framework\TestCase;

use PayPal\v1\Vault\CreditCardGetRequest;


class CreditCardGetTest extends TestCase
{
    public static function get()
    {
        $createResponse = CreditCardCreateTest::create();

        /** @var \stdClass $creditCard */
        $creditCard = $createResponse->result;
        $request = new CreditCardGetRequest($creditCard->id);

        $client = TestHarness::client();
        return $client->execute($request);
    }

    public function testCreditCardGetRequest()
    {
        $getResponse = self::get();

        $this->assertEquals(200, $getResponse->statusCode);
        $this->assertNotNull($getResponse->result);
    }
}
