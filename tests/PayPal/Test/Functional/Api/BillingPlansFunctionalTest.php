<?php

namespace PayPal\Test\Functional\Api;

use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Api\Plan;
use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;
use PayPal\Rest\IResource;
use PayPal\Api\CreateProfileResponse;
use PayPal\Transport\PPRestCall;
use PayPal\Api\WebProfile;

/**
 * Class Billing Plans
 *
 * @package PayPal\Test\Api
 */
class BillingPlansFunctionalTest extends \PHPUnit_Framework_TestCase
{

    public static $obj;

    public $operation;

    public $response;

    public $mode = 'mock';

    public $mockPPRestCall;

    public function setUp()
    {
        $className = $this->getClassName();
        $testName = $this->getName();
        $this->setupTest($className, $testName);
    }

    public function setupTest($className, $testName)
    {
        $operationString = file_get_contents(__DIR__ . "/../resources/$className/$testName.json");
        $this->operation = json_decode($operationString, true);
        $this->response = true;
        if (array_key_exists('body', $this->operation['response'])) {
            $this->response = json_encode($this->operation['response']['body']);
        }

        $this->mode = getenv('REST_MODE') ? getenv('REST_MODE') : 'mock';
        if ($this->mode != 'sandbox') {

            // Mock PPRest Caller if mode set to mock
            $this->mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
                ->disableOriginalConstructor()
                ->getMock();

            $this->mockPPRestCall->expects($this->any())
                ->method('execute')
                ->will($this->returnValue(
                    $this->response
                ));
        }
    }

    /**
     * Helper function to get a Plan object in Active State
     *
     * @return Plan
     */
    public static function getPlan()
    {
        if (!self::$obj) {
            $test = new self();
            // Creates a Plan
            $test->setupTest($test->getClassName(), 'testCreate');
            self::$obj = $test->testCreate();
            // Updates the Status to Active
            $test->setupTest($test->getClassName(), 'testUpdateChangingState');
            self::$obj = $test->testUpdateChangingState(self::$obj);
        }
        return self::$obj;
    }

    /**
     * Returns just the classname of the test you are executing. It removes the namespaces.
     * @return string
     */
    public function getClassName()
    {
        return join('', array_slice(explode('\\', get_class($this)), -1));
    }

    public function testCreate()
    {
        $request = $this->operation['request']['body'];
        $obj = new Plan($request);
        $result = $obj->create(null, $this->mockPPRestCall);
        $this->assertNotNull($result);
        self::$obj = $result;
        return $result;
    }

    public function testCreateWithNOChargeModel()
    {
        $request = $this->operation['request']['body'];
        $obj = new Plan($request);
        $result = $obj->create(null, $this->mockPPRestCall);
        $this->assertNotNull($result);
        return $result;
    }

    /**
     * @depends testCreate
     * @param $plan Plan
     * @return Plan
     */
    public function testGet($plan)
    {
        $result = Plan::get($plan->getId(), null, $this->mockPPRestCall);
        $this->assertNotNull($result);
        $this->assertEquals($plan->getId(), $result->getId());
        $this->assertEquals($plan, $result, "", 0, 10, true);
        return $result;
    }

    /**
     * @depends testGet
     * @param $plan Plan
     */
    public function testGetList($plan)
    {
        $result = Plan::all(array('page_size' => '20', 'total_required' => 'yes'), null, $this->mockPPRestCall);
        $this->assertNotNull($result);
        $totalPages = $result->getTotalPages();
        $found = false;
        $foundObject = null;
        do {
            foreach ($result->getPlans() as $obj) {
                if ($obj->getId() == $plan->getId()) {
                    $found = true;
                    $foundObject = $obj;
                    break;
                }
            }
            if (!$found) {
                $result = Plan::all(array('page' => --$totalPages, 'page_size' => '20', 'total_required' => 'yes'), null, $this->mockPPRestCall);

            }
        } while ($totalPages > 0 && $found == false);
        $this->assertTrue($found, "The Created Plan was not found in the get list");
        $this->assertEquals($plan->getId(), $foundObject->getId());

    }

    /**
     * @depends testGet
     * @param $plan Plan
     */
    public function testUpdateChangingMerchantPreferences($plan)
    {
        /** @var Patch[] $request */
        $request = $this->operation['request']['body'][0];
        $patch = new Patch();
        $patch->setOp($request['op']);
        $patch->setPath($request['path']);
        $patch->setValue($request['value']);
        $patches = array();
        $patches[] = $patch;
        $patchRequest = new PatchRequest();
        $patchRequest->setPatches($patches);
        $result = $plan->update($patchRequest, null, $this->mockPPRestCall);
        $this->assertTrue($result);
    }

    /**
     * @depends testGet
     * @param $plan Plan
     */
    public function testUpdateChangingPD($plan)
    {
        /** @var Patch[] $request */
        $request = $this->operation['request']['body'][0];
        $patch = new Patch();
        $patch->setOp($request['op']);
        $paymentDefinitions = $plan->getPaymentDefinitions();
        $patch->setPath('/payment-definitions/' . $paymentDefinitions[0]->getId());
        $patch->setValue($request['value']);
        $patches = array();
        $patches[] = $patch;
        $patchRequest = new PatchRequest();
        $patchRequest->setPatches($patches);
        $result = $plan->update($patchRequest, null, $this->mockPPRestCall);
        $this->assertTrue($result);
    }

    /**
     * @depends testGet
     * @param $plan Plan
     * @return Plan
     */
    public function testUpdateChangingState($plan)
    {
        /** @var Patch[] $request */
        $request = $this->operation['request']['body'][0];
        $patch = new Patch();
        $patch->setOp($request['op']);
        $patch->setPath($request['path']);
        $patch->setValue($request['value']);
        $patches = array();
        $patches[] = $patch;
        $patchRequest = new PatchRequest();
        $patchRequest->setPatches($patches);
        $result = $plan->update($patchRequest, null, $this->mockPPRestCall);
        $this->assertTrue($result);
        return Plan::get($plan->getId(), null, $this->mockPPRestCall);
    }
}
