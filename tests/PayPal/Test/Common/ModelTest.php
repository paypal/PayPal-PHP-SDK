<?php
namespace PayPal\Test\Common;

use PayPal\Core\PPConfigManager;

class ModelTest extends \PHPUnit_Framework_TestCase
{

    public function testSimpleClassConversion()
    {
        $o = new SimpleClass();
        $o->setName("test");
        $o->setDescription("description");

        $this->assertEquals("test", $o->getName());
        $this->assertEquals("description", $o->getDescription());

        $json = $o->toJSON();
        $this->assertEquals('{"name":"test","description":"description"}', $json);

        $newO = new SimpleClass();
        $newO->fromJson($json);
        $this->assertEquals($o, $newO);

    }

    public function testConstructorJSON()
    {
        $obj = new SimpleClass('{"name":"test","description":"description"}');
        $this->assertEquals($obj->getName(), "test");
        $this->assertEquals($obj->getDescription(), "description");
    }

    public function testConstructorArray()
    {
        $arr = array('name' => 'test', 'description' => 'description');
        $obj = new SimpleClass($arr);
        $this->assertEquals($obj->getName(), "test");
        $this->assertEquals($obj->getDescription(), "description");
    }

    public function testConstructorNull()
    {
        $obj = new SimpleClass(null);
        $this->assertNotEquals($obj->getName(), "test");
        $this->assertNotEquals($obj->getDescription(), "description");
        $this->assertNull($obj->getName());
        $this->assertNull($obj->getDescription());
    }

    /**
     * @expectedException        \InvalidArgumentException
     * @expectedExceptionMessage Invalid JSON String
     */
    public function testConstructorInvalidInput()
    {
        new SimpleClass("Something that is not even correct");
    }

    public function testSimpleClassObjectConversion()
    {
        $json = '{"name":"test","description":"description"}';

        $obj = new SimpleClass();
        $obj->fromJson($json);

        $this->assertEquals("test", $obj->getName());
        $this->assertEquals("description", $obj->getDescription());

    }

    public function testSimpleClassObjectInvalidConversion()
    {
        try {
            $json = '{"name":"test","description":"description","invalid":"value"}';

            $obj = new SimpleClass();
            $obj->fromJson($json);

            $this->assertEquals("test", $obj->getName());
            $this->assertEquals("description", $obj->getDescription());
        } catch (\PHPUnit_Framework_Error_Notice $ex) {
            // No need to do anything
        }
    }

    public function testInvalidMagicMethod()
    {
        $obj = new SimpleClass();
        try {
            $obj->invalid = "value2";
            $this->assertEquals($obj->invalid, "value2");
            if (PPConfigManager::getInstance()->get('validation.level') == 'strict') {
                $this->fail("It should have thrown a Notice Error");
            }
        } catch (\PHPUnit_Framework_Error_Notice $ex) {

        }
    }

    public function testInvalidMagicMethodWithDisabledValidation()
    {
        PPConfigManager::getInstance()->addConfigs(array('validation.level' => 'disabled'));
        $obj = new SimpleClass();
        try {
            $obj->invalid = "value2";
            $this->assertEquals($obj->invalid, "value2");
        } catch (\PHPUnit_Framework_Error_Notice $ex) {
            $this->fail("It should not have thrown a Notice Error as it is disabled.");
        }
        PPConfigManager::getInstance()->addConfigs(array('validation.level' => 'strict'));
    }

    public function testInvalidMagicMethodWithValidationLevel()
    {
        PPConfigManager::getInstance()->addConfigs(array('validation.level' => 'log'));
        $obj = new SimpleClass();
        $obj->invalid2 = "value2";
        $this->assertEquals($obj->invalid2, "value2");
        PPConfigManager::getInstance()->addConfigs(array('validation.level' => 'strict'));
    }

    public function testArrayClassConversion()
    {
        $o = new ArrayClass();
        $o->setName("test");
        $o->setDescription("description");
        $o->setTags(array('payment', 'info', 'test'));

        $this->assertEquals("test", $o->getName());
        $this->assertEquals("description", $o->getDescription());
        $this->assertEquals(array('payment', 'info', 'test'), $o->getTags());

        $json = $o->toJSON();
        $this->assertEquals('{"name":"test","description":"description","tags":["payment","info","test"]}', $json);

        $newO = new ArrayClass();
        $newO->fromJson($json);
        $this->assertEquals($o, $newO);
    }

    public function testNestedClassConversion()
    {
        $n = new ArrayClass();
        $n->setName("test");
        $n->setDescription("description");
        $o = new NestedClass();
        $o->setId('123');
        $o->setInfo($n);

        $this->assertEquals("123", $o->getId());
        $this->assertEquals("test", $o->getInfo()->getName());

        $json = $o->toJSON();
        $this->assertEquals('{"id":"123","info":{"name":"test","description":"description"}}', $json);

        $newO = new NestedClass();
        $newO->fromJson($json);
        $this->assertEquals($o, $newO);
    }
}
