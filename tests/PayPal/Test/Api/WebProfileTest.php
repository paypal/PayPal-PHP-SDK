<?php

namespace PayPal\Test\Api;

use PayPal\Common\ResourceModel;
use PayPal\Validation\ArgumentValidator;
use PayPal\Api\CreateProfileResponse;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PPRestCall;
use PayPal\Api\WebProfile;

/**
 * Class WebProfile
 *
 * @package PayPal\Test\Api
 */
class WebProfileTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object WebProfile
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","name":"TestSample","flow_config":' .FlowConfigTest::getJson() . ',"input_fields":' .InputFieldsTest::getJson() . ',"presentation":' .PresentationTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return WebProfile
     */
    public static function getObject()
    {
        return new WebProfile(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return WebProfile
     */
    public function testSerializationDeserialization()
    {
        $obj = new WebProfile(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertNotNull($obj->getName());
        $this->assertNotNull($obj->getFlowConfig());
        $this->assertNotNull($obj->getInputFields());
        $this->assertNotNull($obj->getPresentation());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param WebProfile $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getId(), "TestSample");
        $this->assertEquals($obj->getName(), "TestSample");
        $this->assertEquals($obj->getFlowConfig(), FlowConfigTest::getObject());
        $this->assertEquals($obj->getInputFields(), InputFieldsTest::getObject());
        $this->assertEquals($obj->getPresentation(), PresentationTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param WebProfile $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getFlow_config(), FlowConfigTest::getObject());
        $this->assertEquals($obj->getInput_fields(), InputFieldsTest::getObject());
    }

    /**
     * @depends testSerializationDeserialization
     * @param WebProfile $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Flow_config
        $obj->setFlowConfig(null);
        $this->assertNull($obj->getFlow_config());
        $this->assertNull($obj->getFlowConfig());
        $this->assertSame($obj->getFlowConfig(), $obj->getFlow_config());
        $obj->setFlow_config(FlowConfigTest::getObject());
        $this->assertEquals($obj->getFlow_config(), FlowConfigTest::getObject());

        // Check for Input_fields
        $obj->setInputFields(null);
        $this->assertNull($obj->getInput_fields());
        $this->assertNull($obj->getInputFields());
        $this->assertSame($obj->getInputFields(), $obj->getInput_fields());
        $obj->setInput_fields(InputFieldsTest::getObject());
        $this->assertEquals($obj->getInput_fields(), InputFieldsTest::getObject());

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }


    /**
     * @dataProvider mockProvider
     * @param WebProfile $obj
     */
    public function testCreate($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    CreateProfileResponseTest::getJson()
            ));

        $result = $obj->create($mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param WebProfile $obj
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

        $result = $obj->update($mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param WebProfile $obj
     */
    public function testPartialUpdate($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    true
            ));
        $patch = array(PatchTest::getObject());

        $result = $obj->partial_update($patch, $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param WebProfile $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    WebProfileTest::getJson()
            ));

        $result = $obj->get("profileId", $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param WebProfile $obj
     */
    public function testGetList($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    json_encode(array(json_decode(WebProfileTest::getJson())))
            ));

        $result = $obj->get_list($mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param WebProfile $obj
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
