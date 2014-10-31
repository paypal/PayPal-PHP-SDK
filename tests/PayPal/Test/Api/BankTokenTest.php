<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\BankToken;

/**
 * Class BankToken
 *
 * @package PayPal\Test\Api
 */
class BankTokenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object BankToken
     * @return string
     */
    public static function getJson()
    {
        return '{"bank_id":"TestSample","external_customer_id":"TestSample","mandate_reference_number":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return BankToken
     */
    public static function getObject()
    {
        return new BankToken(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return BankToken
     */
    public function testSerializationDeserialization()
    {
        $obj = new BankToken(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getBankId());
        $this->assertNotNull($obj->getExternalCustomerId());
        $this->assertNotNull($obj->getMandateReferenceNumber());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param BankToken $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getBankId(), "TestSample");
        $this->assertEquals($obj->getExternalCustomerId(), "TestSample");
        $this->assertEquals($obj->getMandateReferenceNumber(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param BankToken $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getBank_id(), "TestSample");
        $this->assertEquals($obj->getExternal_customer_id(), "TestSample");
        $this->assertEquals($obj->getMandate_reference_number(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param BankToken $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Bank_id
        $obj->setBankId(null);
        $this->assertNull($obj->getBank_id());
        $this->assertNull($obj->getBankId());
        $this->assertSame($obj->getBankId(), $obj->getBank_id());
        $obj->setBank_id("TestSample");
        $this->assertEquals($obj->getBank_id(), "TestSample");

        // Check for External_customer_id
        $obj->setExternalCustomerId(null);
        $this->assertNull($obj->getExternal_customer_id());
        $this->assertNull($obj->getExternalCustomerId());
        $this->assertSame($obj->getExternalCustomerId(), $obj->getExternal_customer_id());
        $obj->setExternal_customer_id("TestSample");
        $this->assertEquals($obj->getExternal_customer_id(), "TestSample");

        // Check for Mandate_reference_number
        $obj->setMandateReferenceNumber(null);
        $this->assertNull($obj->getMandate_reference_number());
        $this->assertNull($obj->getMandateReferenceNumber());
        $this->assertSame($obj->getMandateReferenceNumber(), $obj->getMandate_reference_number());
        $obj->setMandate_reference_number("TestSample");
        $this->assertEquals($obj->getMandate_reference_number(), "TestSample");

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
