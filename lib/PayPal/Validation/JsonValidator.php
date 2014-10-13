<?php

namespace PayPal\Validation;

/**
 * Class JsonValidator
 *
 * @package PayPal\Validation
 */
class JsonValidator
{

    /**
     * Helper method for validating if string provided is a valid json.
     *
     * @param string $string String representation of Json object
     * @return bool
     */
    public static function validate($string)
    {
        json_decode($string);
        if (json_last_error() != JSON_ERROR_NONE) {
            //Throw an Exception for string or array
            throw new \InvalidArgumentException("Invalid JSON String");
        }
        return true;
    }
} 
