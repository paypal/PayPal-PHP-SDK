<?php 

namespace PayPal\Api;

/**
 * 
 */
class ItemList extends Resource {


	/**
	 * Setter for items
	 * @param PayPal\Api\Item $items
	 */ 
	public function setItems($items) {
		$this->items = $items;
	}

	/**
	 * Getter for items
	 */ 
	public function getItems() {
		return $this->items;
	}

	/**
	 * Setter for shipping_address
	 * @param PayPal\Api\ShippingAddress $shipping_address
	 */ 
	public function setShipping_address($shipping_address) {
		$this->shipping_address = $shipping_address;
	}

	/**
	 * Getter for shipping_address
	 */ 
	public function getShipping_address() {
		return $this->shipping_address;
	}


}