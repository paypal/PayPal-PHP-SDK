<?php
namespace PayPal\Test\Api;

use PayPal\Api\Capture;
use PayPal\Test\Constants;

class CaptureTest extends \PHPUnit_Framework_TestCase {

	private $captures;

	public static $authorization_id = "AUTH-123";
	public static $create_time = "2013-02-28T00:00:00Z";
	public static $description = "Test capture";
	public static $id = "C-5678";
	public static $parent_payment = "PAY-123";
	public static $state = "Created";

	public static function createCapture() {
		$capture = new Capture();
		$capture->setAuthorization_id(self::$authorization_id);
		$capture->setCreate_time(self::$create_time);
		$capture->setDescription(self::$description);
		$capture->setId(self::$id);
		$capture->setParent_payment(self::$parent_payment);
		$capture->setState(self::$state);		
		
		return $capture;
	}
	
	public function setup() {
		$this->captures['partial'] = self::createCapture();
		
		$capture = self::createCapture();
		$capture->setAmount(AmountTest::createAmount());
		$capture->setLinks(array(LinkTest::createLink()));
		$this->captures['full'] = $capture;
	}

	public function testGetterSetter() {
		$this->assertEquals(self::$authorization_id, $this->captures['partial']->getAuthorization_id());
		$this->assertEquals(self::$create_time, $this->captures['partial']->getCreate_time());
		$this->assertEquals(self::$description, $this->captures['partial']->getDescription());
		$this->assertEquals(self::$id, $this->captures['partial']->getId());
		$this->assertEquals(self::$parent_payment, $this->captures['partial']->getParent_payment());
		$this->assertEquals(self::$state, $this->captures['partial']->getState());
		
		$this->assertEquals(AmountTest::$currency, $this->captures['full']->getAmount()->getCurrency());
		$links = $this->captures['full']->getLinks();
		$this->assertEquals(LinkTest::$href, $links[0]->getHref());
	}
	
	public function testSerializeDeserialize() {
		$c1 = $this->captures['partial'];
		
		$c2 = new Capture();
		$c2->fromJson($c1->toJson());
		
		$this->assertEquals($c1, $c2);
	}
}