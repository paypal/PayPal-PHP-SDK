<?php

namespace PayPal\Test\v1\Vault;

use PayPal\Test\TestHarness;
use PHPUnit\Framework\TestCase;

use PayPal\v1\Vault\CreditCardListRequest;

class CreditCardListTest extends TestCase
{
    public function testCreditCardListRequest()
    {
        $request = new CreditCardListRequest();
        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
