<?php

namespace PayPal\Test\Api;

use PayPal\Common\ResourceModel;
use PayPal\Validation\ArgumentValidator;
use PayPal\Api\WebhookEventList;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PPRestCall;
use PayPal\Api\WebhookEventType;

/**
 * Class WebhookEventType
 *
 * @package PayPal\Test\Api
 */
class WebhookEventTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object WebhookEventType
     * @return string
     */
    public static function getJson()
    {
        return '{"name":"TestSample","description":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return WebhookEventType
     */
    public static function getObject()
    {
        return new WebhookEventType(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return WebhookEventType
     */
    public function testSerializationDeserialization()
    {
        $obj = new WebhookEventType(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getName());
        $this->assertNotNull($obj->getDescription());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param WebhookEventType $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getName(), "TestSample");
        $this->assertEquals($obj->getDescription(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param WebhookEventType $obj
     */
    public function testDeprecatedGetters($obj)
    {
    }

    /**
     * @depends testSerializationDeserialization
     * @param WebhookEventType $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }


    /**
     * @dataProvider mockProvider
     * @param WebhookEventType $obj
     */
    public function testSubscribedEventTypes($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    WebhookEventTypeListTest::getJson()
            ));

        $result = $obj->subscribedEventTypes("webhookId", $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param WebhookEventType $obj
     */
    public function testAvailableEventTypes($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                WebhookEventTypeListTest::getJson()
            ));

        $result = $obj->availableEventTypes($mockApiContext, $mockPPRestCall);
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
