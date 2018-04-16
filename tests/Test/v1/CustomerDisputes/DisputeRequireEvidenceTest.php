<?php



namespace Test\PayPal\v1\CustomerDisputes;

use PHPUnit\Framework\TestCase;

use PayPal\v1\CustomerDisputes\DisputeRequireEvidenceRequest;
use PayPal\Test\TestHarness;


class DisputeRequireEvidenceTest extends TestCase
{

    public function testDisputeRequireEvidenceRequest()
    {
        $this->markTestSkipped("Requires a dispute in the right state");

        $request = new DisputeRequireEvidenceRequest('PP-000-042-635-209');
        $request->body = [
            "action" => "SELLER_EVIDENCE"
        ];

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
