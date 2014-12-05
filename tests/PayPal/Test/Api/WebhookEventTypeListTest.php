<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\WebhookEventTypeList;

/**
 * Class WebhookEventTypeList
 *
 * @package PayPal\Test\Api
 */
class WebhookEventTypeListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object WebhookEventTypeList
     * @return string
     */
    public static function getJson()
    {
        return '{"event_types":' .WebhookEventTypeTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return WebhookEventTypeList
     */
    public static function getObject()
    {
        return new WebhookEventTypeList(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return WebhookEventTypeList
     */
    public function testSerializationDeserialization()
    {
        $obj = new WebhookEventTypeList(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getEventTypes());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param WebhookEventTypeList $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getEventTypes(), WebhookEventTypeTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param WebhookEventTypeList $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getEvent_types(), WebhookEventTypeTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param WebhookEventTypeList $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Event_types
        $obj->setEventTypes(null);
        $this->assertNull($obj->getEvent_types());
        $this->assertNull($obj->getEventTypes());
        $this->assertSame($obj->getEventTypes(), $obj->getEvent_types());
        $obj->setEvent_types(WebhookEventTypeTest::getObject());
        $this->assertEquals($obj->getEvent_types(), WebhookEventTypeTest::getObject());

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
