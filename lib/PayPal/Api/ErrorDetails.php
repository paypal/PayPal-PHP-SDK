<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;

/**
 * Class ErrorDetails
 *
 * Details about a specific error.
 *
 * @package PayPal\Api
 *
 * @property string field
 * @property string issue
 */
class ErrorDetails extends PPModel
{
    /**
     * Name of the field that caused the error.
     *
     * @param string $field
     * 
     * @return $this
     */
    public function setField($field)
    {
        $this->field = $field;
        return $this;
    }

    /**
     * Name of the field that caused the error.
     *
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * Reason for the error.
     *
     * @param string $issue
     * 
     * @return $this
     */
    public function setIssue($issue)
    {
        $this->issue = $issue;
        return $this;
    }

    /**
     * Reason for the error.
     *
     * @return string
     */
    public function getIssue()
    {
        return $this->issue;
    }

}
