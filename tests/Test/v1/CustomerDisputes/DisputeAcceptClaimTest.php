<?php



namespace Test\PayPal\v1\CustomerDisputes;

use PHPUnit\Framework\TestCase;

use PayPal\v1\CustomerDisputes\DisputeAcceptClaimRequest;
use PayPal\Test\TestHarness;


class DisputeAcceptClaimTest extends TestCase
{

    public function testDisputeAcceptClaimRequest()
    {
        $this->markTestSkipped("Requires a dispute in the right state");

        $request = new DisputeAcceptClaimRequest('PP-000-042-635-209');
        $request->body = [
            "note" => "Accepting claim",
            "accept_claim_reason" => "DID_NOT_SHIP_ITEM"
        ];

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
