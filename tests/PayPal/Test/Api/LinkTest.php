<?php

namespace PayPal\Test\Api;

use PayPal\Api\Link;
use PayPal\Test\Constants;

class LinkTest extends \PHPUnit_Framework_TestCase {

	private $link;

	public static $href = "USD";
	public static $rel = "1.12";
	public static $method = "1.12";
	
	public static function createLink() {
		$link = new Link();
		$link->setHref(self::$href);
		$link->setRel(self::$rel);
		$link->setMethod(self::$method);
		
		return $link;
	}
	
	public function setup() {
		$this->link = self::createLink();
	}
	
	public function testGetterSetters() {
		$this->assertEquals(self::$href, $this->link->getHref());
		$this->assertEquals(self::$rel, $this->link->getRel());
		$this->assertEquals(self::$method, $this->link->getMethod());
	}
	
	public function testSerializeDeserialize() {
		$link2 = new Link();
		$link2->fromJson($this->link->toJSON());
		$this->assertEquals($this->link, $link2);
	}
}