<?php

// This class was generated on Thu, 01 Feb 2018 16:13:07 CST by version 0.1.0-dev+3a517e of Braintree SDK Generator
// OrdersCancelRequest.php
// @version 0.1.0-dev+3a517e
// @type request
// @data H4sIAAAAAAAC/2SSTY/TMBCG7/yK0ZytZkGcfKuaoF3xsaFEe0ErOo1nicGxw3iCiKr+d5RkEaVcn3mVzPuMT/iBekaLSRxL3rQUWw5osOTcih/Up4gWdwvOQBGWoIHjBHelAYoOHAdWzqAdr9MNNAlaCgG08xl61i4583cOWUnHDP2YFY4McNjtq21TlQdIAodtXe/vH6rysEGDH0eWqSahnpUlo/38aPCWybFc0zdJ+mtWk3b/sBM20zAXzio+fkWDDySejoEvRXzxDg2+5ekZ/iek6RjuSkhPF610Lj17mvfeitC0/urG4J7J3ccwoX2ikHkGP0Yv7NCqjGywljSwqOeMNo4hnB/XDGddPzLDGeUhxcyXbJeicnyOIQ1D8C3Naxbfcopo8FZ1eL/cAC2W1buqqXA1gxaLny+LtuP2exq1WB9Bcfrj4IwGq18Dt8ru03KzXXKM9tXN6/OL3wAAAP//
// DO NOT EDIT

namespace PayPal\v1\Orders;

use BraintreeHttp\HttpRequest;class OrdersCancelRequest extends HttpRequest 
{
    function __construct($orderId)
    {
        parent::__construct("/v1/checkout/orders/{order_id}?", "DELETE");
        
        $this->path = str_replace("{order_id}", urlencode($orderId), $this->path);
        $this->headers["Content-Type"] = "application/json";
    }

    
}
