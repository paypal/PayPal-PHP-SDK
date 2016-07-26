<?php

namespace PayPal\Rest\Test\Api;

use PayPal\Rest\Api\PatchRequest;

/**
 * Class PatchRequest
 *
 * @package PayPal\Rest\Test\Api
 */
class PatchRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object PatchRequest
     * @return string
     */
    public static function getJson()
    {
        return '{"patches":' .PatchTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PatchRequest
     */
    public static function getObject()
    {
        return new PatchRequest(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PatchRequest
     */
    public function testSerializationDeserialization()
    {
        $obj = new PatchRequest(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getPatches());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PatchRequest $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getPatches(), PatchTest::getObject());
    }

}
