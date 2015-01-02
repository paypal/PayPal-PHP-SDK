<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\PayoutBatchHeader;

/**
 * Class PayoutBatchHeader
 *
 * @package PayPal\Test\Api
 */
class PayoutBatchHeaderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object PayoutBatchHeader
     * @return string
     */
    public static function getJson()
    {
        return '{"payout_batch_id":"TestSample","batch_status":"TestSample","time_created":"TestSample","time_completed":"TestSample","sender_batch_header":' .PayoutSenderBatchHeaderTest::getJson() . ',"amount":' .CurrencyTest::getJson() . ',"fees":' .CurrencyTest::getJson() . ',"errors":' .ErrorTest::getJson() . ',"links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PayoutBatchHeader
     */
    public static function getObject()
    {
        return new PayoutBatchHeader(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PayoutBatchHeader
     */
    public function testSerializationDeserialization()
    {
        $obj = new PayoutBatchHeader(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getPayoutBatchId());
        $this->assertNotNull($obj->getBatchStatus());
        $this->assertNotNull($obj->getTimeCreated());
        $this->assertNotNull($obj->getTimeCompleted());
        $this->assertNotNull($obj->getSenderBatchHeader());
        $this->assertNotNull($obj->getAmount());
        $this->assertNotNull($obj->getFees());
        $this->assertNotNull($obj->getErrors());
        $this->assertNotNull($obj->getLinks());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PayoutBatchHeader $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getPayoutBatchId(), "TestSample");
        $this->assertEquals($obj->getBatchStatus(), "TestSample");
        $this->assertEquals($obj->getTimeCreated(), "TestSample");
        $this->assertEquals($obj->getTimeCompleted(), "TestSample");
        $this->assertEquals($obj->getSenderBatchHeader(), PayoutSenderBatchHeaderTest::getObject());
        $this->assertEquals($obj->getAmount(), CurrencyTest::getObject());
        $this->assertEquals($obj->getFees(), CurrencyTest::getObject());
        $this->assertEquals($obj->getErrors(), ErrorTest::getObject());
        $this->assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param PayoutBatchHeader $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getPayout_batch_id(), "TestSample");
        $this->assertEquals($obj->getBatch_status(), "TestSample");
        $this->assertEquals($obj->getTime_created(), "TestSample");
        $this->assertEquals($obj->getTime_completed(), "TestSample");
        $this->assertEquals($obj->getSender_batch_header(), PayoutSenderBatchHeaderTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param PayoutBatchHeader $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Payout_batch_id
        $obj->setPayoutBatchId(null);
        $this->assertNull($obj->getPayout_batch_id());
        $this->assertNull($obj->getPayoutBatchId());
        $this->assertSame($obj->getPayoutBatchId(), $obj->getPayout_batch_id());
        $obj->setPayout_batch_id("TestSample");
        $this->assertEquals($obj->getPayout_batch_id(), "TestSample");

        // Check for Batch_status
        $obj->setBatchStatus(null);
        $this->assertNull($obj->getBatch_status());
        $this->assertNull($obj->getBatchStatus());
        $this->assertSame($obj->getBatchStatus(), $obj->getBatch_status());
        $obj->setBatch_status("TestSample");
        $this->assertEquals($obj->getBatch_status(), "TestSample");

        // Check for Time_created
        $obj->setTimeCreated(null);
        $this->assertNull($obj->getTime_created());
        $this->assertNull($obj->getTimeCreated());
        $this->assertSame($obj->getTimeCreated(), $obj->getTime_created());
        $obj->setTime_created("TestSample");
        $this->assertEquals($obj->getTime_created(), "TestSample");

        // Check for Time_completed
        $obj->setTimeCompleted(null);
        $this->assertNull($obj->getTime_completed());
        $this->assertNull($obj->getTimeCompleted());
        $this->assertSame($obj->getTimeCompleted(), $obj->getTime_completed());
        $obj->setTime_completed("TestSample");
        $this->assertEquals($obj->getTime_completed(), "TestSample");

        // Check for Sender_batch_header
        $obj->setSenderBatchHeader(null);
        $this->assertNull($obj->getSender_batch_header());
        $this->assertNull($obj->getSenderBatchHeader());
        $this->assertSame($obj->getSenderBatchHeader(), $obj->getSender_batch_header());
        $obj->setSender_batch_header(PayoutSenderBatchHeaderTest::getObject());
        $this->assertEquals($obj->getSender_batch_header(), PayoutSenderBatchHeaderTest::getObject());

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
