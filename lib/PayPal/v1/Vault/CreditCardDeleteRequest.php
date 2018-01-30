<?php

// This class was generated on Tue, 30 Jan 2018 15:27:46 CST by version 0.1.0-dev+8b6e88 of Braintree SDK Generator
// CreditCardDeleteRequest.php
// @version 0.1.0-dev+8b6e88
// @type request
// @data H4sIAAAAAAAC/2yRzW4aMRDH730Ka84uS3v0rWK3AvWLtiiXCKFhPWQdGdsZz6KsEO8emeUAJNefZzz/jyP8xj2BgZbJOvncItuJJU9CoKGm3LJL4mIAA/UZZ4XqgL0XsmpcUmVJq+2gFvUENPztiYclMu5JiDOYx7WGOaElvqffI+/v2RKlu2FHWA2paMzCLjyBhgdkh1tPN9o3RcbGWdDwg4bL0zsTq47UolZxp6Sjj4woiWoMoHj5xozDeH6q4R+h/RP8AGaHPlMBL71jsmCEe9Kw5JiIxVEGE3rvT+txhrKMnxRYUE4xZLpmsxiEwmUMMCXvWiyiq+ccA2iYi6RfJF20pYvmZ7NqYEwLDFSHL9XZTHVVZK6Ot9GcQEPzmqgVsv8Fpc+zaAnM1+n09OkNAAD//w==
// DO NOT EDIT

namespace PayPal\v1\Vault;

use BraintreeHttp\HttpRequest;class CreditCardDeleteRequest extends HttpRequest 
{
    function __construct($creditCardId)
    {
        parent::__construct("/v1/vault/credit-cards/{credit_card_id}?", "DELETE");
        
        $this->path = str_replace("{credit_card_id}", urlencode($creditCardId), $this->path);
        $this->headers["Content-Type"] = "application/json";
    }

    
}
