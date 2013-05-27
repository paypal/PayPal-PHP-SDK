<?php
namespace PayPal\Api;


class RedirectUrls extends \PPModel {
	/**
	 * Url where the payer would be redirected to after approving the payment.
	 * @param string $return_url
	 */
	public function setReturnUrl($return_url) {
		$this->return_url = $return_url;
	}	
	
	/**
	 * Url where the payer would be redirected to after approving the payment.
	 * @return string
	 */
	public function getReturnUrl() {
		return $this->return_url;
	}
	
	/**
	 * Url where the payer would be redirected to after canceling the payment.
	 * @param string $cancel_url
	 */
	public function setCancelUrl($cancel_url) {
		$this->cancel_url = $cancel_url;
	}	
	
	/**
	 * Url where the payer would be redirected to after canceling the payment.
	 * @return string
	 */
	public function getCancelUrl() {
		return $this->cancel_url;
	}
	
}
