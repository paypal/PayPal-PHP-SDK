<?php

namespace PayPal\Common;

class FormatConverter {

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
            return number_format($value, 2, '.', '');
        }
        return null;
    }
}
