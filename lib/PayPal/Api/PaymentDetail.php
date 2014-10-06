<?php
namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

class PaymentDetail extends PPModel
{
    /**
     * PayPal payment detail indicating whether payment was made in an invoicing flow via PayPal or externally. In the case of the mark-as-paid API, payment type is EXTERNAL and this is what is now supported. The PAYPAL value is provided for backward compatibility.
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * PayPal payment detail indicating whether payment was made in an invoicing flow via PayPal or externally. In the case of the mark-as-paid API, payment type is EXTERNAL and this is what is now supported. The PAYPAL value is provided for backward compatibility.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }


    /**
     * PayPal payment transaction id. Mandatory field in case the type value is PAYPAL.
     *
     * @param string $transaction_id
     */
    public function setTransactionId($transaction_id)
    {
        $this->transaction_id = $transaction_id;
        return $this;
    }

    /**
     * PayPal payment transaction id. Mandatory field in case the type value is PAYPAL.
     *
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transaction_id;
    }

    /**
     * PayPal payment transaction id. Mandatory field in case the type value is PAYPAL.
     *
     * @param string $transaction_id
     * @deprecated. Instead use setTransactionId
     */
    public function setTransaction_id($transaction_id)
    {
        $this->transaction_id = $transaction_id;
        return $this;
    }

    /**
     * PayPal payment transaction id. Mandatory field in case the type value is PAYPAL.
     *
     * @return string
     * @deprecated. Instead use getTransactionId
     */
    public function getTransaction_id()
    {
        return $this->transaction_id;
    }

    /**
     * Type of the transaction.
     *
     * @param string $transaction_type
     */
    public function setTransactionType($transaction_type)
    {
        $this->transaction_type = $transaction_type;
        return $this;
    }

    /**
     * Type of the transaction.
     *
     * @return string
     */
    public function getTransactionType()
    {
        return $this->transaction_type;
    }

    /**
     * Type of the transaction.
     *
     * @param string $transaction_type
     * @deprecated. Instead use setTransactionType
     */
    public function setTransaction_type($transaction_type)
    {
        $this->transaction_type = $transaction_type;
        return $this;
    }

    /**
     * Type of the transaction.
     *
     * @return string
     * @deprecated. Instead use getTransactionType
     */
    public function getTransaction_type()
    {
        return $this->transaction_type;
    }

    /**
     * Date when the invoice was paid. Date format: yyyy-MM-dd z. For example, 2014-02-27 PST.
     *
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Date when the invoice was paid. Date format: yyyy-MM-dd z. For example, 2014-02-27 PST.
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }


    /**
     * Payment mode or method. This field is mandatory if the value of the type field is OTHER.
     *
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * Payment mode or method. This field is mandatory if the value of the type field is OTHER.
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }


    /**
     * Optional note associated with the payment.
     *
     * @param string $note
     */
    public function setNote($note)
    {
        $this->note = $note;
        return $this;
    }

    /**
     * Optional note associated with the payment.
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }


}
