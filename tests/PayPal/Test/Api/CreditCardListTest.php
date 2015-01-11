<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\CreditCardList;

/**
 * Class CreditCardList
 *
 * @package PayPal\Test\Api
 */
class CreditCardListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object CreditCardList
     * @return string
     */
    public static function getJson()
    {
        return '{"credit-cards":' .CreditCardTest::getJson() . ',"count":123,"next_id":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return CreditCardList
     */
    public static function getObject()
    {
        return new CreditCardList(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return CreditCardList
     */
    public function testSerializationDeserialization()
    {
        $obj = new CreditCardList(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getCreditCards());
        $this->assertNotNull($obj->getCount());
        $this->assertNotNull($obj->getNextId());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param CreditCardList $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getCreditCards(), CreditCardTest::getObject());
        $this->assertEquals($obj->getCount(), 123);
        $this->assertEquals($obj->getNextId(), "TestSample");
    }

}
