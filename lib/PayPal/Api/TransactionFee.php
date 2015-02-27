<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;
use PayPal\Rest\ApiContext;
use PayPal\Validation\NumericValidator;
use PayPal\Converter\FormatConverter;

/**
 * Class TransactionFee
 *
 * Let's you specify details of a payment transaction_fee.
 *
 * @package PayPal\Api
 *
 * @property string currency
 * @property string value
 * @property \PayPal\Api\Details details
 */
class TransactionFee extends PayPalModel
{
  /**
   * 3 letter currency code
   *
   *
   * @param string $currency
   *
   * @return $this
   */
  public function setCurrency($currency)
  {
    $this->currency = $currency;
    return $this;
  }

  /**
   * 3 letter currency code
   *
   * @return string
   */
  public function getCurrency()
  {
    return $this->currency;
  }

  /**
   * Total transaction_fee charged by PayPal
   *
   *
   * @param string|double $value
   *
   * @return $this
   */
  public function setValue($value)
  {
    NumericValidator::validate($value, "Value");
    $value = FormatConverter::formatToPrice($value, $this->getCurrency());
    $this->value = $value;
    return $this;
  }

  /**
   * Total transaction_fee charged by PayPal
   *
   * @return string
   */
  public function getValue()
  {
    return $this->value;
  }

  /**
   * Additional details of the payment transaction_fee.
   *
   *
   * @param \PayPal\Api\Details $details
   *
   * @return $this
   */
  public function setDetails($details)
  {
    $this->details = $details;
    return $this;
  }

  /**
   * Additional details of the payment transaction_fee.
   *
   * @return \PayPal\Api\Details
   */
  public function getDetails()
  {
    return $this->details;
  }

}