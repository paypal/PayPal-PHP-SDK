<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\ShippingInfo;

/**
 * Class ShippingInfo
 *
 * @package PayPal\Test\Api
 */
class ShippingInfoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object ShippingInfo
     * @return string
     */
    public static function getJson()
    {
        return '{"first_name":"TestSample","last_name":"TestSample","business_name":"TestSample","address":' .AddressTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return ShippingInfo
     */
    public static function getObject()
    {
        return new ShippingInfo(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return ShippingInfo
     */
    public function testSerializationDeserialization()
    {
        $obj = new ShippingInfo(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getFirstName());
        $this->assertNotNull($obj->getLastName());
        $this->assertNotNull($obj->getBusinessName());
        $this->assertNotNull($obj->getAddress());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param ShippingInfo $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getFirstName(), "TestSample");
        $this->assertEquals($obj->getLastName(), "TestSample");
        $this->assertEquals($obj->getBusinessName(), "TestSample");
        $this->assertEquals($obj->getAddress(), AddressTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param ShippingInfo $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getFirst_name(), "TestSample");
        $this->assertEquals($obj->getLast_name(), "TestSample");
        $this->assertEquals($obj->getBusiness_name(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param ShippingInfo $obj
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

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
