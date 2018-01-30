<?php

// This class was generated on Tue, 30 Jan 2018 16:20:28 CST by version 0.1.0-dev+dcaee0-dirty of Braintree SDK Generator
// InvoiceDeleteExternalRefundRequest.php
// @version 0.1.0-dev+dcaee0-dirty
// @type request
// @data H4sIAAAAAAAC/6yST2/TQBDF73yK1ZyXOnD0DTVBrfgXIOKCqmjqfakXObtmdlxqRfnuaLOGJs0BIfVm/fQ8fr8Z7+gjb0E1+XAffYMLhw6KNR4UErhbCzZDcGRpjtSI79XHQDXND7FkOJg/UVOi1tyOZppmrueGgzMqHBI3+V1zPb8gS58HyLhk4S0Ukqj+fmPpCuwgT+nbKNunbMnanrAdrcY+eyQVH+7I0jcWz7cdTv3WPru8wzjhM7FVe2gdN0Zb/PXYSNyaX61vWqPRlB0dAsX5WDDbvRHhsRSaWfoCdp9CN1K94S4hg5+DFziqVQZYWkrsIeqRqA5D1+3tP3WOPvifSueNH5Weo/tNySBpGZJhRqmPIeGYXcagCFOMuO8733AuVP1IMZClK9X+A7SNLv9xi/eL1YLK7amm6v5VVc7jw930hFTtHg+9r4rrS0ETxaVqd7q1PVlaPPRoFO6rsg7pMjpQ/Xo227/4DQAA//8=
// DO NOT EDIT

namespace PayPal\v1\Invoices;

use BraintreeHttp\HttpRequest;class InvoiceDeleteExternalRefundRequest extends HttpRequest 
{
    function __construct($invoiceId, $transactionId)
    {
        parent::__construct("/v1/invoicing/invoices/{invoice_id}/refund-records/{transaction_id}?", "DELETE");
        
        $this->path = str_replace("{invoice_id}", urlencode($invoiceId), $this->path);
        
        $this->path = str_replace("{transaction_id}", urlencode($transactionId), $this->path);
        $this->headers["Content-Type"] = "application/json";
    }

    
}
