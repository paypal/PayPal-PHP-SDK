<?php

namespace PayPal\Test\Api;

use PayPal\Api\ShippingInfo;
use PHPUnit\Framework\TestCase;

/**
 * Class ShippingInfo
 *
 * @package PayPal\Test\Api
 */
class ShippingInfoTest extends TestCase
{
    /**
     * Gets Json String of Object ShippingInfo
     * @return string
     */
    public static function getJson()
    {
        return '{"first_name":"TestSample","last_name":"TestSample","business_name":"TestSample","address":' .ShippingAddressTest::getJson() . '}';
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
        $this->assertEquals($obj->getAddress(), ShippingAddressTest::getObject());
    }
}
