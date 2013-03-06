<?php

namespace PayPal\Test\Api;

use PayPal\Api\FundingInstrument;
use PayPal\Test\Constants;

class FundingInstrumentTest extends \PHPUnit_Framework_TestCase {

	private $fi;

	public static function createFundingInstrument() {
		$fi = new FundingInstrument();
		$fi->setCredit_card(CreditCardTest::createCreditCard());
		$fi->setCredit_card_token(CreditCardTokenTest::createCreditCardToken());
		return $fi;
	}
	
	public function setup() {
		$this->fi = self::createFundingInstrument();
	}

	public function testGetterSetter() {
		$this->assertEquals(CreditCardTest::$cardNumber, $this->fi->getCredit_card()->getNumber());
		$this->assertEquals(CreditCardTokenTest::$creditCardId, 
				$this->fi->getCredit_card_token()->getCredit_card_id());
	}
	
	public function testSerializeDeserialize() {
		$fi1 = $this->fi;
		
		$fi2 = new FundingInstrument();
		$fi2->fromJson($fi1->toJson());		
		$this->assertEquals($fi1, $fi2);
	}
}