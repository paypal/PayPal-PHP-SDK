<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;

/**
 * Class OverrideChargeModel
 *
 * A resource representing an override_charge_model to be used during creation of the agreement.
 *
 * @package PayPal\Api
 *
 * @property string charge_id
 * @property \PayPal\Api\Currency amount
 */
class OverrideChargeModel extends PPModel
{
    /**
     * ID of charge model.
     *
     * @param string $charge_id
     * 
     * @return $this
     */
    public function setChargeId($charge_id)
    {
        $this->charge_id = $charge_id;
        return $this;
    }

    /**
     * ID of charge model.
     *
     * @return string
     */
    public function getChargeId()
    {
        return $this->charge_id;
    }

    /**
     * ID of charge model.
     *
     * @deprecated Instead use setChargeId
     *
     * @param string $charge_id
     * @return $this
     */
    public function setCharge_id($charge_id)
    {
        $this->charge_id = $charge_id;
        return $this;
    }

    /**
     * ID of charge model.
     * @deprecated Instead use getChargeId
     *
     * @return string
     */
    public function getCharge_id()
    {
        return $this->charge_id;
    }

    /**
     * Updated Amount to be associated with this charge model.
     *
     * @param \PayPal\Api\Currency $amount
     * 
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Updated Amount to be associated with this charge model.
     *
     * @return \PayPal\Api\Currency
     */
    public function getAmount()
    {
        return $this->amount;
    }

}
