<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\BillingInfo;

/**
 * Class BillingInfo
 *
 * @package PayPal\Test\Api
 */
class BillingInfoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object BillingInfo
     * @return string
     */
    public static function getJson()
    {
        return '{"email":"TestSample","first_name":"TestSample","last_name":"TestSample","business_name":"TestSample","address":' .InvoiceAddressTest::getJson() . ',"language":"TestSample","additional_info":"TestSample","notification_channel":"TestSample","phone":' .PhoneTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return BillingInfo
     */
    public static function getObject()
    {
        return new BillingInfo(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return BillingInfo
     */
    public function testSerializationDeserialization()
    {
        $obj = new BillingInfo(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getEmail());
        $this->assertNotNull($obj->getFirstName());
        $this->assertNotNull($obj->getLastName());
        $this->assertNotNull($obj->getBusinessName());
        $this->assertNotNull($obj->getAddress());
        $this->assertNotNull($obj->getLanguage());
        $this->assertNotNull($obj->getAdditionalInfo());
        $this->assertNotNull($obj->getNotificationChannel());
        $this->assertNotNull($obj->getPhone());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param BillingInfo $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getEmail(), "TestSample");
        $this->assertEquals($obj->getFirstName(), "TestSample");
        $this->assertEquals($obj->getLastName(), "TestSample");
        $this->assertEquals($obj->getBusinessName(), "TestSample");
        $this->assertEquals($obj->getAddress(), InvoiceAddressTest::getObject());
        $this->assertEquals($obj->getLanguage(), "TestSample");
        $this->assertEquals($obj->getAdditionalInfo(), "TestSample");
        $this->assertEquals($obj->getNotificationChannel(), "TestSample");
        $this->assertEquals($obj->getPhone(), PhoneTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param BillingInfo $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getFirst_name(), "TestSample");
        $this->assertEquals($obj->getLast_name(), "TestSample");
        $this->assertEquals($obj->getBusiness_name(), "TestSample");
        $this->assertEquals($obj->getAdditional_info(), "TestSample");
        $this->assertEquals($obj->getNotification_channel(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param BillingInfo $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for First_name
        $obj->setFirstName(null);
        $this->assertNull($obj->getFirst_name());
        $this->assertNull($obj->getFirstName());
        $this->assertSame($obj->getFirstName(), $obj->getFirst_name());
        $obj->setFirst_name("TestSample");
        $this->assertEquals($obj->getFirst_name(), "TestSample");

        // Check for Last_name
        $obj->setLastName(null);
        $this->assertNull($obj->getLast_name());
        $this->assertNull($obj->getLastName());
        $this->assertSame($obj->getLastName(), $obj->getLast_name());
        $obj->setLast_name("TestSample");
        $this->assertEquals($obj->getLast_name(), "TestSample");

        // Check for Business_name
        $obj->setBusinessName(null);
        $this->assertNull($obj->getBusiness_name());
        $this->assertNull($obj->getBusinessName());
        $this->assertSame($obj->getBusinessName(), $obj->getBusiness_name());
        $obj->setBusiness_name("TestSample");
        $this->assertEquals($obj->getBusiness_name(), "TestSample");

        // Check for Additional_info
        $obj->setAdditionalInfo(null);
        $this->assertNull($obj->getAdditional_info());
        $this->assertNull($obj->getAdditionalInfo());
        $this->assertSame($obj->getAdditionalInfo(), $obj->getAdditional_info());
        $obj->setAdditional_info("TestSample");
        $this->assertEquals($obj->getAdditional_info(), "TestSample");

        // Check for Notification_channel
        $obj->setNotificationChannel(null);
        $this->assertNull($obj->getNotification_channel());
        $this->assertNull($obj->getNotificationChannel());
        $this->assertSame($obj->getNotificationChannel(), $obj->getNotification_channel());
        $obj->setNotification_channel("TestSample");
        $this->assertEquals($obj->getNotification_channel(), "TestSample");

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
