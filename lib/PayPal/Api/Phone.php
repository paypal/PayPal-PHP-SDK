<?php
namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

class Phone extends PPModel {
	/**
	 * Country code (in E.164 format). Assume length is n.
	 *
	 * @param string $country_code
	 */
	public function setCountryCode($country_code) {
		$this->country_code = $country_code;
		return $this;
	}

	/**
	 * Country code (in E.164 format). Assume length is n.
	 *
	 * @return string
	 */
	public function getCountryCode() {
		return $this->country_code;
	}

	/**
	 * Country code (in E.164 format). Assume length is n.
	 *
	 * @param string $country_code
	 * @deprecated. Instead use setCountryCode
	 */
	public function setCountry_code($country_code) {
		$this->country_code = $country_code;
		return $this;
	}
	/**
	 * Country code (in E.164 format). Assume length is n.
	 *
	 * @return string
	 * @deprecated. Instead use getCountryCode
	 */
	public function getCountry_code() {
		return $this->country_code;
	}

	/**
	 * In-country phone number (in E.164 format). Maximum (15 - n) digits.
	 *
	 * @param string $national_number
	 */
	public function setNationalNumber($national_number) {
		$this->national_number = $national_number;
		return $this;
	}

	/**
	 * In-country phone number (in E.164 format). Maximum (15 - n) digits.
	 *
	 * @return string
	 */
	public function getNationalNumber() {
		return $this->national_number;
	}

	/**
	 * In-country phone number (in E.164 format). Maximum (15 - n) digits.
	 *
	 * @param string $national_number
	 * @deprecated. Instead use setNationalNumber
	 */
	public function setNational_number($national_number) {
		$this->national_number = $national_number;
		return $this;
	}
	/**
	 * In-country phone number (in E.164 format). Maximum (15 - n) digits.
	 *
	 * @return string
	 * @deprecated. Instead use getNationalNumber
	 */
	public function getNational_number() {
		return $this->national_number;
	}

}
