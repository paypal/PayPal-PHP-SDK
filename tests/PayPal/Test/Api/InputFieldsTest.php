<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\InputFields;

/**
 * Class InputFields
 *
 * @package PayPal\Test\Api
 */
class InputFieldsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object InputFields
     * @return string
     */
    public static function getJson()
    {
        return json_encode(json_decode('{"allow_note":true,"no_shipping":123,"address_override":123}'));
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return InputFields
     */
    public static function getObject()
    {
        return new InputFields(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return InputFields
     */
    public function testSerializationDeserialization()
    {
        $obj = new InputFields(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getAllowNote());
        $this->assertNotNull($obj->getNoShipping());
        $this->assertNotNull($obj->getAddressOverride());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param InputFields $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getAllowNote(), true);
        $this->assertEquals($obj->getNoShipping(), 123);
        $this->assertEquals($obj->getAddressOverride(), 123);
    }

    /**
     * @depends testSerializationDeserialization
     * @param InputFields $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getAllow_note(), true);
        $this->assertEquals($obj->getNo_shipping(), 123);
        $this->assertEquals($obj->getAddress_override(), 123);
    }

    /**
     * @depends testSerializationDeserialization
     * @param InputFields $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Allow_note
        $obj->setAllowNote(null);
        $this->assertNull($obj->getAllow_note());
        $this->assertNull($obj->getAllowNote());
        $this->assertSame($obj->getAllowNote(), $obj->getAllow_note());
        $obj->setAllow_note(true);
        $this->assertEquals($obj->getAllow_note(), true);

        // Check for No_shipping
        $obj->setNoShipping(null);
        $this->assertNull($obj->getNo_shipping());
        $this->assertNull($obj->getNoShipping());
        $this->assertSame($obj->getNoShipping(), $obj->getNo_shipping());
        $obj->setNo_shipping(123);
        $this->assertEquals($obj->getNo_shipping(), 123);

        // Check for Address_override
        $obj->setAddressOverride(null);
        $this->assertNull($obj->getAddress_override());
        $this->assertNull($obj->getAddressOverride());
        $this->assertSame($obj->getAddressOverride(), $obj->getAddress_override());
        $obj->setAddress_override(123);
        $this->assertEquals($obj->getAddress_override(), 123);

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
