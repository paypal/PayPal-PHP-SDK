<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\CreditCardToken;

/**
 * Class CreditCardToken
 *
 * @package PayPal\Test\Api
 */
class CreditCardTokenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object CreditCardToken
     * @return string
     */
    public static function getJson()
    {
        return '{"credit_card_id":"TestSample","payer_id":"TestSample","last4":"TestSample","type":"TestSample","expire_month":123,"expire_year":123}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return CreditCardToken
     */
    public static function getObject()
    {
        return new CreditCardToken(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return CreditCardToken
     */
    public function testSerializationDeserialization()
    {
        $obj = new CreditCardToken(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getCreditCardId());
        $this->assertNotNull($obj->getPayerId());
        $this->assertNotNull($obj->getLast4());
        $this->assertNotNull($obj->getType());
        $this->assertNotNull($obj->getExpireMonth());
        $this->assertNotNull($obj->getExpireYear());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param CreditCardToken $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getCreditCardId(), "TestSample");
        $this->assertEquals($obj->getPayerId(), "TestSample");
        $this->assertEquals($obj->getLast4(), "TestSample");
        $this->assertEquals($obj->getType(), "TestSample");
        $this->assertEquals($obj->getExpireMonth(), 123);
        $this->assertEquals($obj->getExpireYear(), 123);
    }

    /**
     * @depends testSerializationDeserialization
     * @param CreditCardToken $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getCredit_card_id(), "TestSample");
        $this->assertEquals($obj->getPayer_id(), "TestSample");
        $this->assertEquals($obj->getExpire_month(), 123);
        $this->assertEquals($obj->getExpire_year(), 123);
    }

    /**
     * @depends testSerializationDeserialization
     * @param CreditCardToken $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Credit_card_id
        $obj->setCreditCardId(null);
        $this->assertNull($obj->getCredit_card_id());
        $this->assertNull($obj->getCreditCardId());
        $this->assertSame($obj->getCreditCardId(), $obj->getCredit_card_id());
        $obj->setCredit_card_id("TestSample");
        $this->assertEquals($obj->getCredit_card_id(), "TestSample");

        // Check for Payer_id
        $obj->setPayerId(null);
        $this->assertNull($obj->getPayer_id());
        $this->assertNull($obj->getPayerId());
        $this->assertSame($obj->getPayerId(), $obj->getPayer_id());
        $obj->setPayer_id("TestSample");
        $this->assertEquals($obj->getPayer_id(), "TestSample");

        // Check for Expire_month
        $obj->setExpireMonth(null);
        $this->assertNull($obj->getExpire_month());
        $this->assertNull($obj->getExpireMonth());
        $this->assertSame($obj->getExpireMonth(), $obj->getExpire_month());
        $obj->setExpire_month(123);
        $this->assertEquals($obj->getExpire_month(), 123);

        // Check for Expire_year
        $obj->setExpireYear(null);
        $this->assertNull($obj->getExpire_year());
        $this->assertNull($obj->getExpireYear());
        $this->assertSame($obj->getExpireYear(), $obj->getExpire_year());
        $obj->setExpire_year(123);
        $this->assertEquals($obj->getExpire_year(), 123);

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
