<?php
namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

class InvoicingNotification extends PPModel {
	/**
	 * Subject of the notification.
	 *
	 * @param string $subject
	 */
	public function setSubject($subject) {
		$this->subject = $subject;
		return $this;
	}

	/**
	 * Subject of the notification.
	 *
	 * @return string
	 */
	public function getSubject() {
		return $this->subject;
	}


	/**
	 * Note to the payer.
	 *
	 * @param string $note
	 */
	public function setNote($note) {
		$this->note = $note;
		return $this;
	}

	/**
	 * Note to the payer.
	 *
	 * @return string
	 */
	public function getNote() {
		return $this->note;
	}


	/**
	 * A flag indicating whether a copy of the email has to be sent to the merchant.
	 *
	 * @param boolean $send_to_merchant
	 */
	public function setSendToMerchant($send_to_merchant) {
		$this->send_to_merchant = $send_to_merchant;
		return $this;
	}

	/**
	 * A flag indicating whether a copy of the email has to be sent to the merchant.
	 *
	 * @return boolean
	 */
	public function getSendToMerchant() {
		return $this->send_to_merchant;
	}

	/**
	 * A flag indicating whether a copy of the email has to be sent to the merchant.
	 *
	 * @param boolean $send_to_merchant
	 * @deprecated. Instead use setSendToMerchant
	 */
	public function setSend_to_merchant($send_to_merchant) {
		$this->send_to_merchant = $send_to_merchant;
		return $this;
	}
	/**
	 * A flag indicating whether a copy of the email has to be sent to the merchant.
	 *
	 * @return boolean
	 * @deprecated. Instead use getSendToMerchant
	 */
	public function getSend_to_merchant() {
		return $this->send_to_merchant;
	}

}
