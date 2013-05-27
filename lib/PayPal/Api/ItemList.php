<?php
namespace PayPal\Api;


class ItemList extends \PPModel {
	/**
	 * List of items.
	 * @array
	 * @param PayPal\Api\Item $items
	 */
	public function setItems($items) {
		$this->items = $items;
	}	
	
	/**
	 * List of items.
	 * @return PayPal\Api\Item
	 */
	public function getItems() {
		return $this->items;
	}
	
	/**
	 * Shipping address.
	 * @param PayPal\Api\ShippingAddress $shipping_address
	 */
	public function setShippingAddress($shipping_address) {
		$this->shipping_address = $shipping_address;
	}	
	
	/**
	 * Shipping address.
	 * @return PayPal\Api\ShippingAddress
	 */
	public function getShippingAddress() {
		return $this->shipping_address;
	}
	
}
