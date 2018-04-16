<?php



namespace Test\PayPal\v1\CustomerDisputes;

use PHPUnit\Framework\TestCase;

use PayPal\v1\CustomerDisputes\DisputeListRequest;
use PayPal\Test\TestHarness;


class DisputeListTest extends TestCase
{

    public function testDisputeListRequest()
    {
        $this->markTestSkipped("Requires a sandbox account with disputes enabled");

        $request = new DisputeListRequest();

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
        $this->assertTrue(count($response->result->items) > 0);
    }
}
