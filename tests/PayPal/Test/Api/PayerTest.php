<?php

namespace PayPal\Test\Api;

use PayPal\Api\FundingInstrument;

use PayPal\Api\Payer;
use PayPal\Test\Constants;

class PayerTest extends \PHPUnit_Framework_TestCase {

	private $payer;

	private static $paymentMethod = "credit_card";

	public static function createPayer() {
		$payer = new Payer();
		$payer->setPayment_method(self::$paymentMethod);
		$payer->setPayer_info(PayerInfoTest::createPayerInfo());
		$payer->setFunding_instruments(array(FundingInstrumentTest::createFundingInstrument()));
		
		return $payer;
	}
	
	public function setup() {
		$this->payer = self::createPayer();
	}

	public function testGetterSetter() {
		$this->assertEquals(self::$paymentMethod, $this->payer->getPayment_method());
		$this->assertEquals(PayerInfoTest::$email, $this->payer->getPayer_info()->getEmail());
		
		$fi = $this->payer->getFunding_instruments();
		$this->assertEquals(CreditCardTokenTest::$creditCardId, $fi[0]->getCredit_card_token()->getCredit_card_id());
	}
	
	public function testSerializeDeserialize() {
		$p1 = $this->payer;
		
		$p2 = new Payer();
		$p2->fromJson($p1->toJson());
		
		$this->assertEquals($p1, $p2);
	}
}