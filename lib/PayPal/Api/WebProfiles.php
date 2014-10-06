<?php
namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class WebProfiles
 *
 * @property array|\PayPal\Api\WebProfile $web_profiles
 */
class WebProfiles extends PPModel {
	/**
	 * List of WebProfiles belonging to a merchant.
	 *
	 * @param array|\PayPal\Api\WebProfile $web_profiles
	 */
	public function setWebProfiles($web_profiles) {
		$this->web_profiles = $web_profiles;
		return $this;
	}

	/**
	 * List of web profiles belonging to a merchant.
	 *
	 * @return \PayPal\Api\WebProfile
	 */
	public function getWebProfiles() {
		return $this->web_profiles;
	}
	
	
	
	


}
