<?php
namespace PayPal\Test\Api;

use PayPal\Api\Refund;
use PayPal\Api\Sale;
use PayPal\Test\Constants;
use PayPal\Test\Api\AmountTest;
use PayPal\Test\Api\PaymentTest;
use PayPal\Test\Api\LinksTest;
use PayPal\Exception\PPConnectionException;

class SaleTest extends \PHPUnit_Framework_TestCase
{

    /** @var  Sale */
    private $sale;

    public static $captureId = "CAP-123";
    public static $createTime = "2013-02-28T00:00:00Z";
    public static $id = "R-5678";
    public static $parentPayment = "PAY-123";
    public static $state = "Created";

    public static function createSale()
    {
        $sale = new Sale();
        $sale->setAmount(AmountTest::createAmount());
        $sale->setCreateTime(self::$createTime);
        $sale->setId(self::$id);
        $sale->setParentPayment(self::$parentPayment);
        $sale->setState(self::$state);
        return $sale;
    }

    public function setup()
    {
        $this->sale = self::createSale();
    }

    public function testGetterSetter()
    {
        $this->assertEquals(self::$createTime, $this->sale->getCreateTime());
        $this->assertEquals(self::$id, $this->sale->getId());
        $this->assertEquals(self::$parentPayment, $this->sale->getParentPayment());
        $this->assertEquals(self::$state, $this->sale->getState());
        $this->assertEquals(AmountTest::$currency, $this->sale->getAmount()->getCurrency());
    }

    public function testSerializeDeserialize()
    {
        $s1 = $this->sale;

        $s2 = new Sale();
        $s2->fromJson($s1->toJson());

        $this->assertEquals($s1, $s2);
    }
}
