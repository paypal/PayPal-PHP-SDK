<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class ItemList
 *
 * List of items being paid for.
 *
 * @package PayPal\Api
 *
 * @property \PayPal\Api\Item[]            items
 * @property \PayPal\Api\ShippingAddress shipping_address
 */
class ItemList extends PPModel
{
    /**
     * Is this list empty?
     */
    public function isEmpty()
    {
        return empty($this->items);
    }

    /**
     * List of items.
     *
     *
     * @param \PayPal\Api\Item[] $items
     *
     * @return $this
     */
    public function setItems($items)
    {
        $this->items = $items;
        return $this;
    }

    /**
     * List of items.
     *
     * @return \PayPal\Api\Item[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Shipping address.
     *
     *
     * @param \PayPal\Api\ShippingAddress $shipping_address
     *
     * @return $this
     */
    public function setShippingAddress($shipping_address)
    {
        $this->shipping_address = $shipping_address;
        return $this;
    }

    /**
     * Append an item to the list.
     *
     * @return \PayPal\Api\Item
     */
    public function addItem($item)
    {
        if (!$this->items) {
            return $this->setItems(array($item));
        } else {
            return $this->setItems(
                array_merge($this->items, array($item))
            );
        }
    }

    /**
     * Remove an item from the list.
     * Items are compared using === comparision (PHP.net)
     *
     * @return \PayPal\Api\Item
     */
    public function removeItem($item)
    {
        return $this->setItems(array_diff($this->getItems(), array($item)));
    }

    /**
     * Get Shipping Address
     *
     * @return \PayPal\Api\ShippingAddress
     */
    public function getShippingAddress()
    {
        return $this->shipping_address;
    }

    /**
     * Shipping address.
     *
     * @deprecated Instead use setShippingAddress
     *
     * @param \PayPal\Api\ShippingAddress $shipping_address
     * @return $this
     */
    public function setShipping_address($shipping_address)
    {
        $this->shipping_address = $shipping_address;
        return $this;
    }

    /**
     * Shipping address.
     *
     * @deprecated Instead use getShippingAddress
     *
     * @return \PayPal\Api\ShippingAddress
     */
    public function getShipping_address()
    {
        return $this->shipping_address;
    }

}
