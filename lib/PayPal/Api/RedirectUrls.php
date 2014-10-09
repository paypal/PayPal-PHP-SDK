<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;
use PayPal\Validation\UrlValidator;

/**
 * Class RedirectUrls
 *
 * Redirect urls required only when using payment_method as PayPal - the only settings supported are return and cancel urls.
 *
 * @package PayPal\Api
 *
 * @property string return_url
 * @property string cancel_url
 */
class RedirectUrls extends PPModel
{
    /**
     * Url where the payer would be redirected to after approving the payment.
     * 
     *
     * @param string $return_url
     * @throws InvalidArgumentException
     * @return $this
     */
    public function setReturnUrl($return_url)
    {
        UrlValidator::validate($return_url, "ReturnUrl");
        $this->return_url = $return_url;
        return $this;
    }

    /**
     * Url where the payer would be redirected to after approving the payment.
     *
     * @return string
     */
    public function getReturnUrl()
    {
        return $this->return_url;
    }

    /**
     * Url where the payer would be redirected to after approving the payment.
     *
     * @deprecated Instead use setReturnUrl
     *
     * @param string $return_url
     * @return $this
     */
    public function setReturn_url($return_url)
    {
        $this->return_url = $return_url;
        return $this;
    }

    /**
     * Url where the payer would be redirected to after approving the payment.
     * @deprecated Instead use getReturnUrl
     *
     * @return string
     */
    public function getReturn_url()
    {
        return $this->return_url;
    }

    /**
     * Url where the payer would be redirected to after canceling the payment.
     * 
     *
     * @param string $cancel_url
     * @throws InvalidArgumentException
     * @return $this
     */
    public function setCancelUrl($cancel_url)
    {
        UrlValidator::validate($cancel_url, "CancelUrl");
        $this->cancel_url = $cancel_url;
        return $this;
    }

    /**
     * Url where the payer would be redirected to after canceling the payment.
     *
     * @return string
     */
    public function getCancelUrl()
    {
        return $this->cancel_url;
    }

    /**
     * Url where the payer would be redirected to after canceling the payment.
     *
     * @deprecated Instead use setCancelUrl
     *
     * @param string $cancel_url
     * @return $this
     */
    public function setCancel_url($cancel_url)
    {
        $this->cancel_url = $cancel_url;
        return $this;
    }

    /**
     * Url where the payer would be redirected to after canceling the payment.
     * @deprecated Instead use getCancelUrl
     *
     * @return string
     */
    public function getCancel_url()
    {
        return $this->cancel_url;
    }

}
