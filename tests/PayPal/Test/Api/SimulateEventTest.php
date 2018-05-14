<?php

namespace PayPal\Test\Api;

use PayPal\Api\SimulateEvent;
use PayPal\Rest\ApiContext;
use PHPUnit\Framework\TestCase;

/**
 * Class SimulatesEvent
 *
 * @package PayPal\Test\Api
 */
class SimulatesEventTest extends TestCase
{
    /**
     * Gets Json String of Object SimulateEvent
     * @return string
     */
    public static function getJson()
    {
        return '{"webhook_id":"TestSample","url":"http://www.google.com","event_type":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return SimulateEvent
     */
    public static function getObject()
    {
        return new SimulateEvent(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return SimulateEvent
     */
    public function testSerializationDeserialization()
    {
        $obj = new SimulateEvent(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getWebhookId());
        $this->assertNotNull($obj->getUrl());
        $this->assertNotNull($obj->getEventType());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param SimulateEvent $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getWebhookId(), "TestSample");
        $this->assertEquals($obj->getUrl(), "http://www.google.com");
        $this->assertEquals($obj->getEventType(), "TestSample");
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Url is not a fully qualified URL
     */
    public function testUrlValidationForUrl()
    {
        $obj = new SimulateEvent();
        $obj->setUrl(null);
    }

    /**
     * @dataProvider mockProvider
     * @param SimulateEvent $obj
     * @param ApiContext|null $mockApiContext
     */
    public function testCreate($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                self::getJson()
            ));

        $result = $obj->create($mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }

    public function mockProvider()
    {
        $obj = self::getObject();
        $mockApiContext = $this->getMockBuilder('ApiContext')
            ->disableOriginalConstructor()
            ->getMock();
        return array(
            array($obj, $mockApiContext),
            array($obj, null)
        );
    }
}
