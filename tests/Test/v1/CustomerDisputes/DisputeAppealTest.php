<?php



namespace Test\PayPal\v1\CustomerDisputes;

use PHPUnit\Framework\TestCase;

use BraintreeHttp\Serializer\FormPart;
use PayPal\v1\CustomerDisputes\DisputeAppealRequest;
use PayPal\Test\TestHarness;


class DisputeAppealTest extends TestCase
{

    public function testDisputeAppealRequest()
    {
        $this->markTestSkipped("Requires a dispute in the right state");

        $request = new DisputeAppealRequest('PP-000-042-635-183');

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
