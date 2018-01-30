<?php

// This class was generated on Tue, 30 Jan 2018 16:20:28 CST by version 0.1.0-dev+dcaee0-dirty of Braintree SDK Generator
// InvoiceQrCodeRequest.php
// @version 0.1.0-dev+dcaee0-dirty
// @type request
// @data H4sIAAAAAAAC/8xW32/bNhB+319x4F5aQJXcbd2Dn7Ym/RFs65wf7TBkQXyWThYLimTIU1whyP8+HCU7dtLOLToMexOPd8f7vvt41I16gy2pqdL22umS8qtwWbqKVKYOKZZBe9bOqql6RZYCMkVAOD4B8YHaBUALY2gGix6ODvO/usnk+3IRivRB95ZnDW3itSSbvXkFusUlgbZw/hwj/fjDE7LiUF08aph9nBbFarXKF2lv2MpdWBaPpYIWGbhBhtKFQNE7W0VgB9zQujKpCv50HZRoYTkC+SQOQFsBVhVoljwIHj0FcAFmhy/XTjn80ZAFhLKL7FoK0EWKcqgO0LqFNgQVXUs6dhDlYL5DnkFDkjA2iYRAlQ5UMlXrwmfYz9CsE3nsW7IMtXErWDUUaCteUnvswVmjLcFKc7MOF1hQSnaGEkO1pzXPqXaBoHcdLInv+MmSqe0iT4cIZ7bjjd5e+WFxfhAokbyh9eLRt+NXvCzT5uMcTj2Vuu5hfhXGzZ889h5NXrp2DpgYhUCl9loYoBa1keYEilEEI9vzhTZG2+WltrWbg1u8p5JzeBtpuz+7oc6aHnSdkK3Qpk4PHlu6Gfkq/DbAYhfvx9Gfkmjoo9gj2eqxHNe6a9pRaR1cCwhVwDrV47HHhSGIjEw5HA3Vxq+hLNs5UEewbvSg6nPQFuvWq0wddxT6GQZsiSlENT2/UWe9l2ESOWi7VJl6h0ELhnHIYJmmSaZ+oX40PRg0MiC49wSuhrcnv6bLuWp02QglDy9vDodUY2dY0Mw99vN0f/VAQ2pz7Lx3QW7XNZqOcpWpn0PAfih2kqkTwup3a3o1rdFEEsNVpwNVG8MsOE+BNUU1tZ0xt9kGq7ZMSwoPwTaklw3vBzv4ZaJmrz+QiZlA5+05KeMxh3do9IhB8CW5PH02EV6eTSY7RMj6P4K50hU3+1Emt/8nyItMvSasKOyI+SJTL11o79tmyM2XiX68bZe62s/S0eGals1Q2CP/LyGAQ/cJ/OJDkYckYhSTvKWRBtsG5fEJHAz/B/dg/jO44e2G8V0fH3yBKjc9rQqfyPuabn5GL+SknUrXlt1y/xVZ3WbqwFkmO/Kq0HujS5QzivcxDcLXzP434sZV8o/14kwNClNTVVw/LQYRaLss1s9HcXMnp9viKjwZf9ZefPDpB+KUkbuYOjT9bjK5/eZvAAAA//8=
// DO NOT EDIT

namespace PayPal\v1\Invoices;

use BraintreeHttp\HttpRequest;class InvoiceQrCodeRequest extends HttpRequest 
{
    function __construct($invoiceId)
    {
        parent::__construct("/v1/invoicing/invoices/{invoice_id}/qr-code?", "GET");
        
        $this->path = str_replace("{invoice_id}", urlencode($invoiceId), $this->path);
        $this->headers["Content-Type"] = "application/json";
    }

    
    public function action($action)
    {
        $param = $action;
        $this->path .= "action=". urlencode($param) . "&";
    }
    public function height($height)
    {
        $param = $height;
        $this->path .= "height=". urlencode($param) . "&";
    }
    public function width($width)
    {
        $param = $width;
        $this->path .= "width=". urlencode($param) . "&";
    }
}
