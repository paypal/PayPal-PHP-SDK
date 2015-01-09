<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Validation\ArgumentValidator;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PayPalRestCall;
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
     * @dataProvider mockProvider
     * @param BankAccount $obj
     */
    public function testCreate($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    self::getJson()
            ));

        $result = $obj->create($mockApiContext, $mockPayPalRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param BankAccount $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    BankAccountTest::getJson()
            ));

        $result = $obj->get("bankAccountId", $mockApiContext, $mockPayPalRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param BankAccount $obj
     */
    public function testDelete($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    true
            ));

        $result = $obj->delete($mockApiContext, $mockPayPalRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param BankAccount $obj
     */
    public function testUpdate($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    self::getJson()
            ));
        $patchRequest = PatchRequestTest::getObject();

        $result = $obj->update($patchRequest, $mockApiContext, $mockPayPalRestCall);
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
