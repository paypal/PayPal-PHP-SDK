<?php
namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

class MerchantInfo extends PPModel {
	/**
	 * Email address of the merchant. 260 characters max.
	 *
	 * @param string $email
	 */
	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}

	/**
	 * Email address of the merchant. 260 characters max.
	 *
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}


	/**
	 * First name of the merchant. 30 characters max.
	 *
	 * @param string $first_name
	 */
	public function setFirstName($first_name) {
		$this->first_name = $first_name;
		return $this;
	}

	/**
	 * First name of the merchant. 30 characters max.
	 *
	 * @return string
	 */
	public function getFirstName() {
		return $this->first_name;
	}

	/**
	 * First name of the merchant. 30 characters max.
	 *
	 * @param string $first_name
	 * @deprecated. Instead use setFirstName
	 */
	public function setFirst_name($first_name) {
		$this->first_name = $first_name;
		return $this;
	}
	/**
	 * First name of the merchant. 30 characters max.
	 *
	 * @return string
	 * @deprecated. Instead use getFirstName
	 */
	public function getFirst_name() {
		return $this->first_name;
	}

	/**
	 * Last name of the merchant. 30 characters max.
	 *
	 * @param string $last_name
	 */
	public function setLastName($last_name) {
		$this->last_name = $last_name;
		return $this;
	}

	/**
	 * Last name of the merchant. 30 characters max.
	 *
	 * @return string
	 */
	public function getLastName() {
		return $this->last_name;
	}

	/**
	 * Last name of the merchant. 30 characters max.
	 *
	 * @param string $last_name
	 * @deprecated. Instead use setLastName
	 */
	public function setLast_name($last_name) {
		$this->last_name = $last_name;
		return $this;
	}
	/**
	 * Last name of the merchant. 30 characters max.
	 *
	 * @return string
	 * @deprecated. Instead use getLastName
	 */
	public function getLast_name() {
		return $this->last_name;
	}

	/**
	 * Address of the merchant.
	 *
	 * @param PayPal\Api\Address $address
	 */
	public function setAddress($address) {
		$this->address = $address;
		return $this;
	}

	/**
	 * Address of the merchant.
	 *
	 * @return PayPal\Api\Address
	 */
	public function getAddress() {
		return $this->address;
	}


	/**
	 * Company business name of the merchant. 100 characters max.
	 *
	 * @param string $business_name
	 */
	public function setBusinessName($business_name) {
		$this->business_name = $business_name;
		return $this;
	}

	/**
	 * Company business name of the merchant. 100 characters max.
	 *
	 * @return string
	 */
	public function getBusinessName() {
		return $this->business_name;
	}

	/**
	 * Company business name of the merchant. 100 characters max.
	 *
	 * @param string $business_name
	 * @deprecated. Instead use setBusinessName
	 */
	public function setBusiness_name($business_name) {
		$this->business_name = $business_name;
		return $this;
	}
	/**
	 * Company business name of the merchant. 100 characters max.
	 *
	 * @return string
	 * @deprecated. Instead use getBusinessName
	 */
	public function getBusiness_name() {
		return $this->business_name;
	}

	/**
	 * Phone number of the merchant.
	 *
	 * @param PayPal\Api\Phone $phone
	 */
	public function setPhone($phone) {
		$this->phone = $phone;
		return $this;
	}

	/**
	 * Phone number of the merchant.
	 *
	 * @return PayPal\Api\Phone
	 */
	public function getPhone() {
		return $this->phone;
	}


	/**
	 * Fax number of the merchant.
	 *
	 * @param PayPal\Api\Phone $fax
	 */
	public function setFax($fax) {
		$this->fax = $fax;
		return $this;
	}

	/**
	 * Fax number of the merchant.
	 *
	 * @return PayPal\Api\Phone
	 */
	public function getFax() {
		return $this->fax;
	}


	/**
	 * Website of the merchant. 2048 characters max.
	 *
	 * @param string $website
	 */
	public function setWebsite($website) {
		$this->website = $website;
		return $this;
	}

	/**
	 * Website of the merchant. 2048 characters max.
	 *
	 * @return string
	 */
	public function getWebsite() {
		return $this->website;
	}


	/**
	 * Tax ID of the merchant. 100 characters max.
	 *
	 * @param string $tax_id
	 */
	public function setTaxId($tax_id) {
		$this->tax_id = $tax_id;
		return $this;
	}

	/**
	 * Tax ID of the merchant. 100 characters max.
	 *
	 * @return string
	 */
	public function getTaxId() {
		return $this->tax_id;
	}

	/**
	 * Tax ID of the merchant. 100 characters max.
	 *
	 * @param string $tax_id
	 * @deprecated. Instead use setTaxId
	 */
	public function setTax_id($tax_id) {
		$this->tax_id = $tax_id;
		return $this;
	}
	/**
	 * Tax ID of the merchant. 100 characters max.
	 *
	 * @return string
	 * @deprecated. Instead use getTaxId
	 */
	public function getTax_id() {
		return $this->tax_id;
	}

	/**
	 * Option to display additional information such as business hours. 40 characters max.
	 *
	 * @param string $additional_info
	 */
	public function setAdditionalInfo($additional_info) {
		$this->additional_info = $additional_info;
		return $this;
	}

	/**
	 * Option to display additional information such as business hours. 40 characters max.
	 *
	 * @return string
	 */
	public function getAdditionalInfo() {
		return $this->additional_info;
	}

	/**
	 * Option to display additional information such as business hours. 40 characters max.
	 *
	 * @param string $additional_info
	 * @deprecated. Instead use setAdditionalInfo
	 */
	public function setAdditional_info($additional_info) {
		$this->additional_info = $additional_info;
		return $this;
	}
	/**
	 * Option to display additional information such as business hours. 40 characters max.
	 *
	 * @return string
	 * @deprecated. Instead use getAdditionalInfo
	 */
	public function getAdditional_info() {
		return $this->additional_info;
	}

}
