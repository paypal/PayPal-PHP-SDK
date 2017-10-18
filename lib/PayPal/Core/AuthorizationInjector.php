<?php

namespace PayPal\Core;


use BraintreeHttp\Injector;
use BraintreeHttp\HttpClient;

class AuthorizationInjector implements Injector
{
    private $client;
    private $environment;
    private $refreshToken;
    public $accessToken;

    public function __construct(HttpClient $client, PayPalEnvironment $environment, $refreshToken)
    {
        $this->client = $client;
        $this->environment = $environment;
        $this->refreshToken = $refreshToken;
    }

    public function inject($request)
    {
        if (!$this->isAuthRequest($request))
        {
            if (is_null($this->accessToken) || $this->accessToken->isExpired())
            {
                $accessTokenResponse = $this->fetchAccessToken();
                $this->accessToken = $accessTokenResponse->result;
            }
        }
    }

    private function fetchAccessToken()
    {
        $accessTokenResponse = $this->client->execute(new AccessTokenRequest($this->environment, $this->refreshToken));
        $accessToken = $accessTokenResponse->result;
        return new AccessToken($accessToken->access_token, $accessToken->token_type, $accessToken->expires_in);
    }

    private function isAuthRequest($request)
    {
        return $request instanceof AccessTokenRequest /*|| $request instanceof RefreshTokenRequest*/;
    }
}