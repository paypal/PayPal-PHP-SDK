<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\RelatedResources;

/**
 * Class RelatedResources
 *
 * @package PayPal\Test\Api
 */
class RelatedResourcesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object RelatedResources
     * @return string
     */
    public static function getJson()
    {
        return '{}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return RelatedResources
     */
    public static function getObject()
    {
        return new RelatedResources(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return RelatedResources
     */
    public function testSerializationDeserialization()
    {
        $obj = new RelatedResources(self::getJson());
        $this->assertNotNull($obj);
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param RelatedResources $obj
     */
    public function testGetters($obj)
    {
    }

}
