<?php 

namespace PayPal\Api;

/**
 * 
 */
class PaymentHistory extends Resource {


	/**
	 * Setter for payments
	 * @param PayPal\Api\Payment $payments
	 */ 
	public function setPayments($payments) {
		$this->payments = $payments;
	}

	/**
	 * Getter for payments
	 * @return PayPal\Api\Payment
	 */ 
	public function getPayments() {
		return $this->payments;
	}

	/**
	 * Setter for count
	 * @param integer $count
	 */ 
	public function setCount($count) {
		$this->count = $count;
	}

	/**
	 * Getter for count
	 * @return integer
	 */ 
	public function getCount() {
		return $this->count;
	}

	/**
	 * Setter for next_id
	 * @param string $next_id
	 */ 
	public function setNext_id($next_id) {
		$this->next_id = $next_id;
	}

	/**
	 * Getter for next_id
	 * @return string
	 */ 
	public function getNext_id() {
		return $this->next_id;
	}


}