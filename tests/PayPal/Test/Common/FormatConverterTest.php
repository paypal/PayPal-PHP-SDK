<?php
namespace PayPal\Test\Common;

use PayPal\Api\Amount;
use PayPal\Api\Currency;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Common\FormatConverter;
use PayPal\Common\PPModel;
use PayPal\Test\Validation\NumericValidatorTest;

class FormatConverterTest extends \PHPUnit_Framework_TestCase
{

    public static function classMethodListProvider(){
        return array(
            array(new Item(), 'Price'),
            array(new Item(), 'Tax'),
            array(new Amount(), 'Total'),
            array(new Currency(), 'Value'),
            array(new Details(), 'Shipping'),
            array(new Details(), 'SubTotal'),
            array(new Details(), 'Tax'),
            array(new Details(), 'Fee'),
            array(new Details(), 'ShippingDiscount'),
            array(new Details(), 'Insurance'),
            array(new Details(), 'HandlingFee'),
            array(new Details(), 'GiftWrap'),
        );
    }

    public static function apiModelSettersProvider()
    {
        $provider = array();
        foreach (NumericValidatorTest::positiveProvider() as $value) {
            foreach (self::classMethodListProvider() as $method) {
                $provider[] = array_merge($method, array($value));
            }
        }
        return $provider;
    }

    public static function apiModelSettersInvalidProvider()
    {
        $provider = array();
        foreach (NumericValidatorTest::invalidProvider() as $value) {
            foreach (self::classMethodListProvider() as $method) {
                $provider[] = array_merge($method, array($value));
            }
        }
        return $provider;
    }

    /**
     *
     * @dataProvider \PayPal\Test\Validation\NumericValidatorTest::positiveProvider
     */
    public function testFormatToTwoDecimalPlaces($input, $expected)
    {
        $result = FormatConverter::formatToTwoDecimalPlaces($input);
        $this->assertEquals($expected, $result);

    }

    public function testFormat()
    {
        $result = FormatConverter::format("12.0123", "%0.2f");
        $this->assertEquals("12.01", $result);
    }

    /**
     * @dataProvider apiModelSettersProvider
     *
     * @param PPModel $class Class Object
     * @param string $method Method Name where the format is being applied
     * @param array $values array of ['input', 'expectedResponse'] is provided
     */
    public function testSettersOfKnownApiModel($class, $method, $values)
    {
        $obj = new $class();
        $setter = "set" . $method;
        $getter = "get" . $method;
        $result = $obj->$setter($values[0]);
        $this->assertEquals($values[1], $result->$getter());
    }

    /**
     * @dataProvider apiModelSettersInvalidProvider
     * @expectedException \InvalidArgumentException
     */
    public function testSettersOfKnownApiModelInvalid($class, $methodName, $values)
    {
        $obj = new $class();
        $setter = "set" . $methodName;
        $obj->$setter($values[0]);
    }
}
