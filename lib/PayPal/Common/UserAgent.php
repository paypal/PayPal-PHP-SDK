<?php

namespace PayPal\Common;

define('SDK_NAME', 'REST-SDK-PHP');
define('SDK_VERSION', '0.5.0');

class UserAgent {

	/**
	 * Returns the value of the User-Agent header
	 * Add environment values and php version numbers
	 */
	public static function getValue() {
		
		$featureList = array(
				'Lang=PHP',
				'V=' . PHP_VERSION,
				'Bit=' . UserAgent::_getPHPBit(),
				'OS=' . str_replace(' ' , '_', php_uname('s') . ' ' . php_uname('r')),
				'Machine=' . php_uname('m')
		);
		if(defined('OPENSSL_VERSION_TEXT')) {
			$opensslVersion = explode(' ', OPENSSL_VERSION_TEXT);
			$featureList[] = 'Openssl='. $opensslVersion[1];
		}
		if(function_exists('curl_version')) {
			$curlVersion = curl_version();
			$featureList[] = 'curl=' . $curlVersion['version'];
		}
		return sprintf("PayPalSDK/%s %s (%s)", SDK_NAME, SDK_VERSION, implode(';', $featureList));
	}
	
	private static function _getPHPBit() {
		switch(PHP_INT_SIZE) {
			case 4:
				return '32';
			case 8:
				return '64';
			default:
				return PHP_INT_SIZE;
		}
	}
}
