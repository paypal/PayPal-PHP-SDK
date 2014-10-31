<?php

namespace PayPal\Test\Api;

use PayPal\Common\ResourceModel;
use PayPal\Validation\ArgumentValidator;
use PayPal\Api\PlanList;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PPRestCall;
use PayPal\Api\Plan;

/**
 * Class Plan
 *
 * @package PayPal\Test\Api
 */
class PlanTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object Plan
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","name":"TestSample","description":"TestSample","type":"TestSample","state":"TestSample","create_time":"TestSample","update_time":"TestSample","payment_definitions":' .PaymentDefinitionTest::getJson() . ',"terms":' .TermsTest::getJson() . ',"merchant_preferences":' .MerchantPreferencesTest::getJson() . ',"links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Plan
     */
    public static function getObject()
    {
        return new Plan(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Plan
     */
    public function testSerializationDeserialization()
    {
        $obj = new Plan(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertNotNull($obj->getName());
        $this->assertNotNull($obj->getDescription());
        $this->assertNotNull($obj->getType());
        $this->assertNotNull($obj->getState());
        $this->assertNotNull($obj->getCreateTime());
        $this->assertNotNull($obj->getUpdateTime());
        $this->assertNotNull($obj->getPaymentDefinitions());
        $this->assertNotNull($obj->getTerms());
        $this->assertNotNull($obj->getMerchantPreferences());
        $this->assertNotNull($obj->getLinks());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Plan $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getId(), "TestSample");
        $this->assertEquals($obj->getName(), "TestSample");
        $this->assertEquals($obj->getDescription(), "TestSample");
        $this->assertEquals($obj->getType(), "TestSample");
        $this->assertEquals($obj->getState(), "TestSample");
        $this->assertEquals($obj->getCreateTime(), "TestSample");
        $this->assertEquals($obj->getUpdateTime(), "TestSample");
        $this->assertEquals($obj->getPaymentDefinitions(), PaymentDefinitionTest::getObject());
        $this->assertEquals($obj->getTerms(), TermsTest::getObject());
        $this->assertEquals($obj->getMerchantPreferences(), MerchantPreferencesTest::getObject());
        $this->assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param Plan $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getCreate_time(), "TestSample");
        $this->assertEquals($obj->getUpdate_time(), "TestSample");
        $this->assertEquals($obj->getPayment_definitions(), PaymentDefinitionTest::getObject());
        $this->assertEquals($obj->getMerchant_preferences(), MerchantPreferencesTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param Plan $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

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

        // Check for Payment_definitions
        $obj->setPaymentDefinitions(null);
        $this->assertNull($obj->getPayment_definitions());
        $this->assertNull($obj->getPaymentDefinitions());
        $this->assertSame($obj->getPaymentDefinitions(), $obj->getPayment_definitions());
        $obj->setPayment_definitions(PaymentDefinitionTest::getObject());
        $this->assertEquals($obj->getPayment_definitions(), PaymentDefinitionTest::getObject());

        // Check for Merchant_preferences
        $obj->setMerchantPreferences(null);
        $this->assertNull($obj->getMerchant_preferences());
        $this->assertNull($obj->getMerchantPreferences());
        $this->assertSame($obj->getMerchantPreferences(), $obj->getMerchant_preferences());
        $obj->setMerchant_preferences(MerchantPreferencesTest::getObject());
        $this->assertEquals($obj->getMerchant_preferences(), MerchantPreferencesTest::getObject());

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }


    /**
     * @dataProvider mockProvider
     * @param Plan $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    PlanTest::getJson()
            ));

        $result = $obj->get("planId", $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Plan $obj
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
     * @param Plan $obj
     */
    public function testUpdate($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    true
            ));
        $patchRequest = PatchRequestTest::getObject();

        $result = $obj->update($patchRequest, $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Plan $obj
     */
    public function testList($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    PlanListTest::getJson()
            ));
        $params = ParamsTest::getObject();

        $result = $obj->all($params, $mockApiContext, $mockPPRestCall);
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
