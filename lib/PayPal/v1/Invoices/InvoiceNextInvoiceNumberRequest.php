<?php

// This class was generated on Tue, 30 Jan 2018 16:20:28 CST by version 0.1.0-dev+dcaee0-dirty of Braintree SDK Generator
// InvoiceNextInvoiceNumberRequest.php
// @version 0.1.0-dev+dcaee0-dirty
// @type request
// @data H4sIAAAAAAAC/6SST2/UMBDF73wKa87ZP3DMDZU/RQi60BUXVFXT5LUxSsZmPFk1qva7I+OwVYO40FMyTzOen9/zA33mAVSTl0PwDdaCe7uei2sZhxsoVfQGqVEfzQehmt5DoGxIzjq4POHmCVcmnHVszifHB/Y93/RwFn43D9CmY7E1VfRlhE47Vh5g0ET196uKzsEtdKm+CzostR1bt9S+4ueIZPspgmoZ+z5LKQZJKNoDlS99eAJMFX1j9Zl09oMq+ojpsXjqAFX0WpWnctg2b+H2QvqJ6lvuEwqJV7QnYachQs0jo54wkqmXu7/Xn7AeIf4Rxv6/I3D7zqc/7blztLDy0igGiKF1txqGMhKSOUUDWa5ZP9OJnNHx6ljRWRCDzMkRx9j7hvMVNz9SEKro3Cx+gnWhpZp2F5d7Kk+AatocXm4Klpe7+Q9pk11ZzdXq5N7b+4jG0F4a25jOQguqX223xxe/AAAA//8=
// DO NOT EDIT

namespace PayPal\v1\Invoices;

use BraintreeHttp\HttpRequest;class InvoiceNextInvoiceNumberRequest extends HttpRequest 
{
    function __construct()
    {
        parent::__construct("/v1/invoicing/invoices/next-invoice-number?", "POST");
        $this->headers["Content-Type"] = "application/json";
    }

    
}
