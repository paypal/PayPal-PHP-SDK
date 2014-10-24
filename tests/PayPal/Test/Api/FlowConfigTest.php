<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\FlowConfig;

/**
 * Class FlowConfig
 *
 * @package PayPal\Test\Api
 */
class FlowConfigTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object FlowConfig
     * @return string
     */
    public static function getJson()
    {
        return '{"landing_page_type":"TestSample","bank_txn_pending_url":"http://www.google.com"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return FlowConfig
     */
    public static function getObject()
    {
        return new FlowConfig(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return FlowConfig
     */
    public function testSerializationDeserialization()
    {
        $obj = new FlowConfig(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getLandingPageType());
        $this->assertNotNull($obj->getBankTxnPendingUrl());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param FlowConfig $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getLandingPageType(), "TestSample");
        $this->assertEquals($obj->getBankTxnPendingUrl(), "http://www.google.com");
    }

    /**
     * @depends testSerializationDeserialization
     * @param FlowConfig $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getLanding_page_type(), "TestSample");
        $this->assertEquals($obj->getBank_txn_pending_url(), "http://www.google.com");
    }

    /**
     * @depends testSerializationDeserialization
     * @param FlowConfig $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Landing_page_type
        $obj->setLandingPageType(null);
        $this->assertNull($obj->getLanding_page_type());
        $this->assertNull($obj->getLandingPageType());
        $this->assertSame($obj->getLandingPageType(), $obj->getLanding_page_type());
        $obj->setLanding_page_type("TestSample");
        $this->assertEquals($obj->getLanding_page_type(), "TestSample");

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage BankTxnPendingUrl is not a fully qualified URL
     */
    public function testUrlValidationForBankTxnPendingUrl()
    {
        $obj = new FlowConfig();
        $obj->setBankTxnPendingUrl(null);
    }

    public function testUrlValidationForBankTxnPendingUrlDeprecated()
    {
        $obj = new FlowConfig();
        $obj->setBank_txn_pending_url(null);
        $this->assertNull($obj->getBank_txn_pending_url());
    }

}
