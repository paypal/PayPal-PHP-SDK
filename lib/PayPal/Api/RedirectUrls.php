<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class RedirectUrls
 *
 * @property string return_url
 * @property string cancel_url
 */
class RedirectUrls extends PPModel
{
    /**
     * Set Return URL
     * Url where the payer would be redirected to after approving the payment
     *
     * @param string $return_url
     *
     * @return $this
     */
    public function setReturnUrl($return_url)
    {
        if(filter_var($return_url, FILTER_VALIDATE_URL) === false)
        {
            throw new \InvalidArgumentException("Return URL is not a fully qualified URL");
        }

        $this->return_url = $return_url;

        return $this;
    }

    /**
     * Get Return URL
     * Url where the payer would be redirected to after approving the payment
     *
     * @return string
     */
    public function getReturnUrl()
    {
        return $this->return_url;
    }

    /**
     * Set Return URL
     * Url where the payer would be redirected to after approving the payment
     *
     * @param string $return_url
     *
     * @deprecated Use setReturnUrl
     *
     * @return $this
     */
    public function setReturn_url($return_url)
    {
        $this->return_url = $return_url;

        return $this;
    }

    /**
     * Get Return URL
     * Url where the payer would be redirected to after approving the payment
     *
     * @deprecated Use getReturnUrl
     *
     * @return string
     */
    public function getReturn_url()
    {
        return $this->return_url;
    }

    /**
     * Set Cancel URL
     * Url where the payer would be redirected to after canceling the payment
     *
     * @param string $cancel_url
     *
     * @return $this
     */
    public function setCancelUrl($cancel_url)
    {
        if(filter_var($cancel_url, FILTER_VALIDATE_URL) === false)
        {
            throw new \InvalidArgumentException("Cancel URL is not a fully qualified URL");
        }
        $this->cancel_url = $cancel_url;

        return $this;
    }

    /**
     * Get Cancel URL
     * Url where the payer would be redirected to after canceling the payment
     *
     * @return string
     */
    public function getCancelUrl()
    {
        return $this->cancel_url;
    }

    /**
     * Set Cancel URL
     * Url where the payer would be redirected to after canceling the payment
     *
     * @param string $cancel_url
     *
     * @deprecated Use setCancelUrl
     *
     * @return $this
     */
    public function setCancel_url($cancel_url)
    {
        $this->cancel_url = $cancel_url;

        return $this;
    }
    
    /**
     * Get Cancel URL
     * Url where the payer would be redirected to after canceling the payment
     *
     * @deprecated Use getCancelUrl
     *
     * @return string
     */
    public function getCancel_url()
    {
        return $this->cancel_url;
    }
}
