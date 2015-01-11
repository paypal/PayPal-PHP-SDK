<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
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

}
