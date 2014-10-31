<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\PaymentDefinition;

/**
 * Class PaymentDefinition
 *
 * @package PayPal\Test\Api
 */
class PaymentDefinitionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object PaymentDefinition
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","name":"TestSample","type":"TestSample","frequency_interval":"TestSample","frequency":"TestSample","cycles":"TestSample","amount":' .CurrencyTest::getJson() . ',"charge_models":' .ChargeModelTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PaymentDefinition
     */
    public static function getObject()
    {
        return new PaymentDefinition(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PaymentDefinition
     */
    public function testSerializationDeserialization()
    {
        $obj = new PaymentDefinition(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertNotNull($obj->getName());
        $this->assertNotNull($obj->getType());
        $this->assertNotNull($obj->getFrequencyInterval());
        $this->assertNotNull($obj->getFrequency());
        $this->assertNotNull($obj->getCycles());
        $this->assertNotNull($obj->getAmount());
        $this->assertNotNull($obj->getChargeModels());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentDefinition $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getId(), "TestSample");
        $this->assertEquals($obj->getName(), "TestSample");
        $this->assertEquals($obj->getType(), "TestSample");
        $this->assertEquals($obj->getFrequencyInterval(), "TestSample");
        $this->assertEquals($obj->getFrequency(), "TestSample");
        $this->assertEquals($obj->getCycles(), "TestSample");
        $this->assertEquals($obj->getAmount(), CurrencyTest::getObject());
        $this->assertEquals($obj->getChargeModels(), ChargeModelTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentDefinition $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getFrequency_interval(), "TestSample");
        $this->assertEquals($obj->getCharge_models(), ChargeModelTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentDefinition $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Frequency_interval
        $obj->setFrequencyInterval(null);
        $this->assertNull($obj->getFrequency_interval());
        $this->assertNull($obj->getFrequencyInterval());
        $this->assertSame($obj->getFrequencyInterval(), $obj->getFrequency_interval());
        $obj->setFrequency_interval("TestSample");
        $this->assertEquals($obj->getFrequency_interval(), "TestSample");

        // Check for Charge_models
        $obj->setChargeModels(null);
        $this->assertNull($obj->getCharge_models());
        $this->assertNull($obj->getChargeModels());
        $this->assertSame($obj->getChargeModels(), $obj->getCharge_models());
        $obj->setCharge_models(ChargeModelTest::getObject());
        $this->assertEquals($obj->getCharge_models(), ChargeModelTest::getObject());

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
