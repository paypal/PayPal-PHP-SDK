<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\AgreementTransaction;

/**
 * Class AgreementTransaction
 *
 * @package PayPal\Test\Api
 */
class AgreementTransactionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object AgreementTransaction
     * @return string
     */
    public static function getJson()
    {
        return '{"transaction_id":"TestSample","status":"TestSample","transaction_type":"TestSample","amount":' .CurrencyTest::getJson() . ',"fee_amount":' .CurrencyTest::getJson() . ',"net_amount":' .CurrencyTest::getJson() . ',"payer_email":"TestSample","payer_name":"TestSample","time_updated":"TestSample","time_zone":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return AgreementTransaction
     */
    public static function getObject()
    {
        return new AgreementTransaction(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return AgreementTransaction
     */
    public function testSerializationDeserialization()
    {
        $obj = new AgreementTransaction(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getTransactionId());
        $this->assertNotNull($obj->getStatus());
        $this->assertNotNull($obj->getTransactionType());
        $this->assertNotNull($obj->getAmount());
        $this->assertNotNull($obj->getFeeAmount());
        $this->assertNotNull($obj->getNetAmount());
        $this->assertNotNull($obj->getPayerEmail());
        $this->assertNotNull($obj->getPayerName());
        $this->assertNotNull($obj->getTimeUpdated());
        $this->assertNotNull($obj->getTimeZone());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param AgreementTransaction $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getTransactionId(), "TestSample");
        $this->assertEquals($obj->getStatus(), "TestSample");
        $this->assertEquals($obj->getTransactionType(), "TestSample");
        $this->assertEquals($obj->getAmount(), CurrencyTest::getObject());
        $this->assertEquals($obj->getFeeAmount(), CurrencyTest::getObject());
        $this->assertEquals($obj->getNetAmount(), CurrencyTest::getObject());
        $this->assertEquals($obj->getPayerEmail(), "TestSample");
        $this->assertEquals($obj->getPayerName(), "TestSample");
        $this->assertEquals($obj->getTimeUpdated(), "TestSample");
        $this->assertEquals($obj->getTimeZone(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param AgreementTransaction $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getTransaction_id(), "TestSample");
        $this->assertEquals($obj->getTransaction_type(), "TestSample");
        $this->assertEquals($obj->getFee_amount(), CurrencyTest::getObject());
        $this->assertEquals($obj->getNet_amount(), CurrencyTest::getObject());
        $this->assertEquals($obj->getPayer_email(), "TestSample");
        $this->assertEquals($obj->getPayer_name(), "TestSample");
        $this->assertEquals($obj->getTime_updated(), "TestSample");
        $this->assertEquals($obj->getTime_zone(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param AgreementTransaction $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Transaction_id
        $obj->setTransactionId(null);
        $this->assertNull($obj->getTransaction_id());
        $this->assertNull($obj->getTransactionId());
        $this->assertSame($obj->getTransactionId(), $obj->getTransaction_id());
        $obj->setTransaction_id("TestSample");
        $this->assertEquals($obj->getTransaction_id(), "TestSample");

        // Check for Transaction_type
        $obj->setTransactionType(null);
        $this->assertNull($obj->getTransaction_type());
        $this->assertNull($obj->getTransactionType());
        $this->assertSame($obj->getTransactionType(), $obj->getTransaction_type());
        $obj->setTransaction_type("TestSample");
        $this->assertEquals($obj->getTransaction_type(), "TestSample");

        // Check for Fee_amount
        $obj->setFeeAmount(null);
        $this->assertNull($obj->getFee_amount());
        $this->assertNull($obj->getFeeAmount());
        $this->assertSame($obj->getFeeAmount(), $obj->getFee_amount());
        $obj->setFee_amount(CurrencyTest::getObject());
        $this->assertEquals($obj->getFee_amount(), CurrencyTest::getObject());

        // Check for Net_amount
        $obj->setNetAmount(null);
        $this->assertNull($obj->getNet_amount());
        $this->assertNull($obj->getNetAmount());
        $this->assertSame($obj->getNetAmount(), $obj->getNet_amount());
        $obj->setNet_amount(CurrencyTest::getObject());
        $this->assertEquals($obj->getNet_amount(), CurrencyTest::getObject());

        // Check for Payer_email
        $obj->setPayerEmail(null);
        $this->assertNull($obj->getPayer_email());
        $this->assertNull($obj->getPayerEmail());
        $this->assertSame($obj->getPayerEmail(), $obj->getPayer_email());
        $obj->setPayer_email("TestSample");
        $this->assertEquals($obj->getPayer_email(), "TestSample");

        // Check for Payer_name
        $obj->setPayerName(null);
        $this->assertNull($obj->getPayer_name());
        $this->assertNull($obj->getPayerName());
        $this->assertSame($obj->getPayerName(), $obj->getPayer_name());
        $obj->setPayer_name("TestSample");
        $this->assertEquals($obj->getPayer_name(), "TestSample");

        // Check for Time_updated
        $obj->setTimeUpdated(null);
        $this->assertNull($obj->getTime_updated());
        $this->assertNull($obj->getTimeUpdated());
        $this->assertSame($obj->getTimeUpdated(), $obj->getTime_updated());
        $obj->setTime_updated("TestSample");
        $this->assertEquals($obj->getTime_updated(), "TestSample");

        // Check for Time_zone
        $obj->setTimeZone(null);
        $this->assertNull($obj->getTime_zone());
        $this->assertNull($obj->getTimeZone());
        $this->assertSame($obj->getTimeZone(), $obj->getTime_zone());
        $obj->setTime_zone("TestSample");
        $this->assertEquals($obj->getTime_zone(), "TestSample");

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
