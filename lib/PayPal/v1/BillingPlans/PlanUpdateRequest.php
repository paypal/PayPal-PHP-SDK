<?php

// This class was generated on Tue, 30 Jan 2018 17:17:27 CST by version 0.1.0-dev+dcaee0-dirty of Braintree SDK Generator
// PlanUpdateRequest.php
// @version 0.1.0-dev+dcaee0-dirty
// @type request
// @data H4sIAAAAAAAC/6yUQU/cPhDF7/9PMZqz/7u0hx5yQ9AKWhW2hfZSIZiNZ4mRYxt7Ao3QfvfKSbZssqiUiuO+HTvzm/c8D3hCNWOBwZKbNUGTMCo85FRGE8R4hwV+6+QEK8NWJzAOCJbGWuOuIZ9TsGzh+HAGxw6kYvh4dnoCkW8bTgJLr1sFxpW20QwEgaSswC9vuBSQigRS4NKsDKfusA8cKX8YxEPguPKxVuAdg49Q+8ibNsRD368CchoIHN/DHdmGYeUjMJXVUKD7IzNU+KXh2C4oUs3CMWHx40LhEZPmOFU/+FhPtQVJNdIe8LwNeX5JonHXqPA7RUNLy1tzvTQaFX7idtB2BnxeMRwfgl91E9ge7SNl7n4/Rmr7D+4p/MqkT51tsViRTZyF28ZE1lhIbFjhIuZhiuGEhWusXV/0NZykv+R3951ji+zMEwRZvhzsHHFM/xlD7Tug3G/G6u7fdr6zj0KwLQSKYsgOmN0fkZNvYslpAv3uj9CDsE39vD+r6OsR1CBMWAYCb5xwzC1mo6wv+6SaPvdC8ZoFtC+bmp1AvgruK1NW+UTt77gr6zI6g03jXVqzfpUrrh4fwIscfwK+s1w9OwEfRvzdz914jp5l6etg+YWZ/PcOA0k1DV71Fx7Rsw6RPPqzgRpvoVdG7NO/i9hlYsS4UXat6Hfc5v3MIGtXkSfpAe05gfPSbWIT8+7tk/caRBfrXJWCd4n7e7Ks8MA7YTesF8wNmt6B+U3yDhUeiYTPLJXXWOBi//zgCPu1igXO797MA7XZmTQftuD/eQum+cOwR9eo8P3PwKWwPhOSJh14zVi83dtb//cLAAD//w==
// DO NOT EDIT

namespace PayPal\v1\BillingPlans;

use BraintreeHttp\HttpRequest;class PlanUpdateRequest extends HttpRequest 
{
    function __construct($planId)
    {
        parent::__construct("/v1/payments/billing-plans/{plan_id}?", "PATCH");
        
        $this->path = str_replace("{plan_id}", urlencode($planId), $this->path);
        $this->headers["Content-Type"] = "application/json";
    }

    
}
