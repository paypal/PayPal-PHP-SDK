<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;

/**
 * Class PaymentTerm
 *
 * Payment term of the invoice. If term_type is present, due_date must not be present and vice versa.
 *
 * @package PayPal\Api
 *
 * @property string term_type
 * @property string due_date
 */
class PaymentTerm extends PPModel
{
    /**
     * Terms by which the invoice payment is due.
     * Valid Values: ["DUE_ON_RECEIPT", "NET_10", "NET_15", "NET_30", "NET_45"]
     *
     * @param string $term_type
     * 
     * @return $this
     */
    public function setTermType($term_type)
    {
        $this->term_type = $term_type;
        return $this;
    }

    /**
     * Terms by which the invoice payment is due.
     *
     * @return string
     */
    public function getTermType()
    {
        return $this->term_type;
    }

    /**
     * Terms by which the invoice payment is due.
     *
     * @deprecated Instead use setTermType
     *
     * @param string $term_type
     * @return $this
     */
    public function setTerm_type($term_type)
    {
        $this->term_type = $term_type;
        return $this;
    }

    /**
     * Terms by which the invoice payment is due.
     * @deprecated Instead use getTermType
     *
     * @return string
     */
    public function getTerm_type()
    {
        return $this->term_type;
    }

    /**
     * Date on which invoice payment is due. It must be always a future date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @param string $due_date
     * 
     * @return $this
     */
    public function setDueDate($due_date)
    {
        $this->due_date = $due_date;
        return $this;
    }

    /**
     * Date on which invoice payment is due. It must be always a future date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @return string
     */
    public function getDueDate()
    {
        return $this->due_date;
    }

    /**
     * Date on which invoice payment is due. It must be always a future date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @deprecated Instead use setDueDate
     *
     * @param string $due_date
     * @return $this
     */
    public function setDue_date($due_date)
    {
        $this->due_date = $due_date;
        return $this;
    }

    /**
     * Date on which invoice payment is due. It must be always a future date. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     * @deprecated Instead use getDueDate
     *
     * @return string
     */
    public function getDue_date()
    {
        return $this->due_date;
    }

}
