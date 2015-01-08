<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\PayoutItemDetails;

/**
 * Class PayoutItemDetails
 *
 * @package PayPal\Test\Api
 */
class PayoutItemDetailsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object PayoutItemDetails
     * @return string
     */
    public static function getJson()
    {
        return '{"payout_item_id":"TestSample","transaction_id":"TestSample","transaction_status":"TestSample","payout_item_fee":' .CurrencyTest::getJson() . ',"payout_batch_id":"TestSample","sender_batch_id":"TestSample","payout_item":' .PayoutItemTest::getJson() . ',"time_processed":"TestSample","errors":' .ErrorTest::getJson() . ',"links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PayoutItemDetails
     */
    public static function getObject()
    {
        return new PayoutItemDetails(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PayoutItemDetails
     */
    public function testSerializationDeserialization()
    {
        $obj = new PayoutItemDetails(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getPayoutItemId());
        $this->assertNotNull($obj->getTransactionId());
        $this->assertNotNull($obj->getTransactionStatus());
        $this->assertNotNull($obj->getPayoutItemFee());
        $this->assertNotNull($obj->getPayoutBatchId());
        $this->assertNotNull($obj->getSenderBatchId());
        $this->assertNotNull($obj->getPayoutItem());
        $this->assertNotNull($obj->getTimeProcessed());
        $this->assertNotNull($obj->getErrors());
        $this->assertNotNull($obj->getLinks());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PayoutItemDetails $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getPayoutItemId(), "TestSample");
        $this->assertEquals($obj->getTransactionId(), "TestSample");
        $this->assertEquals($obj->getTransactionStatus(), "TestSample");
        $this->assertEquals($obj->getPayoutItemFee(), CurrencyTest::getObject());
        $this->assertEquals($obj->getPayoutBatchId(), "TestSample");
        $this->assertEquals($obj->getSenderBatchId(), "TestSample");
        $this->assertEquals($obj->getPayoutItem(), PayoutItemTest::getObject());
        $this->assertEquals($obj->getTimeProcessed(), "TestSample");
        $this->assertEquals($obj->getErrors(), ErrorTest::getObject());
        $this->assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param PayoutItemDetails $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getPayout_item_id(), "TestSample");
        $this->assertEquals($obj->getTransaction_id(), "TestSample");
        $this->assertEquals($obj->getTransaction_status(), "TestSample");
        $this->assertEquals($obj->getPayout_item_fee(), CurrencyTest::getObject());
        $this->assertEquals($obj->getPayout_batch_id(), "TestSample");
        $this->assertEquals($obj->getSender_batch_id(), "TestSample");
        $this->assertEquals($obj->getPayout_item(), PayoutItemTest::getObject());
        $this->assertEquals($obj->getTime_processed(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param PayoutItemDetails $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Payout_item_id
        $obj->setPayoutItemId(null);
        $this->assertNull($obj->getPayout_item_id());
        $this->assertNull($obj->getPayoutItemId());
        $this->assertSame($obj->getPayoutItemId(), $obj->getPayout_item_id());
        $obj->setPayout_item_id("TestSample");
        $this->assertEquals($obj->getPayout_item_id(), "TestSample");

        // Check for Transaction_id
        $obj->setTransactionId(null);
        $this->assertNull($obj->getTransaction_id());
        $this->assertNull($obj->getTransactionId());
        $this->assertSame($obj->getTransactionId(), $obj->getTransaction_id());
        $obj->setTransaction_id("TestSample");
        $this->assertEquals($obj->getTransaction_id(), "TestSample");

        // Check for Transaction_status
        $obj->setTransactionStatus(null);
        $this->assertNull($obj->getTransaction_status());
        $this->assertNull($obj->getTransactionStatus());
        $this->assertSame($obj->getTransactionStatus(), $obj->getTransaction_status());
        $obj->setTransaction_status( "TestSample");
        $this->assertEquals($obj->getTransaction_status(), "TestSample");

        // Check for Payout_item_fee
        $obj->setPayoutItemFee(null);
        $this->assertNull($obj->getPayout_item_fee());
        $this->assertNull($obj->getPayoutItemFee());
        $this->assertSame($obj->getPayoutItemFee(), $obj->getPayout_item_fee());
        $obj->setPayout_item_fee(CurrencyTest::getObject());
        $this->assertEquals($obj->getPayout_item_fee(), CurrencyTest::getObject());

        // Check for Payout_batch_id
        $obj->setPayoutBatchId(null);
        $this->assertNull($obj->getPayout_batch_id());
        $this->assertNull($obj->getPayoutBatchId());
        $this->assertSame($obj->getPayoutBatchId(), $obj->getPayout_batch_id());
        $obj->setPayout_batch_id("TestSample");
        $this->assertEquals($obj->getPayout_batch_id(), "TestSample");

        // Check for Sender_batch_id
        $obj->setSenderBatchId(null);
        $this->assertNull($obj->getSender_batch_id());
        $this->assertNull($obj->getSenderBatchId());
        $this->assertSame($obj->getSenderBatchId(), $obj->getSender_batch_id());
        $obj->setSender_batch_id("TestSample");
        $this->assertEquals($obj->getSender_batch_id(), "TestSample");

        // Check for Payout_item
        $obj->setPayoutItem(null);
        $this->assertNull($obj->getPayout_item());
        $this->assertNull($obj->getPayoutItem());
        $this->assertSame($obj->getPayoutItem(), $obj->getPayout_item());
        $obj->setPayout_item(PayoutItemTest::getObject());
        $this->assertEquals($obj->getPayout_item(), PayoutItemTest::getObject());

        // Check for Time_processed
        $obj->setTimeProcessed(null);
        $this->assertNull($obj->getTime_processed());
        $this->assertNull($obj->getTimeProcessed());
        $this->assertSame($obj->getTimeProcessed(), $obj->getTime_processed());
        $obj->setTime_processed("TestSample");
        $this->assertEquals($obj->getTime_processed(), "TestSample");

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
