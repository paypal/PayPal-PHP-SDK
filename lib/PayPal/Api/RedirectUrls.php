<?php
namespace PayPal\Api;


class RedirectUrls extends \PPModel {
	/**
	 * Url where the payer would be redirected to after approving the payment.
	 * @param string $return_url
	 */
	public function setReturnUrl($return_url) {
		$this->return_url = $return_url;
		return $this;
	}

	/**
	 * Url where the payer would be redirected to after approving the payment.
	 * @return string
	 */
	public function getReturnUrl() {
		return $this->return_url;
	}

	/**
	 * Deprecated method
	 */
	public function setReturn_url($return_url) {
		$this->return_url = $return_url;
		return $this;
	}
	/**
	 * Deprecated method
	 */
	public function getReturn_url() {
		return $this->return_url;
	}

	/**
	 * Url where the payer would be redirected to after canceling the payment.
	 * @param string $cancel_url
	 */
	public function setCancelUrl($cancel_url) {
		$this->cancel_url = $cancel_url;
		return $this;
	}

	/**
	 * Url where the payer would be redirected to after canceling the payment.
	 * @return string
	 */
	public function getCancelUrl() {
		return $this->cancel_url;
	}

	/**
	 * Deprecated method
	 */
	public function setCancel_url($cancel_url) {
		$this->cancel_url = $cancel_url;
		return $this;
	}
	/**
	 * Deprecated method
	 */
	public function getCancel_url() {
		return $this->cancel_url;
	}

}
