<?php
namespace PayPal\Test\Api;

use PayPal\Api\Amount;
use PayPal\Api\Authorization;
use PayPal\Api\Link;
use PayPal\Test\Constants;

class AuthorizationTest extends \PHPUnit_Framework_TestCase {

	private $authorizations = array();

	public static $create_time = "2013-02-28T00:00:00Z";
	public static $id = "AUTH-123";
	public static $state = "Created";
	public static $parent_payment = "PAY-12345";
	
	public static $currency = "USD";
	public static $total = "1.12";
	
	public static $href = "USD";
	public static $rel = "1.12";
	public static $method = "1.12";
	
	public static function createAuthorization() {			
		$authorization = new Authorization();
		$authorization->setCreate_time(self::$create_time);
		$authorization->setId(self::$id);
		$authorization->setState(self::$state);
		
		$authorization->setAmount(AmountTest::createAmount());
		$authorization->setLinks(array(LinkTest::createLink()));	
		
		return $authorization;
	}
	
	public function setup() {
		$authorization = new Authorization();
		$authorization->setCreate_time(self::$create_time);
		$authorization->setId(self::$id);
		$authorization->setState(self::$state);
		$authorization->setParent_payment(self::$parent_payment);
		$this->authorizations['partial'] = $authorization;
	
		
		$this->authorizations['full'] = self::createAuthorization();
	}

	public function testGetterSetter() {		
		$authorization = $this->authorizations['partial'];
		$this->assertEquals(self::$create_time, $authorization->getCreate_time());
		$this->assertEquals(self::$id, $authorization->getId());
		$this->assertEquals(self::$state, $authorization->getState());
		$this->assertEquals(self::$parent_payment, $authorization->getParent_payment());
		
		$authorization = $this->authorizations['full'];
		$this->assertEquals(AmountTest::$currency, $authorization->getAmount()->getCurrency());
		$this->assertEquals(1, count($authorization->getLinks()));
	}
	
	public function testSerializeDeserialize() {
		$a1 = $this->authorizations['partial'];
		
		$a2 = new Authorization();
		$a2->fromJson($a1->toJson());
		
		$this->assertEquals($a1, $a2);
	}
}