<?php



namespace Test\PayPal\v1\CustomerDisputes;

use PHPUnit\Framework\TestCase;

use PayPal\v1\CustomerDisputes\DisputeGetRequest;
use PayPal\Test\TestHarness;


class DisputeGetTest extends TestCase
{

    public function testDisputeGetRequest()
    {
        $this->markTestSkipped("Requires a sandbox account with disputes enabled");

        $request = new DisputeGetRequest('PP-000-042-636-306');

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);

        $this->assertEquals("10.15", $response->result->disputed_transactions[0]->gross_amount->value);
        $this->assertEquals("USD", $response->result->disputed_transactions[0]->gross_amount->currency_code);
        $this->assertEquals("MERCHANDISE_OR_SERVICE_NOT_AS_DESCRIBED", $response->result->reason);
    }
}
