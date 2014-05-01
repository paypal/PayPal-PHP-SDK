<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class ItemList
 *
 * @property array|\PayPal\Api\Item      items
 * @property \PayPal\Api\ShippingAddress shipping_address
 */
class ItemList extends PPModel
{

    /**
     * Construct an empty list.
     */
    function __construct() {
        $this->items = array();
    }

    /** 
     * Is this list empty?
     */
    public function isEmpty() {
        return empty($this->items);
    }

    /**
     * Set Items
     * List of Items
     *
     * @param array|\PayPal\Api\Item $items
     *
     * @return $this
     */
    public function setItems($items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * Get Items
     * List of items
     *
     * @return \PayPal\Api\Item
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set Shipping Address
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
	 * @return PayPal\Api\Item
	 */
	public function addItem($item) {
		return $this->setItems(
			array_merge($this->items, array($item))
		);
	}

	/**
	 * Remove an item from the list.
	 * Items are compared using === comparision (PHP.net)
	 * @return PayPal\Api\Item
	 */
	public function removeItem($item) {
		return $this->setItems(
			array_diff($this->items, array($item))
		);
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
     * Set Shipping Address
     *
     * @param \PayPal\Api\ShippingAddress $shipping_address
     *
     * @deprecated Use setShippingAddress
     *
     * @return $this
     */
    public function setShipping_address($shipping_address)
    {
        $this->shipping_address = $shipping_address;

        return $this;
    }

    /**
     * Get Shipping Address
     *
     * @deprecated Use getShippingAddress
     *
     * @return \PayPal\Api\ShippingAddress
     */
    public function getShipping_address()
    {
        return $this->shipping_address;
    }
}
