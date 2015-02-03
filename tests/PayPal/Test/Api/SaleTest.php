<?php
namespace PayPal\Test\Api;

use PayPal\Api\Currency;
use PayPal\Api\Sale;
use PayPal\Test\Api\AmountTest;

class SaleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Sale
     */
    private $sale;
    private $tFee;

    public static $captureId = "CAP-123";
    public static $createTime = "2013-02-28T00:00:00Z";
    public static $id = "R-5678";
    public static $parentPayment = "PAY-123";
    public static $state = "Created";

    private function createSale()
    {
        $sale = new Sale();
        $sale->setAmount(AmountTest::createAmount());
        $sale->setCreateTime(self::$createTime);
        $sale->setId(self::$id);
        $sale->setParentPayment(self::$parentPayment);
        $sale->setState(self::$state);

        $this->tFee = new Currency();
        $this->tFee->setCurrency('AUD');
        $this->tFee->setValue('0.10');

        $sale->setTransactionFee($this->tFee);
        return $sale;
    }

    public function setup()
    {
        $this->sale = $this->createSale();
    }

    public function testGetterSetter()
    {
        $this->assertEquals(self::$createTime, $this->sale->getCreateTime());
        $this->assertEquals(self::$id, $this->sale->getId());
        $this->assertEquals(self::$parentPayment, $this->sale->getParentPayment());
        $this->assertEquals(self::$state, $this->sale->getState());
        $this->assertEquals(AmountTest::$currency, $this->sale->getAmount()->getCurrency());
        $this->assertEquals($this->tFee, $this->sale->getTransactionFee());
    }

    public function testSerializeDeserialize()
    {
        $s1 = $this->sale;

        $s2 = new Sale();
        $s2->fromJson($s1->toJson());

        $this->assertEquals($s1, $s2);
    }
}
