<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\PaymentCardToken;

/**
 * Class PaymentCardToken
 *
 * @package PayPal\Test\Api
 */
class PaymentCardTokenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object PaymentCardToken
     * @return string
     */
    public static function getJson()
    {
        return '{"payment_card_id":"TestSample","external_customer_id":"TestSample","last4":"TestSample","type":"TestSample","expire_month":123,"expire_year":123}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PaymentCardToken
     */
    public static function getObject()
    {
        return new PaymentCardToken(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PaymentCardToken
     */
    public function testSerializationDeserialization()
    {
        $obj = new PaymentCardToken(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getPaymentCardId());
        $this->assertNotNull($obj->getExternalCustomerId());
        $this->assertNotNull($obj->getLast4());
        $this->assertNotNull($obj->getType());
        $this->assertNotNull($obj->getExpireMonth());
        $this->assertNotNull($obj->getExpireYear());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentCardToken $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getPaymentCardId(), "TestSample");
        $this->assertEquals($obj->getExternalCustomerId(), "TestSample");
        $this->assertEquals($obj->getLast4(), "TestSample");
        $this->assertEquals($obj->getType(), "TestSample");
        $this->assertEquals($obj->getExpireMonth(), 123);
        $this->assertEquals($obj->getExpireYear(), 123);
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentCardToken $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getPayment_card_id(), "TestSample");
        $this->assertEquals($obj->getExternal_customer_id(), "TestSample");
        $this->assertEquals($obj->getExpire_month(), 123);
        $this->assertEquals($obj->getExpire_year(), 123);
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentCardToken $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Payment_card_id
        $obj->setPaymentCardId(null);
        $this->assertNull($obj->getPayment_card_id());
        $this->assertNull($obj->getPaymentCardId());
        $this->assertSame($obj->getPaymentCardId(), $obj->getPayment_card_id());
        $obj->setPayment_card_id("TestSample");
        $this->assertEquals($obj->getPayment_card_id(), "TestSample");

        // Check for External_customer_id
        $obj->setExternalCustomerId(null);
        $this->assertNull($obj->getExternal_customer_id());
        $this->assertNull($obj->getExternalCustomerId());
        $this->assertSame($obj->getExternalCustomerId(), $obj->getExternal_customer_id());
        $obj->setExternal_customer_id("TestSample");
        $this->assertEquals($obj->getExternal_customer_id(), "TestSample");

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
