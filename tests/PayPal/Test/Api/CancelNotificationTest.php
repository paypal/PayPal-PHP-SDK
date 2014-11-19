<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\CancelNotification;

/**
 * Class CancelNotification
 *
 * @package PayPal\Test\Api
 */
class CancelNotificationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object CancelNotification
     * @return string
     */
    public static function getJson()
    {
        return '{"subject":"TestSample","note":"TestSample","send_to_merchant":true,"send_to_payer":true}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return CancelNotification
     */
    public static function getObject()
    {
        return new CancelNotification(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return CancelNotification
     */
    public function testSerializationDeserialization()
    {
        $obj = new CancelNotification(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getSubject());
        $this->assertNotNull($obj->getNote());
        $this->assertNotNull($obj->getSendToMerchant());
        $this->assertNotNull($obj->getSendToPayer());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param CancelNotification $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getSubject(), "TestSample");
        $this->assertEquals($obj->getNote(), "TestSample");
        $this->assertEquals($obj->getSendToMerchant(), true);
        $this->assertEquals($obj->getSendToPayer(), true);
    }

    /**
     * @depends testSerializationDeserialization
     * @param CancelNotification $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getSend_to_merchant(), true);
        $this->assertEquals($obj->getSend_to_payer(), true);
    }

    /**
     * @depends testSerializationDeserialization
     * @param CancelNotification $obj
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

        // Check for Send_to_payer
        $obj->setSendToPayer(null);
        $this->assertNull($obj->getSend_to_payer());
        $this->assertNull($obj->getSendToPayer());
        $this->assertSame($obj->getSendToPayer(), $obj->getSend_to_payer());
        $obj->setSend_to_payer(true);
        $this->assertEquals($obj->getSend_to_payer(), true);

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
