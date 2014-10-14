<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;

/**
 * Class InputFields
 *
 * Parameters for input fields customization.
 *
 * @package PayPal\Api
 *
 * @property bool allow_note
 * @property int no_shipping
 * @property int address_override
 */
class InputFields extends PPModel
{
    /**
     * Enables the buyer to enter a note to the merchant on the PayPal page during checkout.
     * 
     *
     * @param bool $allow_note
     * 
     * @return $this
     */
    public function setAllowNote($allow_note)
    {
        $this->allow_note = $allow_note;
        return $this;
    }

    /**
     * Enables the buyer to enter a note to the merchant on the PayPal page during checkout.
     *
     * @return bool
     */
    public function getAllowNote()
    {
        return $this->allow_note;
    }

    /**
     * Enables the buyer to enter a note to the merchant on the PayPal page during checkout.
     *
     * @deprecated Instead use setAllowNote
     *
     * @param bool $allow_note
     * @return $this
     */
    public function setAllow_note($allow_note)
    {
        $this->allow_note = $allow_note;
        return $this;
    }

    /**
     * Enables the buyer to enter a note to the merchant on the PayPal page during checkout.
     * @deprecated Instead use getAllowNote
     *
     * @return bool
     */
    public function getAllow_note()
    {
        return $this->allow_note;
    }

    /**
     * Determines whether or not PayPal displays shipping address fields on the experience pages. Allowed values: `0`, `1`, or `2`. When set to `0`, PayPal displays the shipping address on the PayPal pages. When set to `1`, PayPal does not display shipping address fields whatsoever. When set to `2`, if you do not pass the shipping address, PayPal obtains it from the buyer's account profile. For digital goods, this field is required, and you must set it to `1`. 
     * 
     *
     * @param int $no_shipping
     * 
     * @return $this
     */
    public function setNoShipping($no_shipping)
    {
        $this->no_shipping = $no_shipping;
        return $this;
    }

    /**
     * Determines whether or not PayPal displays shipping address fields on the experience pages. Allowed values: `0`, `1`, or `2`. When set to `0`, PayPal displays the shipping address on the PayPal pages. When set to `1`, PayPal does not display shipping address fields whatsoever. When set to `2`, if you do not pass the shipping address, PayPal obtains it from the buyer's account profile. For digital goods, this field is required, and you must set it to `1`. 
     *
     * @return int
     */
    public function getNoShipping()
    {
        return $this->no_shipping;
    }

    /**
     * Determines whether or not PayPal displays shipping address fields on the experience pages. Allowed values: `0`, `1`, or `2`. When set to `0`, PayPal displays the shipping address on the PayPal pages. When set to `1`, PayPal does not display shipping address fields whatsoever. When set to `2`, if you do not pass the shipping address, PayPal obtains it from the buyer's account profile. For digital goods, this field is required, and you must set it to `1`. 
     *
     * @deprecated Instead use setNoShipping
     *
     * @param int $no_shipping
     * @return $this
     */
    public function setNo_shipping($no_shipping)
    {
        $this->no_shipping = $no_shipping;
        return $this;
    }

    /**
     * Determines whether or not PayPal displays shipping address fields on the experience pages. Allowed values: `0`, `1`, or `2`. When set to `0`, PayPal displays the shipping address on the PayPal pages. When set to `1`, PayPal does not display shipping address fields whatsoever. When set to `2`, if you do not pass the shipping address, PayPal obtains it from the buyer's account profile. For digital goods, this field is required, and you must set it to `1`. 
     * @deprecated Instead use getNoShipping
     *
     * @return int
     */
    public function getNo_shipping()
    {
        return $this->no_shipping;
    }

    /**
     * Determines whether or not the PayPal pages should display the shipping address and not the shipping address on file with PayPal for this buyer. Displaying the PayPal street address on file does not allow the buyer to edit that address. Allowed values: `0` or `1`. When set to `0`, the PayPal pages should not display the shipping address. When set to `1`, the PayPal pages should display the shipping address.
     * 
     *
     * @param int $address_override
     * 
     * @return $this
     */
    public function setAddressOverride($address_override)
    {
        $this->address_override = $address_override;
        return $this;
    }

    /**
     * Determines whether or not the PayPal pages should display the shipping address and not the shipping address on file with PayPal for this buyer. Displaying the PayPal street address on file does not allow the buyer to edit that address. Allowed values: `0` or `1`. When set to `0`, the PayPal pages should not display the shipping address. When set to `1`, the PayPal pages should display the shipping address.
     *
     * @return int
     */
    public function getAddressOverride()
    {
        return $this->address_override;
    }

    /**
     * Determines whether or not the PayPal pages should display the shipping address and not the shipping address on file with PayPal for this buyer. Displaying the PayPal street address on file does not allow the buyer to edit that address. Allowed values: `0` or `1`. When set to `0`, the PayPal pages should not display the shipping address. When set to `1`, the PayPal pages should display the shipping address.
     *
     * @deprecated Instead use setAddressOverride
     *
     * @param int $address_override
     * @return $this
     */
    public function setAddress_override($address_override)
    {
        $this->address_override = $address_override;
        return $this;
    }

    /**
     * Determines whether or not the PayPal pages should display the shipping address and not the shipping address on file with PayPal for this buyer. Displaying the PayPal street address on file does not allow the buyer to edit that address. Allowed values: `0` or `1`. When set to `0`, the PayPal pages should not display the shipping address. When set to `1`, the PayPal pages should display the shipping address.
     * @deprecated Instead use getAddressOverride
     *
     * @return int
     */
    public function getAddress_override()
    {
        return $this->address_override;
    }

}
