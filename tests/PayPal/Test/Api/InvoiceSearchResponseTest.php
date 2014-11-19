<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\InvoiceSearchResponse;

/**
 * Class InvoiceSearchResponse
 *
 * @package PayPal\Test\Api
 */
class InvoiceSearchResponseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object InvoiceSearchResponse
     * @return string
     */
    public static function getJson()
    {
        return '{"total_count":123,"invoices":' .InvoiceTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return InvoiceSearchResponse
     */
    public static function getObject()
    {
        return new InvoiceSearchResponse(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return InvoiceSearchResponse
     */
    public function testSerializationDeserialization()
    {
        $obj = new InvoiceSearchResponse(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getTotalCount());
        $this->assertNotNull($obj->getInvoices());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param InvoiceSearchResponse $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getTotalCount(), 123);
        $this->assertEquals($obj->getInvoices(), InvoiceTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param InvoiceSearchResponse $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getTotal_count(), 123);
    }

    /**
     * @depends testSerializationDeserialization
     * @param InvoiceSearchResponse $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Total_count
        $obj->setTotalCount(null);
        $this->assertNull($obj->getTotal_count());
        $this->assertNull($obj->getTotalCount());
        $this->assertSame($obj->getTotalCount(), $obj->getTotal_count());
        $obj->setTotal_count(123);
        $this->assertEquals($obj->getTotal_count(), 123);

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
