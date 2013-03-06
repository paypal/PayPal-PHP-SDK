<?php
namespace PayPal\Rest;

use PayPal\Auth\OAuthTokenCredential;

use PayPal\Common\UserAgent;

class Call {
	
	private $logger;
	
	public function __construct() {
		$this->logger = new \PPLoggingManager(__CLASS__);
	}

	/**
	 *
	 * @param string $path
	 * @param string $data
	 * @param PayPal/Rest/ApiContext $apiContext
	 * @param array $headers
	 */
	public function execute($path, $method, $data='', $apiContext, $headers=array()) {
		$configMgr = \PPConfigManager::getInstance();

		$credential = $apiContext->getCredential();
		if($credential == NULL) {
			// Try picking credentials from the config file
			$credMgr = \PPCredentialManager::getInstance();
			$credValues = $credMgr->getCredentialObject();
			if(!is_array($credValues)) {
				throw new \PPMissingCredentialException("Empty or invalid credentials passed");
			}
			$credential = new OAuthTokenCredential($credValues['clientId'], $credValues['clientSecret']);
		}
		if($credential == NULL || ! ($credential instanceof OAuthTokenCredential) ) {
			throw new \PPInvalidCredentialException("Invalid credentials passed");	
		}	
			
		$resourceUrl = rtrim( trim($configMgr->get('service.EndPoint')), '/') . $path;
		$config = new \PPHttpConfig($resourceUrl, $method);
		$headers += array(
			'Content-Type' => 'application/json',
			'User-Agent' => UserAgent::getValue()	
		);
		if(!is_null($credential) && $credential instanceof OAuthTokenCredential) {
			$headers['Authorization'] = "Bearer " . $credential->getAccessToken();
		}
		if($method == 'POST' || $method == 'PUT') {
			$headers['PayPal-Request-Id'] = $apiContext->getRequestId();
		}
		$config->setHeaders($headers);
		$connection = new \PPHttpConnection($config);
		$response = $connection->execute($data);
		$this->logger->fine($response);
		
		return $response;
	}
}
