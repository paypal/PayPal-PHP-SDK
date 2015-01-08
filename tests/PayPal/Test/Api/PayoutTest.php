<?php

namespace PayPal\Test\Api;

use PayPal\Api\Payout;

/**
 * Class Payout
 *
 * @package PayPal\Test\Api
 */
class PayoutTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object Payout
     * @return string
     */
    public static function getJson()
    {
        return '{"sender_batch_header":' .PayoutSenderBatchHeaderTest::getJson() . ',"items":' .PayoutItemTest::getJson() . ',"links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Payout
     */
    public static function getObject()
    {
        return new Payout(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Payout
     */
    public function testSerializationDeserialization()
    {
        $obj = new Payout(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getSenderBatchHeader());
        $this->assertNotNull($obj->getItems());
        $this->assertNotNull($obj->getLinks());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Payout $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getSenderBatchHeader(), PayoutSenderBatchHeaderTest::getObject());
        $this->assertEquals($obj->getItems(), PayoutItemTest::getObject());
        $this->assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param Payout $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getSender_batch_header(), PayoutSenderBatchHeaderTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param Payout $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Sender_batch_header
        $obj->setSenderBatchHeader(null);
        $this->assertNull($obj->getSender_batch_header());
        $this->assertNull($obj->getSenderBatchHeader());
        $this->assertSame($obj->getSenderBatchHeader(), $obj->getSender_batch_header());
        $obj->setSender_batch_header(PayoutSenderBatchHeaderTest::getObject());
        $this->assertEquals($obj->getSender_batch_header(), PayoutSenderBatchHeaderTest::getObject());

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }


    /**
     * @dataProvider mockProvider
     * @param Payout $obj
     */
    public function testCreate($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    PayoutBatchTest::getJson()
            ));
        $params = array();

        $result = $obj->create($params, $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Payout $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    PayoutBatchTest::getJson()
            ));

        $result = $obj->get("payoutBatchId", $mockApiContext, $mockPPRestCall);
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
