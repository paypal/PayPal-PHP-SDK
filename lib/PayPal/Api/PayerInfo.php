<?php 

namespace PayPal\Api;

/**
 * 
 */
class PayerInfo extends Resource {


	/**
	 * Setter for email
	 * @param string $email
	 */ 
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * Getter for email
	 */ 
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Setter for first_name
	 * @param string $first_name
	 */ 
	public function setFirst_name($first_name) {
		$this->first_name = $first_name;
	}

	/**
	 * Getter for first_name
	 */ 
	public function getFirst_name() {
		return $this->first_name;
	}

	/**
	 * Setter for last_name
	 * @param string $last_name
	 */ 
	public function setLast_name($last_name) {
		$this->last_name = $last_name;
	}

	/**
	 * Getter for last_name
	 */ 
	public function getLast_name() {
		return $this->last_name;
	}

	/**
	 * Setter for payer_id
	 * @param string $payer_id
	 */ 
	public function setPayer_id($payer_id) {
		$this->payer_id = $payer_id;
	}

	/**
	 * Getter for payer_id
	 */ 
	public function getPayer_id() {
		return $this->payer_id;
	}

	/**
	 * Setter for shipping_address
	 * @param PayPal\Api\Address $shipping_address
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

	/**
	 * Setter for phone
	 * @param string $phone
	 */ 
	public function setPhone($phone) {
		$this->phone = $phone;
	}

	/**
	 * Getter for phone
	 */ 
	public function getPhone() {
		return $this->phone;
	}


}