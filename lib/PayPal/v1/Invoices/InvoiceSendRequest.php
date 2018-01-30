<?php

// This class was generated on Tue, 30 Jan 2018 16:20:28 CST by version 0.1.0-dev+dcaee0-dirty of Braintree SDK Generator
// InvoiceSendRequest.php
// @version 0.1.0-dev+dcaee0-dirty
// @type request
// @data H4sIAAAAAAAC/5STQW/aThDF7/9PMZqzhfm3N9+i0CpR1YQW1EsbhcE74G2XHbM7m9ZCfPdqsZNCQiP1gti345n3fmPv8IY2jBVa/yC25lFkb7DACcc62FateKxwxt5EIA9DVQHLDq4nBagAQZ2iyobD6Fsaj9/WSyf1j20S5cO5/62jBvHrXrkR5aqXy2MdLlbKATpJkG2cDMxiTd6LQuDDrdVhYHl+4jKU/fH2EIOc6wqIrKANw8KL2lV3v+FQN+R1AdvEoYOWAm04u8jRXJTeSX7ksfTIFqTWkDIcmtma8pwRTHhFySnYCAsNiRcjLPBTbj997B6x+rrDeddm9EsRx+SxwC8ULC0dDzt55hEL/MDdcPdiR9feZAcc4WfD2vQJnsy/YjjXHef7S4CLEKjrHY8L/Mxkbr3rsFqRi5yFbbKBzZMwDdJyUMsRK5+c298VeMVkOJxQuCvwvYTNc21K2pynFTVYv34Ja0h4b83rnOYNw/UEZHXCZWD1T0EzmvM5cw1H7ZtkMUuxFR/5WLsUr+yHMqS2dcNKyu9R8vtwpdp+ZG3EYIXT29kcezJYYfnwf9mbt349/ONY7v5g2JfDt/zuV8u1spkpaYqXYhirN+Px/r/fAAAA//8=
// DO NOT EDIT

namespace PayPal\v1\Invoices;

use BraintreeHttp\HttpRequest;class InvoiceSendRequest extends HttpRequest 
{
    function __construct($invoiceId)
    {
        parent::__construct("/v1/invoicing/invoices/{invoice_id}/send?", "POST");
        
        $this->path = str_replace("{invoice_id}", urlencode($invoiceId), $this->path);
        $this->headers["Content-Type"] = "application/json";
    }

    
    public function notifyMerchant($notifyMerchant)
    {
        $param = $notifyMerchant;
        $this->path .= "notify_merchant=". urlencode($param) . "&";
    }
}
