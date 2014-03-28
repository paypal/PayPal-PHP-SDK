<?php
namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

class Cost extends PPModel {
	/**
	 * Cost in percent. Range of 0 to 100.
	 *
	 * @param PayPal\Api\number $percent
	 */
	public function setPercent($percent) {
		$this->percent = $percent;
		return $this;
	}

	/**
	 * Cost in percent. Range of 0 to 100.
	 *
	 * @return PayPal\Api\number
	 */
	public function getPercent() {
		return $this->percent;
	}


	/**
	 * Cost in amount. Range of 0 to 999999.99.
	 *
	 * @param PayPal\Api\Currency $amount
	 */
	public function setAmount($amount) {
		$this->amount = $amount;
		return $this;
	}

	/**
	 * Cost in amount. Range of 0 to 999999.99.
	 *
	 * @return PayPal\Api\Currency
	 */
	public function getAmount() {
		return $this->amount;
	}


}
