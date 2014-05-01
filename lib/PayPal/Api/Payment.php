<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;
use PayPal\Rest\IResource;
use PayPal\Api\PaymentHistory;
use PayPal\Transport\PPRestCall;

/**
 * Class Payment
 *
 * @property string                        id
 * @property string                        create_time
 * @property string                        update_time
 * @property string                        intent
 * @property \PayPal\Api\Payer             payer
 * @property array|\PayPal\Api\Transaction transactions
 * @property string                        state
 * @property \PayPal\Api\RedirectUrls      redirect_urls
 * @property \PayPal\Api\Links             links
 */
class Payment extends PPModel implements IResource
{
    /**
     * @var
     */
    private static $credential;

    /**
     * Set Credential
     *
     * @param $credential
     *
     * @deprecated Pass ApiContext to create/get methods instead
     */
    public static function setCredential($credential)
    {
        self::$credential = $credential;
    }

    /**
     * Set ID
     * Identifier of the payment resource created
     *
     * @param string $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get ID
     * Identifier of the payment resource created
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Create Time
     * Time the resource was created
     *
     * @param string $create_time
     *
     * @return $this
     */
    public function setCreateTime($create_time)
    {
        $this->create_time = $create_time;

        return $this;
    }

    /**
     * Get Create Time
     * Time the resource was created
     *
     * @return string
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * Set Create Time
     * Time the resource was created
     *
     * @param string $create_time
     *
     * @deprecated Use setCreateTime
     *
     * @return $this
     */
    public function setCreate_time($create_time)
    {
        $this->create_time = $create_time;

        return $this;
    }

    /**
     * Get Create Time
     * Time the resource was created
     *
     * @deprecated Use getCreateTime
     *
     * @return string
     */
    public function getCreate_time()
    {
        return $this->create_time;
    }

    /**
     * Set Update Time
     * Time the resource was last updated
     *
     * @param string $update_time
     *
     * @return $this
     */
    public function setUpdateTime($update_time)
    {
        $this->update_time = $update_time;

        return $this;
    }

    /**
     * Get Update Time
     * Time the resource was last updated
     *
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    /**
     * Set Update Time
     * Time the resource was last updated
     *
     * @param string $update_time
     *
     * @deprecated Use setUpdateTime
     *
     * @return $this
     */
    public function setUpdate_time($update_time)
    {
        $this->update_time = $update_time;

        return $this;
    }

    /**
     * Get Update Time
     * Time the resource was last updated
     *
     * @deprecated Use getUpdateTime
     *
     * @return string
     */
    public function getUpdate_time()
    {
        return $this->update_time;
    }

    /**
     * Set Intent
     * Intent of the payment - Sale or Authorization or Order
     *
     * @param string $intent
     *
     * @return $this
     */
    public function setIntent($intent)
    {
        $this->intent = $intent;

        return $this;
    }

    /**
     * Get Intent
     * Intent of the payment - Sale or Authorization or Order
     *
     * @return string
     */
    public function getIntent()
    {
        return $this->intent;
    }

    /**
     * Set Payer
     * Source of the funds for this payment represented by a PayPal account or a direct credit card
     *
     * @param \PayPal\Api\Payer $payer
     *
     * @return $this
     */
    public function setPayer($payer)
    {
        $this->payer = $payer;

        return $this;
    }

    /**
     * Get Payer
     * Source of the funds for this payment represented by a PayPal account or a direct credit card
     *
     * @return \PayPal\Api\Payer
     */
    public function getPayer()
    {
        return $this->payer;
    }

    /**
     * Set Transactions
     * A payment can have more than one transaction, with each transaction establishing a contract between the payer and a payee
     *
     * @param array|\PayPal\Api\Transaction $transactions
     *
     * @return $this
     */
    public function setTransactions($transactions)
    {
        $this->transactions = $transactions;

        return $this;
    }

    /**
     * Get Transactions
     * A payment can have more than one transaction, with each transaction establishing a contract between the payer and a payee
     *
     * @return \PayPal\Api\Transaction
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * Set State
     * State of the payment
     *
     * @param string $state
     *
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get State
     * State of the payment
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set Redirect URLs
     * Redirect urls required only when using payment_method as PayPal - the only settings supported are return and cancel urls
     *
     * @param \PayPal\Api\RedirectUrls $redirect_urls
     *
     * @return $this
     */
    public function setRedirectUrls($redirect_urls)
    {
        $this->redirect_urls = $redirect_urls;

        return $this;
    }

