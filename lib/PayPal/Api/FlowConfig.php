<?php
namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class FlowConfig
 *
 * @property string landing_page_type
 * @property string bank_txn_pending_url
 */
class FlowConfig extends PPModel {
	
	
	/**
	 *
	 * @return string landing_page_type
	 */
	public function getLandingPageType() {
		return $this->landing_page_type;
	}
	
	/*
	* @param string landing_page_type * 
	 */
	
	public function setLandingPageType($landing_page_type){
		$this->landing_page_type = $landing_page_type;
		return $this;
	}
	
	
	/**
	 *
	 * @return string bank_txn_pending_url
	 */
	public function getBankTxnPendingUrl() {
		return $this->bank_txn_pending_url;
	}
	
	/*
	 * @param string bank_txn_pending_url *
	*/
	
	public function setBankTxnPendingUrl($bank_txn_pending_url){
		$this->bank_txn_pending_url = $bank_txn_pending_url;
		return $this;
	}


}
