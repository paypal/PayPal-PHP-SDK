<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;
use PayPal\Rest\IResource;
use PayPal\Api\PaymentHistory;
use PayPal\Transport\PPRestCall;
use PayPal\Validation\ArgumentValidator;

/**
 * Class Payment
 *
 * Lets you create, process and manage payments.
 *
 * @package PayPal\Api
 *
 * @property string id
 * @property string create_time
 * @property string update_time
 * @property string intent
 * @property \PayPal\Api\Payer payer
 * @property \PayPal\Api\object cart
 * @property \PayPal\Api\Transaction transactions
 * @property string state
 * @property \PayPal\Api\RedirectUrls redirect_urls
 * @property \PayPal\Api\Links links
 * @property string experience_profile_id
 */
class Payment extends PPModel implements IResource
{
    /**
     * OAuth Credentials to use for this call
     *
     * @var \PayPal\Auth\OAuthTokenCredential $credential
     */
    protected static $credential;

    /**
     * Sets Credential
     *
     * @deprecated Pass ApiContext to create/get methods instead
     * @param \PayPal\Auth\OAuthTokenCredential $credential
     */
    public static function setCredential($credential)
    {
        self::$credential = $credential;
    }

    /**
     * Identifier of the payment resource created.
     *
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
     * Identifier of the payment resource created.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Time the resource was created in UTC ISO8601 format.
     *
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
     * Time the resource was created in UTC ISO8601 format.
     *
     * @return string
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * Time the resource was created in UTC ISO8601 format.
     *
     * @deprecated Instead use setCreateTime
     *
     * @param string $create_time
     * @return $this
     */
    public function setCreate_time($create_time)
    {
        $this->create_time = $create_time;
        return $this;
    }

    /**
     * Time the resource was created in UTC ISO8601 format.
     * @deprecated Instead use getCreateTime
     *
     * @return string
     */
    public function getCreate_time()
    {
        return $this->create_time;
    }

    /**
     * Time the resource was last updated in UTC ISO8601 format.
     *
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
     * Time the resource was last updated in UTC ISO8601 format.
     *
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    /**
     * Time the resource was last updated in UTC ISO8601 format.
     *
     * @deprecated Instead use setUpdateTime
     *
     * @param string $update_time
     * @return $this
     */
    public function setUpdate_time($update_time)
    {
        $this->update_time = $update_time;
        return $this;
    }

    /**
     * Time the resource was last updated in UTC ISO8601 format.
     * @deprecated Instead use getUpdateTime
     *
     * @return string
     */
    public function getUpdate_time()
    {
        return $this->update_time;
    }

    /**
     * Intent of the payment - Sale or Authorization or Order.
     * Valid Values: ["sale", "authorize", "order"]
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
     * Intent of the payment - Sale or Authorization or Order.
     *
     * @return string
     */
    public function getIntent()
    {
        return $this->intent;
    }

    /**
     * Source of the funds for this payment represented by a PayPal account or a direct credit card.
     *
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
     * Source of the funds for this payment represented by a PayPal account or a direct credit card.
     *
     * @return \PayPal\Api\Payer
     */
    public function getPayer()
    {
        return $this->payer;
    }

    /**
     * Cart for which the payment is done.
     *
     *
     * @param \PayPal\Api\object $cart
     *
     * @return $this
     */
    public function setCart($cart)
    {
        $this->cart = $cart;
        return $this;
    }

    /**
     * Cart for which the payment is done.
     *
     * @return \PayPal\Api\object
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * A payment can have more than one transaction, with each transaction establishing a contract between the payer and a payee
     *
     *
     * @param \PayPal\Api\Transaction $transactions
     *
     * @return $this
     */
    public function setTransactions($transactions)
    {
        $this->transactions = $transactions;
        return $this;
    }

    /**
     * A payment can have more than one transaction, with each transaction establishing a contract between the payer and a payee
     *
     * @return \PayPal\Api\Transaction[]
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * state of the payment
     * Valid Values: ["created", "approved", "failed", "canceled", "expired"]
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
     * state of the payment
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Redirect urls required only when using payment_method as PayPal - the only settings supported are return and cancel urls.
     *
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
     * Redirect urls required only when using payment_method as PayPal - the only settings supported are return and cancel urls.
     *
     * @return \PayPal\Api\RedirectUrls
     */
    public function getRedirectUrls()
    {
        return $this->redirect_urls;
    }

    /**
     * Redirect urls required only when using payment_method as PayPal - the only settings supported are return and cancel urls.
     *
     * @deprecated Instead use setRedirectUrls
     *
     * @param \PayPal\Api\RedirectUrls $redirect_urls
     * @return $this
     */
    public function setRedirect_urls($redirect_urls)
    {
        $this->redirect_urls = $redirect_urls;
        return $this;
    }

    /**
     * Redirect urls required only when using payment_method as PayPal - the only settings supported are return and cancel urls.
     * @deprecated Instead use getRedirectUrls
     *
     * @return \PayPal\Api\RedirectUrls
     */
    public function getRedirect_urls()
    {
        return $this->redirect_urls;
    }

    /**
     * Sets Links
     *
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
     * Gets Links
     *
     * @return \PayPal\Api\Links[]
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Set Experience_profile_id
     * experience_profile_id of the payment
     *
     * @param string $experience_profile_id
     *
     * @return $this
     */
    public function setExperienceProfileId($experience_profile_id)
    {
        $this->experience_profile_id = $experience_profile_id;
        return $this;
    }

    /**
     * Get Experience_profile_id
     * Experience_profile_id of the payment
     *
     * @return string
     */
    public function getExperienceProfileId()
    {
        return $this->experience_profile_id;
    }
    
    /**
     * Creates (and processes) a new Payment Resource.
     *
     * @param \PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @return Payment
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
     * Obtain the Payment resource for the given identifier.
     *
     * @param string $paymentId
     * @param \PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @return Payment
     */
    public static function get($paymentId, $apiContext = null)
    {
        ArgumentValidator::validate($paymentId, 'paymentId');

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
     * Executes the payment (after approved by the Payer) associated with this resource when the payment method is PayPal.
     *
     * @param PaymentExecution $paymentExecution
     * @param \PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @return Payment
     */
    public function execute($paymentExecution, $apiContext = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($paymentExecution, 'paymentExecution');

        $payLoad = $paymentExecution->toJSON();
        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }
        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/payments/payment/{$this->getId()}/execute", "POST", $payLoad);
        $this->fromJson($json);
        return $this;
    }

    /**
     * Retrieves a list of Payment resources.
     *
     * @param array $params
     * @param \PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @return PaymentHistory
     */
    public static function all($params, $apiContext = null)
    {
        ArgumentValidator::validate($params, 'params');

        $payLoad = "";
        $allowedParams = array(
            'count' => 1,
            'start_id' => 1,
            'start_index' => 1,
            'start_time' => 1,
            'end_time' => 1,
            'payee_id' => 1,
            'sort_by' => 1,
            'sort_order' => 1,
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
