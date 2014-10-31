<?php

namespace PayPal\Test\Functional\Api;

use PayPal\Api\Agreement;
use PayPal\Api\AgreementStateDescriptor;
use PayPal\Api\Currency;
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
 * Class Billing Agreements
 *
 * @package PayPal\Test\Api
 */
class BillingAgreementsFunctionalTest extends \PHPUnit_Framework_TestCase
{

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
     * Returns just the classname of the test you are executing. It removes the namespaces.
     * @return string
     */
    public function getClassName()
    {
        return join('', array_slice(explode('\\', get_class($this)), -1));
    }

    /**
     * @return Agreement
     */
    public function testCreatePayPalAgreement()
    {
        $plan = BillingPlansFunctionalTest::getPlan();
        $request = $this->operation['request']['body'];
        $agreement = new Agreement($request);
        // Update the Schema to use a working Plan
        $agreement->getPlan()->setId($plan->getId());
        $result = $agreement->create(null, $this->mockPPRestCall);
        $this->assertNotNull($result);
        return $result;
    }

    /**
     * @depends testCreatePayPalAgreement
     * @param $agreement Agreement
     * @return Agreement
     */
    public function testExecute($agreement)
    {
        if ($this->mode == 'sandbox') {
            $this->markTestSkipped('Not executable on sandbox environment. Needs human interaction');
        }
        $links = $agreement->getLinks();
        $url = parse_url($links[0]->getHref(), 6);
        parse_str($url, $result);
        $paymentToken = $result['token'];
        $this->assertNotNull($paymentToken);
        $this->assertNotEmpty($paymentToken);
        $result = $agreement->execute($paymentToken, null, $this->mockPPRestCall);
        return $result;
    }

    /**
     * @return Agreement
     */
    public function testCreateCCAgreement()
    {
        $plan = BillingPlansFunctionalTest::getPlan();
        $request = $this->operation['request']['body'];
        $agreement = new Agreement($request);
        // Update the Schema to use a working Plan
        $agreement->getPlan()->setId($plan->getId());
        $result = $agreement->create(null, $this->mockPPRestCall);
        $this->assertNotNull($result);
        return $result;
    }

    /**
     * @depends testCreateCCAgreement
     * @param $agreement Agreement
     * @return Plan
     */
    public function testGet($agreement)
    {
        $result = Agreement::get($agreement->getId(), null, $this->mockPPRestCall);
        $this->assertNotNull($result);
        $this->assertEquals($agreement->getId(), $result->getId());
        return $result;
    }

    /**
     * @depends testGet
     * @param $agreement Agreement
     */
    public function testUpdate($agreement)
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
        $result = $agreement->update($patchRequest, null, $this->mockPPRestCall);
        $this->assertTrue($result);
    }

    /**
     * @depends testGet
     * @param $agreement Agreement
     * @return Agreement
     */
    public function testSetBalance($agreement)
    {
        $this->markTestSkipped('Skipped as the fix is on the way.');
        $currency = new Currency($this->operation['request']['body']);
        $result = $agreement->setBalance($currency, null, $this->mockPPRestCall);
        $this->assertTrue($result);
        return $agreement;
    }

    /**
     * @depends testGet
     * @param $agreement Agreement
     * @return Agreement
     */
    public function testBillBalance($agreement)
    {
        $this->markTestSkipped('Skipped as the fix is on the way.');
        $agreementStateDescriptor = new AgreementStateDescriptor($this->operation['request']['body']);
        $result = $agreement->billBalance($agreementStateDescriptor, null, $this->mockPPRestCall);
        $this->assertTrue($result);
        return $agreement;
    }

    /**
     * @depends testGet
     * @param $agreement Agreement
     * @return Agreement
     */
    public function testGetTransactions($agreement)
    {
        $this->markTestSkipped('Skipped as the fix is on the way.');
        $result = Agreement::transactions($agreement->getId(), null, $this->mockPPRestCall);
        $this->assertNotNull($result);
    }

    /**
     * @depends testGet
     * @param $agreement Agreement
     * @return Agreement
     */
    public function testSuspend($agreement)
    {
        $agreementStateDescriptor = new AgreementStateDescriptor($this->operation['request']['body']);
        $result = $agreement->suspend($agreementStateDescriptor, null, $this->mockPPRestCall);
        $this->setupTest($this->getClassName(), 'testGetSuspended');
        $get = $this->testGet($agreement);
        $this->assertTrue($result);
        $this->assertEquals('Suspended', $get->getState());
        return $get;
    }

    /**
     * @depends testSuspend
     * @param $agreement Agreement
     * @return Agreement
     */
    public function testReactivate($agreement)
    {
        $agreementStateDescriptor = new AgreementStateDescriptor($this->operation['request']['body']);
        $result = $agreement->reActivate($agreementStateDescriptor, null, $this->mockPPRestCall);
        $this->assertTrue($result);
        $this->setupTest($this->getClassName(), 'testGet');
        $get = $this->testGet($agreement);
        $this->assertEquals('Active', $get->getState());
        return $get;
    }

    /**
     * @depends testReactivate
     * @param $agreement Agreement
     * @return Agreement
     */
    public function testCancel($agreement)
    {
        $agreementStateDescriptor = new AgreementStateDescriptor($this->operation['request']['body']);
        $result = $agreement->cancel($agreementStateDescriptor, null, $this->mockPPRestCall);
        $this->assertTrue($result);
        $this->setupTest($this->getClassName(), 'testGetCancelled');
        $get = $this->testGet($agreement);
        $this->assertEquals('Cancelled', $get->getState());
        return $get;
    }

}
