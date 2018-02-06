<?php

namespace PayPal\Test\v1\Invoices;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Invoices\TemplateListRequest;
use PayPal\Test\TestHarness;

class TemplateListTest extends TestCase
{

    public function testTemplateListRequest()
    {
        $request = new TemplateListRequest();
        $request->fields('all');

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }
}
