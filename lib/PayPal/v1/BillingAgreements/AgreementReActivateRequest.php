<?php

// This class was generated on Tue, 30 Jan 2018 17:30:54 CST by version 0.1.0-dev+dcaee0-dirty of Braintree SDK Generator
// AgreementReActivateRequest.php
// @version 0.1.0-dev+dcaee0-dirty
// @type request
// @data H4sIAAAAAAAC/6RUwW7bMAy97ysInt24G3byLWg2NBvWZE2wy1CktMXEKhzJpehuRpB/Hxy7TuIAHYZdbOiJIvneo7TDO9oyJkgbYd6y05HwFWVqX0gZI5xwyMSWar3DBO+PewEIQhVKdoYNpLYorNtAnyaCtIbpZARTB5ozfFnM7kD4ueKgkHpTR2BdVlSGgRw89udWQUl5ZbqyXh7Bp0+cKfyymrcfAueVQXNSaANTDocqwhS8g7WXbvnarvUOyJkD2tcC2vqq+TkDWSXCLqtHGOH3iqWek9CWlSVg8vMhwlsmwzJEP3vZDrE5aX6G7XBZl43IQcW6DUb4g8RSWvBQ/JU1GOFXrruNCwOWOcN0An49YKL+hCw3JMYiVLd1ryO8ZzIzV9SYrKkI3ADPlRU2mKhUHOFcfMmilgMmriqK/UMbw0HbJD2JcV900VgFk96qt4gNbT2j+WbYuQBjMMf1qw6teQqH0xfi/JMaHXAqx9/9a8bxjFAHXHo3GNCjgW3rWU5uw//bcOvfvokKpXeB2zwNHOGNd8quMxWpLAubHe5H/BS8wwhvVctvrLk3mOB8tlhiO9KYYPzyPi6pbhoOcXflr3oOId6dDvI+Pn9JPv0uOVM2zdRU4cYbxuTD9cf9uz8AAAD//w==
// DO NOT EDIT

namespace PayPal\v1\BillingAgreements;

use BraintreeHttp\HttpRequest;class AgreementReActivateRequest extends HttpRequest 
{
    function __construct($agreementId)
    {
        parent::__construct("/v1/payments/billing-agreements/{agreement_id}/re-activate?", "POST");
        
        $this->path = str_replace("{agreement_id}", urlencode($agreementId), $this->path);
        $this->headers["Content-Type"] = "application/json";
    }

    
}
