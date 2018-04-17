<?php



namespace Test\PayPal\v1\CustomerDisputes;

use PHPUnit\Framework\TestCase;

use BraintreeHttp\Serializer\FormPart;
use PayPal\v1\CustomerDisputes\DisputeProvideEvidenceRequest;
use PayPal\Test\TestHarness;


class DisputeProvideEvidenceTest extends TestCase
{

    public function testDisputeProvideEvidenceRequest()
    {
        $this->markTestSkipped("Requires a dispute in the right state");

        $request = new DisputeProvideEvidenceRequest('PP-000-042-636-207');

        $body = [];
        $file = fopen(dirname(__DIR__) . '/CustomerDisputes/test_image.png', 'rb');
        $body["input"] = new FormPart([
            "evidence_type" => "OTHER",
            "notes" => "Notes"
        ], [
            "Content-Type" => "application/json"
        ]);
        $body["file1"] = $file;

        $request->body = $body;

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
