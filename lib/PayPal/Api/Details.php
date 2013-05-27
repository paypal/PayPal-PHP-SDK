<?php
namespace PayPal\Api;


class Details extends \PPModel {
	/**
	 * Amount being charged for shipping.
	 * @param string $shipping
	 */
	public function setShipping($shipping) {
		$this->shipping = $shipping;
	}	
	
	/**
	 * Amount being charged for shipping.
	 * @return string
	 */
	public function getShipping() {
		return $this->shipping;
	}
	
	/**
	 * Sub-total (amount) of items being paid for.
	 * @param string $subtotal
	 */
	public function setSubtotal($subtotal) {
		$this->subtotal = $subtotal;
	}	
	
	/**
	 * Sub-total (amount) of items being paid for.
	 * @return string
	 */
	public function getSubtotal() {
		return $this->subtotal;
	}
	
	/**
	 * Amount being charged as tax.
	 * @param string $tax
	 */
	public function setTax($tax) {
		$this->tax = $tax;
	}	
	
	/**
	 * Amount being charged as tax.
	 * @return string
	 */
	public function getTax() {
		return $this->tax;
	}
	
	/**
	 * Fee charged by PayPal. In case of a refund, this is the fee amount refunded to the original receipient of the payment.
	 * @param string $fee
	 */
	public function setFee($fee) {
		$this->fee = $fee;
	}	
	
	/**
	 * Fee charged by PayPal. In case of a refund, this is the fee amount refunded to the original receipient of the payment.
	 * @return string
	 */
	public function getFee() {
		return $this->fee;
	}
	
}
