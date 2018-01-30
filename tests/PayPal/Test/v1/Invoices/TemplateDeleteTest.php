<?php

namespace PayPal\Test\v1\Invoices;

use PHPUnit\Framework\TestCase;
use PayPal\v1\Invoices\TemplateDeleteRequest;
use PayPal\Test\TestHarness;

class TemplateDeleteTest extends TestCase
{

    public function testTemplateDeleteRequest()
    {
        $createResponse = TemplateCreateTest::create();

        $request = new TemplateDeleteRequest($createResponse->result->template_id);

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(204, $response->statusCode);
    }
}
