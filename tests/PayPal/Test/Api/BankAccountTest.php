<?php

namespace PayPal\Test\Api;

use PayPal\Common\ResourceModel;
use PayPal\Validation\ArgumentValidator;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PPRestCall;
use PayPal\Api\BankAccount;

/**
 * Class BankAccount
 *
 * @package PayPal\Test\Api
 */
class BankAccountTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object BankAccount
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","account_number":"TestSample","account_number_type":"TestSample","routing_number":"TestSample","account_type":"TestSample","account_name":"TestSample","check_type":"TestSample","auth_type":"TestSample","auth_capture_timestamp":"TestSample","bank_name":"TestSample","country_code":"TestSample","first_name":"TestSample","last_name":"TestSample","birth_date":"TestSample","billing_address":' .AddressTest::getJson() . ',"state":"TestSample","confirmation_status":"TestSample","payer_id":"TestSample","external_customer_id":"TestSample","merchant_id":"TestSample","create_time":"TestSample","update_time":"TestSample","valid_until":"TestSample","links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return BankAccount
     */
    public static function getObject()
    {
        return new BankAccount(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return BankAccount
     */
    public function testSerializationDeserialization()
    {
        $obj = new BankAccount(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertNotNull($obj->getAccountNumber());
        $this->assertNotNull($obj->getAccountNumberType());
        $this->assertNotNull($obj->getRoutingNumber());
        $this->assertNotNull($obj->getAccountType());
        $this->assertNotNull($obj->getAccountName());
        $this->assertNotNull($obj->getCheckType());
        $this->assertNotNull($obj->getAuthType());
        $this->assertNotNull($obj->getAuthCaptureTimestamp());
        $this->assertNotNull($obj->getBankName());
        $this->assertNotNull($obj->getCountryCode());
        $this->assertNotNull($obj->getFirstName());
        $this->assertNotNull($obj->getLastName());
        $this->assertNotNull($obj->getBirthDate());
        $this->assertNotNull($obj->getBillingAddress());
        $this->assertNotNull($obj->getState());
        $this->assertNotNull($obj->getConfirmationStatus());
        $this->assertNotNull($obj->getPayerId());
        $this->assertNotNull($obj->getExternalCustomerId());
        $this->assertNotNull($obj->getMerchantId());
        $this->assertNotNull($obj->getCreateTime());
        $this->assertNotNull($obj->getUpdateTime());
        $this->assertNotNull($obj->getValidUntil());
        $this->assertNotNull($obj->getLinks());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param BankAccount $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getId(), "TestSample");
        $this->assertEquals($obj->getAccountNumber(), "TestSample");
        $this->assertEquals($obj->getAccountNumberType(), "TestSample");
        $this->assertEquals($obj->getRoutingNumber(), "TestSample");
        $this->assertEquals($obj->getAccountType(), "TestSample");
        $this->assertEquals($obj->getAccountName(), "TestSample");
        $this->assertEquals($obj->getCheckType(), "TestSample");
        $this->assertEquals($obj->getAuthType(), "TestSample");
        $this->assertEquals($obj->getAuthCaptureTimestamp(), "TestSample");
        $this->assertEquals($obj->getBankName(), "TestSample");
        $this->assertEquals($obj->getCountryCode(), "TestSample");
        $this->assertEquals($obj->getFirstName(), "TestSample");
        $this->assertEquals($obj->getLastName(), "TestSample");
        $this->assertEquals($obj->getBirthDate(), "TestSample");
        $this->assertEquals($obj->getBillingAddress(), AddressTest::getObject());
        $this->assertEquals($obj->getState(), "TestSample");
        $this->assertEquals($obj->getConfirmationStatus(), "TestSample");
        $this->assertEquals($obj->getPayerId(), "TestSample");
        $this->assertEquals($obj->getExternalCustomerId(), "TestSample");
        $this->assertEquals($obj->getMerchantId(), "TestSample");
        $this->assertEquals($obj->getCreateTime(), "TestSample");
        $this->assertEquals($obj->getUpdateTime(), "TestSample");
        $this->assertEquals($obj->getValidUntil(), "TestSample");
        $this->assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param BankAccount $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getAccount_number(), "TestSample");
        $this->assertEquals($obj->getAccount_number_type(), "TestSample");
        $this->assertEquals($obj->getRouting_number(), "TestSample");
        $this->assertEquals($obj->getAccount_type(), "TestSample");
        $this->assertEquals($obj->getAccount_name(), "TestSample");
        $this->assertEquals($obj->getCheck_type(), "TestSample");
        $this->assertEquals($obj->getAuth_type(), "TestSample");
        $this->assertEquals($obj->getAuth_capture_timestamp(), "TestSample");
        $this->assertEquals($obj->getBank_name(), "TestSample");
        $this->assertEquals($obj->getCountry_code(), "TestSample");
        $this->assertEquals($obj->getFirst_name(), "TestSample");
        $this->assertEquals($obj->getLast_name(), "TestSample");
        $this->assertEquals($obj->getBirth_date(), "TestSample");
        $this->assertEquals($obj->getBilling_address(), AddressTest::getObject());
        $this->assertEquals($obj->getConfirmation_status(), "TestSample");
        $this->assertEquals($obj->getPayer_id(), "TestSample");
        $this->assertEquals($obj->getExternal_customer_id(), "TestSample");
        $this->assertEquals($obj->getMerchant_id(), "TestSample");
        $this->assertEquals($obj->getCreate_time(), "TestSample");
        $this->assertEquals($obj->getUpdate_time(), "TestSample");
        $this->assertEquals($obj->getValid_until(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param BankAccount $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Account_number
        $obj->setAccountNumber(null);
        $this->assertNull($obj->getAccount_number());
        $this->assertNull($obj->getAccountNumber());
        $this->assertSame($obj->getAccountNumber(), $obj->getAccount_number());
        $obj->setAccount_number("TestSample");
        $this->assertEquals($obj->getAccount_number(), "TestSample");

        // Check for Account_number_type
        $obj->setAccountNumberType(null);
        $this->assertNull($obj->getAccount_number_type());
        $this->assertNull($obj->getAccountNumberType());
        $this->assertSame($obj->getAccountNumberType(), $obj->getAccount_number_type());
        $obj->setAccount_number_type("TestSample");
        $this->assertEquals($obj->getAccount_number_type(), "TestSample");

        // Check for Routing_number
        $obj->setRoutingNumber(null);
        $this->assertNull($obj->getRouting_number());
        $this->assertNull($obj->getRoutingNumber());
        $this->assertSame($obj->getRoutingNumber(), $obj->getRouting_number());
        $obj->setRouting_number("TestSample");
        $this->assertEquals($obj->getRouting_number(), "TestSample");

        // Check for Account_type
        $obj->setAccountType(null);
        $this->assertNull($obj->getAccount_type());
        $this->assertNull($obj->getAccountType());
        $this->assertSame($obj->getAccountType(), $obj->getAccount_type());
        $obj->setAccount_type("TestSample");
        $this->assertEquals($obj->getAccount_type(), "TestSample");

        // Check for Account_name
        $obj->setAccountName(null);
        $this->assertNull($obj->getAccount_name());
        $this->assertNull($obj->getAccountName());
        $this->assertSame($obj->getAccountName(), $obj->getAccount_name());
        $obj->setAccount_name("TestSample");
        $this->assertEquals($obj->getAccount_name(), "TestSample");

        // Check for Check_type
        $obj->setCheckType(null);
        $this->assertNull($obj->getCheck_type());
        $this->assertNull($obj->getCheckType());
        $this->assertSame($obj->getCheckType(), $obj->getCheck_type());
        $obj->setCheck_type("TestSample");
        $this->assertEquals($obj->getCheck_type(), "TestSample");

        // Check for Auth_type
        $obj->setAuthType(null);
        $this->assertNull($obj->getAuth_type());
        $this->assertNull($obj->getAuthType());
        $this->assertSame($obj->getAuthType(), $obj->getAuth_type());
        $obj->setAuth_type("TestSample");
        $this->assertEquals($obj->getAuth_type(), "TestSample");

        // Check for Auth_capture_timestamp
        $obj->setAuthCaptureTimestamp(null);
        $this->assertNull($obj->getAuth_capture_timestamp());
        $this->assertNull($obj->getAuthCaptureTimestamp());
        $this->assertSame($obj->getAuthCaptureTimestamp(), $obj->getAuth_capture_timestamp());
        $obj->setAuth_capture_timestamp("TestSample");
        $this->assertEquals($obj->getAuth_capture_timestamp(), "TestSample");

        // Check for Bank_name
        $obj->setBankName(null);
        $this->assertNull($obj->getBank_name());
        $this->assertNull($obj->getBankName());
        $this->assertSame($obj->getBankName(), $obj->getBank_name());
        $obj->setBank_name("TestSample");
        $this->assertEquals($obj->getBank_name(), "TestSample");

        // Check for Country_code
        $obj->setCountryCode(null);
        $this->assertNull($obj->getCountry_code());
        $this->assertNull($obj->getCountryCode());
        $this->assertSame($obj->getCountryCode(), $obj->getCountry_code());
        $obj->setCountry_code("TestSample");
        $this->assertEquals($obj->getCountry_code(), "TestSample");

        // Check for First_name
        $obj->setFirstName(null);
        $this->assertNull($obj->getFirst_name());
        $this->assertNull($obj->getFirstName());
        $this->assertSame($obj->getFirstName(), $obj->getFirst_name());
        $obj->setFirst_name("TestSample");
        $this->assertEquals($obj->getFirst_name(), "TestSample");

        // Check for Last_name
        $obj->setLastName(null);
        $this->assertNull($obj->getLast_name());
        $this->assertNull($obj->getLastName());
        $this->assertSame($obj->getLastName(), $obj->getLast_name());
        $obj->setLast_name("TestSample");
        $this->assertEquals($obj->getLast_name(), "TestSample");

        // Check for Birth_date
        $obj->setBirthDate(null);
        $this->assertNull($obj->getBirth_date());
        $this->assertNull($obj->getBirthDate());
        $this->assertSame($obj->getBirthDate(), $obj->getBirth_date());
        $obj->setBirth_date("TestSample");
        $this->assertEquals($obj->getBirth_date(), "TestSample");

        // Check for Billing_address
        $obj->setBillingAddress(null);
        $this->assertNull($obj->getBilling_address());
        $this->assertNull($obj->getBillingAddress());
        $this->assertSame($obj->getBillingAddress(), $obj->getBilling_address());
        $obj->setBilling_address(AddressTest::getObject());
        $this->assertEquals($obj->getBilling_address(), AddressTest::getObject());

        // Check for Confirmation_status
        $obj->setConfirmationStatus(null);
        $this->assertNull($obj->getConfirmation_status());
        $this->assertNull($obj->getConfirmationStatus());
        $this->assertSame($obj->getConfirmationStatus(), $obj->getConfirmation_status());
        $obj->setConfirmation_status("TestSample");
        $this->assertEquals($obj->getConfirmation_status(), "TestSample");

        // Check for Payer_id
        $obj->setPayerId(null);
        $this->assertNull($obj->getPayer_id());
        $this->assertNull($obj->getPayerId());
        $this->assertSame($obj->getPayerId(), $obj->getPayer_id());
        $obj->setPayer_id("TestSample");
        $this->assertEquals($obj->getPayer_id(), "TestSample");

        // Check for External_customer_id
        $obj->setExternalCustomerId(null);
        $this->assertNull($obj->getExternal_customer_id());
        $this->assertNull($obj->getExternalCustomerId());
        $this->assertSame($obj->getExternalCustomerId(), $obj->getExternal_customer_id());
        $obj->setExternal_customer_id("TestSample");
        $this->assertEquals($obj->getExternal_customer_id(), "TestSample");

        // Check for Merchant_id
        $obj->setMerchantId(null);
        $this->assertNull($obj->getMerchant_id());
        $this->assertNull($obj->getMerchantId());
        $this->assertSame($obj->getMerchantId(), $obj->getMerchant_id());
        $obj->setMerchant_id("TestSample");
        $this->assertEquals($obj->getMerchant_id(), "TestSample");

        // Check for Create_time
        $obj->setCreateTime(null);
        $this->assertNull($obj->getCreate_time());
        $this->assertNull($obj->getCreateTime());
        $this->assertSame($obj->getCreateTime(), $obj->getCreate_time());
        $obj->setCreate_time("TestSample");
        $this->assertEquals($obj->getCreate_time(), "TestSample");

        // Check for Update_time
        $obj->setUpdateTime(null);
        $this->assertNull($obj->getUpdate_time());
        $this->assertNull($obj->getUpdateTime());
        $this->assertSame($obj->getUpdateTime(), $obj->getUpdate_time());
        $obj->setUpdate_time("TestSample");
        $this->assertEquals($obj->getUpdate_time(), "TestSample");

        // Check for Valid_until
        $obj->setValidUntil(null);
        $this->assertNull($obj->getValid_until());
        $this->assertNull($obj->getValidUntil());
        $this->assertSame($obj->getValidUntil(), $obj->getValid_until());
        $obj->setValid_until("TestSample");
        $this->assertEquals($obj->getValid_until(), "TestSample");

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }


    /**
     * @dataProvider mockProvider
     * @param BankAccount $obj
     */
    public function testCreate($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
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
    /**
     * @dataProvider mockProvider
     * @param BankAccount $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    BankAccountTest::getJson()
            ));

        $result = $obj->get("bankAccountId", $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param BankAccount $obj
     */
    public function testDelete($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    true
            ));

        $result = $obj->delete($mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param BankAccount $obj
     */
    public function testUpdate($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    self::getJson()
            ));
        $patchRequest = PatchRequestTest::getObject();

        $result = $obj->update($patchRequest, $mockApiContext, $mockPPRestCall);
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
