<?php
namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class InputFields
 *
 * @property integer no_shipping
 * @property integer address_override
 * @property boolean allow-note
 */
class InputFields extends PPModel {
	
	
	/**
	 *
	 * @return integer no_shipping
	 */
	public function getNoShipping() {
		return $this->no_shipping;
	}
	
	/*
	* @param integer no_shipping * 
	 */
	
	public function setNoShipping($no_shipping){
		$this->no_shipping = $no_shipping;
		return $this;
	}
	
	
	/**
	 *
	 * @return integer address_override
	 */
	public function getAddressOverride() {
		return $this->address_override;
	}
	
	/*
	 * @param integer address_override *
	*/
	
	public function setAddressOverride($address_override){
		$this->address_override = $address_override;
		return $this;
	}

	/**
	 *
	 * @return boolean allow_note
	 */
	public function getAllowNote() {
		return $this->allow_note;
	}
	
	/*
	 * @param boolean allow_note *
	*/
	
	public function setAllowNote($allow_note){
		$this->allow_note = $allow_note;
		return $this;
	}
}
