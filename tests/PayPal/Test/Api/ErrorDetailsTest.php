<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\ErrorDetails;

/**
 * Class ErrorDetails
 *
 * @package PayPal\Test\Api
 */
class ErrorDetailsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object ErrorDetails
     * @return string
     */
    public static function getJson()
    {
        return '{"field":"TestSample","issue":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return ErrorDetails
     */
    public static function getObject()
    {
        return new ErrorDetails(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return ErrorDetails
     */
    public function testSerializationDeserialization()
    {
        $obj = new ErrorDetails(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getField());
        $this->assertNotNull($obj->getIssue());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param ErrorDetails $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getField(), "TestSample");
        $this->assertEquals($obj->getIssue(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param ErrorDetails $obj
     */
    public function testDeprecatedGetters($obj)
    {
    }

    /**
     * @depends testSerializationDeserialization
     * @param ErrorDetails $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
