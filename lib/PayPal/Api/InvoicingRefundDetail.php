<?php
namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

class InvoicingRefundDetail extends PPModel {
	/**
	 * PayPal refund type indicating whether refund was done in invoicing flow via PayPal or externally. In the case of the mark-as-refunded API, refund type is EXTERNAL and this is what is now supported. The PAYPAL value is provided for backward compatibility.
	 *
	 * @param string $type
	 */
	public function setType($type) {
		$this->type = $type;
		return $this;
	}

	/**
	 * PayPal refund type indicating whether refund was done in invoicing flow via PayPal or externally. In the case of the mark-as-refunded API, refund type is EXTERNAL and this is what is now supported. The PAYPAL value is provided for backward compatibility.
	 *
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}


	/**
	 * Date when the invoice was marked as refunded. If no date is specified, the current date and time is used as the default. In addition, the date must be after the invoice payment date.
	 *
	 * @param string $date
	 */
	public function setDate($date) {
		$this->date = $date;
		return $this;
	}

	/**
	 * Date when the invoice was marked as refunded. If no date is specified, the current date and time is used as the default. In addition, the date must be after the invoice payment date.
	 *
	 * @return string
	 */
	public function getDate() {
		return $this->date;
	}


	/**
	 * Optional note associated with the refund.
	 *
	 * @param string $note
	 */
	public function setNote($note) {
		$this->note = $note;
		return $this;
	}

	/**
	 * Optional note associated with the refund.
	 *
	 * @return string
	 */
	public function getNote() {
		return $this->note;
	}


}
