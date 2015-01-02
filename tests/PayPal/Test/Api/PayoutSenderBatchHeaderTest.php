<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\PayoutSenderBatchHeader;

/**
 * Class PayoutSenderBatchHeader
 *
 * @package PayPal\Test\Api
 */
class PayoutSenderBatchHeaderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object PayoutSenderBatchHeader
     * @return string
     */
    public static function getJson()
    {
        return '{"sender_batch_id":"TestSample","email_subject":"TestSample","recipient_type":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PayoutSenderBatchHeader
     */
    public static function getObject()
    {
        return new PayoutSenderBatchHeader(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PayoutSenderBatchHeader
     */
    public function testSerializationDeserialization()
    {
        $obj = new PayoutSenderBatchHeader(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getSenderBatchId());
        $this->assertNotNull($obj->getEmailSubject());
        $this->assertNotNull($obj->getRecipientType());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PayoutSenderBatchHeader $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getSenderBatchId(), "TestSample");
        $this->assertEquals($obj->getEmailSubject(), "TestSample");
        $this->assertEquals($obj->getRecipientType(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param PayoutSenderBatchHeader $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getSender_batch_id(), "TestSample");
        $this->assertEquals($obj->getEmail_subject(), "TestSample");
        $this->assertEquals($obj->getRecipient_type(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param PayoutSenderBatchHeader $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Sender_batch_id
        $obj->setSenderBatchId(null);
        $this->assertNull($obj->getSender_batch_id());
        $this->assertNull($obj->getSenderBatchId());
        $this->assertSame($obj->getSenderBatchId(), $obj->getSender_batch_id());
        $obj->setSender_batch_id("TestSample");
        $this->assertEquals($obj->getSender_batch_id(), "TestSample");

        // Check for Email_subject
        $obj->setEmailSubject(null);
        $this->assertNull($obj->getEmail_subject());
        $this->assertNull($obj->getEmailSubject());
        $this->assertSame($obj->getEmailSubject(), $obj->getEmail_subject());
        $obj->setEmail_subject("TestSample");
        $this->assertEquals($obj->getEmail_subject(), "TestSample");

        // Check for Recipient_type
        $obj->setRecipientType(null);
        $this->assertNull($obj->getRecipient_type());
        $this->assertNull($obj->getRecipientType());
        $this->assertSame($obj->getRecipientType(), $obj->getRecipient_type());
        $obj->setRecipient_type("TestSample");
        $this->assertEquals($obj->getRecipient_type(), "TestSample");

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
