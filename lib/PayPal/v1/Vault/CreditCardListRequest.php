<?php

// This class was generated on Tue, 30 Jan 2018 15:27:46 CST by version 0.1.0-dev+8b6e88 of Braintree SDK Generator
// CreditCardListRequest.php
// @version 0.1.0-dev+8b6e88
// @type request
// @data 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
// DO NOT EDIT

namespace PayPal\v1\Vault;

use BraintreeHttp\HttpRequest;class CreditCardListRequest extends HttpRequest 
{
    function __construct()
    {
        parent::__construct("/v1/vault/credit-cards?", "GET");
        $this->headers["Content-Type"] = "application/json";
    }

    
    public function endTime($endTime)
    {
        $param = $endTime;
        $this->path .= "end_time=". urlencode($param) . "&";
    }
    public function externalCardId($externalCardId)
    {
        $param = $externalCardId;
        $this->path .= "external_card_id=". urlencode($param) . "&";
    }
    public function externalCustomerId($externalCustomerId)
    {
        $param = $externalCustomerId;
        $this->path .= "external_customer_id=". urlencode($param) . "&";
    }
    public function merchantId($merchantId)
    {
        $param = $merchantId;
        $this->path .= "merchant_id=". urlencode($param) . "&";
    }
    public function page($page)
    {
        $param = $page;
        $this->path .= "page=". urlencode($param) . "&";
    }
    public function pageSize($pageSize)
    {
        $param = $pageSize;
        $this->path .= "page_size=". urlencode($param) . "&";
    }
    public function sortBy($sortBy)
    {
        $param = $sortBy;
        $this->path .= "sort_by=". urlencode($param) . "&";
    }
    public function sortOrder($sortOrder)
    {
        $param = $sortOrder;
        $this->path .= "sort_order=". urlencode($param) . "&";
    }
    public function startTime($startTime)
    {
        $param = $startTime;
        $this->path .= "start_time=". urlencode($param) . "&";
    }
    public function totalRequired($totalRequired)
    {
        $param = $totalRequired;
        $this->path .= "total_required=". urlencode($param) . "&";
    }
}
