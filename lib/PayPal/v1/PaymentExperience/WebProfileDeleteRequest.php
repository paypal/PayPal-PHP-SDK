<?php

// This class was generated on Tue, 30 Jan 2018 14:53:43 CST by version 0.1.0-dev+8b6e88 of Braintree SDK Generator
// WebProfileDeleteRequest.php
// @version 0.1.0-dev+8b6e88
// @type request
// @data H4sIAAAAAAAC/2SRT4/TMBDF73wKa87eTeHoG9oE7Yp/BSouaIWc+JUYObYZT9hGVb87Colo6V5/Gnt+896RPtgBZOgJ7U3mtPcBtw4BAtJUo3Tss/gUyVD9Fxdl1RNahUMGe8QOan2nVTuph/qWNH0awdPWsh0g4ELm26Ome1gHvqZvEg/XbGul/48daTflWbMI+/iDNH217G0bsOqvCt+9I01vMa342Q27HuqhVmmvpP8nriSp5ebZ/TWznZZ1G02fYd3HGCYyexsKZvBr9AxHRniEpi2nDBaPQiaOIZwelxkUWT6Z4YxKTrHgkt2lKIjrGNmcg+/sLFr9LCmSpnuR/B7SJzfH37xrdg0t6ZCh6vfLKttpQJSbcxnVRZGlOp5zOZGm5pDRCdwXsTKWu+RA5tVmc3rxBwAA//8=
// DO NOT EDIT

namespace PayPal\v1\PaymentExperience;

use BraintreeHttp\HttpRequest;class WebProfileDeleteRequest extends HttpRequest 
{
    function __construct($profileId)
    {
        parent::__construct("/v1/payment-experience/web-profiles/{profile_id}?", "DELETE");
        
        $this->path = str_replace("{profile_id}", urlencode($profileId), $this->path);
        $this->headers["Content-Type"] = "application/json";
    }

    
}
