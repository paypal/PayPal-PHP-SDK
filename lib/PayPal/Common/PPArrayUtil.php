<?php

namespace PayPal\Common;

/**
 * Class PPArrayUtil
 * Util Class for Arrays
 *
 * @package PayPal\Common
 */
class PPArrayUtil
{

    /**
     *
     * @param array $arr
     * @return true if $arr is an associative array
     */
    public static function isAssocArray(array $arr)
    {
        foreach ($arr as $k => $v) {
            if (is_int($k)) {
                return false;
            }
        }
        return true;
    }
}