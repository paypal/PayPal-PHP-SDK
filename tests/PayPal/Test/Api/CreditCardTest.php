<?php

namespace PayPal\Test\Api;

use PayPal\Api\Address;
use PayPal\Api\CreditCard;
use PayPal\Test\Constants;

class CreditCardTest extends \PHPUnit_Framework_TestCase {
	
	private $cards;
	
	public static $id = "id";
	public static $validUntil = "2013-02-28T00:00:00Z";
	public static $state = "created";
	public static $payerId = "payer-id";
	public static $cardType = "visa";
	public static $cardNumber = "4417119669820331";
	public static $expireMonth = 11;
	public static $expireYear = "2019";
	public static $cvv = "012";
	public static $firstName = "V";
	public static $lastName = "C";
	
	public static function createCreditCard() {
		$card = new CreditCard();
		$card->setType(self::$cardType);
		$card->setNumber(self::$cardNumber);
		$card->setExpire_month(self::$expireMonth);
		$card->setExpire_year(self::$expireYear);
		$card->setCvv2(self::$cvv);
		$card->setFirst_name(self::$firstName);
		$card->setLast_name(self::$lastName);
		$card->setId(self::$id);
		$card->setValid_until(self::$validUntil);
		$card->setState(self::$state);
		$card->setPayer_id(self::$payerId);
		return $card;
	}
	
	public function setup() {
		
		$card = self::createCreditCard();
		$card->setBilling_address(AddressTest::createAddress());	
		$card->setLinks(array(LinkTest::createLink()));
		$this->cards['full'] = $card;
		
		$card = self::createCreditCard();	
		$this->cards['partial'] = $card;
	}
	
	public function testGetterSetters() {
		$c = $this->cards['partial'];
		$this->assertEquals(self::$cardType, $c->getType());
		$this->assertEquals(self::$cardNumber, $c->getNumber());
		$this->assertEquals(self::$expireMonth, $c->getExpire_month());
		$this->assertEquals(self::$expireYear, $c->getExpire_year());
		$this->assertEquals(self::$cvv, $c->getCvv2());
		$this->assertEquals(self::$firstName, $c->getFirst_name());
		$this->assertEquals(self::$lastName, $c->getLast_name());
		$this->assertEquals(self::$id, $c->getId());
		$this->assertEquals(self::$validUntil, $c->getValid_until());
		$this->assertEquals(self::$state, $c->getState());
		$this->assertEquals(self::$payerId, $c->getPayer_id());
		
		$c = $this->cards['full'];
		$this->assertEquals(AddressTest::$line1, $c->getBilling_address()->getLine1());
		$link = $c->getLinks();
		$this->assertEquals(LinkTest::$href, $link[0]->getHref());
	}
	
	public function testSerializeDeserialize() {
		$c1 = $this->cards['full'];
		$json = $c1->toJson();
		
		$c2 = new CreditCard();
		$c2->fromJson($json);		
		
		$this->assertEquals($c1, $c2);
	}
	
	public function testOperations() {
		$c1 = $this->cards['full'];
		
// 		$this->assertNull($c1->getId());
		$c1->create();		
		$this->assertNotNull($c1->getId());
		
		$c2 = CreditCard::get($c1->getId());
		$this->assertEquals($c1->getBilling_address(), $c2->getBilling_address());
		$this->assertGreaterThan(0, count($c2->getLinks()));
		$this->assertEquals(self::$cardType, $c2->getType());
		$this->assertNotNull($c2->getState());
	}
}