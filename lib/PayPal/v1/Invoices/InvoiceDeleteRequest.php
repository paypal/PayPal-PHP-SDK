<?php

// This class was generated on Tue, 30 Jan 2018 16:20:28 CST by version 0.1.0-dev+dcaee0-dirty of Braintree SDK Generator
// InvoiceDeleteRequest.php
// @version 0.1.0-dev+dcaee0-dirty
// @type request
// @data H4sIAAAAAAAC/2SST2/aQBDF7/0Uo+mllSyb9uhbFIiI+o+2qJcIRYP3gbdadt3dMamF+O6VsSkkuVk/v3k782YO/FV24JKt3wdbITdwUHDGU6Qq2kZt8Fzy9IQTCZkoG6VRntG6o/tpTuf/I+8/SGuM6qSioOBdl9NdiBeV1qJUyx4kLkJMR2vAU4LXjLrQUiWeHirxFdzJb6xcvStMqFIhjS0GZP22eHv2fRwq3ud0s1HEk9Mw2OsBzq/4QC74LSK1CWSVQqRUhyeymshAxbqU0zw8YY94KYsY5P9HJ9/u1og5Z/y9RewWEmUHRUxcPqwynkMM4kt6F+LuJVuI1s/YgZdd0y8rabR+yxn/kmhl7fB8iY/WcMaf0I341TaXNeh+SmFznSlpGEPqe7+JUbrhuUnGPyDmm3cdlxtxCT3409oIw6XGFhkvYmgQ1SJx6VvnjqtBg6SDSQ97lJrgE67ZbfAKP8pYmsbZSvpGi98peM54rtp8gdbB9Ic4+zxbznhIh0su9h+uLuB8AMXhEsWRM579bVApzE8VbdNtMODy42RyfPMPAAD//w==
// DO NOT EDIT

namespace PayPal\v1\Invoices;

use BraintreeHttp\HttpRequest;class InvoiceDeleteRequest extends HttpRequest 
{
    function __construct($invoiceId)
    {
        parent::__construct("/v1/invoicing/invoices/{invoice_id}?", "DELETE");
        
        $this->path = str_replace("{invoice_id}", urlencode($invoiceId), $this->path);
        $this->headers["Content-Type"] = "application/json";
    }

    
}
