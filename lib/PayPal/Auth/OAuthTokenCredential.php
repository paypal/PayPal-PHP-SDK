<?php

namespace PayPal\Auth;

/**
 * Oauth Token credential
 *
 */
class OAuthTokenCredential {
	
	private static $expiryBufferTime = 120;
	
	private $logger;
	
	/**
	 * Client ID as obtained from the developer portal
	 */
	private $clientId;
	
	/**
	 * Client secret as obtained from the developer portal
	 */
	private $clientSecret;
	
	
	/**
	 * Generated Access Token
	 */
	private $accessToken;	
	
	/**
	 * Seconds for with access token is valid
	 */
	private $tokenExpiresIn;
	
	/**
	 * Last time (in milliseconds) when access token was generated
	 */
	private $tokenCreateTime;
	
	/**
	 * 
	 * @param string $clientId client id obtained from the developer portal
	 * @param string $clientSecret client secret obtained from the developer portal
	 */
	public function __construct($clientId, $clientSecret) {
		$this->clientId = $clientId;
		$this->clientSecret = $clientSecret;
		$this->logger = new \PPLoggingManager(__CLASS__);		
	}
	
	/**
	 * @return the accessToken
	 */
	public function getAccessToken() {		
		// Check if Access Token is not null and has not expired.
		// The API returns expiry time as a relative time unit 
		// We use a buffer time when checking for token expiry to account
		// for API call delays and any delay between the time the token is
		// retrieved and subsequently used
		if ($this->accessToken != null && 
				(time() - $this->tokenCreateTime) > ($this->tokenExpiresIn - self::$expiryBufferTime)) {			
				$this->accessToken = null;			
		}
		// If accessToken is Null, obtain a new token
		if ($this->accessToken == null) {			
			$this->generateAccessToken();
		}
		return $this->accessToken;
	}
	
	/**
	 * Generates a new access token
	 */
	private function generateAccessToken() {
		return $this->generateOAuthToken(base64_encode($this->clientId . ":" . $this->clientSecret));		
	}
	
	/**
	 * Generate OAuth type token from Base64Client ID
	 */
	private function generateOAuthToken($base64ClientID) {
							
		$headers = array(
			"Authorization" => "Basic " . $base64ClientID,
			"Accept" => "*/*"
		);		
		$httpConfiguration = $this->getOAuthHttpConfiguration();
		$httpConfiguration->setHeaders($headers);
		
		$connection = \PPConnectionManager::getInstance()->getConnection($httpConfiguration);		
		$res = $connection->execute("grant_type=client_credentials");		
		$jsonResponse = json_decode($res, true);
		if($jsonResponse == NULL || 
				!isset($jsonResponse["access_token"]) || !isset($jsonResponse["expires_in"]) ) {
			$this->accessToken = NULL;
			$this->tokenExpiresIn = NULL;	
			$this->logger->warning("Could not generate new Access token. Invalid response from server: " . $jsonResponse);		
		} else {
			$this->accessToken = $jsonResponse["access_token"];
			$this->tokenExpiresIn = $jsonResponse["expires_in"];
		}
		$this->tokenCreateTime = time();
		return $this->accessToken;
	}
	
	/*
	 * Get HttpConfiguration object for OAuth API
	*/
	private function getOAuthHttpConfiguration() {
		$configMgr = \PPConfigManager::getInstance();
		
		$baseEndpoint = ($configMgr->get("oauth.EndPoint") != '' && !is_array($configMgr->get("oauth.EndPoint"))) ? 
			$configMgr->get("oauth.EndPoint") : $configMgr->get("service.EndPoint");
		$baseEndpoint = rtrim(trim($baseEndpoint), '/');		 
		return new \PPHttpConfig($baseEndpoint . "/v1/oauth2/token", "POST");
	}
}
