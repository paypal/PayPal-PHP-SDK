<?php

namespace PayPal\Test\Api;

use PayPal\Common\ResourceModel;
use PayPal\Validation\ArgumentValidator;
use PayPal\Api\AgreementTransactions;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PPRestCall;
use PayPal\Api\Agreement;

/**
 * Class Agreement
 *
 * @package PayPal\Test\Api
 */
class AgreementTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object Agreement
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","state":"TestSample","name":"TestSample","description":"TestSample","start_date":"TestSample","payer":' .PayerTest::getJson() . ',"shipping_address":' .AddressTest::getJson() . ',"override_merchant_preferences":' .MerchantPreferencesTest::getJson() . ',"override_charge_models":' .OverrideChargeModelTest::getJson() . ',"plan":' .PlanTest::getJson() . ',"create_time":"TestSample","update_time":"TestSample","links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Agreement
     */
    public static function getObject()
    {
        return new Agreement(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Agreement
     */
    public function testSerializationDeserialization()
    {
        $obj = new Agreement(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertNotNull($obj->getState());
        $this->assertNotNull($obj->getName());
        $this->assertNotNull($obj->getDescription());
        $this->assertNotNull($obj->getStartDate());
        $this->assertNotNull($obj->getPayer());
        $this->assertNotNull($obj->getShippingAddress());
        $this->assertNotNull($obj->getOverrideMerchantPreferences());
        $this->assertNotNull($obj->getOverrideChargeModels());
        $this->assertNotNull($obj->getPlan());
        $this->assertNotNull($obj->getCreateTime());
        $this->assertNotNull($obj->getUpdateTime());
        $this->assertNotNull($obj->getLinks());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Agreement $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getId(), "TestSample");
        $this->assertEquals($obj->getState(), "TestSample");
        $this->assertEquals($obj->getName(), "TestSample");
        $this->assertEquals($obj->getDescription(), "TestSample");
        $this->assertEquals($obj->getStartDate(), "TestSample");
        $this->assertEquals($obj->getPayer(), PayerTest::getObject());
        $this->assertEquals($obj->getShippingAddress(), AddressTest::getObject());
        $this->assertEquals($obj->getOverrideMerchantPreferences(), MerchantPreferencesTest::getObject());
        $this->assertEquals($obj->getOverrideChargeModels(), OverrideChargeModelTest::getObject());
        $this->assertEquals($obj->getPlan(), PlanTest::getObject());
        $this->assertEquals($obj->getCreateTime(), "TestSample");
        $this->assertEquals($obj->getUpdateTime(), "TestSample");
        $this->assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param Agreement $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getStart_date(), "TestSample");
        $this->assertEquals($obj->getShipping_address(), AddressTest::getObject());
        $this->assertEquals($obj->getOverride_merchant_preferences(), MerchantPreferencesTest::getObject());
        $this->assertEquals($obj->getOverride_charge_models(), OverrideChargeModelTest::getObject());
        $this->assertEquals($obj->getCreate_time(), "TestSample");
        $this->assertEquals($obj->getUpdate_time(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param Agreement $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Start_date
        $obj->setStartDate(null);
        $this->assertNull($obj->getStart_date());
        $this->assertNull($obj->getStartDate());
        $this->assertSame($obj->getStartDate(), $obj->getStart_date());
        $obj->setStart_date("TestSample");
        $this->assertEquals($obj->getStart_date(), "TestSample");

        // Check for Shipping_address
        $obj->setShippingAddress(null);
        $this->assertNull($obj->getShipping_address());
        $this->assertNull($obj->getShippingAddress());
        $this->assertSame($obj->getShippingAddress(), $obj->getShipping_address());
        $obj->setShipping_address(AddressTest::getObject());
        $this->assertEquals($obj->getShipping_address(), AddressTest::getObject());

        // Check for Override_merchant_preferences
        $obj->setOverrideMerchantPreferences(null);
        $this->assertNull($obj->getOverride_merchant_preferences());
        $this->assertNull($obj->getOverrideMerchantPreferences());
        $this->assertSame($obj->getOverrideMerchantPreferences(), $obj->getOverride_merchant_preferences());
        $obj->setOverride_merchant_preferences(MerchantPreferencesTest::getObject());
        $this->assertEquals($obj->getOverride_merchant_preferences(), MerchantPreferencesTest::getObject());

        // Check for Override_charge_models
        $obj->setOverrideChargeModels(null);
        $this->assertNull($obj->getOverride_charge_models());
        $this->assertNull($obj->getOverrideChargeModels());
        $this->assertSame($obj->getOverrideChargeModels(), $obj->getOverride_charge_models());
        $obj->setOverride_charge_models(OverrideChargeModelTest::getObject());
        $this->assertEquals($obj->getOverride_charge_models(), OverrideChargeModelTest::getObject());

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

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }


    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
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
     * @param Agreement $obj
     */
    public function testExecute($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    self::getJson()
            ));

        $result = $obj->execute("123123", $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    AgreementTest::getJson()
            ));

        $result = $obj->get("agreementId", $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
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
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testSuspend($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    true
            ));
        $agreementStateDescriptor = AgreementStateDescriptorTest::getObject();

        $result = $obj->suspend($agreementStateDescriptor, $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testReActivate($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    true
            ));
        $agreementStateDescriptor = AgreementStateDescriptorTest::getObject();

        $result = $obj->reActivate($agreementStateDescriptor, $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testCancel($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    true
            ));
        $agreementStateDescriptor = AgreementStateDescriptorTest::getObject();

        $result = $obj->cancel($agreementStateDescriptor, $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testBillBalance($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    true
            ));
        $agreementStateDescriptor = AgreementStateDescriptorTest::getObject();

        $result = $obj->billBalance($agreementStateDescriptor, $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testSetBalance($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    true
            ));
        $currency = CurrencyTest::getObject();

        $result = $obj->setBalance($currency, $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testTransactions($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    AgreementTransactionsTest::getJson()
            ));

        $result = $obj->transactions("agreementId", $mockApiContext, $mockPPRestCall);
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
