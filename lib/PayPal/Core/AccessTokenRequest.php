<?php

namespace PayPal\Core;

use BraintreeHttp\HttpRequest;

class AccessTokenRequest extends HttpRequest
{
    public function __construct(PayPalEnvironment $environment, $refreshToken = NULL)
    {
        parent::__construct("/v1/oauth2/token", "POST");
        $this->headers["Authorization"] = $environment->authorizationString();
        $body = [
            "grant_type" => "client_credentials"
        ];

        if (!is_null($this->refreshToken))
        {
            $body["refresh_token"] = $this->refreshToken;
        }

        $this->body = $body;
        $this->headers["Content-Type"] = "application/x-www-form-urlencoded";
    }
}

