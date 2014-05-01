<?php
/**
 * Oauth Token credential
 */

namespace PayPal\Auth;

use PayPal\Common\PPUserAgent;
use PayPal\Core\PPConnectionManager;
use PayPal\Core\PPConstants;
use PayPal\Core\PPHttpConfig;
use PayPal\Core\PPLoggingManager;
use PayPal\Exception\PPConfigurationException;
use PayPal\Rest\RestHandler;

/**
 * Class OAuthTokenCredential
 */
class OAuthTokenCredential
{
    /**
     * Private Variable
     *
     * @var int $expiryBufferTime
     */
    private static $expiryBufferTime = 120;

    /**
     * Private Variable
     *
     * @var \PayPal\Core\PPLoggingManager $logger
     */
    private $logger;

    /**
     * Client ID as obtained from the developer portal
     *
     * @var string $clientId
     */
    private $clientId;

    /**
     * Client secret as obtained from the developer portal
     *
     * @var string $clientSecret
     */
    private $clientSecret;

    /**
     * Generated Access Token
     *
     * @var $accessToken
     */
    private $accessToken;

    /**
     * Seconds for with access token is valid
     *
     * @var $tokenExpiresIn
     */
    private $tokenExpiresIn;

    /**
     * Last time (in milliseconds) when access token was generated
     *
     * @var $tokenCreateTime
     */
    private $tokenCreateTime;

    /**
     * Construct
     *
     * @param string $clientId     client id obtained from the developer portal
     * @param string $clientSecret client secret obtained from the developer portal
     */
    public function __construct($clientId, $clientSecret)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    /**
     * Get AccessToken
     *
     * @param $config
     *
     * @return null|string
     */
    public function getAccessToken($config)
    {
        $this->logger = new PPLoggingManager(__CLASS__, $config);

        // Check if Access Token is not null and has not expired.
        // The API returns expiry time as a relative time unit
        // We use a buffer time when checking for token expiry to account
        // for API call delays and any delay between the time the token is
        // retrieved and subsequently used
        if ($this->accessToken != null && (time() - $this->tokenCreateTime) > ($this->tokenExpiresIn - self::$expiryBufferTime)) {
            $this->accessToken = null;
        }

        // If accessToken is Null, obtain a new token
        if ($this->accessToken == null) {
            $this->_generateAccessToken($config);
        }

        return $this->accessToken;
    }

    /**
     * Generates a new access token
     *
     * @param $config
     *
     * @return null
     */
    private function _generateAccessToken($config)
    {
        $base64ClientID = base64_encode($this->clientId . ":" . $this->clientSecret);
        $headers = array(
            "User-Agent"    => PPUserAgent::getValue(RestHandler::$sdkName, RestHandler::$sdkVersion),
            "Authorization" => "Basic " . $base64ClientID,
            "Accept"        => "*/*"
        );

        $httpConfiguration = $this->getOAuthHttpConfiguration($config);
        $httpConfiguration->setHeaders($headers);

        $connection = PPConnectionManager::getInstance()->getConnection($httpConfiguration, $config);
        $res = $connection->execute("grant_type=client_credentials");
        $jsonResponse = json_decode($res, true);

        if ($jsonResponse == null || !isset($jsonResponse["access_token"]) || !isset($jsonResponse["expires_in"])) {
            $this->accessToken = null;
            $this->tokenExpiresIn = null;
            $this->logger->warning("Could not generate new Access token. Invalid response from server: " . $jsonResponse);
        } else {
            $this->accessToken = $jsonResponse["access_token"];
            $this->tokenExpiresIn = $jsonResponse["expires_in"];
        }

        $this->tokenCreateTime = time();

        return $this->accessToken;
    }

    /**
     * Get HttpConfiguration object for OAuth API
     *
     * @param array $config
     *
     * @return PPHttpConfig
     * @throws \PayPal\Exception\PPConfigurationException
     */
    private function getOAuthHttpConfiguration($config)
    {
        if (isset($config['oauth.EndPoint'])) {
            $baseEndpoint = $config['oauth.EndPoint'];
        } else if (isset($config['service.EndPoint'])) {
            $baseEndpoint = $config['service.EndPoint'];
        } else if (isset($config['mode'])) {
            switch (strtoupper($config['mode'])) {
                case 'SANDBOX':
                    $baseEndpoint = PPConstants::REST_SANDBOX_ENDPOINT;
                    break;
                case 'LIVE':
                    $baseEndpoint = PPConstants::REST_LIVE_ENDPOINT;
                    break;
                default:
                    throw new PPConfigurationException('The mode config parameter must be set to either sandbox/live');
            }
        } else {
            throw new PPConfigurationException('You must set one of service.endpoint or mode parameters in your configuration');
        }

        $baseEndpoint = rtrim(trim($baseEndpoint), '/');

        return new PPHttpConfig($baseEndpoint . "/v1/oauth2/token", "POST");
    }
}
