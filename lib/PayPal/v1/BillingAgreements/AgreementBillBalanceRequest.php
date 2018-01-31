<?php

// This class was generated on Tue, 30 Jan 2018 17:30:54 CST by version 0.1.0-dev+dcaee0-dirty of Braintree SDK Generator
// AgreementBillBalanceRequest.php
// @version 0.1.0-dev+dcaee0-dirty
// @type request
// @data H4sIAAAAAAAC/6RUTW/TQBC98ytGc97WBXHyLTSgBkQTSMQFVdXYO4kXbXbd3TFgRfnvaG03H45UhDhFeX4z896bsXd4T1vGHGkTmLfs5Low1l4VZMmVjAqnHMtgajHeYY7vjLURpGIYGLD2AcjBoV5B0cJseg0z1/E+Luf3EPip4ShQeN0qMK60jeZU5rvGZMF5YZCKBHQ3sOB+TGCK3nVTuqnGWuM2QGWqA3K6gw/Tgba+ST9OQ9mEwK5sr1Hhl4ZDu6BAWxYOEfPvDwrvmDSHMfrBh+0YW5BUZ9gOV22dcosSjNugwm8UDBWWx3k+Go0KP3E7PLiIdFUxzKbg1yMnyfKvypQViO98n8aePE1CoLaXcaPwK5OeO9tiviYbOQFPjQmsMZfQsMJF8DUHMRwxd421+4eew1H6JgdPk4OGpZAwPOv14SWfMXEf9Sn36PpF2nkeE9DH/8+x9LsU6KovsvqnNAbgNI6/rzOd55mhAbhc5ehgj/vspZcVuQ3/r+B+f/vEirV3kfs+CVZ4652wG5aKVNfWlJQUZj+id6jwTqT+zFJ5jTku5ssV9heOOWY/X2c1tUlwzIaX7ergIWa707veZ6NvxfvfNZfCOp1NE2+9Zszf3Lzdv/oDAAD//w==
// DO NOT EDIT

namespace PayPal\v1\BillingAgreements;

use BraintreeHttp\HttpRequest;class AgreementBillBalanceRequest extends HttpRequest 
{
    function __construct($agreementId)
    {
        parent::__construct("/v1/payments/billing-agreements/{agreement_id}/bill-balance?", "POST");
        
        $this->path = str_replace("{agreement_id}", urlencode($agreementId), $this->path);
        $this->headers["Content-Type"] = "application/json";
    }

    
}
