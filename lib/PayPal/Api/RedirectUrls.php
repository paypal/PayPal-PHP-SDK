<?php 

namespace PayPal\Api;

/**
 * 
 */
class RedirectUrls extends Resource {


	/**
	 * Setter for return_url
	 * @param string $return_url
	 */ 
	public function setReturn_url($return_url) {
		$this->return_url = $return_url;
	}

	/**
	 * Getter for return_url
	 */ 
	public function getReturn_url() {
		return $this->return_url;
	}

	/**
	 * Setter for cancel_url
	 * @param string $cancel_url
	 */ 
	public function setCancel_url($cancel_url) {
		$this->cancel_url = $cancel_url;
	}

	/**
	 * Getter for cancel_url
	 */ 
	public function getCancel_url() {
		return $this->cancel_url;
	}


}