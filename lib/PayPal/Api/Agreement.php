<?php

namespace PayPal\Api;

use PayPal\Common\ResourceModel;
use PayPal\Validation\ArgumentValidator;
use PayPal\Api\AgreementTransactions;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PPRestCall;

/**
 * Class Agreement
 *
 * A resource representing an agreement.
 *
 * @package PayPal\Api
 *
 * @property string id
 * @property string state
 * @property string name
 * @property string description
 * @property string start_date
 * @property \PayPal\Api\Payer payer
 * @property \PayPal\Api\Address shipping_address
 * @property \PayPal\Api\MerchantPreferences override_merchant_preferences
 * @property \PayPal\Api\OverrideChargeModel[] override_charge_models
 * @property \PayPal\Api\Plan plan
 * @property string create_time
 * @property string update_time
 * @property \PayPal\Api\AgreementDetails agreement_details
 * @property \PayPal\Api\Links[] links
 */
class Agreement extends ResourceModel
{
    /**
     * Identifier of the agreement.
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
     * Identifier of the agreement.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * State of the agreement.
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
     * State of the agreement.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Name of the agreement.
     *
     * @param string $name
     * 
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Name of the agreement.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Description of the agreement.
     *
     * @param string $description
     * 
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Description of the agreement.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Start date of the agreement. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @param string $start_date
     * 
     * @return $this
     */
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
        return $this;
    }

    /**
     * Start date of the agreement. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @return string
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * Start date of the agreement. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @deprecated Instead use setStartDate
     *
     * @param string $start_date
     * @return $this
     */
    public function setStart_date($start_date)
    {
        $this->start_date = $start_date;
        return $this;
    }

    /**
     * Start date of the agreement. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     * @deprecated Instead use getStartDate
     *
     * @return string
     */
    public function getStart_date()
    {
        return $this->start_date;
    }

    /**
     * Details of the buyer who is enrolling in this agreement. This information is gathered from execution of the approval URL.
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
     * Details of the buyer who is enrolling in this agreement. This information is gathered from execution of the approval URL.
     *
     * @return \PayPal\Api\Payer
     */
    public function getPayer()
    {
        return $this->payer;
    }

    /**
     * Shipping address object of the agreement, which should be provided if it is different from the default address.
     *
     * @param \PayPal\Api\Address $shipping_address
     * 
     * @return $this
     */
    public function setShippingAddress($shipping_address)
    {
        $this->shipping_address = $shipping_address;
        return $this;
    }

    /**
     * Shipping address object of the agreement, which should be provided if it is different from the default address.
     *
     * @return \PayPal\Api\Address
     */
    public function getShippingAddress()
    {
        return $this->shipping_address;
    }

    /**
     * Shipping address object of the agreement, which should be provided if it is different from the default address.
     *
     * @deprecated Instead use setShippingAddress
     *
     * @param \PayPal\Api\Address $shipping_address
     * @return $this
     */
    public function setShipping_address($shipping_address)
    {
        $this->shipping_address = $shipping_address;
        return $this;
    }

    /**
     * Shipping address object of the agreement, which should be provided if it is different from the default address.
     * @deprecated Instead use getShippingAddress
     *
     * @return \PayPal\Api\Address
     */
    public function getShipping_address()
    {
        return $this->shipping_address;
    }

    /**
     * Default merchant preferences from the billing plan are used, unless override preferences are provided here.
     *
     * @param \PayPal\Api\MerchantPreferences $override_merchant_preferences
     * 
     * @return $this
     */
    public function setOverrideMerchantPreferences($override_merchant_preferences)
    {
        $this->override_merchant_preferences = $override_merchant_preferences;
        return $this;
    }

    /**
     * Default merchant preferences from the billing plan are used, unless override preferences are provided here.
     *
     * @return \PayPal\Api\MerchantPreferences
     */
    public function getOverrideMerchantPreferences()
    {
        return $this->override_merchant_preferences;
    }

    /**
     * Default merchant preferences from the billing plan are used, unless override preferences are provided here.
     *
     * @deprecated Instead use setOverrideMerchantPreferences
     *
     * @param \PayPal\Api\MerchantPreferences $override_merchant_preferences
     * @return $this
     */
    public function setOverride_merchant_preferences($override_merchant_preferences)
    {
        $this->override_merchant_preferences = $override_merchant_preferences;
        return $this;
    }

    /**
     * Default merchant preferences from the billing plan are used, unless override preferences are provided here.
     * @deprecated Instead use getOverrideMerchantPreferences
     *
     * @return \PayPal\Api\MerchantPreferences
     */
    public function getOverride_merchant_preferences()
    {
        return $this->override_merchant_preferences;
    }

    /**
     * Array of override_charge_model for this agreement if needed to change the default models from the billing plan.
     *
     * @param \PayPal\Api\OverrideChargeModel[] $override_charge_models
     * 
     * @return $this
     */
    public function setOverrideChargeModels($override_charge_models)
    {
        $this->override_charge_models = $override_charge_models;
        return $this;
    }

    /**
     * Array of override_charge_model for this agreement if needed to change the default models from the billing plan.
     *
     * @return \PayPal\Api\OverrideChargeModel[]
     */
    public function getOverrideChargeModels()
    {
        return $this->override_charge_models;
    }

    /**
     * Append OverrideChargeModels to the list.
     *
     * @param \PayPal\Api\OverrideChargeModel $overrideChargeModel
     * @return $this
     */
    public function addOverrideChargeModel($overrideChargeModel)
    {
        if (!$this->getOverrideChargeModels()) {
            return $this->setOverrideChargeModels(array($overrideChargeModel));
        } else {
            return $this->setOverrideChargeModels(
                array_merge($this->getOverrideChargeModels(), array($overrideChargeModel))
            );
        }
    }

    /**
     * Remove OverrideChargeModels from the list.
     *
     * @param \PayPal\Api\OverrideChargeModel $overrideChargeModel
     * @return $this
     */
    public function removeOverrideChargeModel($overrideChargeModel)
    {
        return $this->setOverrideChargeModels(
            array_diff($this->getOverrideChargeModels(), array($overrideChargeModel))
        );
    }

    /**
     * Array of override_charge_model for this agreement if needed to change the default models from the billing plan.
     *
     * @deprecated Instead use setOverrideChargeModels
     *
     * @param \PayPal\Api\OverrideChargeModel $override_charge_models
     * @return $this
     */
    public function setOverride_charge_models($override_charge_models)
    {
        $this->override_charge_models = $override_charge_models;
        return $this;
    }

    /**
     * Array of override_charge_model for this agreement if needed to change the default models from the billing plan.
     * @deprecated Instead use getOverrideChargeModels
     *
     * @return \PayPal\Api\OverrideChargeModel
     */
    public function getOverride_charge_models()
    {
        return $this->override_charge_models;
    }

    /**
     * Plan details for this agreement.
     *
     * @param \PayPal\Api\Plan $plan
     * 
     * @return $this
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;
        return $this;
    }

    /**
     * Plan details for this agreement.
     *
     * @return \PayPal\Api\Plan
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * Date and time that this resource was created. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
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
     * Date and time that this resource was created. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @return string
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * Date and time that this resource was created. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
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
     * Date and time that this resource was created. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     * @deprecated Instead use getCreateTime
     *
     * @return string
     */
    public function getCreate_time()
    {
        return $this->create_time;
    }

    /**
     * Date and time that this resource was updated. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
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
     * Date and time that this resource was updated. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    /**
     * Date and time that this resource was updated. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
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
     * Date and time that this resource was updated. Date format yyyy-MM-dd z, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     * @deprecated Instead use getUpdateTime
     *
     * @return string
     */
    public function getUpdate_time()
    {
        return $this->update_time;
    }

    /**
     * Agreement Details
     *
     * @param \PayPal\Api\AgreementDetails $agreement_details
     * 
     * @return $this
     */
    public function setAgreementDetails($agreement_details)
    {
        $this->{"agreement-details"} = $agreement_details;
        return $this;
    }

    /**
     * Agreement Details
     *
     * @return \PayPal\Api\AgreementDetails
     */
    public function getAgreementDetails()
    {
        return $this->{"agreement-details"};
    }

    /**
     * Agreement Details
     *
     * @deprecated Instead use setAgreementDetails
     *
     * @param \PayPal\Api\AgreementDetails $agreement-details
     * @return $this
     */
    public function setAgreement_details($agreement_details)
    {
        $this->{"agreement-details"} = $agreement_details;
        return $this;
    }

    /**
     * Agreement Details
     * @deprecated Instead use getAgreementDetails
     *
     * @return \PayPal\Api\AgreementDetails
     */
    public function getAgreement_details()
    {
        return $this->{"agreement-details"};
    }

    /**
     * Sets Links
     *
     * @param \PayPal\Api\Links[] $links
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
     * Append Links to the list.
     *
     * @param \PayPal\Api\Links $links
     * @return $this
     */
    public function addLink($links)
    {
        if (!$this->getLinks()) {
            return $this->setLinks(array($links));
        } else {
            return $this->setLinks(
                array_merge($this->getLinks(), array($links))
            );
        }
    }

    /**
     * Remove Links from the list.
     *
     * @param \PayPal\Api\Links $links
     * @return $this
     */
    public function removeLink($links)
    {
        return $this->setLinks(
            array_diff($this->getLinks(), array($links))
        );
    }

    /**
     * Create a new billing agreement by passing the details for the agreement, including the name, description, start date, payer, and billing plan in the request JSON.
     *
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PPRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return Agreement
     */
    public function create($apiContext = null, $restCall = null)
    {
        $payLoad = $this->toJSON();
        $json = self::executeCall(
            "/v1/payments/billing-agreements/",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $this->fromJson($json);
        return $this;
    }

    /**
     * Execute a billing agreement after buyer approval by passing the payment token to the request URI.
     *
     * @param  $paymentToken
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PPRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return Agreement
     */
    public function execute($paymentToken, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($paymentToken, 'paymentToken');
        $payLoad = "";
        $json = self::executeCall(
            "/v1/payments/billing-agreements/$paymentToken/agreement-execute",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $this->fromJson($json);
        return $this;
    }

    /**
     * Retrieve details for a particular billing agreement by passing the ID of the agreement to the request URI.
     *
     * @param string $agreementId
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PPRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return Agreement
     */
    public static function get($agreementId, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($agreementId, 'agreementId');
        $payLoad = "";
        $json = self::executeCall(
            "/v1/payments/billing-agreements/$agreementId",
            "GET",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new Agreement();
        $ret->fromJson($json);
        return $ret;
    }

    /**
     * Update details of a billing agreement, such as the description, shipping address, and start date, by passing the ID of the agreement to the request URI.
     *
     * @param PatchRequest $patchRequest
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PPRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return bool
     */
    public function update($patchRequest, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($patchRequest, 'patchRequest');
        $payLoad = $patchRequest->toJSON();
        self::executeCall(
            "/v1/payments/billing-agreements/{$this->getId()}",
            "PATCH",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        return true;
    }

    /**
     * Suspend a particular billing agreement by passing the ID of the agreement to the request URI.
     *
     * @param AgreementStateDescriptor $agreementStateDescriptor
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PPRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return bool
     */
    public function suspend($agreementStateDescriptor, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($agreementStateDescriptor, 'agreementStateDescriptor');
        $payLoad = $agreementStateDescriptor->toJSON();
        self::executeCall(
            "/v1/payments/billing-agreements/{$this->getId()}/suspend",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        return true;
    }

    /**
     * Reactivate a suspended billing agreement by passing the ID of the agreement to the appropriate URI. In addition, pass an agreement_state_descriptor object in the request JSON that includes a note about the reason for changing the state of the agreement and the amount and currency for the agreement.
     *
     * @param AgreementStateDescriptor $agreementStateDescriptor
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PPRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return bool
     */
    public function reActivate($agreementStateDescriptor, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($agreementStateDescriptor, 'agreementStateDescriptor');
        $payLoad = $agreementStateDescriptor->toJSON();
        self::executeCall(
            "/v1/payments/billing-agreements/{$this->getId()}/re-activate",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        return true;
    }

    /**
     * Cancel a billing agreement by passing the ID of the agreement to the request URI. In addition, pass an agreement_state_descriptor object in the request JSON that includes a note about the reason for changing the state of the agreement and the amount and currency for the agreement.
     *
     * @param AgreementStateDescriptor $agreementStateDescriptor
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PPRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return bool
     */
    public function cancel($agreementStateDescriptor, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($agreementStateDescriptor, 'agreementStateDescriptor');
        $payLoad = $agreementStateDescriptor->toJSON();
        self::executeCall(
            "/v1/payments/billing-agreements/{$this->getId()}/cancel",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        return true;
    }

    /**
     * Bill an outstanding amount for an agreement by passing the ID of the agreement to the request URI. In addition, pass an agreement_state_descriptor object in the request JSON that includes a note about the reason for changing the state of the agreement and the amount and currency for the agreement.
     *
     * @param AgreementStateDescriptor $agreementStateDescriptor
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PPRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return bool
     */
    public function billBalance($agreementStateDescriptor, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($agreementStateDescriptor, 'agreementStateDescriptor');
        $payLoad = $agreementStateDescriptor->toJSON();
        self::executeCall(
            "/v1/payments/billing-agreements/{$this->getId()}/bill-balance",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        return true;
    }

    /**
     * Set the balance for an agreement by passing the ID of the agreement to the request URI. In addition, pass a common_currency object in the request JSON that specifies the currency type and value of the balance.
     *
     * @param Currency $currency
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PPRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return bool
     */
    public function setBalance($currency, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($currency, 'currency');
        $payLoad = $currency->toJSON();
        self::executeCall(
            "/v1/payments/billing-agreements/{$this->getId()}/set-balance",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        return true;
    }

    /**
     * List transactions for a billing agreement by passing the ID of the agreement, as well as the start and end dates of the range of transactions to list, to the request URI.
     *
     * @param string $agreementId
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PPRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return AgreementTransactions
     */
    public static function transactions($agreementId, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($agreementId, 'agreementId');
        $payLoad = "";
        $json = self::executeCall(
            "/v1/payments/billing-agreements/$agreementId/transactions",
            "GET",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new AgreementTransactions();
        $ret->fromJson($json);
        return $ret;
    }

}
