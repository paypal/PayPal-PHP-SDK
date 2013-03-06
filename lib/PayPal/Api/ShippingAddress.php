<?php 

namespace PayPal\Api;

/**
 * 
 */
class ShippingAddress extends Address {


	/**
	 * Setter for recipient_name
	 * @param string $recipient_name
	 */ 
	public function setRecipient_name($recipient_name) {
		$this->recipient_name = $recipient_name;
	}

	/**
	 * Getter for recipient_name
	 */ 
	public function getRecipient_name() {
		return $this->recipient_name;
	}


}