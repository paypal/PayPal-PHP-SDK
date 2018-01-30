<?php

// This class was generated on Tue, 30 Jan 2018 14:53:43 CST by version 0.1.0-dev+8b6e88 of Braintree SDK Generator
// WebProfilePartialUpdateRequest.php
// @version 0.1.0-dev+8b6e88
// @type request
// @data H4sIAAAAAAAC/7SVUU/bQAzH3/cpLD8fLZumPeQNwSbYNOgG2suEwE1ccii9O3wOJUL97tMlaUtTNMamvbX/cxz//Hd8j3hKc8YMFzzdC+JntuJRIFFL1V4dClJGg0ccc7FBrXeY4aQ7rpo+IALBgqfAD4HFsssZ+kwGpg2cHI3gxIGWDJ/Pz05B+K7mqDD1RWMgBs7trAGCQJqX4Ke3nKtpwwNpCX7W/e4yQuVzSnWAeuheb4BcAQSOF3BPVc0jNPitZmkmJDRnZYmY/bw0eMxUsAzVT17mQ21CWm5pj3jRhNSnqGLdDRr8QWJpWnHfv76+K1ugwS/c9PJO8y5KhpOjIZV6CKuu9liJ4kCEmu7F+wa/MxVnrmowm1EVOQl3tRUuMFOp2eBEfGBRyxEzV1fV8rKL4ahdkjVFa8QkNfwZkiRf9S5twQxPtskOHFCqN7G1+Z8aGhMihVA1K1BYDY96EI6+lpzjAPrDb6F74Sn1yz7NxM+3oHphwNITeOuUJZWY3FrPnu3GWUluWKHweT1np5BSwaK0eZmemPt7bsO6oYRV4TDz0urXKeIaUvVt2lc5/gx8a7l5sQM+bPG3f3dndF1VQsn9PFT8ypn8+wrTdz8cvPIPPKIXHSLd+LOCagP/lwnd9O8itjOxxbhSdq1oT9bfzwiSdi08mB4oPEdwXtsFa4WBNuvwn4kulykqBu8id3mSbPDQO2XXrxdMBdrOgfFt9A4NHquGr6ylL9LNcXBxeIzdesUMx/dvx4Ga5Mze5vIYP7mK4vhxs1iXaPDjQ+BcuThX0joe+oIxe7f/fvnmFwAAAP//
// DO NOT EDIT

namespace PayPal\v1\PaymentExperience;

use BraintreeHttp\HttpRequest;class WebProfilePartialUpdateRequest extends HttpRequest 
{
    function __construct($profileId)
    {
        parent::__construct("/v1/payment-experience/web-profiles/{profile_id}?", "PATCH");
        
        $this->path = str_replace("{profile_id}", urlencode($profileId), $this->path);
        $this->headers["Content-Type"] = "application/json";
    }

    
}
