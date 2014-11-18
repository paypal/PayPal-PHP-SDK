<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Validation\UrlValidator;

/**
 * Class InvoicingMetaData
 *
 * Audit information of the resource.
 *
 * @package PayPal\Api
 *
 * @property string created_date
 * @property string created_by
 * @property string cancelled_date
 * @property string cancelled_by
 * @property string last_updated_date
 * @property string last_updated_by
 * @property string first_sent_date
 * @property string last_sent_date
 * @property string last_sent_by
 * @property string payer_view_url
 */
class InvoicingMetaData extends PPModel
{
    /**
     * Date when the resource was created.
     *
     * @param string $created_date
     * 
     * @return $this
     */
    public function setCreatedDate($created_date)
    {
        $this->created_date = $created_date;
        return $this;
    }

    /**
     * Date when the resource was created.
     *
     * @return string
     */
    public function getCreatedDate()
    {
        return $this->created_date;
    }

    /**
     * Date when the resource was created.
     *
     * @deprecated Instead use setCreatedDate
     *
     * @param string $created_date
     * @return $this
     */
    public function setCreated_date($created_date)
    {
        $this->created_date = $created_date;
        return $this;
    }

    /**
     * Date when the resource was created.
     * @deprecated Instead use getCreatedDate
     *
     * @return string
     */
    public function getCreated_date()
    {
        return $this->created_date;
    }

    /**
     * Email address of the account that created the resource.
     *
     * @param string $created_by
     * 
     * @return $this
     */
    public function setCreatedBy($created_by)
    {
        $this->created_by = $created_by;
        return $this;
    }

    /**
     * Email address of the account that created the resource.
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * Email address of the account that created the resource.
     *
     * @deprecated Instead use setCreatedBy
     *
     * @param string $created_by
     * @return $this
     */
    public function setCreated_by($created_by)
    {
        $this->created_by = $created_by;
        return $this;
    }

    /**
     * Email address of the account that created the resource.
     * @deprecated Instead use getCreatedBy
     *
     * @return string
     */
    public function getCreated_by()
    {
        return $this->created_by;
    }

    /**
     * Date when the resource was cancelled.
     *
     * @param string $cancelled_date
     * 
     * @return $this
     */
    public function setCancelledDate($cancelled_date)
    {
        $this->cancelled_date = $cancelled_date;
        return $this;
    }

    /**
     * Date when the resource was cancelled.
     *
     * @return string
     */
    public function getCancelledDate()
    {
        return $this->cancelled_date;
    }

    /**
     * Date when the resource was cancelled.
     *
     * @deprecated Instead use setCancelledDate
     *
     * @param string $cancelled_date
     * @return $this
     */
    public function setCancelled_date($cancelled_date)
    {
        $this->cancelled_date = $cancelled_date;
        return $this;
    }

    /**
     * Date when the resource was cancelled.
     * @deprecated Instead use getCancelledDate
     *
     * @return string
     */
    public function getCancelled_date()
    {
        return $this->cancelled_date;
    }

    /**
     * Actor who cancelled the resource.
     *
     * @param string $cancelled_by
     * 
     * @return $this
     */
    public function setCancelledBy($cancelled_by)
    {
        $this->cancelled_by = $cancelled_by;
        return $this;
    }

    /**
     * Actor who cancelled the resource.
     *
     * @return string
     */
    public function getCancelledBy()
    {
        return $this->cancelled_by;
    }

    /**
     * Actor who cancelled the resource.
     *
     * @deprecated Instead use setCancelledBy
     *
     * @param string $cancelled_by
     * @return $this
     */
    public function setCancelled_by($cancelled_by)
    {
        $this->cancelled_by = $cancelled_by;
        return $this;
    }

    /**
     * Actor who cancelled the resource.
     * @deprecated Instead use getCancelledBy
     *
     * @return string
     */
    public function getCancelled_by()
    {
        return $this->cancelled_by;
    }

    /**
     * Date when the resource was last edited.
     *
     * @param string $last_updated_date
     * 
     * @return $this
     */
    public function setLastUpdatedDate($last_updated_date)
    {
        $this->last_updated_date = $last_updated_date;
        return $this;
    }

    /**
     * Date when the resource was last edited.
     *
     * @return string
     */
    public function getLastUpdatedDate()
    {
        return $this->last_updated_date;
    }

    /**
     * Date when the resource was last edited.
     *
     * @deprecated Instead use setLastUpdatedDate
     *
     * @param string $last_updated_date
     * @return $this
     */
    public function setLast_updated_date($last_updated_date)
    {
        $this->last_updated_date = $last_updated_date;
        return $this;
    }

    /**
     * Date when the resource was last edited.
     * @deprecated Instead use getLastUpdatedDate
     *
     * @return string
     */
    public function getLast_updated_date()
    {
        return $this->last_updated_date;
    }

