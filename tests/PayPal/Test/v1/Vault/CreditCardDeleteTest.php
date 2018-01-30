<?php

namespace PayPal\Test\v1\Vault;

use PayPal\Test\TestHarness;
use PHPUnit\Framework\TestCase;

use PayPal\v1\Vault\CreditCardDeleteRequest;


class CreditCardDeleteTest extends TestCase
{

    public function testCreditCardDeleteRequest()
    {
        $createResponse = CreditCardCreateTest::create();

        $request = new CreditCardDeleteRequest($createResponse->result->id);

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(204, $response->statusCode);
    }
}
