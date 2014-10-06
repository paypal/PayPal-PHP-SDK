<?php
namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

class PaymentTerm extends PPModel
{
    /**
     * Terms by which the invoice payment is due.
     *
     * @param string $term_type
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
     * @param string $term_type
     * @deprecated. Instead use setTermType
     */
    public function setTerm_type($term_type)
    {
        $this->term_type = $term_type;
        return $this;
    }

    /**
     * Terms by which the invoice payment is due.
     *
     * @return string
     * @deprecated. Instead use getTermType
     */
    public function getTerm_type()
    {
        return $this->term_type;
    }

    /**
     * Date on which invoice payment is due. It must be always a future date. Date format: yyyy-MM-dd z. For example, 2014-02-27 PST
     *
     * @param string $due_date
     */
    public function setDueDate($due_date)
    {
        $this->due_date = $due_date;
        return $this;
    }

    /**
     * Date on which invoice payment is due. It must be always a future date. Date format: yyyy-MM-dd z. For example, 2014-02-27 PST
     *
     * @return string
     */
    public function getDueDate()
    {
        return $this->due_date;
    }

    /**
     * Date on which invoice payment is due. It must be always a future date. Date format: yyyy-MM-dd z. For example, 2014-02-27 PST
     *
     * @param string $due_date
     * @deprecated. Instead use setDueDate
     */
    public function setDue_date($due_date)
    {
        $this->due_date = $due_date;
        return $this;
    }

    /**
     * Date on which invoice payment is due. It must be always a future date. Date format: yyyy-MM-dd z. For example, 2014-02-27 PST
     *
     * @return string
     * @deprecated. Instead use getDueDate
     */
    public function getDue_date()
    {
        return $this->due_date;
    }

}
