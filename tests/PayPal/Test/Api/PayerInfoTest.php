<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\PayerInfo;

/**
 * Class PayerInfo
 *
 * @package PayPal\Test\Api
 */
class PayerInfoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object PayerInfo
     * @return string
     */
    public static function getJson()
    {
        return '{"email":"TestSample","external_remember_me_id":"TestSample","buyer_account_number":"TestSample","first_name":"TestSample","last_name":"TestSample","payer_id":"TestSample","phone":"TestSample","phone_type":"TestSample","birth_date":"TestSample","tax_id":"TestSample","tax_id_type":"TestSample","billing_address":' .AddressTest::getJson() . ',"shipping_address":' .ShippingAddressTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PayerInfo
     */
    public static function getObject()
    {
        return new PayerInfo(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PayerInfo
     */
    public function testSerializationDeserialization()
    {
        $obj = new PayerInfo(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getEmail());
        $this->assertNotNull($obj->getExternalRememberMeId());
        $this->assertNotNull($obj->getBuyerAccountNumber());
        $this->assertNotNull($obj->getFirstName());
        $this->assertNotNull($obj->getLastName());
        $this->assertNotNull($obj->getPayerId());
        $this->assertNotNull($obj->getPhone());
        $this->assertNotNull($obj->getPhoneType());
        $this->assertNotNull($obj->getBirthDate());
        $this->assertNotNull($obj->getTaxId());
        $this->assertNotNull($obj->getTaxIdType());
        $this->assertNotNull($obj->getBillingAddress());
        $this->assertNotNull($obj->getShippingAddress());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PayerInfo $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getEmail(), "TestSample");
        $this->assertEquals($obj->getExternalRememberMeId(), "TestSample");
        $this->assertEquals($obj->getBuyerAccountNumber(), "TestSample");
        $this->assertEquals($obj->getFirstName(), "TestSample");
        $this->assertEquals($obj->getLastName(), "TestSample");
        $this->assertEquals($obj->getPayerId(), "TestSample");
        $this->assertEquals($obj->getPhone(), "TestSample");
        $this->assertEquals($obj->getPhoneType(), "TestSample");
        $this->assertEquals($obj->getBirthDate(), "TestSample");
        $this->assertEquals($obj->getTaxId(), "TestSample");
        $this->assertEquals($obj->getTaxIdType(), "TestSample");
        $this->assertEquals($obj->getBillingAddress(), AddressTest::getObject());
        $this->assertEquals($obj->getShippingAddress(), ShippingAddressTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param PayerInfo $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getExternal_remember_me_id(), "TestSample");
        $this->assertEquals($obj->getBuyer_account_number(), "TestSample");
        $this->assertEquals($obj->getFirst_name(), "TestSample");
        $this->assertEquals($obj->getLast_name(), "TestSample");
        $this->assertEquals($obj->getPayer_id(), "TestSample");
        $this->assertEquals($obj->getPhone_type(), "TestSample");
        $this->assertEquals($obj->getBirth_date(), "TestSample");
        $this->assertEquals($obj->getTax_id(), "TestSample");
        $this->assertEquals($obj->getTax_id_type(), "TestSample");
        $this->assertEquals($obj->getBilling_address(), AddressTest::getObject());
        $this->assertEquals($obj->getShipping_address(), ShippingAddressTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param PayerInfo $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for External_remember_me_id
        $obj->setExternalRememberMeId(null);
        $this->assertNull($obj->getExternal_remember_me_id());
        $this->assertNull($obj->getExternalRememberMeId());
        $this->assertSame($obj->getExternalRememberMeId(), $obj->getExternal_remember_me_id());
        $obj->setExternal_remember_me_id("TestSample");
        $this->assertEquals($obj->getExternal_remember_me_id(), "TestSample");

        // Check for Buyer_account_number
        $obj->setBuyerAccountNumber(null);
        $this->assertNull($obj->getBuyer_account_number());
        $this->assertNull($obj->getBuyerAccountNumber());
        $this->assertSame($obj->getBuyerAccountNumber(), $obj->getBuyer_account_number());
        $obj->setBuyer_account_number("TestSample");
        $this->assertEquals($obj->getBuyer_account_number(), "TestSample");

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

        // Check for Payer_id
        $obj->setPayerId(null);
        $this->assertNull($obj->getPayer_id());
        $this->assertNull($obj->getPayerId());
        $this->assertSame($obj->getPayerId(), $obj->getPayer_id());
        $obj->setPayer_id("TestSample");
        $this->assertEquals($obj->getPayer_id(), "TestSample");

        // Check for Phone_type
        $obj->setPhoneType(null);
        $this->assertNull($obj->getPhone_type());
        $this->assertNull($obj->getPhoneType());
        $this->assertSame($obj->getPhoneType(), $obj->getPhone_type());
        $obj->setPhone_type("TestSample");
        $this->assertEquals($obj->getPhone_type(), "TestSample");

        // Check for Birth_date
        $obj->setBirthDate(null);
        $this->assertNull($obj->getBirth_date());
        $this->assertNull($obj->getBirthDate());
        $this->assertSame($obj->getBirthDate(), $obj->getBirth_date());
        $obj->setBirth_date("TestSample");
        $this->assertEquals($obj->getBirth_date(), "TestSample");

        // Check for Tax_id
        $obj->setTaxId(null);
        $this->assertNull($obj->getTax_id());
        $this->assertNull($obj->getTaxId());
        $this->assertSame($obj->getTaxId(), $obj->getTax_id());
        $obj->setTax_id("TestSample");
        $this->assertEquals($obj->getTax_id(), "TestSample");

        // Check for Tax_id_type
        $obj->setTaxIdType(null);
        $this->assertNull($obj->getTax_id_type());
        $this->assertNull($obj->getTaxIdType());
        $this->assertSame($obj->getTaxIdType(), $obj->getTax_id_type());
        $obj->setTax_id_type("TestSample");
        $this->assertEquals($obj->getTax_id_type(), "TestSample");

        // Check for Billing_address
        $obj->setBillingAddress(null);
        $this->assertNull($obj->getBilling_address());
        $this->assertNull($obj->getBillingAddress());
        $this->assertSame($obj->getBillingAddress(), $obj->getBilling_address());
        $obj->setBilling_address(AddressTest::getObject());
        $this->assertEquals($obj->getBilling_address(), AddressTest::getObject());

        // Check for Shipping_address
        $obj->setShippingAddress(null);
        $this->assertNull($obj->getShipping_address());
        $this->assertNull($obj->getShippingAddress());
        $this->assertSame($obj->getShippingAddress(), $obj->getShipping_address());
        $obj->setShipping_address(ShippingAddressTest::getObject());
        $this->assertEquals($obj->getShipping_address(), ShippingAddressTest::getObject());

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
