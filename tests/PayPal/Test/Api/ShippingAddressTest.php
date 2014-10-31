<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\ShippingAddress;

/**
 * Class ShippingAddress
 *
 * @package PayPal\Test\Api
 */
class ShippingAddressTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object ShippingAddress
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","recipient_name":"TestSample","default_address":true}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return ShippingAddress
     */
    public static function getObject()
    {
        return new ShippingAddress(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return ShippingAddress
     */
    public function testSerializationDeserialization()
    {
        $obj = new ShippingAddress(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertNotNull($obj->getRecipientName());
        $this->assertNotNull($obj->getDefaultAddress());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param ShippingAddress $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getId(), "TestSample");
        $this->assertEquals($obj->getRecipientName(), "TestSample");
        $this->assertEquals($obj->getDefaultAddress(), true);
    }

    /**
     * @depends testSerializationDeserialization
     * @param ShippingAddress $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getRecipient_name(), "TestSample");
        $this->assertEquals($obj->getDefault_address(), true);
    }

    /**
     * @depends testSerializationDeserialization
     * @param ShippingAddress $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Recipient_name
        $obj->setRecipientName(null);
        $this->assertNull($obj->getRecipient_name());
        $this->assertNull($obj->getRecipientName());
        $this->assertSame($obj->getRecipientName(), $obj->getRecipient_name());
        $obj->setRecipient_name("TestSample");
        $this->assertEquals($obj->getRecipient_name(), "TestSample");

        // Check for Default_address
        $obj->setDefaultAddress(null);
        $this->assertNull($obj->getDefault_address());
        $this->assertNull($obj->getDefaultAddress());
        $this->assertSame($obj->getDefaultAddress(), $obj->getDefault_address());
        $obj->setDefault_address(true);
        $this->assertEquals($obj->getDefault_address(), true);

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
