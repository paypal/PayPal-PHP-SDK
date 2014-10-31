<?php

namespace PayPal\Test\Api;

use PayPal\Common\ResourceModel;
use PayPal\Validation\ArgumentValidator;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PPRestCall;
use PayPal\Api\CreditCard;

/**
 * Class CreditCard
 *
 * @package PayPal\Test\Api
 */
class CreditCardTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object CreditCard
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","number":"TestSample","type":"TestSample","expire_month":123,"expire_year":123,"cvv2":123,"first_name":"TestSample","last_name":"TestSample","billing_address":' .AddressTest::getJson() . ',"external_customer_id":"TestSample","state":"TestSample","valid_until":"TestSample","create_time":"TestSample","update_time":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return CreditCard
     */
    public static function getObject()
    {
        return new CreditCard(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return CreditCard
     */
    public function testSerializationDeserialization()
    {
        $obj = new CreditCard(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertNotNull($obj->getNumber());
        $this->assertNotNull($obj->getType());
        $this->assertNotNull($obj->getExpireMonth());
        $this->assertNotNull($obj->getExpireYear());
        $this->assertNotNull($obj->getCvv2());
        $this->assertNotNull($obj->getFirstName());
        $this->assertNotNull($obj->getLastName());
        $this->assertNotNull($obj->getBillingAddress());
        $this->assertNotNull($obj->getExternalCustomerId());
        $this->assertNotNull($obj->getState());
        $this->assertNotNull($obj->getValidUntil());
        $this->assertNotNull($obj->getCreateTime());
        $this->assertNotNull($obj->getUpdateTime());
        $this->assertNotNull($obj->getLinks());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param CreditCard $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getId(), "TestSample");
        $this->assertEquals($obj->getNumber(), "TestSample");
        $this->assertEquals($obj->getType(), "TestSample");
        $this->assertEquals($obj->getExpireMonth(), 123);
        $this->assertEquals($obj->getExpireYear(), 123);
        $this->assertEquals($obj->getCvv2(), 123);
        $this->assertEquals($obj->getFirstName(), "TestSample");
        $this->assertEquals($obj->getLastName(), "TestSample");
        $this->assertEquals($obj->getBillingAddress(), AddressTest::getObject());
        $this->assertEquals($obj->getExternalCustomerId(), "TestSample");
        $this->assertEquals($obj->getState(), "TestSample");
        $this->assertEquals($obj->getValidUntil(), "TestSample");
        $this->assertEquals($obj->getCreateTime(), "TestSample");
        $this->assertEquals($obj->getUpdateTime(), "TestSample");
        $this->assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param CreditCard $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getExpire_month(), 123);
        $this->assertEquals($obj->getExpire_year(), 123);
        $this->assertEquals($obj->getFirst_name(), "TestSample");
        $this->assertEquals($obj->getLast_name(), "TestSample");
        $this->assertEquals($obj->getBilling_address(), AddressTest::getObject());
        $this->assertEquals($obj->getExternal_customer_id(), "TestSample");
        $this->assertEquals($obj->getValid_until(), "TestSample");
        $this->assertEquals($obj->getCreate_time(), "TestSample");
        $this->assertEquals($obj->getUpdate_time(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param CreditCard $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Expire_month
        $obj->setExpireMonth(null);
        $this->assertNull($obj->getExpire_month());
        $this->assertNull($obj->getExpireMonth());
        $this->assertSame($obj->getExpireMonth(), $obj->getExpire_month());
        $obj->setExpire_month(123);
        $this->assertEquals($obj->getExpire_month(), 123);

        // Check for Expire_year
        $obj->setExpireYear(null);
        $this->assertNull($obj->getExpire_year());
        $this->assertNull($obj->getExpireYear());
        $this->assertSame($obj->getExpireYear(), $obj->getExpire_year());
        $obj->setExpire_year(123);
        $this->assertEquals($obj->getExpire_year(), 123);

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

        // Check for Billing_address
        $obj->setBillingAddress(null);
        $this->assertNull($obj->getBilling_address());
        $this->assertNull($obj->getBillingAddress());
        $this->assertSame($obj->getBillingAddress(), $obj->getBilling_address());
        $obj->setBilling_address(AddressTest::getObject());
        $this->assertEquals($obj->getBilling_address(), AddressTest::getObject());

        // Check for External_customer_id
        $obj->setExternalCustomerId(null);
        $this->assertNull($obj->getExternal_customer_id());
        $this->assertNull($obj->getExternalCustomerId());
        $this->assertSame($obj->getExternalCustomerId(), $obj->getExternal_customer_id());
        $obj->setExternal_customer_id("TestSample");
        $this->assertEquals($obj->getExternal_customer_id(), "TestSample");

        // Check for Valid_until
        $obj->setValidUntil(null);
        $this->assertNull($obj->getValid_until());
        $this->assertNull($obj->getValidUntil());
        $this->assertSame($obj->getValidUntil(), $obj->getValid_until());
        $obj->setValid_until("TestSample");
        $this->assertEquals($obj->getValid_until(), "TestSample");

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
     * @param CreditCard $obj
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
     * @param CreditCard $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    CreditCardTest::getJson()
            ));

        $result = $obj->get("creditCardId", $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param CreditCard $obj
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
     * @param CreditCard $obj
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

        $result = $obj->update($mockApiContext, $mockPPRestCall);
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
