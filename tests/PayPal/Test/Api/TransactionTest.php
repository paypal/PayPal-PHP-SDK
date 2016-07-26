<?php

namespace PayPal\Rest\Test\Api;

use PayPal\Rest\Api\Transaction;

/**
 * Class Transaction
 *
 * @package PayPal\Rest\Test\Api
 */
class TransactionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object Transaction
     *
     * @return string
     */
    public static function getJson()
    {
        return '{}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return Transaction
     */
    public static function getObject()
    {
        return new Transaction(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return Transaction
     */
    public function testSerializationDeserialization()
    {
        $obj = new Transaction(self::getJson());
        $this->assertNotNull($obj);
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Transaction $obj
     */
    public function testGetters($obj)
    {
    }


}
