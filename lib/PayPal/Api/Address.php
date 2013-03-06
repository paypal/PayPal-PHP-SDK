<?php 

namespace PayPal\Api;

/**
 * 
 */
class Address extends Resource {


	/**
	 * Setter for line1
	 * @param string $line1
	 */ 
	public function setLine1($line1) {
		$this->line1 = $line1;
	}

	/**
	 * Getter for line1
	 */ 
	public function getLine1() {
		return $this->line1;
	}

	/**
	 * Setter for line2
	 * @param string $line2
	 */ 
	public function setLine2($line2) {
		$this->line2 = $line2;
	}

	/**
	 * Getter for line2
	 */ 
	public function getLine2() {
		return $this->line2;
	}

	/**
	 * Setter for city
	 * @param string $city
	 */ 
	public function setCity($city) {
		$this->city = $city;
	}

	/**
	 * Getter for city
	 */ 
	public function getCity() {
		return $this->city;
	}

	/**
	 * Setter for state
	 * @param string $state
	 */ 
	public function setState($state) {
		$this->state = $state;
	}

	/**
	 * Getter for state
	 */ 
	public function getState() {
		return $this->state;
	}

	/**
	 * Setter for postal_code
	 * @param string $postal_code
	 */ 
	public function setPostal_code($postal_code) {
		$this->postal_code = $postal_code;
	}

	/**
	 * Getter for postal_code
	 */ 
	public function getPostal_code() {
		return $this->postal_code;
	}

	/**
	 * Setter for country_code
	 * @param string $country_code
	 */ 
	public function setCountry_code($country_code) {
		$this->country_code = $country_code;
	}

	/**
	 * Getter for country_code
	 */ 
	public function getCountry_code() {
		return $this->country_code;
	}

	/**
	 * Setter for type
	 * @param string $type
	 */ 
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * Getter for type
	 */ 
	public function getType() {
		return $this->type;
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