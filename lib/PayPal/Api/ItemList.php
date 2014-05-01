<?php
namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

class ItemList extends PPModel {

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
	 * List of items.
	 *
	 * @array
	 * @param PayPal\Api\Item $items
	 */
	public function setItems(array $items) {
		$this->items = $items;
		return $this;
	}

	/**
	 * List of items.
	 *
	 * @return PayPal\Api\Item
	 */
	public function getItems() {
		return $this->items;
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
	 * Shipping address.
	 *
	 * @param PayPal\Api\ShippingAddress $shipping_address
	 */
	public function setShippingAddress($shipping_address) {
		$this->shipping_address = $shipping_address;
		return $this;
	}

	/**
	 * Shipping address.
	 *
	 * @return PayPal\Api\ShippingAddress
	 */
	public function getShippingAddress() {
		return $this->shipping_address;
	}

	/**
	 * Shipping address.
	 *
	 * @param PayPal\Api\ShippingAddress $shipping_address
	 * @deprecated. Instead use setShippingAddress
	 */
	public function setShipping_address($shipping_address) {
		$this->shipping_address = $shipping_address;
		return $this;
	}
	/**
	 * Shipping address.
	 *
	 * @return PayPal\Api\ShippingAddress
	 * @deprecated. Instead use getShippingAddress
	 */
	public function getShipping_address() {
		return $this->shipping_address;
	}

}
