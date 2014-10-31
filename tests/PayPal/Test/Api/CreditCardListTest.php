<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
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

    /**
     * @depends testSerializationDeserialization
     * @param CreditCardList $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getCredit_cards(), CreditCardTest::getObject());
        $this->assertEquals($obj->getNext_id(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param CreditCardList $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Credit_cards
        $obj->setCreditCards(null);
        $this->assertNull($obj->getCredit_cards());
        $this->assertNull($obj->getCreditCards());
        $this->assertSame($obj->getCreditCards(), $obj->getCredit_cards());
        $obj->setCredit_cards(CreditCardTest::getObject());
        $this->assertEquals($obj->getCredit_cards(), CreditCardTest::getObject());

        // Check for Next_id
        $obj->setNextId(null);
        $this->assertNull($obj->getNext_id());
        $this->assertNull($obj->getNextId());
        $this->assertSame($obj->getNextId(), $obj->getNext_id());
        $obj->setNext_id("TestSample");
        $this->assertEquals($obj->getNext_id(), "TestSample");

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
