<?php

// This class was generated on Mon, 16 Apr 2018 19:32:32 UTC by version 0.1.0-dev+560365 of Braintree SDK Generator
// DisputeAppealRequest.php
// @version 0.1.0-dev+560365
// @type request
// @data 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
// DO NOT EDIT

namespace PayPal\v1\CustomerDisputes;

use BraintreeHttp\HttpRequest;

class DisputeAppealRequest extends HttpRequest
{
    function __construct($disputeId)
    {
        parent::__construct("/v1/customer/disputes/{dispute_id}/appeal?", "POST");
        
        $this->path = str_replace("{dispute_id}", urlencode($disputeId), $this->path);
        $this->headers["Content-Type"] = "multipart/form-data";
    }

    
}
