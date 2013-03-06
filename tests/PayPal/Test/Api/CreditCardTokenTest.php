<?php
namespace PayPal\Test\Api;

use PayPal\Api\CreditCardToken;
use PayPal\Test\Constants;

class CreditCardTokenTest extends \PHPUnit_Framework_TestCase {

	private $ccToken;

	public static $payerId = "PAYER-123";
	public static $creditCardId = "CC-123";

	public static function createCreditCardToken() {
		$ccToken = new CreditCardToken();
		$ccToken->setPayer_id(self::$payerId);
		$ccToken->setCredit_card_id(self::$creditCardId);
		return $ccToken;
	}
	
	public function setup() {
		$this->ccToken = self::createCreditCardToken();		
	}

	public function testGetterSetter() {
		$this->assertEquals(self::$payerId, $this->ccToken->getPayer_id());
		$this->assertEquals(self::$creditCardId, $this->ccToken->getCredit_card_id());
	}
	
	public function testSerializeDeserialize() {
		$t1 = $this->ccToken;
		
		$t2 = new CreditCardToken();
		$t2->fromJson($t1->toJson());
		
		$this->assertEquals($t1, $t2);
	}
}