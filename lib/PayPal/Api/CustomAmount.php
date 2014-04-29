<?php
namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

class CustomAmount extends PPModel {
	/**
	 * Custom amount label. 25 characters max.
	 *
	 * @param string $label
	 */
	public function setLabel($label) {
		$this->label = $label;
		return $this;
	}

	/**
	 * Custom amount label. 25 characters max.
	 *
	 * @return string
	 */
	public function getLabel() {
		return $this->label;
	}


	/**
	 * Custom amount value. Range of 0 to 999999.99.
	 *
	 * @param PayPal\Api\Currency $amount
	 */
	public function setAmount($amount) {
		$this->amount = $amount;
		return $this;
	}

	/**
	 * Custom amount value. Range of 0 to 999999.99.
	 *
	 * @return PayPal\Api\Currency
	 */
	public function getAmount() {
		return $this->amount;
	}


}
