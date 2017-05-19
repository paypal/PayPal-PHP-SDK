<?php

namespace PayPal\Api;

/**
 * Class FinancingOption
 *
 * A financing option defines the possible credits.
 *
 * @package PayPal\Api
 *
 */
class FinancingOption extends FinancingOptionBase
{
    /**
     * Additional financing_options for complex payment scenarios.
     *
     *
     * @param self $financing_options
     *
     * @return $this
     */
    public function setFinancingOptions($financing_options)
    {
        $this->financing_options = $financing_options;
        return $this;
    }

    /**
     * Additional financing_options for complex payment scenarios.
     *
     * @return self[]
     */
    public function getFinancingOptions()
    {
        return $this->financing_options;
    }

}
