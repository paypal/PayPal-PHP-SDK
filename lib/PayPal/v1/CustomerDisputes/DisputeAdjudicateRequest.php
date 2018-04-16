<?php

// This class was generated on Mon, 16 Apr 2018 19:32:32 UTC by version 0.1.0-dev+560365 of Braintree SDK Generator
// DisputeAdjudicateRequest.php
// @version 0.1.0-dev+560365
// @type request
// @data H4sIAAAAAAAC/7yWUW/jRBDH3/kUowWJRnLigrjj8Ft0vVMrDhqaHC9RdZnYk3gv9q7ZGTe1qn53tF4nqROgIKp7S8azu//f/MezflC/YkkqUZnmqhYaYfa5znSKQipSF8Sp05Voa1SipiRSEANClxzBsoGriwi0AdKSkwPJCZZ1Q+5bBuuAqSja3yu8s26kIvVbTa6ZoMOShByrZH4bqUvCjNxx9L115XFsgpL3Yg9q1lQegMVps1aR+h2dxmVBfbBPOlOR+pmaLnxCN8sJri7ArlqGbhWIBW6xvfaxc9iE484jdUOYXZuiUckKCyYf+KPWjjKViKspUhNnK3KiiVVi6qJ4vA05xBI22Wsf74sOXcIpx9JmTY+gC/QpxuDCBl75wcuDZ//Fq3/N2wWeAj9vzF6dtuaTrSW1JfUA/ybh1Lbu2c67p+v+L0bw7dFncWUN05Fz03rJvuBGYJz6A/kU9J/77skOGHZ4udJ/0GYDT4870VZos+GewF3kqK8MoJfka9x12NBRgUIZzC/Hs3fX4ym0S2/P4symHGOl4xyFLPKwfRAPjsBev3xP5Y5WPZoucNozqS2rgvwbjm5NAh9vPoxgZqHEDbVdtKNLsSgin77UJjwpSXKbwVZLDpJrhvnHmyuYUVn5FcOVdSWKUHZ7lotUnMSxWFvwSJOsRtat41zKInar9PWrH88HbdVG8N46qBwNK2dTYtZm7cdqWtRZOHTxzSKCxdkiAjQZLAYLSHN0mPoxOAJPtPCsC9Dc5m+ogZ0vntUa32GSowSbAPclCIyBB4EP/ejDL/ICRc8aF2ras24fOjXvcjab7Gxw3el+4P2leV+IwFHRkx/+n2qf+/IHgdoakKaiZxvl1U9v3nzN1I6H4Q+DCLa5TnNgcnf+PmZA4++ulXWArb3B6NpgudTr2tZcNJC1UpYU+oOpRCM65d3UDG04JYJ5OzZuOoV8ULfdbkcaDbbakFmvTUlGOPZrhzuk47+je48xeKFJ7GfxW2uETHeJKqyqopv28Wduh9ylSPVLaJ9ETa6nMxW+HFSi4rvv4rRmsSW5uLsTOX44fCU8xr1PoOlGV3s97+4rSoWyqaDU/NZmpJLvz88fv/oTAAD//w==
// DO NOT EDIT

namespace PayPal\v1\CustomerDisputes;

use BraintreeHttp\HttpRequest;

class DisputeAdjudicateRequest extends HttpRequest
{
    function __construct($disputeId)
    {
        parent::__construct("/v1/customer/disputes/{dispute_id}/adjudicate?", "POST");
        
        $this->path = str_replace("{dispute_id}", urlencode($disputeId), $this->path);
        $this->headers["Content-Type"] = "application/json";
    }

    
}