    /**
     * Get Redirect URLs
     * Redirect urls required only when using payment_method as PayPal - the only settings supported are return and cancel urls
     *
     * @return \PayPal\Api\RedirectUrls
     */
    public function getRedirectUrls()
    {
        return $this->redirect_urls;
    }

    /**
     * Set Redirect URLs
     * Redirect urls required only when using payment_method as PayPal - the only settings supported are return and cancel urls
     *
     * @param \PayPal\Api\RedirectUrls $redirect_urls
     *
     * @deprecated Use setRedirectUrls
     *
     * @return $this
     */
    public function setRedirect_urls($redirect_urls)
    {
        $this->redirect_urls = $redirect_urls;

        return $this;
    }

    /**
     * Get Redirect URLs
     * Redirect urls required only when using payment_method as PayPal - the only settings supported are return and cancel urls
     *
     * @deprecated Use getRedirectUrls
     *
     * @return \PayPal\Api\RedirectUrls
     */
    public function getRedirect_urls()
    {
        return $this->redirect_urls;
    }

    /**
     * Set Links
     *
     * @param \PayPal\Api\Links $links
     *
     * @return $this
     */
    public function setLinks($links)
    {
        $this->links = $links;

        return $this;
    }

    /**
     * Get Links
     *
     * @return \PayPal\Api\Links
     */
    public function getLinks()
    {
        return $this->links;
    }


    /**
     * Create
     *
     * @param \PayPal\Rest\ApiContext|null $apiContext
     *
     * @return $this
     */
    public function create($apiContext = null)
    {
        $payLoad = $this->toJSON();

        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }

        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/payments/payment", "POST", $payLoad);
        $this->fromJson($json);

        return $this;
    }

    /**
     * Get
     *
     * @param int                          $paymentId
     * @param \PayPal\Rest\ApiContext|null $apiContext
     *
     * @return Payment
     * @throws \InvalidArgumentException
     */
    public static function get($paymentId, $apiContext = null)
    {
        if (($paymentId == null) || (strlen($paymentId) <= 0)) {
            throw new \InvalidArgumentException("paymentId cannot be null or empty");
        }

        $payLoad = "";

        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }

        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/payments/payment/$paymentId", "GET", $payLoad);

        $ret = new Payment();
        $ret->fromJson($json);

        return $ret;
    }

    /**
     * Execute
     *
     * @param \Paypal\Api\PaymentExecution $paymentExecution
     * @param \PayPal\Rest\ApiContext|null $apiContext
     *
     * @return Payment
     * @throws \InvalidArgumentException
     */
    public function execute($paymentExecution, $apiContext = null)
    {
        if ($this->getId() == null) {
            throw new \InvalidArgumentException("Id cannot be null");
        }

        if (($paymentExecution == null)) {
            throw new \InvalidArgumentException("paymentExecution cannot be null or empty");
        }

        $payLoad = $paymentExecution->toJSON();

        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }

        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/payments/payment/{$this->getId()}/execute", "POST", $payLoad);

        $ret = new Payment();
        $ret->fromJson($json);

        return $ret;
    }

    /**
     * All
     *
     * @param array                        $params
     * @param \PayPal\Rest\ApiContext|null $apiContext
     *
     * @return PaymentHistory
     * @throws \InvalidArgumentException
     */
    public static function all($params, $apiContext = null)
    {
        if (($params == null)) {
            throw new \InvalidArgumentException("params cannot be null or empty");
        }

        $payLoad = "";

        $allowedParams = array(
            'count'       => 1,
            'start_id'    => 1,
            'start_index' => 1,
            'start_time'  => 1,
            'end_time'    => 1,
            'payee_id'    => 1,
            'sort_by'     => 1,
            'sort_order'  => 1,
        );

        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }

        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/payments/payment?" . http_build_query(array_intersect_key($params, $allowedParams)), "GET", $payLoad);

        $ret = new PaymentHistory();
        $ret->fromJson($json);

        return $ret;
    }
}
