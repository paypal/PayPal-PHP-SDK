<?php

namespace PayPal\Common;

class FormatConverter {

    const TWO_DECIMAL_PLACES = '%0.2f';

    /**
     * Format the data based on the input formatter value
     *
     * @param $value
     * @param $formatter
     * @return string
     */
    public static function format($value, $formatter)
    {
        return sprintf($formatter, $value);
    }

    /**
     * Format the input data to two decimal places
     *
     * @param $value
     * @return string
     */
    public static function formatToTwoDecimalPlaces($value)
    {
        if (trim($value) != null) {
            return static::format($value, self::TWO_DECIMAL_PLACES);
        }
        return null;
    }
}
