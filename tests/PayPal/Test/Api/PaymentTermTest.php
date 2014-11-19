<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\PaymentTerm;

/**
 * Class PaymentTerm
 *
 * @package PayPal\Test\Api
 */
class PaymentTermTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object PaymentTerm
     * @return string
     */
    public static function getJson()
    {
        return '{"term_type":"TestSample","due_date":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PaymentTerm
     */
    public static function getObject()
    {
        return new PaymentTerm(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PaymentTerm
     */
    public function testSerializationDeserialization()
    {
        $obj = new PaymentTerm(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getTermType());
        $this->assertNotNull($obj->getDueDate());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentTerm $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getTermType(), "TestSample");
        $this->assertEquals($obj->getDueDate(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentTerm $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getTerm_type(), "TestSample");
        $this->assertEquals($obj->getDue_date(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentTerm $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Term_type
        $obj->setTermType(null);
        $this->assertNull($obj->getTerm_type());
        $this->assertNull($obj->getTermType());
        $this->assertSame($obj->getTermType(), $obj->getTerm_type());
        $obj->setTerm_type("TestSample");
        $this->assertEquals($obj->getTerm_type(), "TestSample");

        // Check for Due_date
        $obj->setDueDate(null);
        $this->assertNull($obj->getDue_date());
        $this->assertNull($obj->getDueDate());
        $this->assertSame($obj->getDueDate(), $obj->getDue_date());
        $obj->setDue_date("TestSample");
        $this->assertEquals($obj->getDue_date(), "TestSample");

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
