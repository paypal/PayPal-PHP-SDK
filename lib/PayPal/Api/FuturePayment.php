<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PPRestCall;

/**
 * Class FuturePayment
 *
 * @package PayPal\Api
 */
class FuturePayment extends Payment
{

    /**
     * Extends the Payment object to create future payments
     *
     * @param null $apiContext
     * @param      $correlationId
     * @return $this
     */
    public function create($apiContext = null, $correlationId = null) {
        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }
        if (($correlationId == null || trim($correlationId) == "")) {
            throw new \InvalidArgumentException("correlationId cannot be null or empty");
        }
        $payLoad = $this->toJSON();
        $call = new PPRestCall($apiContext);
        $json = $call->execute(
            array('PayPal\Rest\RestHandler'),
            "/v1/payments/payment",
            "POST",
            $payLoad,
            array(
                'Paypal-Application-Correlation-Id' => $correlationId,
                'PAYPAL-CLIENT-METADATA-ID' => $correlationId
            )
        );
        $this->fromJson($json);

        return $this;

    }
}
