<?php
namespace PayPal\Api;


class PayerInfo extends \PPModel {
	/**
	 * Email address representing the Payer.
	 * @param string $email
	 */
	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}

	/**
	 * Email address representing the Payer.
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}


	/**
	 * First Name of the Payer from their PayPal Account.
	 * @param string $first_name
	 */
	public function setFirstName($first_name) {
		$this->first_name = $first_name;
		return $this;
	}

	/**
	 * First Name of the Payer from their PayPal Account.
	 * @return string
	 */
	public function getFirstName() {
		return $this->first_name;
	}

	/**
	 * Deprecated method
	 */
	public function setFirst_name($first_name) {
		$this->first_name = $first_name;
		return $this;
	}
	/**
	 * Deprecated method
	 */
	public function getFirst_name() {
		return $this->first_name;
	}

	/**
	 * Last Name of the Payer from their PayPal Account.
	 * @param string $last_name
	 */
	public function setLastName($last_name) {
		$this->last_name = $last_name;
		return $this;
	}

	/**
	 * Last Name of the Payer from their PayPal Account.
	 * @return string
	 */
	public function getLastName() {
		return $this->last_name;
	}

	/**
	 * Deprecated method
	 */
	public function setLast_name($last_name) {
		$this->last_name = $last_name;
		return $this;
	}
	/**
	 * Deprecated method
	 */
	public function getLast_name() {
		return $this->last_name;
	}

	/**
	 * PayPal assigned Payer ID.
	 * @param string $payer_id
	 */
	public function setPayerId($payer_id) {
		$this->payer_id = $payer_id;
		return $this;
	}

	/**
	 * PayPal assigned Payer ID.
	 * @return string
	 */
	public function getPayerId() {
		return $this->payer_id;
	}

	/**
	 * Deprecated method
	 */
	public function setPayer_id($payer_id) {
		$this->payer_id = $payer_id;
		return $this;
	}
	/**
	 * Deprecated method
	 */
	public function getPayer_id() {
		return $this->payer_id;
	}

	/**
	 * Phone number representing the Payer.
	 * @param string $phone
	 */
	public function setPhone($phone) {
		$this->phone = $phone;
		return $this;
	}

	/**
	 * Phone number representing the Payer.
	 * @return string
	 */
	public function getPhone() {
		return $this->phone;
	}


	/**
	 * Shipping address of the Payer from their PayPal Account.
	 * @param PayPal\Api\Address $shipping_address
	 */
	public function setShippingAddress($shipping_address) {
		$this->shipping_address = $shipping_address;
		return $this;
	}

	/**
	 * Shipping address of the Payer from their PayPal Account.
	 * @return PayPal\Api\Address
	 */
	public function getShippingAddress() {
		return $this->shipping_address;
	}

	/**
	 * Deprecated method
	 */
	public function setShipping_address($shipping_address) {
		$this->shipping_address = $shipping_address;
		return $this;
	}
	/**
	 * Deprecated method
	 */
	public function getShipping_address() {
		return $this->shipping_address;
	}

}
