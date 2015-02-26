<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\FundingDetail;

/**
 * Class FundingDetail
 *
 * @package PayPal\Test\Api
 */
class FundingDetailTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object FundingDetail
     * @return string
     */
    public static function getJson()
    {
        return '{"clearing_time":"TestSample","payment_hold_date":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return FundingDetail
     */
    public static function getObject()
    {
        return new FundingDetail(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return FundingDetail
     */
    public function testSerializationDeserialization()
    {
        $obj = new FundingDetail(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getClearingTime());
        $this->assertNotNull($obj->getPaymentHoldDate());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param FundingDetail $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getClearingTime(), "TestSample");
        $this->assertEquals($obj->getPaymentHoldDate(), "TestSample");
    }

}
