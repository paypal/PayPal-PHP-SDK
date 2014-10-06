<?php
namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

class Tax extends PPModel
{
    /**
     * Identifier of the resource.
     *
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Identifier of the resource.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Name of the tax. 10 characters max.
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Name of the tax. 10 characters max.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Rate of the specified tax. Range of 0.001 to 99.999.
     *
     * @param PayPal\Api\number $percent
     */
    public function setPercent($percent)
    {
        $this->percent = $percent;
        return $this;
    }

    /**
     * Rate of the specified tax. Range of 0.001 to 99.999.
     *
     * @return PayPal\Api\number
     */
    public function getPercent()
    {
        return $this->percent;
    }


    /**
     * Tax in the form of money. Cannot be specified in a request.
     *
     * @param PayPal\Api\Currency $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Tax in the form of money. Cannot be specified in a request.
     *
     * @return PayPal\Api\Currency
     */
    public function getAmount()
    {
        return $this->amount;
    }


}
