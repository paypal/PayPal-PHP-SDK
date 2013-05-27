<?php
namespace PayPal\Api;


class ShippingAddress extends Address {
	/**
	 * Name of the recipient at this address.
	 * @param string $recipient_name
	 */
	public function setRecipientName($recipient_name) {
		$this->recipient_name = $recipient_name;
	}	
	
	/**
	 * Name of the recipient at this address.
	 * @return string
	 */
	public function getRecipientName() {
		return $this->recipient_name;
	}
	
}
