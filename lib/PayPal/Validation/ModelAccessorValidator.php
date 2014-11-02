<?php

namespace PayPal\Validation;

use PayPal\Common\PPModel;
use PayPal\Core\PPConfigManager;
use PayPal\Core\PPLoggingManager;

/**
 * Class ModelAccessorValidator
 *
 * @package PayPal\Validation
 */
class ModelAccessorValidator
{
    /**
     * Helper method for validating if the class contains accessor methods (getter and setter) for a given attribute
     *
     * @param PPModel $class An object of PPModel
     * @param string $attributeName Attribute name
     * @return bool
     */
    public static function validate(PPModel $class, $attributeName)
    {
        $mode = PPConfigManager::getInstance()->get('validation.level');
        if ($mode != 'disabled') {
            //If the mode is disabled, bypass the validation
            foreach (array('set' . $attributeName, 'get' . $attributeName) as $methodName) {
                //Check if both getter and setter exists for given attribute
                if (!method_exists($class, $methodName)) {
                    //Delegate the error based on the choice
                    $className = is_object($class) ? get_class($class) : (string)$class;
                    $errorMessage = "Missing Accessor: $className:$methodName. Please let us know by creating an issue at https://github.com/paypal/PayPal-PHP-SDK/issues";
                    PPLoggingManager::getInstance(__CLASS__)->warning($errorMessage);
                    if ($mode == 'strict') {
                        trigger_error($errorMessage, E_USER_NOTICE);
                    }
                    return false;
                }
            }
        }
        return true;
    }
}
