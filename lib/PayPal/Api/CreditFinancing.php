<?php

namespace PayPal\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Validation\ArgumentValidator;

/**
 * Class CreditFinancing
 *
 * Credit financing offered to customer on PayPal side with opt-in/opt-out status
 *
 * @package PayPal\Api
 *
 * @property string               financing_code
 * @property string               apr
 * @property string               nominal_rate
 * @property \PayPal\Api\number   term
 * @property string               country_code
 * @property string               credit_type
 * @property string               vendor_financing_id
 * @property bool                 enabled
 * @property \PayPal\Api\Links[]  links
 */
class CreditFinancing extends PayPalResourceModel
{
    /**
     * Financing code
     *
     * @param string $financing_code
     * 
     * @return $this
     */
    public function setFinancingCode($financing_code)
    {
        $this->financing_code = $financing_code;
        return $this;
    }

    /**
     * Financing code
     *
     * @return string
     */
    public function getFinancingCode()
    {
        return $this->financing_code;
    }

    /**
     * Apr
     *
     * @param string $apr
     * 
     * @return $this
     */
    public function setApr($apr)
    {
        $this->apr = $apr;
        return $this;
    }

    /**
     * Apr
     *
     * @return string
     */
    public function getApr()
    {
        return $this->apr;
    }

    /**
     * Nominal rate
     *
     * @param string $nominal_rate
     * 
     * @return $this
     */
    public function setNominalRate($nominal_rate)
    {
        $this->nominal_rate = $nominal_rate;
        return $this;
    }

    /**
     * Nominal rate
     *
     * @return string
     */
    public function getNominalRate()
    {
        return $this->nominal_rate;
    }

    /**
     * Length of financing terms in month
     *
     * @param \PayPal\Api\number $term
     * 
     * @return $this
     */
    public function setTerm($term)
    {
        $this->term = $term;
        return $this;
    }

    /**
     * Length of financing terms in month
     *
     * @return \PayPal\Api\number
     */
    public function getTerm()
    {
        return $this->term;
    }

    /**
     * Two-letter registered country code the credit financing options should be calculated for.
     *
     * @param string $country_code
     *
     * @return $this
     */
    public function setCountryCode($country_code)
    {
        $this->country_code = $country_code;
        return $this;
    }

    /**
     * Two-letter registered country code the credit financing options should be calculated for.
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * Credit Type
     *
     * @param string $credit_type
     * 
     * @return $this
     */
    public function setCreditType($credit_type)
    {
        $this->credit_type = $credit_type;
        return $this;
    }

    /**
     * Credit Type
     *
     * @return string
     */
    public function getCreditType()
    {
        return $this->credit_type;
    }

    /**
     * Vendor financing id
     *
     * @param string $vendor_financing_id
     * 
     * @return $this
     */
    public function setVendorFinancingId($vendor_financing_id)
    {
        $this->vendor_financing_id = $vendor_financing_id;
        return $this;
    }

    /**
     * Vendor financing id
     *
     * @return string
     */
    public function getVendorFinancingId()
    {
        return $this->vendor_financing_id;
    }

    /**
     * enabled
     *
     * @param bool $enabled
     * 
     * @return $this
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * enabled
     *
     * @return bool
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Sets Links
     *
     * @param \PayPal\Api\Links[] $links
     * 
     * @return $this
     */
    public function setLinks($links)
    {
        $this->links = $links;
        return $this;
    }

    /**
     * Gets Links
     *
     * @return \PayPal\Api\Links[]
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Look up a particular credit financing resource by passing the financing_code in the request URI.
     *
     * @param string         $financing_code
     * @param ApiContext     $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall   is the Rest Call Service that is used to make rest calls
     * @return CreditFinancing
     */
    public static function get($financing_code, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($financing_code, 'financing_code');
        $payLoad = "";
        $json = self::executeCall(
            "/v1/credit/credit-financing/$financing_code",
            "GET",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new CreditFinancing();
        $ret->fromJson($json);
        return $ret;
    }

}
