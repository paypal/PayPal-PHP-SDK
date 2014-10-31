<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\BankAccountsList;

/**
 * Class BankAccountsList
 *
 * @package PayPal\Test\Api
 */
class BankAccountsListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object BankAccountsList
     * @return string
     */
    public static function getJson()
    {
        return '{"bank-accounts":' .BankAccountTest::getJson() . ',"count":123,"next_id":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return BankAccountsList
     */
    public static function getObject()
    {
        return new BankAccountsList(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return BankAccountsList
     */
    public function testSerializationDeserialization()
    {
        $obj = new BankAccountsList(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getBankAccounts());
        $this->assertNotNull($obj->getCount());
        $this->assertNotNull($obj->getNextId());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param BankAccountsList $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getBankAccounts(), BankAccountTest::getObject());
        $this->assertEquals($obj->getCount(), 123);
        $this->assertEquals($obj->getNextId(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param BankAccountsList $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getBank_accounts(), BankAccountTest::getObject());
        $this->assertEquals($obj->getNext_id(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param BankAccountsList $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Bank_accounts
        $obj->setBankAccounts(null);
        $this->assertNull($obj->getBank_accounts());
        $this->assertNull($obj->getBankAccounts());
        $this->assertSame($obj->getBankAccounts(), $obj->getBank_accounts());
        $obj->setBank_accounts(BankAccountTest::getObject());
        $this->assertEquals($obj->getBank_accounts(), BankAccountTest::getObject());

        // Check for Next_id
        $obj->setNextId(null);
        $this->assertNull($obj->getNext_id());
        $this->assertNull($obj->getNextId());
        $this->assertSame($obj->getNextId(), $obj->getNext_id());
        $obj->setNext_id("TestSample");
        $this->assertEquals($obj->getNext_id(), "TestSample");

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
