<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class ShippingAddress
 *
 * @property string recipient_name
 */
class ShippingAddress extends Address
{
    /**
     * Set Recipient Name
     * Name of the recipient at this address
     *
     * @param string $recipient_name
     *
     * @return $this
     */
    public function setRecipientName($recipient_name)
    {
        $this->recipient_name = $recipient_name;

        return $this;
    }

    /**
     * Get Recipient Name
     * Name of the recipient at this address
     *
     * @return string
     */
    public function getRecipientName()
    {
        return $this->recipient_name;
    }

    /**
     * Set Recipient Name
     * Name of the recipient at this address
     *
     * @param string $recipient_name
     *
     * @deprecated Use setRecipientName
     *
     * @return $this
     */
    public function setRecipient_name($recipient_name)
    {
        $this->recipient_name = $recipient_name;

        return $this;
    }

    /**
     * Get Recipient Name
     * Name of the recipient at this address
     *
     * @deprecated Use getRecipientName
     *
     * @return string
     */
    public function getRecipient_name()
    {
        return $this->recipient_name;
    }
}
