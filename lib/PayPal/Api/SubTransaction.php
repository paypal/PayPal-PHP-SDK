<?php 

namespace PayPal\Api;

/**
 * 
 */
class SubTransaction extends Resource {


	/**
	 * Setter for sale
	 * @param PayPal\Api\Sale $sale
	 */ 
	public function setSale($sale) {
		$this->sale = $sale;
	}

	/**
	 * Getter for sale
	 */ 
	public function getSale() {
		return $this->sale;
	}

	/**
	 * Setter for authorization
	 * @param PayPal\Api\Authorization $authorization
	 */ 
	public function setAuthorization($authorization) {
		$this->authorization = $authorization;
	}

	/**
	 * Getter for authorization
	 */ 
	public function getAuthorization() {
		return $this->authorization;
	}

	/**
	 * Setter for refund
	 * @param PayPal\Api\Refund $refund
	 */ 
	public function setRefund($refund) {
		$this->refund = $refund;
	}

	/**
	 * Getter for refund
	 */ 
	public function getRefund() {
		return $this->refund;
	}

	/**
	 * Setter for capture
	 * @param PayPal\Api\Capture $capture
	 */ 
	public function setCapture($capture) {
		$this->capture = $capture;
	}

	/**
	 * Getter for capture
	 */ 
	public function getCapture() {
		return $this->capture;
	}


}