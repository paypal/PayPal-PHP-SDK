<?php

namespace PayPal\Test\v1\Invoices;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Invoices\TemplateGetRequest;
use PayPal\Test\TestHarness;

class TemplateGetTest extends TestCase
{

    public function testTemplateGetRequest()
    {
        $createResponse = TemplateCreateTest::create();

        $request = new TemplateGetRequest($createResponse->result->template_id);

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
        $this->assertEquals($createResponse->result->template_id, $response->result->template_id);
    }
}
