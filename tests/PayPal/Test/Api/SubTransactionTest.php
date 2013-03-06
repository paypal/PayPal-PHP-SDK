<?php
namespace PayPal\Test\Api;

use PayPal\Api\SubTransaction;
use PayPal\Test\Constants;

class SubTransactionTest extends \PHPUnit_Framework_TestCase {

	private $subTransaction;

	public static function createSubTransaction() {
		$subTransaction = new SubTransaction();
		$subTransaction->setAuthorization(AuthorizationTest::createAuthorization());
		$subTransaction->setCapture(CaptureTest::createCapture());
		return $subTransaction;
	}
	
	public function setup() {
		$this->subTransaction = self::createSubTransaction();
	}

	public function testGetterSetter() {
		$this->assertEquals(AuthorizationTest::$create_time, $this->subTransaction->getAuthorization()->getCreate_Time());
		$this->assertEquals(CaptureTest::$create_time, $this->subTransaction->getCapture()->getCreate_Time());
	}
	
	public function testSerializeDeserialize() {
		$s1 = $this->subTransaction;
		
		$s2 = new SubTransaction();
		$s2->fromJson($s1->toJson());
		
		$this->assertEquals($s1, $s2);
	}
}