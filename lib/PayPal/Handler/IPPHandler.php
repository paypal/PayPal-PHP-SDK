<?php

namespace PayPal\Handler;

/**
 * Interface IPPHandler
 *
 * @package PayPal\Handler
 */
interface IPPHandler
{
    /**
     *
     * @param \Paypal\Core\PPHttpConfig $httpConfig
     * @param string $request
     * @param mixed $options
     * @return mixed
     */
    public function handle($httpConfig, $request, $options);
}