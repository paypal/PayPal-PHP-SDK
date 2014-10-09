<?php

namespace PayPal\Auth;

use PayPal\Common\PPUserAgent;
use PayPal\Core\PPConstants;
use PayPal\Core\PPHttpConfig;
use PayPal\Core\PPHttpConnection;
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
     * @var string $accessToken
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
        $this->logger = PPLoggingManager::getInstance(__CLASS__);
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
        // Check if Access Token is not null and has not expired.
        // The API returns expiry time as a relative time unit
        // We use a buffer time when checking for token expiry to account
        // for API call delays and any delay between the time the token is
        // retrieved and subsequently used
        if (
            $this->accessToken != null &&
            (time() - $this->tokenCreateTime) > ($this->tokenExpiresIn - self::$expiryBufferTime)
        ) {
            $this->accessToken = null;
        }

        // If accessToken is Null, obtain a new token
        if ($this->accessToken == null) {
            $this->updateAccessToken($config);
        }

        return $this->accessToken;
    }

    /**
     * Get a Refresh Token from Authorization Code
     *
     * @param $config
     * @param $authorizationCode
     * @return string|null
     */
    public function getRefreshToken($config, $authorizationCode) //Which comes from Mobile.
    {
        $payload =
            "grant_type=authorization_code&code=".
            $authorizationCode.
            "&redirect_uri=urn:ietf:wg:oauth:2.0:oob&response_type=token";
        $jsonResponse = $this->getToken($config, $payload);

        if ($jsonResponse != null && isset($jsonResponse["refresh_token"])) {
            return $jsonResponse['refresh_token'];
        }
    }

    /**
     * Updates Access Token based on given input
     *
     * @param      $config
     * @param string|null $refreshToken
     * @return string
     */
    public function updateAccessToken($config, $refreshToken = null)
    {
        $this->generateAccessToken($config, $refreshToken);
        return $this->accessToken;
    }

    /**
     * Retrieves the token based on the input configuration
     *
     * @param array $config
     * @param string $payload
     * @return mixed
     * @throws PPConfigurationException
     * @throws \PayPal\Exception\PPConnectionException
     */
    private function getToken($config, $payload)
    {
        $base64ClientID = base64_encode($this->clientId . ":" . $this->clientSecret);
        $headers = array(
            "User-Agent"    => PPUserAgent::getValue(RestHandler::$sdkName, RestHandler::$sdkVersion),
            "Authorization" => "Basic " . $base64ClientID,
            "Accept"        => "*/*"
        );

        $httpConfiguration = $this->getOAuthHttpConfiguration($config);
        $httpConfiguration->setHeaders($headers);

        $connection = new PPHttpConnection($httpConfiguration, $config);
        $res = $connection->execute($payload);
        $jsonResponse = json_decode($res, true);

        if ($jsonResponse == null || !isset($jsonResponse["access_token"]) || !isset($jsonResponse["expires_in"])) {
            $this->accessToken = null;
            $this->tokenExpiresIn = null;
            $this->logger->warning(
                "Could not generate new Access token. Invalid response from server: " . $jsonResponse
            );
        } else {
            $this->accessToken = $jsonResponse["access_token"];
            $this->tokenExpiresIn = $jsonResponse["expires_in"];
        }
        $this->tokenCreateTime = time();
        return $jsonResponse;
    }


    /**
     * Generates a new access token
     *
     * @param array $config
     * @return null
     */
    private function generateAccessToken($config, $refreshToken = null)
    {
        $payload = "grant_type=client_credentials";
        if ($refreshToken != null) {
            // If the refresh token is provided, it would get access token using refresh token
            // Used for Future Payments
            $payload = "grant_type=refresh_token&refresh_token=$refreshToken";
        }
        $this->getToken($config, $payload);

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
            throw new PPConfigurationException(
                'You must set one of service.endpoint or mode parameters in your configuration'
            );
        }

        $baseEndpoint = rtrim(trim($baseEndpoint), '/');

        return new PPHttpConfig($baseEndpoint . "/v1/oauth2/token", "POST");
    }
}
