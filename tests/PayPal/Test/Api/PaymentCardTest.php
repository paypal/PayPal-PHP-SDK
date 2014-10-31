<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\PaymentCard;

/**
 * Class PaymentCard
 *
 * @package PayPal\Test\Api
 */
class PaymentCardTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object PaymentCard
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","number":"TestSample","type":"TestSample","expire_month":123,"expire_year":123,"start_month":123,"start_year":123,"cvv2":123,"first_name":"TestSample","last_name":"TestSample","billing_address":' .AddressTest::getJson() . ',"external_customer_id":"TestSample","status":"TestSample","valid_until":"TestSample","links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PaymentCard
     */
    public static function getObject()
    {
        return new PaymentCard(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PaymentCard
     */
    public function testSerializationDeserialization()
    {
        $obj = new PaymentCard(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertNotNull($obj->getNumber());
        $this->assertNotNull($obj->getType());
        $this->assertNotNull($obj->getExpireMonth());
        $this->assertNotNull($obj->getExpireYear());
        $this->assertNotNull($obj->getStartMonth());
        $this->assertNotNull($obj->getStartYear());
        $this->assertNotNull($obj->getCvv2());
        $this->assertNotNull($obj->getFirstName());
        $this->assertNotNull($obj->getLastName());
        $this->assertNotNull($obj->getBillingAddress());
        $this->assertNotNull($obj->getExternalCustomerId());
        $this->assertNotNull($obj->getStatus());
        $this->assertNotNull($obj->getValidUntil());
        $this->assertNotNull($obj->getLinks());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentCard $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getId(), "TestSample");
        $this->assertEquals($obj->getNumber(), "TestSample");
        $this->assertEquals($obj->getType(), "TestSample");
        $this->assertEquals($obj->getExpireMonth(), 123);
        $this->assertEquals($obj->getExpireYear(), 123);
        $this->assertEquals($obj->getStartMonth(), 123);
        $this->assertEquals($obj->getStartYear(), 123);
        $this->assertEquals($obj->getCvv2(), 123);
        $this->assertEquals($obj->getFirstName(), "TestSample");
        $this->assertEquals($obj->getLastName(), "TestSample");
        $this->assertEquals($obj->getBillingAddress(), AddressTest::getObject());
        $this->assertEquals($obj->getExternalCustomerId(), "TestSample");
        $this->assertEquals($obj->getStatus(), "TestSample");
        $this->assertEquals($obj->getValidUntil(), "TestSample");
        $this->assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentCard $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getExpire_month(), 123);
        $this->assertEquals($obj->getExpire_year(), 123);
        $this->assertEquals($obj->getStart_month(), 123);
        $this->assertEquals($obj->getStart_year(), 123);
        $this->assertEquals($obj->getFirst_name(), "TestSample");
        $this->assertEquals($obj->getLast_name(), "TestSample");
        $this->assertEquals($obj->getBilling_address(), AddressTest::getObject());
        $this->assertEquals($obj->getExternal_customer_id(), "TestSample");
        $this->assertEquals($obj->getValid_until(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentCard $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

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

        // Check for Start_month
        $obj->setStartMonth(null);
        $this->assertNull($obj->getStart_month());
        $this->assertNull($obj->getStartMonth());
        $this->assertSame($obj->getStartMonth(), $obj->getStart_month());
        $obj->setStart_month(123);
        $this->assertEquals($obj->getStart_month(), 123);

        // Check for Start_year
        $obj->setStartYear(null);
        $this->assertNull($obj->getStart_year());
        $this->assertNull($obj->getStartYear());
        $this->assertSame($obj->getStartYear(), $obj->getStart_year());
        $obj->setStart_year(123);
        $this->assertEquals($obj->getStart_year(), 123);

        // Check for First_name
        $obj->setFirstName(null);
        $this->assertNull($obj->getFirst_name());
        $this->assertNull($obj->getFirstName());
        $this->assertSame($obj->getFirstName(), $obj->getFirst_name());
        $obj->setFirst_name("TestSample");
        $this->assertEquals($obj->getFirst_name(), "TestSample");

        // Check for Last_name
        $obj->setLastName(null);
        $this->assertNull($obj->getLast_name());
        $this->assertNull($obj->getLastName());
        $this->assertSame($obj->getLastName(), $obj->getLast_name());
        $obj->setLast_name("TestSample");
        $this->assertEquals($obj->getLast_name(), "TestSample");

        // Check for Billing_address
        $obj->setBillingAddress(null);
        $this->assertNull($obj->getBilling_address());
        $this->assertNull($obj->getBillingAddress());
        $this->assertSame($obj->getBillingAddress(), $obj->getBilling_address());
        $obj->setBilling_address(AddressTest::getObject());
        $this->assertEquals($obj->getBilling_address(), AddressTest::getObject());

        // Check for External_customer_id
        $obj->setExternalCustomerId(null);
        $this->assertNull($obj->getExternal_customer_id());
        $this->assertNull($obj->getExternalCustomerId());
        $this->assertSame($obj->getExternalCustomerId(), $obj->getExternal_customer_id());
        $obj->setExternal_customer_id("TestSample");
        $this->assertEquals($obj->getExternal_customer_id(), "TestSample");

        // Check for Valid_until
        $obj->setValidUntil(null);
        $this->assertNull($obj->getValid_until());
        $this->assertNull($obj->getValidUntil());
        $this->assertSame($obj->getValidUntil(), $obj->getValid_until());
        $obj->setValid_until("TestSample");
        $this->assertEquals($obj->getValid_until(), "TestSample");

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
