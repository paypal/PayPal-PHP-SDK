<?php

namespace PayPal\Test\Functional\Api;
use PayPal\Api\CancelNotification;
use PayPal\Api\Invoice;
use PayPal\Api\Notification;
use PayPal\Api\PaymentDetail;
use PayPal\Api\RefundDetail;
use PayPal\Api\Search;

/**
 * Class Invoice
 *
 * @package PayPal\Test\Api
 */
class InvoiceFunctionalTest extends \PHPUnit_Framework_TestCase
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
        $obj = new Invoice($request);
        $result = $obj->create(null, $this->mockPPRestCall);
        $this->assertNotNull($result);
        self::$obj = $result;
        return $result;
    }

    /**
     * @depends testCreate
     * @param $invoice Invoice
     * @return Invoice
     */
    public function testGet($invoice)
    {
        $result = Invoice::get($invoice->getId(), null, $this->mockPPRestCall);
        $this->assertNotNull($result);
        $this->assertEquals($invoice->getId(), $result->getId());
        return $result;
    }

    /**
     * @depends testCreate
     * @param $invoice Invoice
     * @return Invoice
     */
    public function testSend($invoice)
    {
        $result = $invoice->send(null, $this->mockPPRestCall);
        $this->assertNotNull($result);
        return $invoice;
    }

    /**
     * @depends testSend
     * @param $invoice Invoice
     * @return Invoice
     */
    public function testUpdate($invoice)
    {
        $this->markTestSkipped('Skipped as the fix is on the way. #PPTIPS-1932');
        $result = $invoice->update(null, $this->mockPPRestCall);
        $this->assertNotNull($result);
        $this->assertEquals($invoice->getId(), $result->getId());
    }

    /**
     * @depends testSend
     * @param $invoice Invoice
     * @return Invoice
     */
    public function testGetAll($invoice)
    {
        $result = Invoice::getAll(array('page_size' => '20', 'total_count_required' => 'true'), null, $this->mockPPRestCall);
        $this->assertNotNull($result);
        $this->assertNotNull($result->getTotalCount());
        $totalPages = ceil($result->getTotalCount()/20);
        $found = false;
        $foundObject = null;
        do {
            foreach ($result->getInvoices() as $obj) {
                if ($obj->getId() == $invoice->getId()) {
                    $found = true;
                    $foundObject = $obj;
                    break;
                }
            }
            if (!$found) {
                $result = Invoice::getAll(array('page' => --$totalPages, 'page_size' => '20', 'total_required' => 'yes'), null, $this->mockPPRestCall);

            }
        } while ($totalPages > 0 && $found == false);
        $this->assertTrue($found, "The Created Invoice was not found in the get list");
        $this->assertEquals($invoice->getId(), $foundObject->getId());
    }

    /**
     * @depends testSend
     * @param $invoice Invoice
     * @return Invoice
     */
    public function testSearch($invoice)
    {
        $request = $this->operation['request']['body'];
        $search = new Search($request);
        $result = Invoice::search($search, null, $this->mockPPRestCall);
        $this->assertNotNull($result);
        $this->assertNotNull($result->getTotalCount());
    }

    /**
     * @depends testSend
     * @param $invoice Invoice
     * @return Invoice
     */
    public function testRemind($invoice)
    {
        $request = $this->operation['request']['body'];
        $notification = new Notification($request);
        $result = $invoice->remind($notification, null, $this->mockPPRestCall);
        $this->assertNotNull($result);
    }

    /**
     * @depends testSend
     * @param $invoice Invoice
     * @return Invoice
     */
    public function testCancel($invoice)
    {
        $request = $this->operation['request']['body'];
        $notification = new CancelNotification($request);
        $result = $invoice->cancel($notification, null, $this->mockPPRestCall);
        $this->assertNotNull($result);
    }

    /**
     * @depends testSend
     * @param $invoice Invoice
     * @return Invoice
     */
    public function testQRCode($invoice)
    {
        $result = Invoice::qrCode($invoice->getId(), array(), null, $this->mockPPRestCall);
        $this->assertNotNull($result);
        $this->assertNotNull($result->getImage());
    }

    /**
     * @depends testSend
     * @param $invoice Invoice
     * @return Invoice
     */
    public function testRecordPayment($invoice)
    {
        $this->setupTest($this->getClassName(), 'testCreate');
        $invoice = $this->testCreate($invoice);
        $this->setupTest($this->getClassName(), 'testSend');
        $invoice = $this->testSend($invoice);
        $this->setupTest($this->getClassName(), 'testRecordPayment');
        $request = $this->operation['request']['body'];
        $paymentDetail = new PaymentDetail($request);
        $result = $invoice->recordPayment($paymentDetail, null, $this->mockPPRestCall);
        $this->assertNotNull($result);
        return $invoice;
    }


    /**
     * @depends testRecordPayment
     * @param $invoice Invoice
     * @return Invoice
     */
    public function testRecordRefund($invoice)
    {
        $request = $this->operation['request']['body'];
        $refundDetail = new RefundDetail($request);
        $result = $invoice->recordRefund($refundDetail, null, $this->mockPPRestCall);
        $this->assertNotNull($result);
        $this->setupTest($this->getClassName(), 'testDelete');
        $invoice = $this->testDelete($invoice);
        return $invoice;
    }

    /**
     * @depends testGet
     * @param $invoice Invoice
     * @return Invoice
     */
    public function testDelete($invoice)
    {
        $this->setupTest($this->getClassName(), 'testCreate');
        $invoice = $this->testCreate($invoice);
        $this->setupTest($this->getClassName(), 'testDelete');
        $result = $invoice->delete(null, $this->mockPPRestCall);
        $this->assertNotNull($result);
    }


}
