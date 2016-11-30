<?php

namespace PayPal\Api;

/**
 * Class FinancingOptionBase
 *
 * A financing option defines the possible credits.
 *
 * @package PayPal\Api
 *
 * @property \PayPal\Api\QualifyingFinancingOptions qualifying_financing_options
 * @property \PayPal\Api\QualifyingFinancingOptions non_qualifying_financing_options
 */
class FinancingOptionBase extends QualifyingFinancingOptions
{
    /**
     * List of qualifying financing options.
     * 
     *
     * @param \PayPal\Api\QualifyingFinancingOptions[] $qualifying_financing_options
     * 
     * @return $this
     */
    public function setQualifyingFinancingOptions($qualifying_financing_options)
    {
        $this->qualifying_financing_options = $qualifying_financing_options;
        return $this;
    }

    /**
     * List of qualifying financing options.
     *
     * @return \PayPal\Api\QualifyingFinancingOptions[]
     */
    public function getQualifyingFinancingOptions()
    {
        return $this->qualifying_financing_options;
    }

    /**
     * List of non qualifying financing options.
     * 
     *
     * @param \PayPal\Api\QualifyingFinancingOptions[] $qualifying_financing_options
     * 
     * @return $this
     */
    public function setNonQualifyingFinancingOptions($non_qualifying_financing_options)
    {
        $this->non_qualifying_financing_options = $non_qualifying_financing_options;
        return $this;
    }

    /**
     * List of non qualifying financing options.
     *
     * @return \PayPal\Api\QualifyingFinancingOptions[]
     */
    public function getNonQualifyingFinancingOptions()
    {
        return $this->non_qualifying_financing_options;
    }

}
