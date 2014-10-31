<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\Payer;

/**
 * Class Payer
 *
 * @package PayPal\Test\Api
 */
class PayerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object Payer
     * @return string
     */
    public static function getJson()
    {
        return '{"payment_method":"TestSample","status":"TestSample","funding_instruments":' .FundingInstrumentTest::getJson() . ',"funding_option_id":"TestSample","payer_info":' .PayerInfoTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Payer
     */
    public static function getObject()
    {
        return new Payer(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Payer
     */
    public function testSerializationDeserialization()
    {
        $obj = new Payer(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getPaymentMethod());
        $this->assertNotNull($obj->getStatus());
        $this->assertNotNull($obj->getFundingInstruments());
        $this->assertNotNull($obj->getFundingOptionId());
        $this->assertNotNull($obj->getPayerInfo());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Payer $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getPaymentMethod(), "TestSample");
        $this->assertEquals($obj->getStatus(), "TestSample");
        $this->assertEquals($obj->getFundingInstruments(), FundingInstrumentTest::getObject());
        $this->assertEquals($obj->getFundingOptionId(), "TestSample");
        $this->assertEquals($obj->getPayerInfo(), PayerInfoTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param Payer $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getPayment_method(), "TestSample");
        $this->assertEquals($obj->getFunding_instruments(), FundingInstrumentTest::getObject());
        $this->assertEquals($obj->getFunding_option_id(), "TestSample");
        $this->assertEquals($obj->getPayer_info(), PayerInfoTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param Payer $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Payment_method
        $obj->setPaymentMethod(null);
        $this->assertNull($obj->getPayment_method());
        $this->assertNull($obj->getPaymentMethod());
        $this->assertSame($obj->getPaymentMethod(), $obj->getPayment_method());
        $obj->setPayment_method("TestSample");
        $this->assertEquals($obj->getPayment_method(), "TestSample");

        // Check for Funding_instruments
        $obj->setFundingInstruments(null);
        $this->assertNull($obj->getFunding_instruments());
        $this->assertNull($obj->getFundingInstruments());
        $this->assertSame($obj->getFundingInstruments(), $obj->getFunding_instruments());
        $obj->setFunding_instruments(FundingInstrumentTest::getObject());
        $this->assertEquals($obj->getFunding_instruments(), FundingInstrumentTest::getObject());

        // Check for Funding_option_id
        $obj->setFundingOptionId(null);
        $this->assertNull($obj->getFunding_option_id());
        $this->assertNull($obj->getFundingOptionId());
        $this->assertSame($obj->getFundingOptionId(), $obj->getFunding_option_id());
        $obj->setFunding_option_id("TestSample");
        $this->assertEquals($obj->getFunding_option_id(), "TestSample");

        // Check for Payer_info
        $obj->setPayerInfo(null);
        $this->assertNull($obj->getPayer_info());
        $this->assertNull($obj->getPayerInfo());
        $this->assertSame($obj->getPayerInfo(), $obj->getPayer_info());
        $obj->setPayer_info(PayerInfoTest::getObject());
        $this->assertEquals($obj->getPayer_info(), PayerInfoTest::getObject());

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
