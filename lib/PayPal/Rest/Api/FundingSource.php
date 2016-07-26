<?php

namespace PayPal\Rest\Api;

use PayPal\Rest\Common\PayPalModel;

/**
 * Class FundingSource
 *
 * specifies the funding source details.
 *
 * @package PayPal\Api
 *
 * @property string                        funding_mode
 * @property string                        funding_instrument_type
 * @property string                        soft_descriptor
 * @property \PayPal\Rest\Api\Currency          amount
 * @property \PayPal\Rest\Api\Currency          negative_balance_amount
 * @property string                        legal_text
 * @property \PayPal\Rest\Api\FundingDetail     funding_detail
 * @property string                        additional_text
 * @property \PayPal\Rest\Api\FundingInstrument extends
 * @property \PayPal\Rest\Api\Links[]           links
 */
class FundingSource extends PayPalModel
{
    /**
     * specifies funding mode of the instrument
     * Valid Values: ["INSTANT_TRANSFER", "MANUAL_BANK_TRANSFER", "DELAYED_TRANSFER", "ECHECK"]
     *
     * @param string $funding_mode
     *
     * @return $this
     */
    public function setFundingMode($funding_mode)
    {
        $this->funding_mode = $funding_mode;
        return $this;
    }

    /**
     * specifies funding mode of the instrument
     *
     * @return string
     */
    public function getFundingMode()
    {
        return $this->funding_mode;
    }

    /**
     * Instrument type for this funding source
     * Valid Values: ["BALANCE", "PAYMENT_CARD", "BANK_ACCOUNT", "CREDIT", "INCENTIVE"]
     *
     * @param string $funding_instrument_type
     *
     * @return $this
     */
    public function setFundingInstrumentType($funding_instrument_type)
    {
        $this->funding_instrument_type = $funding_instrument_type;
        return $this;
    }

    /**
     * Instrument type for this funding source
     *
     * @return string
     */
    public function getFundingInstrumentType()
    {
        return $this->funding_instrument_type;
    }

    /**
     * Soft descriptor used when charging this funding source.
     *
     * @param string $soft_descriptor
     *
     * @return $this
     */
    public function setSoftDescriptor($soft_descriptor)
    {
        $this->soft_descriptor = $soft_descriptor;
        return $this;
    }

    /**
     * Soft descriptor used when charging this funding source.
     *
     * @return string
     */
    public function getSoftDescriptor()
    {
        return $this->soft_descriptor;
    }

    /**
     * Total anticipated amount of money to be pulled from instrument.
     *
     * @param \PayPal\Rest\Api\Currency $amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Total anticipated amount of money to be pulled from instrument.
     *
     * @return \PayPal\Rest\Api\Currency
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Additional amount to be pulled from the instrument to recover a negative balance on the buyer
     *
     * @param \PayPal\Rest\Api\Currency $amount
     *
     * @return $this
     */
    public function setNegativeBalanceAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Additional amount to be pulled from the instrument to recover a negative balance on the buyer
     *
     * @return \PayPal\Rest\Api\Currency
     */
    public function getNegativeBalanceAmount()
    {
        return $this->amount;
    }

    /**
     * Localized legal text relevant to funding source.
     *
     * @param string $legal_text
     *
     * @return $this
     */
    public function setLegalText($legal_text)
    {
        $this->legal_text = $legal_text;
        return $this;
    }

    /**
     * Localized legal text relevant to funding source.
     *
     * @return string
     */
    public function getLegalText()
    {
        return $this->legal_text;
    }

    /**
     * Additional detail of the funding.
     *
     * @param \PayPal\Rest\Api\FundingDetail $funding_detail
     *
     * @return $this
     */
    public function setFundingDetail($funding_detail)
    {
        $this->funding_detail = $funding_detail;
        return $this;
    }

    /**
     * Additional detail of the funding.
     *
     * @return \PayPal\Rest\Api\FundingDetail
     */
    public function getFundingDetail()
    {
        return $this->funding_detail;
    }

    /**
     * Additional text relevant to funding source.
     *
     * @param string $additional_text
     *
     * @return $this
     */
    public function setAdditionalText($additional_text)
    {
        $this->additional_text = $additional_text;
        return $this;
    }

    /**
     * Additional text relevant to funding source.
     *
     * @return string
     */
    public function getAdditionalText()
    {
        return $this->additional_text;
    }

    /**
     * Sets Extends
     *
     * @param \PayPal\Rest\Api\FundingInstrument $extends
     *
     * @return $this
     */
    public function setExtends($extends)
    {
        $this->extends = $extends;
        return $this;
    }

    /**
     * Gets Extends
     *
     * @return \PayPal\Rest\Api\FundingInstrument
     */
    public function getExtends()
    {
        return $this->extends;
    }

    /**
     * Sets Links
     *
     * @param \PayPal\Rest\Api\Links[] $links
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
     * @return \PayPal\Rest\Api\Links[]
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Append Links to the list.
     *
     * @param \PayPal\Rest\Api\Links $links
     * @return $this
     */
    public function addLink($links)
    {
        if (!$this->getLinks()) {
            return $this->setLinks(array($links));
        } else {
            return $this->setLinks(
                array_merge($this->getLinks(), array($links))
            );
        }
    }

    /**
     * Remove Links from the list.
     *
     * @param \PayPal\Rest\Api\Links $links
     * @return $this
     */
    public function removeLink($links)
    {
        return $this->setLinks(
            array_diff($this->getLinks(), array($links))
        );
    }

}
