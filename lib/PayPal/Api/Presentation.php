<?php
namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class Presentation
 *
 * @property string brand_name
 * @property string logo_image
 * @property string locale_code
 */
class Presentation extends PPModel {
	
	
	/**
	 *
	 * @return string brand_name
	 */
	public function getBrandName() {
		return $this->brand_name;
	}
	
	/*
	* @param string brand_name * 
	 */
	
	public function setBrandName($brand_name){
		$this->brand_name = $brand_name;
		return $this;
	}
	
	
	/**
	 *
	 * @return string logo_image
	 */
	public function getLogoImage() {
		return $this->logo_image;
	}
	
	/*
	 * @param string logo_image *
	*/
	
	public function setLogoImage($logo_image){
		$this->logo_image = $logo_image;
		return $this;
	}

	/**
	 *
	 * @return string locale_code
	 */
	public function getLocaleCode() {
		return $this->logo_image;
	}
	
	/*
	 * @param string locale_code *
	*/
	
	public function setLocaleCode($locale_code){
		$this->locale_code = $locale_code;
		return $this;
	}
}
