<?php 

// namespace PayPal\Test\Common;

use PayPal\Common\Model;

class SimpleClass extends Model {

	public function setName($name) {
		$this->name = $name;
	}
	public function getName() {
		return $this->name;
	}
	
	public function setDescription($desc) {
		$this->desc = $desc;
	}
	public function getDescription() {
		return $this->desc;
	}
}

class ArrayClass extends Model {

	public function setName($name) {
		$this->name = $name;
	}
	public function getName() {
		return $this->name;
	}

	public function setDescription($desc) {
		$this->desc = $desc;
	}
	public function getDescription() {
		return $this->desc;
	}
	
	public function setTags($tags) {
		if(!is_array($tags)) {
			$tags = array($tags);
		}
		$this->tags = $tags;
	}
	public function getTags() {
		return $this->tags;
	}
}

class NestedClass extends Model {
	
	public function setId($id) {
		$this->id = $id;
	}
	public function getId() {
		return $this->id;
	}
	
	/**
	 * 
	 * @param ArrayClass $info
	 */
	public function setInfo($info) {
		$this->info = $info;
	}
	public function getInfo() {
		return $this->info;
	}
}

class ChildClass extends SimpleClass {
	
}

class ModelTest extends PHPUnit_Framework_TestCase {
	
	public function testSimpleClassConversion() {
		$o = new SimpleClass();
		$o->setName("test");
		$o->setDescription("description");

		$this->assertEquals("test", $o->getName());
		$this->assertEquals("description", $o->getDescription());
		
		$json = $o->toJSON();		
		$this->assertEquals('{"name":"test","desc":"description"}', $json);
		
		$newO = new SimpleClass();
		$newO->fromJson($json);
		$this->assertEquals($o, $newO);
		
	}
	
	
	public function testArrayClassConversion() {
		$o = new ArrayClass();
		$o->setName("test");
		$o->setDescription("description");
		$o->setTags(array('payment', 'info', 'test'));
		
		$this->assertEquals("test", $o->getName());
		$this->assertEquals("description", $o->getDescription());
		$this->assertEquals(array('payment', 'info', 'test'), $o->getTags());
		
		$json = $o->toJSON();
		$this->assertEquals('{"name":"test","desc":"description","tags":["payment","info","test"]}', $json);
	
		$newO = new ArrayClass();
		$newO->fromJson($json);
		$this->assertEquals($o, $newO);	
	}
	
	public function testNestedClassConversion() {
		$n = new ArrayClass();
		$n->setName("test");
		$n->setDescription("description");
// 		$n->setTags(array('payment', 'info', 'test'));
		$o = new NestedClass();
		$o->setId('123');
		$o->setInfo($n);
		
		$this->assertEquals("123", $o->getId());
		$this->assertEquals("test", $o->getInfo()->getName());		
// 		$this->assertEquals(array('payment', 'info', 'test'), $o->getInfo()->getTags());
		
		$json = $o->toJSON();
// 		$this->assertEquals('{"id":"123","info":{"name":"test","desc":"description","tags":["payment","info","test"]}}', $json);
		$this->assertEquals('{"id":"123","info":{"name":"test","desc":"description"}}', $json);
		
		$newO = new NestedClass();
		$newO->fromJson($json);
		$this->assertEquals($o, $newO);
	}
}