<?php 

namespace PayPal\Api;

/**
 * 
 */
class Payer extends Resource {


	/**
	 * Setter for payment_method
	 * @param string $payment_method
	 */ 
	public function setPayment_method($payment_method) {
		$this->payment_method = $payment_method;
	}

	/**
	 * Getter for payment_method
	 */ 
	public function getPayment_method() {
		return $this->payment_method;
	}

	/**
	 * Setter for payer_info
	 * @param PayPal\Api\PayerInfo $payer_info
	 */ 
	public function setPayer_info($payer_info) {
		$this->payer_info = $payer_info;
	}

	/**
	 * Getter for payer_info
	 */ 
	public function getPayer_info() {
		return $this->payer_info;
	}

	/**
	 * Setter for funding_instruments
	 * @param PayPal\Api\FundingInstrument $funding_instruments
	 */ 
	public function setFunding_instruments($funding_instruments) {
		$this->funding_instruments = $funding_instruments;
	}

	/**
	 * Getter for funding_instruments
	 */ 
	public function getFunding_instruments() {
		return $this->funding_instruments;
	}


}