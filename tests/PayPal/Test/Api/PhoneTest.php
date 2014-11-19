<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\Phone;

/**
 * Class Phone
 *
 * @package PayPal\Test\Api
 */
class PhoneTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object Phone
     * @return string
     */
    public static function getJson()
    {
        return '{"country_code":"TestSample","national_number":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Phone
     */
    public static function getObject()
    {
        return new Phone(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Phone
     */
    public function testSerializationDeserialization()
    {
        $obj = new Phone(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getCountryCode());
        $this->assertNotNull($obj->getNationalNumber());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Phone $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getCountryCode(), "TestSample");
        $this->assertEquals($obj->getNationalNumber(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param Phone $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getCountry_code(), "TestSample");
        $this->assertEquals($obj->getNational_number(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param Phone $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Country_code
        $obj->setCountryCode(null);
        $this->assertNull($obj->getCountry_code());
        $this->assertNull($obj->getCountryCode());
        $this->assertSame($obj->getCountryCode(), $obj->getCountry_code());
        $obj->setCountry_code("TestSample");
        $this->assertEquals($obj->getCountry_code(), "TestSample");

        // Check for National_number
        $obj->setNationalNumber(null);
        $this->assertNull($obj->getNational_number());
        $this->assertNull($obj->getNationalNumber());
        $this->assertSame($obj->getNationalNumber(), $obj->getNational_number());
        $obj->setNational_number("TestSample");
        $this->assertEquals($obj->getNational_number(), "TestSample");

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
