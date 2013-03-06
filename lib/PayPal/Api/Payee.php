<?php 

namespace PayPal\Api;

/**
 * 
 */
class Payee extends Resource {


	/**
	 * Setter for merchant_id
	 * @param string $merchant_id
	 */ 
	public function setMerchant_id($merchant_id) {
		$this->merchant_id = $merchant_id;
	}

	/**
	 * Getter for merchant_id
	 */ 
	public function getMerchant_id() {
		return $this->merchant_id;
	}

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