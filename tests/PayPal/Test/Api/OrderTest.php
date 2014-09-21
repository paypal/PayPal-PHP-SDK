<?php
namespace PayPal\Test\Api;

use PayPal\Api\Order;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Links;
use PayPal\Test\Constants;

class OrderTest extends \PHPUnit_Framework_TestCase {

    private $order;

    public static $id = 'O-0AA8876533760860M';
    public static $createTime = '2014-08-25T19:24:04Z';
    public static $updateTime = '2014-08-25T19:24:51Z';
    public static $state = 'pending';
    public static $parentPayment = 'PAY-0AL32935UM2331537KP5Y2VA';
    public static $reasonCode = 'order';

    public static function createOrder() {
        $order = new Order();

        $links = LinksTest::createLinks();

        $order->setId(self::$id);
        $order->setCreateTime(self::$createTime);
        $order->setUpdateTime(self::$updateTime);
        $order->setState(self::$state);
        $order->setAmount(AmountTest::createAmount());
        $order->setParentPayment(self::$parentPayment);
        $order->setLinks(array($links));
        $order->setReasonCode(self::$reasonCode);

        return $order;
    }

    public function setup() {
        $this->order = self::createOrder();
    }

    public function testGetterSetter() {
        $this->assertEquals(self::$id, $this->order->getId());
        $this->assertEquals(self::$createTime, $this->order->getCreateTime());
        $this->assertEquals(self::$updateTime, $this->order->getUpdateTime());
        $this->assertEquals(self::$state, $this->order->getState());
        $this->assertEquals(AmountTest::$currency, $this->order->getAmount()->getCurrency());
        $this->assertEquals(self::$parentPayment, $this->order->getParentPayment());
        $links = (array)$this->order->getLinks();
        $this->assertEquals(LinksTest::$href, $links[0]->getHref());
        $this->assertEquals(self::$reasonCode, $this->order->getReasonCode());
    }

    public function testSerializeDeserialize() {
        $o1 = $this->order;

        $o2 = new Order();
        $o2->fromJson($o1->toJson());

        $this->assertEquals($o1, $o2);
    }
}
