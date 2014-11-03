<?php

namespace PayPal\Validation;

/**
 * Class ArgumentValidator
 *
 * @package PayPal\Validation
 */
class ArgumentValidator
{

    /**
     * Helper method for validating an argument that will be used by this API in any requests.
     *
     * @param $argument     mixed The object to be validated
     * @param $argumentName string|null The name of the argument.
     *                      This will be placed in the exception message for easy reference
     */
    public static function validate($argument, $argumentName = null)
    {
        if (
            $argument != null &&
            ((gettype($argument) == 'string' && $argument == '') || is_array($argument) && empty($argument))
        ) {
            //Throw an Exception for string or array
            throw new \InvalidArgumentException("$argumentName cannot be null or empty");
        } elseif ($argument === null) {
            //Generic Exception
            throw new \InvalidArgumentException("$argumentName cannot be null");
        }
    }
}