    /**
     * Email address of the account that last edited the resource.
     *
     * @param string $last_updated_by
     * 
     * @return $this
     */
    public function setLastUpdatedBy($last_updated_by)
    {
        $this->last_updated_by = $last_updated_by;
        return $this;
    }

    /**
     * Email address of the account that last edited the resource.
     *
     * @return string
     */
    public function getLastUpdatedBy()
    {
        return $this->last_updated_by;
    }

    /**
     * Email address of the account that last edited the resource.
     *
     * @deprecated Instead use setLastUpdatedBy
     *
     * @param string $last_updated_by
     * @return $this
     */
    public function setLast_updated_by($last_updated_by)
    {
        $this->last_updated_by = $last_updated_by;
        return $this;
    }

    /**
     * Email address of the account that last edited the resource.
     * @deprecated Instead use getLastUpdatedBy
     *
     * @return string
     */
    public function getLast_updated_by()
    {
        return $this->last_updated_by;
    }

    /**
     * Date when the resource was first sent.
     *
     * @param string $first_sent_date
     * 
     * @return $this
     */
    public function setFirstSentDate($first_sent_date)
    {
        $this->first_sent_date = $first_sent_date;
        return $this;
    }

    /**
     * Date when the resource was first sent.
     *
     * @return string
     */
    public function getFirstSentDate()
    {
        return $this->first_sent_date;
    }

    /**
     * Date when the resource was first sent.
     *
     * @deprecated Instead use setFirstSentDate
     *
     * @param string $first_sent_date
     * @return $this
     */
    public function setFirst_sent_date($first_sent_date)
    {
        $this->first_sent_date = $first_sent_date;
        return $this;
    }

    /**
     * Date when the resource was first sent.
     * @deprecated Instead use getFirstSentDate
     *
     * @return string
     */
    public function getFirst_sent_date()
    {
        return $this->first_sent_date;
    }

    /**
     * Date when the resource was last sent.
     *
     * @param string $last_sent_date
     * 
     * @return $this
     */
    public function setLastSentDate($last_sent_date)
    {
        $this->last_sent_date = $last_sent_date;
        return $this;
    }

    /**
     * Date when the resource was last sent.
     *
     * @return string
     */
    public function getLastSentDate()
    {
        return $this->last_sent_date;
    }

    /**
     * Date when the resource was last sent.
     *
     * @deprecated Instead use setLastSentDate
     *
     * @param string $last_sent_date
     * @return $this
     */
    public function setLast_sent_date($last_sent_date)
    {
        $this->last_sent_date = $last_sent_date;
        return $this;
    }

    /**
     * Date when the resource was last sent.
     * @deprecated Instead use getLastSentDate
     *
     * @return string
     */
    public function getLast_sent_date()
    {
        return $this->last_sent_date;
    }

    /**
     * Email address of the account that last sent the resource.
     *
     * @param string $last_sent_by
     * 
     * @return $this
     */
    public function setLastSentBy($last_sent_by)
    {
        $this->last_sent_by = $last_sent_by;
        return $this;
    }

    /**
     * Email address of the account that last sent the resource.
     *
     * @return string
     */
    public function getLastSentBy()
    {
        return $this->last_sent_by;
    }

    /**
     * Email address of the account that last sent the resource.
     *
     * @deprecated Instead use setLastSentBy
     *
     * @param string $last_sent_by
     * @return $this
     */
    public function setLast_sent_by($last_sent_by)
    {
        $this->last_sent_by = $last_sent_by;
        return $this;
    }

    /**
     * Email address of the account that last sent the resource.
     * @deprecated Instead use getLastSentBy
     *
     * @return string
     */
    public function getLast_sent_by()
    {
        return $this->last_sent_by;
    }

    /**
     * URL representing the payer's view of the invoice.
     *
     * @param string $payer_view_url
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setPayerViewUrl($payer_view_url)
    {
        UrlValidator::validate($payer_view_url, "PayerViewUrl");
        $this->payer_view_url = $payer_view_url;
        return $this;
    }

    /**
     * URL representing the payer's view of the invoice.
     *
     * @return string
     */
    public function getPayerViewUrl()
    {
        return $this->payer_view_url;
    }

    /**
     * URL representing the payer's view of the invoice.
     *
     * @deprecated Instead use setPayerViewUrl
     *
     * @param string $payer_view_url
     * @return $this
     */
    public function setPayer_view_url($payer_view_url)
    {
        $this->payer_view_url = $payer_view_url;
        return $this;
    }

    /**
     * URL representing the payer's view of the invoice.
     * @deprecated Instead use getPayerViewUrl
     *
     * @return string
     */
    public function getPayer_view_url()
    {
        return $this->payer_view_url;
    }

}
