<?php

// This class was generated on Tue, 30 Jan 2018 15:44:51 CST by version 0.1.0-dev+dcaee0 of Braintree SDK Generator
// AvailableEventTypeListRequest.php
// @version 0.1.0-dev+dcaee0
// @type request
// @data H4sIAAAAAAAC/7yUwY7TMBCG7zzFaE4gpU3hwCG31dJlJRYoUMFhVaFpMt0YUtvrmbREq747chKVpEVaCRCnyH/Gnm9+j+cB39GWMUPakaloXfGEd2x1oo3naWVEMcFXLHkwXo2zmOGNERU4xkMbL6AO9qXJSyDbwJ7XpXPfIScLUq/j9jVP4coFIIingtuA1N67oFz0RyQgzHD7pd/bimBpy7J6mhYul9RY5btAESQtTOBc0z6TpB12G54+m2KCH2oOzYICbVk5CGa3qwSvmQoOp+qVC9tTbUFanmof+b5m0WXjGTNbV1WUxDsr3GkP2H1x3sLHBdx0Jn6mYKJfvd+Y4Btufi3OPY4W7YdeSKzqIgRquiSzmJ2K97ZqMNtQJdwRmsDFUVgE5zmo4VjCb/DOydpcX+P9ywhyrI95LyxQBHuU+eWfM4sGY+/OeYsByZB3rJ/wQllvyU4CU9E28SA41qBl39d/a3lskkPyaA2xbUfwvTCmXpYMtTX3NQ8ex38iFCWtxw1xlM4pu1/RSRr3wz+hXR1WhwQvnVW2/WNE8r4yeTcavkl75deq/i1r6QrM8PV8id2jxgzT3fPUOjWbfoccx8hg+sXK5j8858rFp7aeS1cwZi9ms8OTnwAAAP//
// DO NOT EDIT

namespace PayPal\v1\Webhooks;

use BraintreeHttp\HttpRequest;class AvailableEventTypeListRequest extends HttpRequest 
{
    function __construct()
    {
        parent::__construct("/v1/notifications/webhooks-event-types?", "GET");
        $this->headers["Content-Type"] = "application/json";
    }

    
}
