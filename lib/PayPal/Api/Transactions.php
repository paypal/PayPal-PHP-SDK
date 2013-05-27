<?php
namespace PayPal\Api;


class Transactions extends \PPModel {
	/**
	 * Amount being collected.
	 * @param PayPal\Api\Amount $amount
	 */
	public function setAmount($amount) {
		$this->amount = $amount;
	}	
	
	/**
	 * Amount being collected.
	 * @return PayPal\Api\Amount
	 */
	public function getAmount() {
		return $this->amount;
	}
	
}
