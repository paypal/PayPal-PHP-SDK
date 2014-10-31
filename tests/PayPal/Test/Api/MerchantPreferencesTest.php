<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\MerchantPreferences;

/**
 * Class MerchantPreferences
 *
 * @package PayPal\Test\Api
 */
class MerchantPreferencesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object MerchantPreferences
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","setup_fee":' .CurrencyTest::getJson() . ',"cancel_url":"http://www.google.com","return_url":"http://www.google.com","notify_url":"http://www.google.com","max_fail_attempts":"TestSample","auto_bill_amount":"TestSample","initial_fail_amount_action":"TestSample","accepted_payment_type":"TestSample","char_set":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return MerchantPreferences
     */
    public static function getObject()
    {
        return new MerchantPreferences(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return MerchantPreferences
     */
    public function testSerializationDeserialization()
    {
        $obj = new MerchantPreferences(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertNotNull($obj->getSetupFee());
        $this->assertNotNull($obj->getCancelUrl());
        $this->assertNotNull($obj->getReturnUrl());
        $this->assertNotNull($obj->getNotifyUrl());
        $this->assertNotNull($obj->getMaxFailAttempts());
        $this->assertNotNull($obj->getAutoBillAmount());
        $this->assertNotNull($obj->getInitialFailAmountAction());
        $this->assertNotNull($obj->getAcceptedPaymentType());
        $this->assertNotNull($obj->getCharSet());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param MerchantPreferences $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getId(), "TestSample");
        $this->assertEquals($obj->getSetupFee(), CurrencyTest::getObject());
        $this->assertEquals($obj->getCancelUrl(), "http://www.google.com");
        $this->assertEquals($obj->getReturnUrl(), "http://www.google.com");
        $this->assertEquals($obj->getNotifyUrl(), "http://www.google.com");
        $this->assertEquals($obj->getMaxFailAttempts(), "TestSample");
        $this->assertEquals($obj->getAutoBillAmount(), "TestSample");
        $this->assertEquals($obj->getInitialFailAmountAction(), "TestSample");
        $this->assertEquals($obj->getAcceptedPaymentType(), "TestSample");
        $this->assertEquals($obj->getCharSet(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param MerchantPreferences $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getSetup_fee(), CurrencyTest::getObject());
        $this->assertEquals($obj->getCancel_url(), "http://www.google.com");
        $this->assertEquals($obj->getReturn_url(), "http://www.google.com");
        $this->assertEquals($obj->getNotify_url(), "http://www.google.com");
        $this->assertEquals($obj->getMax_fail_attempts(), "TestSample");
        $this->assertEquals($obj->getAuto_bill_amount(), "TestSample");
        $this->assertEquals($obj->getInitial_fail_amount_action(), "TestSample");
        $this->assertEquals($obj->getAccepted_payment_type(), "TestSample");
        $this->assertEquals($obj->getChar_set(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param MerchantPreferences $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Setup_fee
        $obj->setSetupFee(null);
        $this->assertNull($obj->getSetup_fee());
        $this->assertNull($obj->getSetupFee());
        $this->assertSame($obj->getSetupFee(), $obj->getSetup_fee());
        $obj->setSetup_fee(CurrencyTest::getObject());
        $this->assertEquals($obj->getSetup_fee(), CurrencyTest::getObject());

        // Check for Max_fail_attempts
        $obj->setMaxFailAttempts(null);
        $this->assertNull($obj->getMax_fail_attempts());
        $this->assertNull($obj->getMaxFailAttempts());
        $this->assertSame($obj->getMaxFailAttempts(), $obj->getMax_fail_attempts());
        $obj->setMax_fail_attempts("TestSample");
        $this->assertEquals($obj->getMax_fail_attempts(), "TestSample");

        // Check for Auto_bill_amount
        $obj->setAutoBillAmount(null);
        $this->assertNull($obj->getAuto_bill_amount());
        $this->assertNull($obj->getAutoBillAmount());
        $this->assertSame($obj->getAutoBillAmount(), $obj->getAuto_bill_amount());
        $obj->setAuto_bill_amount("TestSample");
        $this->assertEquals($obj->getAuto_bill_amount(), "TestSample");

        // Check for Initial_fail_amount_action
        $obj->setInitialFailAmountAction(null);
        $this->assertNull($obj->getInitial_fail_amount_action());
        $this->assertNull($obj->getInitialFailAmountAction());
        $this->assertSame($obj->getInitialFailAmountAction(), $obj->getInitial_fail_amount_action());
        $obj->setInitial_fail_amount_action("TestSample");
        $this->assertEquals($obj->getInitial_fail_amount_action(), "TestSample");

        // Check for Accepted_payment_type
        $obj->setAcceptedPaymentType(null);
        $this->assertNull($obj->getAccepted_payment_type());
        $this->assertNull($obj->getAcceptedPaymentType());
        $this->assertSame($obj->getAcceptedPaymentType(), $obj->getAccepted_payment_type());
        $obj->setAccepted_payment_type("TestSample");
        $this->assertEquals($obj->getAccepted_payment_type(), "TestSample");

        // Check for Char_set
        $obj->setCharSet(null);
        $this->assertNull($obj->getChar_set());
        $this->assertNull($obj->getCharSet());
        $this->assertSame($obj->getCharSet(), $obj->getChar_set());
        $obj->setChar_set("TestSample");
        $this->assertEquals($obj->getChar_set(), "TestSample");

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage CancelUrl is not a fully qualified URL
     */
    public function testUrlValidationForCancelUrl()
    {
        $obj = new MerchantPreferences();
        $obj->setCancelUrl(null);
    }
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage ReturnUrl is not a fully qualified URL
     */
    public function testUrlValidationForReturnUrl()
    {
        $obj = new MerchantPreferences();
        $obj->setReturnUrl(null);
    }
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage NotifyUrl is not a fully qualified URL
     */
    public function testUrlValidationForNotifyUrl()
    {
        $obj = new MerchantPreferences();
        $obj->setNotifyUrl(null);
    }

    public function testUrlValidationForCancelUrlDeprecated()
    {
        $obj = new MerchantPreferences();
        $obj->setCancel_url(null);
        $this->assertNull($obj->getCancel_url());
    }
    public function testUrlValidationForReturnUrlDeprecated()
    {
        $obj = new MerchantPreferences();
        $obj->setReturn_url(null);
        $this->assertNull($obj->getReturn_url());
    }
    public function testUrlValidationForNotifyUrlDeprecated()
    {
        $obj = new MerchantPreferences();
        $obj->setNotify_url(null);
        $this->assertNull($obj->getNotify_url());
    }

}
