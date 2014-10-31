<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\OverrideChargeModel;

/**
 * Class OverrideChargeModel
 *
 * @package PayPal\Test\Api
 */
class OverrideChargeModelTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object OverrideChargeModel
     * @return string
     */
    public static function getJson()
    {
        return '{"charge_id":"TestSample","amount":' .CurrencyTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return OverrideChargeModel
     */
    public static function getObject()
    {
        return new OverrideChargeModel(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return OverrideChargeModel
     */
    public function testSerializationDeserialization()
    {
        $obj = new OverrideChargeModel(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getChargeId());
        $this->assertNotNull($obj->getAmount());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param OverrideChargeModel $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getChargeId(), "TestSample");
        $this->assertEquals($obj->getAmount(), CurrencyTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param OverrideChargeModel $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getCharge_id(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param OverrideChargeModel $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Charge_id
        $obj->setChargeId(null);
        $this->assertNull($obj->getCharge_id());
        $this->assertNull($obj->getChargeId());
        $this->assertSame($obj->getChargeId(), $obj->getCharge_id());
        $obj->setCharge_id("TestSample");
        $this->assertEquals($obj->getCharge_id(), "TestSample");

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
