<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\FundingInstrument;

/**
 * Class FundingInstrument
 *
 * @package PayPal\Test\Api
 */
class FundingInstrumentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object FundingInstrument
     * @return string
     */
    public static function getJson()
    {
        return '{"credit_card":' .CreditCardTest::getJson() . ',"credit_card_token":' .CreditCardTokenTest::getJson() . ',"payment_card":' .PaymentCardTest::getJson() . ',"payment_card_token":' .PaymentCardTokenTest::getJson() . ',"bank_account":' .ExtendedBankAccountTest::getJson() . ',"bank_account_token":' .BankTokenTest::getJson() . ',"credit":' .CreditTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return FundingInstrument
     */
    public static function getObject()
    {
        return new FundingInstrument(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return FundingInstrument
     */
    public function testSerializationDeserialization()
    {
        $obj = new FundingInstrument(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getCreditCard());
        $this->assertNotNull($obj->getCreditCardToken());
        $this->assertNotNull($obj->getPaymentCard());
        $this->assertNotNull($obj->getPaymentCardToken());
        $this->assertNotNull($obj->getBankAccount());
        $this->assertNotNull($obj->getBankAccountToken());
        $this->assertNotNull($obj->getCredit());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param FundingInstrument $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getCreditCard(), CreditCardTest::getObject());
        $this->assertEquals($obj->getCreditCardToken(), CreditCardTokenTest::getObject());
        $this->assertEquals($obj->getPaymentCard(), PaymentCardTest::getObject());
        $this->assertEquals($obj->getPaymentCardToken(), PaymentCardTokenTest::getObject());
        $this->assertEquals($obj->getBankAccount(), ExtendedBankAccountTest::getObject());
        $this->assertEquals($obj->getBankAccountToken(), BankTokenTest::getObject());
        $this->assertEquals($obj->getCredit(), CreditTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param FundingInstrument $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getCredit_card(), CreditCardTest::getObject());
        $this->assertEquals($obj->getCredit_card_token(), CreditCardTokenTest::getObject());
        $this->assertEquals($obj->getPayment_card(), PaymentCardTest::getObject());
        $this->assertEquals($obj->getPayment_card_token(), PaymentCardTokenTest::getObject());
        $this->assertEquals($obj->getBank_account(), ExtendedBankAccountTest::getObject());
        $this->assertEquals($obj->getBank_account_token(), BankTokenTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param FundingInstrument $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Credit_card
        $obj->setCreditCard(null);
        $this->assertNull($obj->getCredit_card());
        $this->assertNull($obj->getCreditCard());
        $this->assertSame($obj->getCreditCard(), $obj->getCredit_card());
        $obj->setCredit_card(CreditCardTest::getObject());
        $this->assertEquals($obj->getCredit_card(), CreditCardTest::getObject());

        // Check for Credit_card_token
        $obj->setCreditCardToken(null);
        $this->assertNull($obj->getCredit_card_token());
        $this->assertNull($obj->getCreditCardToken());
        $this->assertSame($obj->getCreditCardToken(), $obj->getCredit_card_token());
        $obj->setCredit_card_token(CreditCardTokenTest::getObject());
        $this->assertEquals($obj->getCredit_card_token(), CreditCardTokenTest::getObject());

        // Check for Payment_card
        $obj->setPaymentCard(null);
        $this->assertNull($obj->getPayment_card());
        $this->assertNull($obj->getPaymentCard());
        $this->assertSame($obj->getPaymentCard(), $obj->getPayment_card());
        $obj->setPayment_card(PaymentCardTest::getObject());
        $this->assertEquals($obj->getPayment_card(), PaymentCardTest::getObject());

        // Check for Payment_card_token
        $obj->setPaymentCardToken(null);
        $this->assertNull($obj->getPayment_card_token());
        $this->assertNull($obj->getPaymentCardToken());
        $this->assertSame($obj->getPaymentCardToken(), $obj->getPayment_card_token());
        $obj->setPayment_card_token(PaymentCardTokenTest::getObject());
        $this->assertEquals($obj->getPayment_card_token(), PaymentCardTokenTest::getObject());

        // Check for Bank_account
        $obj->setBankAccount(null);
        $this->assertNull($obj->getBank_account());
        $this->assertNull($obj->getBankAccount());
        $this->assertSame($obj->getBankAccount(), $obj->getBank_account());
        $obj->setBank_account(ExtendedBankAccountTest::getObject());
        $this->assertEquals($obj->getBank_account(), ExtendedBankAccountTest::getObject());

        // Check for Bank_account_token
        $obj->setBankAccountToken(null);
        $this->assertNull($obj->getBank_account_token());
        $this->assertNull($obj->getBankAccountToken());
        $this->assertSame($obj->getBankAccountToken(), $obj->getBank_account_token());
        $obj->setBank_account_token(BankTokenTest::getObject());
        $this->assertEquals($obj->getBank_account_token(), BankTokenTest::getObject());

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
