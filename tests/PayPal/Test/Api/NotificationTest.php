<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\Notification;

/**
 * Class Notification
 *
 * @package PayPal\Test\Api
 */
class NotificationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object Notification
     * @return string
     */
    public static function getJson()
    {
        return '{"subject":"TestSample","note":"TestSample","send_to_merchant":true}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Notification
     */
    public static function getObject()
    {
        return new Notification(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Notification
     */
    public function testSerializationDeserialization()
    {
        $obj = new Notification(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getSubject());
        $this->assertNotNull($obj->getNote());
        $this->assertNotNull($obj->getSendToMerchant());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Notification $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getSubject(), "TestSample");
        $this->assertEquals($obj->getNote(), "TestSample");
        $this->assertEquals($obj->getSendToMerchant(), true);
    }

    /**
     * @depends testSerializationDeserialization
     * @param Notification $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getSend_to_merchant(), true);
    }

    /**
     * @depends testSerializationDeserialization
     * @param Notification $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Send_to_merchant
        $obj->setSendToMerchant(null);
        $this->assertNull($obj->getSend_to_merchant());
        $this->assertNull($obj->getSendToMerchant());
        $this->assertSame($obj->getSendToMerchant(), $obj->getSend_to_merchant());
        $obj->setSend_to_merchant(true);
        $this->assertEquals($obj->getSend_to_merchant(), true);

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
