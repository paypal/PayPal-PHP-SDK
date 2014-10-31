<?php
namespace PayPal\Test\Api;

use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Test\Constants;

class ItemListTest extends \PHPUnit_Framework_TestCase
{
    /** @var ItemList */
    private $items;

    private static $name = "item name";
    private static $price = "1.12";
    private static $quantity = "10";
    private static $sku = "AXVTY123";
    private static $currency = "USD";

    public static function createItemList()
    {

        /** @var Item $item */
        $item = ItemTest::createItem();

        $itemList = new ItemList();
        $itemList->setItems(array($item));
        $itemList->setShippingAddress(ShippingAddressTest::getObject());

        return $itemList;
    }

    public function setup()
    {
        $this->items = self::createItemList();
    }

    public function testGetterSetters()
    {
        $items = $this->items->getItems();
        $this->assertEquals(ItemTest::createItem(), $items[0]);
        $this->assertEquals(ShippingAddressTest::getObject(), $this->items->getShippingAddress());
    }

    public function testSerializeDeserialize()
    {
        $itemList = new ItemList();
        $itemList->fromJson($this->items->toJSON());

        $this->assertEquals($itemList, $this->items);
    }

    public function testAddItemMethod()
    {
        $item2 = ItemTest::createItem();
        $item2->setName("Item2");
        $this->items->addItem($item2);

        $found = false;
        foreach ($this->items->getItems() as $item) {
            if ($item->getName() == $item2->getName()) {
                $found = true;
            }
        }
        $this->assertTrue($found);
    }

    public function testRemoveItemMethod()
    {
        $itemList = new ItemList();
        $item1 = ItemTest::createItem();
        $item1->setName("Name1");
        $item2 = ItemTest::createItem();

        $itemList->addItem($item1);
        $itemList->addItem($item2);

        $itemList->removeItem($item2);

        $this->assertEquals(sizeof($itemList->getItems()), 1);
        $remainingElements = $itemList->getItems();
        $this->assertEquals($remainingElements[0]->getName(), "Name1");
    }
}
