<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Validation\ArgumentValidator;
use PayPal\Api\ItemsArray;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PPRestCall;
use PayPal\Api\PayoutItem;

/**
 * Class PayoutItem
 *
 * @package PayPal\Test\Api
 */
class PayoutItemTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object PayoutItem
     * @return string
     */
    public static function getJson()
    {
        return '{"recipient_type":"TestSample","amount":' .CurrencyTest::getJson() . ',"note":"TestSample","receiver":"TestSample","sender_item_id":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PayoutItem
     */
    public static function getObject()
    {
        return new PayoutItem(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PayoutItem
     */
    public function testSerializationDeserialization()
    {
        $obj = new PayoutItem(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getRecipientType());
        $this->assertNotNull($obj->getAmount());
        $this->assertNotNull($obj->getNote());
        $this->assertNotNull($obj->getReceiver());
        $this->assertNotNull($obj->getSenderItemId());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PayoutItem $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getRecipientType(), "TestSample");
        $this->assertEquals($obj->getAmount(), CurrencyTest::getObject());
        $this->assertEquals($obj->getNote(), "TestSample");
        $this->assertEquals($obj->getReceiver(), "TestSample");
        $this->assertEquals($obj->getSenderItemId(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param PayoutItem $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getRecipient_type(), "TestSample");
        $this->assertEquals($obj->getSender_item_id(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param PayoutItem $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Recipient_type
        $obj->setRecipientType(null);
        $this->assertNull($obj->getRecipient_type());
        $this->assertNull($obj->getRecipientType());
        $this->assertSame($obj->getRecipientType(), $obj->getRecipient_type());
        $obj->setRecipient_type("TestSample");
        $this->assertEquals($obj->getRecipient_type(), "TestSample");

        // Check for Sender_item_id
        $obj->setSenderItemId(null);
        $this->assertNull($obj->getSender_item_id());
        $this->assertNull($obj->getSenderItemId());
        $this->assertSame($obj->getSenderItemId(), $obj->getSender_item_id());
        $obj->setSender_item_id("TestSample");
        $this->assertEquals($obj->getSender_item_id(), "TestSample");

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }


    /**
     * @dataProvider mockProvider
     * @param PayoutItem $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                PayoutItemDetailsTest::getJson()
            ));

        $result = $obj->get("payoutItemId", $mockApiContext, $mockPPRestCall);
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
