<?php



namespace Test\PayPal\v1\CustomerDisputes;

use PHPUnit\Framework\TestCase;

use PayPal\v1\CustomerDisputes\DisputeAdjudicateRequest;
use PayPal\Test\TestHarness;


class DisputeAdjudicateTest extends TestCase
{

    public function testDisputeAdjudicateRequest()
    {
        $this->markTestSkipped("Requires a dispute in the right state");

        $request = new DisputeAdjudicateRequest('PP-000-042-635-209');
        $request->body = [
            "adjudication_outcome" => "BUYER_FAVOR"
        ];

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
