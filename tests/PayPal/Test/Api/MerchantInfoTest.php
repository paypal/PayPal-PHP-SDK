<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\MerchantInfo;

/**
 * Class MerchantInfo
 *
 * @package PayPal\Test\Api
 */
class MerchantInfoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object MerchantInfo
     * @return string
     */
    public static function getJson()
    {
        return '{"email":"TestSample","first_name":"TestSample","last_name":"TestSample","address":' .AddressTest::getJson() . ',"business_name":"TestSample","phone":' .PhoneTest::getJson() . ',"fax":' .PhoneTest::getJson() . ',"website":"TestSample","tax_id":"TestSample","additional_info":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return MerchantInfo
     */
    public static function getObject()
    {
        return new MerchantInfo(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return MerchantInfo
     */
    public function testSerializationDeserialization()
    {
        $obj = new MerchantInfo(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getEmail());
        $this->assertNotNull($obj->getFirstName());
        $this->assertNotNull($obj->getLastName());
        $this->assertNotNull($obj->getAddress());
        $this->assertNotNull($obj->getBusinessName());
        $this->assertNotNull($obj->getPhone());
        $this->assertNotNull($obj->getFax());
        $this->assertNotNull($obj->getWebsite());
        $this->assertNotNull($obj->getTaxId());
        $this->assertNotNull($obj->getAdditionalInfo());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param MerchantInfo $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getEmail(), "TestSample");
        $this->assertEquals($obj->getFirstName(), "TestSample");
        $this->assertEquals($obj->getLastName(), "TestSample");
        $this->assertEquals($obj->getAddress(), AddressTest::getObject());
        $this->assertEquals($obj->getBusinessName(), "TestSample");
        $this->assertEquals($obj->getPhone(), PhoneTest::getObject());
        $this->assertEquals($obj->getFax(), PhoneTest::getObject());
        $this->assertEquals($obj->getWebsite(), "TestSample");
        $this->assertEquals($obj->getTaxId(), "TestSample");
        $this->assertEquals($obj->getAdditionalInfo(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param MerchantInfo $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getFirst_name(), "TestSample");
        $this->assertEquals($obj->getLast_name(), "TestSample");
        $this->assertEquals($obj->getBusiness_name(), "TestSample");
        $this->assertEquals($obj->getTax_id(), "TestSample");
        $this->assertEquals($obj->getAdditional_info(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param MerchantInfo $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

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

        // Check for Business_name
        $obj->setBusinessName(null);
        $this->assertNull($obj->getBusiness_name());
        $this->assertNull($obj->getBusinessName());
        $this->assertSame($obj->getBusinessName(), $obj->getBusiness_name());
        $obj->setBusiness_name("TestSample");
        $this->assertEquals($obj->getBusiness_name(), "TestSample");

        // Check for Tax_id
        $obj->setTaxId(null);
        $this->assertNull($obj->getTax_id());
        $this->assertNull($obj->getTaxId());
        $this->assertSame($obj->getTaxId(), $obj->getTax_id());
        $obj->setTax_id("TestSample");
        $this->assertEquals($obj->getTax_id(), "TestSample");

        // Check for Additional_info
        $obj->setAdditionalInfo(null);
        $this->assertNull($obj->getAdditional_info());
        $this->assertNull($obj->getAdditionalInfo());
        $this->assertSame($obj->getAdditionalInfo(), $obj->getAdditional_info());
        $obj->setAdditional_info("TestSample");
        $this->assertEquals($obj->getAdditional_info(), "TestSample");

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
