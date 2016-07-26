<?php

namespace PayPal\Rest\Handler;

/**
 * Interface IPayPalHandler
 *
 * @package PayPal\Handler
 */
interface IPayPalHandler
{
    /**
     *
     * @param \PayPal\Rest\Core\PayPalHttpConfig $httpConfig
     * @param string $request
     * @param mixed $options
     * @return mixed
     */
    public function handle($httpConfig, $request, $options);
}
