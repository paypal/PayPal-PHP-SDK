<?php
namespace PayPal\Test\Validation;

use PayPal\Core\PayPalConfigManager;
use PayPal\Test\Common\SimpleClass;
use PayPal\Validation\ModelAccessorValidator;

class ModelAccessValidatorTest extends \PHPUnit_Framework_TestCase
{

    public static function positiveProvider()
    {
        return array(
            array(new SimpleClass(), 'name'),
            array(new SimpleClass(), 'description')
        );
    }

    public static function invalidProvider()
    {
        return array(
            array(null, null,'must be an instance of PayPal\Common\PayPalModel, null given'),
            array(array(), array() ,'must be an instance of PayPal\Common\PayPalModel, array given'),
            array(new SimpleClass(), null,'Error'),
            array(new SimpleClass(), array(),'Error'),
            array(null, 'name','must be an instance of PayPal\Common\PayPalModel, null given'),
            array(new SimpleClass(),'notfound', 'Missing Accessor: PayPal\\Test\\Common\\SimpleClass:setnotfound')
        );
    }

    public function setUp()
    {
        PayPalConfigManager::getInstance()->addConfigs(array('validation.level' => 'strict'));
    }

    public function tearDown()
    {
        PayPalConfigManager::getInstance()->addConfigs(array('validation.level' => 'strict'));
    }

    /**
     *
     * @dataProvider positiveProvider
     */
    public function testValidate($class, $name)
    {
        $this->assertTrue(ModelAccessorValidator::validate($class, $name));
    }

    /**
     *
     * @dataProvider invalidProvider
     */
    public function testInvalidValidate($class, $name, $exMessage)
    {   try {
            $this->assertFalse(ModelAccessorValidator::validate($class, $name));
        } catch(\Exception $ex) {
            $this->assertContains($exMessage, $ex->getMessage());
        }
    }
}
