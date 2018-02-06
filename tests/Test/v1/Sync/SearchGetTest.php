<?php

namespace PayPal\Test\v1\Sync;

use PayPal\Test\TestHarness;
use PayPal\v1\Sync\SearchGetRequest;
use PHPUnit\Framework\TestCase;

class SearchGetTest extends TestCase
{
    public function testRetrieveSpecificTransaction() {
        $transactionId = '4LJ583775B2362642';
        $request = new SearchGetRequest();
        $request->transactionId($transactionId);

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);

        $this->assertNotNull($response->result->transaction_details);
        $this->assertEquals(1, $response->result->total_items);
        $this->assertEquals(1, count($response->result->transaction_details));

        $transactionDetails = $response->result->transaction_details[0];
        $this->assertNotNull($transactionDetails);

        $transactionInfo = $transactionDetails->transaction_info;
        $this->assertNotNull($transactionInfo);
        $this->assertEquals($transactionId, $transactionInfo->transaction_id);
        $this->assertEquals("USD", $transactionInfo->transaction_amount->currency_code);
        $this->assertEquals("10.00", $transactionInfo->transaction_amount->value);
    }

    public function testRetrieveRangeOfTransactions() {
        $request = new SearchGetRequest();
        $request->startDate("2018-01-22T00:00:00+00:00");
        $request->endDate("2018-01-23T00:00:00+00:00");

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);

        $this->assertNotNull($response->result->transaction_details);
        $this->assertEquals(77, $response->result->total_items);

        $transactionDetails = $response->result->transaction_details;
        $this->assertNotNull($transactionDetails);
        $this->assertNotNull(77, count($transactionDetails));
    }
}
