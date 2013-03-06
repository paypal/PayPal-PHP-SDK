<?php
namespace PayPal\Test\Api;

use PayPal\Api\PayerInfo;
use PayPal\Test\Constants;

class PayerInfoTest extends \PHPUnit_Framework_TestCase {

	private $payerInfo;

	public static $email = "test@paypal.com";
	public static $firstName = "first";
	public static $lastName = "last";
	public static $phone = "408-1234-5687";
	public static $payerId = "PAYER-1234";

	public static function createPayerInfo() {
		$payerInfo = new PayerInfo();
		$payerInfo->setEmail(self::$email);
		$payerInfo->setFirst_name(self::$firstName);
		$payerInfo->setLast_name(self::$lastName);
		$payerInfo->setPhone(self::$phone);
		$payerInfo->setPayer_id(self::$payerId);
		$payerInfo->setShipping_address(AddressTest::createAddress());
		
		return $payerInfo;
	}
	
	public function setup() {
		$this->payerInfo = self::createPayerInfo();
	}

	public function testGetterSetter() {
		$this->assertEquals(self::$email, $this->payerInfo->getEmail());
		$this->assertEquals(self::$firstName, $this->payerInfo->getFirst_name());
		$this->assertEquals(self::$lastName, $this->payerInfo->getLast_name());
		$this->assertEquals(self::$phone, $this->payerInfo->getPhone());
		$this->assertEquals(self::$payerId, $this->payerInfo->getPayer_id());
		$this->assertEquals(AddressTest::$line1, $this->payerInfo->getShipping_address()->getLine1());
	}
	
	public function testSerializeDeserialize() {
		$p1 = $this->payerInfo;
		
		$p2 = new PayerInfo();
		$p2->fromJson($p1->toJson());
		
		$this->assertEquals($p1, $p2);
	}
}