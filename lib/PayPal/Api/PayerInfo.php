<?php
namespace PayPal\Api;


class PayerInfo extends \PPModel {
	/**
	 * Email address representing the Payer.
	 * @param string $email
	 */
	public function setEmail($email) {
		$this->email = $email;
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
	}	
	
	/**
	 * First Name of the Payer from their PayPal Account.
	 * @return string
	 */
	public function getFirstName() {
		return $this->first_name;
	}
	
	/**
	 * Last Name of the Payer from their PayPal Account.
	 * @param string $last_name
	 */
	public function setLastName($last_name) {
		$this->last_name = $last_name;
	}	
	
	/**
	 * Last Name of the Payer from their PayPal Account.
	 * @return string
	 */
	public function getLastName() {
		return $this->last_name;
	}
	
	/**
	 * PayPal assigned Payer ID.
	 * @param string $payer_id
	 */
	public function setPayerId($payer_id) {
		$this->payer_id = $payer_id;
	}	
	
	/**
	 * PayPal assigned Payer ID.
	 * @return string
	 */
	public function getPayerId() {
		return $this->payer_id;
	}
	
	/**
	 * Phone number representing the Payer.
	 * @param string $phone
	 */
	public function setPhone($phone) {
		$this->phone = $phone;
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
	}	
	
	/**
	 * Shipping address of the Payer from their PayPal Account.
	 * @return PayPal\Api\Address
	 */
	public function getShippingAddress() {
		return $this->shipping_address;
	}
	
}
