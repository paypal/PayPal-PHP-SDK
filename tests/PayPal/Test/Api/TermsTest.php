<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\Terms;

/**
 * Class Terms
 *
 * @package PayPal\Test\Api
 */
class TermsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object Terms
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","type":"TestSample","max_billing_amount":' .CurrencyTest::getJson() . ',"occurrences":"TestSample","amount_range":' .CurrencyTest::getJson() . ',"buyer_editable":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Terms
     */
    public static function getObject()
    {
        return new Terms(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Terms
     */
    public function testSerializationDeserialization()
    {
        $obj = new Terms(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertNotNull($obj->getType());
        $this->assertNotNull($obj->getMaxBillingAmount());
        $this->assertNotNull($obj->getOccurrences());
        $this->assertNotNull($obj->getAmountRange());
        $this->assertNotNull($obj->getBuyerEditable());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Terms $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getId(), "TestSample");
        $this->assertEquals($obj->getType(), "TestSample");
        $this->assertEquals($obj->getMaxBillingAmount(), CurrencyTest::getObject());
        $this->assertEquals($obj->getOccurrences(), "TestSample");
        $this->assertEquals($obj->getAmountRange(), CurrencyTest::getObject());
        $this->assertEquals($obj->getBuyerEditable(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param Terms $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getMax_billing_amount(), CurrencyTest::getObject());
        $this->assertEquals($obj->getAmount_range(), CurrencyTest::getObject());
        $this->assertEquals($obj->getBuyer_editable(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param Terms $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Max_billing_amount
        $obj->setMaxBillingAmount(null);
        $this->assertNull($obj->getMax_billing_amount());
        $this->assertNull($obj->getMaxBillingAmount());
        $this->assertSame($obj->getMaxBillingAmount(), $obj->getMax_billing_amount());
        $obj->setMax_billing_amount(CurrencyTest::getObject());
        $this->assertEquals($obj->getMax_billing_amount(), CurrencyTest::getObject());

        // Check for Amount_range
        $obj->setAmountRange(null);
        $this->assertNull($obj->getAmount_range());
        $this->assertNull($obj->getAmountRange());
        $this->assertSame($obj->getAmountRange(), $obj->getAmount_range());
        $obj->setAmount_range(CurrencyTest::getObject());
        $this->assertEquals($obj->getAmount_range(), CurrencyTest::getObject());

        // Check for Buyer_editable
        $obj->setBuyerEditable(null);
        $this->assertNull($obj->getBuyer_editable());
        $this->assertNull($obj->getBuyerEditable());
        $this->assertSame($obj->getBuyerEditable(), $obj->getBuyer_editable());
        $obj->setBuyer_editable("TestSample");
        $this->assertEquals($obj->getBuyer_editable(), "TestSample");

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
