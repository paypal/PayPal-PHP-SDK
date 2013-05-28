<?php
namespace PayPal\Api;


class Payer extends \PPModel {
	/**
	 * Payment method being used - PayPal Wallet payment or Direct Credit card.
	 * @param string $payment_method
	 */
	public function setPaymentMethod($payment_method) {
		$this->payment_method = $payment_method;
		return $this;
	}

	/**
	 * Payment method being used - PayPal Wallet payment or Direct Credit card.
	 * @return string
	 */
	public function getPaymentMethod() {
		return $this->payment_method;
	}

	/**
	 * Deprecated method
	 */
	public function setPayment_method($payment_method) {
		$this->payment_method = $payment_method;
		return $this;
	}
	/**
	 * Deprecated method
	 */
	public function getPayment_method() {
		return $this->payment_method;
	}

	/**
	 * List of funding instruments from where the funds of the current payment come from. Typically a credit card.
	 * @array
	 * @param PayPal\Api\FundingInstrument $funding_instruments
	 */
	public function setFundingInstruments($funding_instruments) {
		$this->funding_instruments = $funding_instruments;
		return $this;
	}

	/**
	 * List of funding instruments from where the funds of the current payment come from. Typically a credit card.
	 * @return PayPal\Api\FundingInstrument
	 */
	public function getFundingInstruments() {
		return $this->funding_instruments;
	}

	/**
	 * Deprecated method
	 */
	public function setFunding_instruments($funding_instruments) {
		$this->funding_instruments = $funding_instruments;
		return $this;
	}
	/**
	 * Deprecated method
	 */
	public function getFunding_instruments() {
		return $this->funding_instruments;
	}

	/**
	 * Information related to the Payer. In case of PayPal Wallet payment, this information will be filled in by PayPal after the user approves the payment using their PayPal Wallet. 
	 * @param PayPal\Api\PayerInfo $payer_info
	 */
	public function setPayerInfo($payer_info) {
		$this->payer_info = $payer_info;
		return $this;
	}

	/**
	 * Information related to the Payer. In case of PayPal Wallet payment, this information will be filled in by PayPal after the user approves the payment using their PayPal Wallet. 
	 * @return PayPal\Api\PayerInfo
	 */
	public function getPayerInfo() {
		return $this->payer_info;
	}

	/**
	 * Deprecated method
	 */
	public function setPayer_info($payer_info) {
		$this->payer_info = $payer_info;
		return $this;
	}
	/**
	 * Deprecated method
	 */
	public function getPayer_info() {
		return $this->payer_info;
	}

}
