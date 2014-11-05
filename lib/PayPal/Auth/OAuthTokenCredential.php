<?php

namespace PayPal\Auth;

use PayPal\Common\PPUserAgent;
use PayPal\Common\ResourceModel;
use PayPal\Core\PPConstants;
use PayPal\Core\PPHttpConfig;
use PayPal\Core\PPHttpConnection;
use PayPal\Core\PPLoggingManager;
use PayPal\Exception\PPConfigurationException;
use PayPal\Rest\RestHandler;

/**
 * Class OAuthTokenCredential
 */
class OAuthTokenCredential extends ResourceModel
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
     * Get Client ID
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Get Client Secret
     *
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
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
     * @param array $params optional arrays to override defaults
     * @return string|null
     */
    public function getRefreshToken($config, $authorizationCode = null, $params = array())
    {
        static $allowedParams = array(
            'grant_type' => 'authorization_code',
            'code' => 1,
            'redirect_uri' => 'urn:ietf:wg:oauth:2.0:oob',
            'response_type' => 'token'
        );

        $params = is_array($params) ? $params : array();
        if ($authorizationCode) {
            //Override the authorizationCode if value is explicitly set
            $params['code'] = $authorizationCode;
        }
        $payload = http_build_query(array_merge($allowedParams, array_intersect_key($params, $allowedParams)));

        $response = $this->getToken($config, $this->clientId, $this->clientSecret, $payload);

        if ($response != null && isset($response["refresh_token"])) {
            return $response['refresh_token'];
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
    private function getToken($config, $clientId, $clientSecret, $payload)
    {
        $base64ClientID = base64_encode($clientId . ":" . $clientSecret);
        $headers = array(
            "User-Agent"    => PPUserAgent::getValue(PPConstants::SDK_NAME, PPConstants::SDK_VERSION),
            "Authorization" => "Basic " . $base64ClientID,
            "Accept"        => "*/*"
        );

        $httpConfiguration = self::getOAuthHttpConfiguration($config);
        $httpConfiguration->setHeaders($headers);

        $connection = new PPHttpConnection($httpConfiguration, $config);
        $res = $connection->execute($payload);
        $response = json_decode($res, true);

        return $response;
    }


    /**
     * Generates a new access token
     *
     * @param array $config
     * @return null
     */
    private function generateAccessToken($config, $refreshToken = null)
    {
        $params = array('grant_type' => 'client_credentials');
        if ($refreshToken != null) {
            // If the refresh token is provided, it would get access token using refresh token
            // Used for Future Payments
            $params['grant_type'] = 'refresh_token';
            $params['refresh_token'] = $refreshToken;
        }
        $payload = http_build_query($params);
        $response = $this->getToken($config, $this->clientId, $this->clientSecret, $payload);

        if ($response == null || !isset($response["access_token"]) || !isset($response["expires_in"])) {
            $this->accessToken = null;
            $this->tokenExpiresIn = null;
            $this->logger->warning(
                "Could not generate new Access token. Invalid response from server: " . $response
            );
        } else {
            $this->accessToken = $response["access_token"];
            $this->tokenExpiresIn = $response["expires_in"];
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
    private static function getOAuthHttpConfiguration($config)
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
