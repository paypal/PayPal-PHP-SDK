<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;
use PayPal\Rest\IResource;
use PayPal\Transport\PPRestCall;
use PayPal\Validation\ArgumentValidator;

/**
 * Class BankAccount
 *
 * A resource representing a bank account that can be used to fund a payment.
 *
 * @package PayPal\Api
 *
 * @property string id
 * @property string account_number
 * @property string account_number_type
 * @property string routing_number
 * @property string account_type
 * @property string account_name
 * @property string check_type
 * @property string auth_type
 * @property string auth_capture_timestamp
 * @property string bank_name
 * @property string country_code
 * @property string first_name
 * @property string last_name
 * @property string birth_date
 * @property \PayPal\Api\Address billing_address
 * @property string state
 * @property string confirmation_status
 * @property string payer_id
 * @property string external_customer_id
 * @property string merchant_id
 * @property string create_time
 * @property string update_time
 * @property string valid_until
 * @property \PayPal\Api\Links links
 */
class BankAccount extends PPModel implements IResource
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
     * ID of the bank account being saved for later use.
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
     * ID of the bank account being saved for later use.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Account number in either IBAN (max length 34) or BBAN (max length 17) format.
     * 
     *
     * @param string $account_number
     * 
     * @return $this
     */
    public function setAccountNumber($account_number)
    {
        $this->account_number = $account_number;
        return $this;
    }

    /**
     * Account number in either IBAN (max length 34) or BBAN (max length 17) format.
     *
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->account_number;
    }

    /**
     * Account number in either IBAN (max length 34) or BBAN (max length 17) format.
     *
     * @deprecated Instead use setAccountNumber
     *
     * @param string $account_number
     * @return $this
     */
    public function setAccount_number($account_number)
    {
        $this->account_number = $account_number;
        return $this;
    }

    /**
     * Account number in either IBAN (max length 34) or BBAN (max length 17) format.
     * @deprecated Instead use getAccountNumber
     *
     * @return string
     */
    public function getAccount_number()
    {
        return $this->account_number;
    }

    /**
     * Type of the bank account number (International or Basic Bank Account Number). For more information refer to http://en.wikipedia.org/wiki/International_Bank_Account_Number.
     * Valid Values: ["BBAN", "IBAN"] 
     *
     * @param string $account_number_type
     * 
     * @return $this
     */
    public function setAccountNumberType($account_number_type)
    {
        $this->account_number_type = $account_number_type;
        return $this;
    }

    /**
     * Type of the bank account number (International or Basic Bank Account Number). For more information refer to http://en.wikipedia.org/wiki/International_Bank_Account_Number.
     *
     * @return string
     */
    public function getAccountNumberType()
    {
        return $this->account_number_type;
    }

    /**
     * Type of the bank account number (International or Basic Bank Account Number). For more information refer to http://en.wikipedia.org/wiki/International_Bank_Account_Number.
     *
     * @deprecated Instead use setAccountNumberType
     *
     * @param string $account_number_type
     * @return $this
     */
    public function setAccount_number_type($account_number_type)
    {
        $this->account_number_type = $account_number_type;
        return $this;
    }

    /**
     * Type of the bank account number (International or Basic Bank Account Number). For more information refer to http://en.wikipedia.org/wiki/International_Bank_Account_Number.
     * @deprecated Instead use getAccountNumberType
     *
     * @return string
     */
    public function getAccount_number_type()
    {
        return $this->account_number_type;
    }

    /**
     * Routing transit number (aka Bank Code) of the bank (typically for domestic use only - for international use, IBAN includes bank code). For more information refer to http://en.wikipedia.org/wiki/Bank_code.
     * 
     *
     * @param string $routing_number
     * 
     * @return $this
     */
    public function setRoutingNumber($routing_number)
    {
        $this->routing_number = $routing_number;
        return $this;
    }

    /**
     * Routing transit number (aka Bank Code) of the bank (typically for domestic use only - for international use, IBAN includes bank code). For more information refer to http://en.wikipedia.org/wiki/Bank_code.
     *
     * @return string
     */
    public function getRoutingNumber()
    {
        return $this->routing_number;
    }

    /**
     * Routing transit number (aka Bank Code) of the bank (typically for domestic use only - for international use, IBAN includes bank code). For more information refer to http://en.wikipedia.org/wiki/Bank_code.
     *
     * @deprecated Instead use setRoutingNumber
     *
     * @param string $routing_number
     * @return $this
     */
    public function setRouting_number($routing_number)
    {
        $this->routing_number = $routing_number;
        return $this;
    }

    /**
     * Routing transit number (aka Bank Code) of the bank (typically for domestic use only - for international use, IBAN includes bank code). For more information refer to http://en.wikipedia.org/wiki/Bank_code.
     * @deprecated Instead use getRoutingNumber
     *
     * @return string
     */
    public function getRouting_number()
    {
        return $this->routing_number;
    }

    /**
     * Type of the bank account.
     * Valid Values: ["CHECKING", "SAVINGS"] 
     *
     * @param string $account_type
     * 
     * @return $this
     */
    public function setAccountType($account_type)
    {
        $this->account_type = $account_type;
        return $this;
    }

    /**
     * Type of the bank account.
     *
     * @return string
     */
    public function getAccountType()
    {
        return $this->account_type;
    }

    /**
     * Type of the bank account.
     *
     * @deprecated Instead use setAccountType
     *
     * @param string $account_type
     * @return $this
     */
    public function setAccount_type($account_type)
    {
        $this->account_type = $account_type;
        return $this;
    }

    /**
     * Type of the bank account.
     * @deprecated Instead use getAccountType
     *
     * @return string
     */
    public function getAccount_type()
    {
        return $this->account_type;
    }

    /**
     * A customer designated name.
     * 
     *
     * @param string $account_name
     * 
     * @return $this
     */
    public function setAccountName($account_name)
    {
        $this->account_name = $account_name;
        return $this;
    }

    /**
     * A customer designated name.
     *
     * @return string
     */
    public function getAccountName()
    {
        return $this->account_name;
    }

    /**
     * A customer designated name.
     *
     * @deprecated Instead use setAccountName
     *
     * @param string $account_name
     * @return $this
     */
    public function setAccount_name($account_name)
    {
        $this->account_name = $account_name;
        return $this;
    }

    /**
     * A customer designated name.
     * @deprecated Instead use getAccountName
     *
     * @return string
     */
    public function getAccount_name()
    {
        return $this->account_name;
    }

    /**
     * Type of the check when this information was obtained through a check by the facilitator or merchant.
     * Valid Values: ["PERSONAL", "COMPANY"] 
     *
     * @param string $check_type
     * 
     * @return $this
     */
    public function setCheckType($check_type)
    {
        $this->check_type = $check_type;
        return $this;
    }

    /**
     * Type of the check when this information was obtained through a check by the facilitator or merchant.
     *
     * @return string
     */
    public function getCheckType()
    {
        return $this->check_type;
    }

    /**
     * Type of the check when this information was obtained through a check by the facilitator or merchant.
     *
     * @deprecated Instead use setCheckType
     *
     * @param string $check_type
     * @return $this
     */
    public function setCheck_type($check_type)
    {
        $this->check_type = $check_type;
        return $this;
    }

    /**
     * Type of the check when this information was obtained through a check by the facilitator or merchant.
     * @deprecated Instead use getCheckType
     *
     * @return string
     */
    public function getCheck_type()
    {
        return $this->check_type;
    }

    /**
     * How the check was obtained from the customer, if check was the source of the information provided.
     * Valid Values: ["CCD", "PPD", "TEL", "POP", "ARC", "RCK", "WEB"] 
     *
     * @param string $auth_type
     * 
     * @return $this
     */
    public function setAuthType($auth_type)
    {
        $this->auth_type = $auth_type;
        return $this;
    }

    /**
     * How the check was obtained from the customer, if check was the source of the information provided.
     *
     * @return string
     */
    public function getAuthType()
    {
        return $this->auth_type;
    }

    /**
     * How the check was obtained from the customer, if check was the source of the information provided.
     *
     * @deprecated Instead use setAuthType
     *
     * @param string $auth_type
     * @return $this
     */
    public function setAuth_type($auth_type)
    {
        $this->auth_type = $auth_type;
        return $this;
    }

    /**
     * How the check was obtained from the customer, if check was the source of the information provided.
     * @deprecated Instead use getAuthType
     *
     * @return string
     */
    public function getAuth_type()
    {
        return $this->auth_type;
    }

    /**
     * Time at which the authorization (or check) was captured. Use this field if the user authorization needs to be captured due to any privacy requirements.
     * 
     *
     * @param string $auth_capture_timestamp
     * 
     * @return $this
     */
    public function setAuthCaptureTimestamp($auth_capture_timestamp)
    {
        $this->auth_capture_timestamp = $auth_capture_timestamp;
        return $this;
    }

    /**
     * Time at which the authorization (or check) was captured. Use this field if the user authorization needs to be captured due to any privacy requirements.
     *
     * @return string
     */
    public function getAuthCaptureTimestamp()
    {
        return $this->auth_capture_timestamp;
    }

    /**
     * Time at which the authorization (or check) was captured. Use this field if the user authorization needs to be captured due to any privacy requirements.
     *
     * @deprecated Instead use setAuthCaptureTimestamp
     *
     * @param string $auth_capture_timestamp
     * @return $this
     */
    public function setAuth_capture_timestamp($auth_capture_timestamp)
    {
        $this->auth_capture_timestamp = $auth_capture_timestamp;
        return $this;
    }

    /**
     * Time at which the authorization (or check) was captured. Use this field if the user authorization needs to be captured due to any privacy requirements.
     * @deprecated Instead use getAuthCaptureTimestamp
     *
     * @return string
     */
    public function getAuth_capture_timestamp()
    {
        return $this->auth_capture_timestamp;
    }

    /**
     * Name of the bank.
     * 
     *
     * @param string $bank_name
     * 
     * @return $this
     */
    public function setBankName($bank_name)
    {
        $this->bank_name = $bank_name;
        return $this;
    }

    /**
     * Name of the bank.
     *
     * @return string
     */
    public function getBankName()
    {
        return $this->bank_name;
    }

    /**
     * Name of the bank.
     *
     * @deprecated Instead use setBankName
     *
     * @param string $bank_name
     * @return $this
     */
    public function setBank_name($bank_name)
    {
        $this->bank_name = $bank_name;
        return $this;
    }

    /**
     * Name of the bank.
     * @deprecated Instead use getBankName
     *
     * @return string
     */
    public function getBank_name()
    {
        return $this->bank_name;
    }

    /**
     * 2 letter country code of the Bank.
     * 
     *
     * @param string $country_code
     * 
     * @return $this
     */
    public function setCountryCode($country_code)
    {
        $this->country_code = $country_code;
        return $this;
    }

    /**
     * 2 letter country code of the Bank.
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * 2 letter country code of the Bank.
     *
     * @deprecated Instead use setCountryCode
     *
     * @param string $country_code
     * @return $this
     */
    public function setCountry_code($country_code)
    {
        $this->country_code = $country_code;
        return $this;
    }

    /**
     * 2 letter country code of the Bank.
     * @deprecated Instead use getCountryCode
     *
     * @return string
     */
    public function getCountry_code()
    {
        return $this->country_code;
    }

    /**
     * Account holder's first name.
     * 
     *
     * @param string $first_name
     * 
     * @return $this
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * Account holder's first name.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Account holder's first name.
     *
     * @deprecated Instead use setFirstName
     *
     * @param string $first_name
     * @return $this
     */
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * Account holder's first name.
     * @deprecated Instead use getFirstName
     *
     * @return string
     */
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * Account holder's last name.
     * 
     *
     * @param string $last_name
     * 
     * @return $this
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * Account holder's last name.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Account holder's last name.
     *
     * @deprecated Instead use setLastName
     *
     * @param string $last_name
     * @return $this
     */
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * Account holder's last name.
     * @deprecated Instead use getLastName
     *
     * @return string
     */
    public function getLast_name()
    {
        return $this->last_name;
    }

    /**
     * Birth date of the bank account holder.
     * 
     *
     * @param string $birth_date
     * 
     * @return $this
     */
    public function setBirthDate($birth_date)
    {
        $this->birth_date = $birth_date;
        return $this;
    }

    /**
     * Birth date of the bank account holder.
     *
     * @return string
     */
    public function getBirthDate()
    {
        return $this->birth_date;
    }

    /**
     * Birth date of the bank account holder.
     *
     * @deprecated Instead use setBirthDate
     *
     * @param string $birth_date
     * @return $this
     */
    public function setBirth_date($birth_date)
    {
        $this->birth_date = $birth_date;
        return $this;
    }

    /**
     * Birth date of the bank account holder.
     * @deprecated Instead use getBirthDate
     *
     * @return string
     */
    public function getBirth_date()
    {
        return $this->birth_date;
    }

    /**
     * Billing address.
     * 
     *
     * @param \PayPal\Api\Address $billing_address
     * 
     * @return $this
     */
    public function setBillingAddress($billing_address)
    {
        $this->billing_address = $billing_address;
        return $this;
    }

    /**
     * Billing address.
     *
     * @return \PayPal\Api\Address
     */
    public function getBillingAddress()
    {
        return $this->billing_address;
    }

    /**
     * Billing address.
     *
     * @deprecated Instead use setBillingAddress
     *
     * @param \PayPal\Api\Address $billing_address
     * @return $this
     */
    public function setBilling_address($billing_address)
    {
        $this->billing_address = $billing_address;
        return $this;
    }

    /**
     * Billing address.
     * @deprecated Instead use getBillingAddress
     *
     * @return \PayPal\Api\Address
     */
    public function getBilling_address()
    {
        return $this->billing_address;
    }

    /**
     * State of this funding instrument.
     * Valid Values: ["ACTIVE", "INACTIVE", "DELETED"] 
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
     * State of this funding instrument.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Confirmation status of a bank account.
     * Valid Values: ["UNCONFIRMED", "CONFIRMED"] 
     *
     * @param string $confirmation_status
     * 
     * @return $this
     */
    public function setConfirmationStatus($confirmation_status)
    {
        $this->confirmation_status = $confirmation_status;
        return $this;
    }

    /**
     * Confirmation status of a bank account.
     *
     * @return string
     */
    public function getConfirmationStatus()
    {
        return $this->confirmation_status;
    }

    /**
     * Confirmation status of a bank account.
     *
     * @deprecated Instead use setConfirmationStatus
     *
     * @param string $confirmation_status
     * @return $this
     */
    public function setConfirmation_status($confirmation_status)
    {
        $this->confirmation_status = $confirmation_status;
        return $this;
    }

    /**
     * Confirmation status of a bank account.
     * @deprecated Instead use getConfirmationStatus
     *
     * @return string
     */
    public function getConfirmation_status()
    {
        return $this->confirmation_status;
    }

    /**
     * Deprecated - Use external_customer_id instead.
     * 
     *
     * @param string $payer_id
     * 
     * @return $this
     */
    public function setPayerId($payer_id)
    {
        $this->payer_id = $payer_id;
        return $this;
    }

    /**
     * Deprecated - Use external_customer_id instead.
     *
     * @return string
     */
    public function getPayerId()
    {
        return $this->payer_id;
    }

    /**
     * Deprecated - Use external_customer_id instead.
     *
     * @deprecated Instead use setPayerId
     *
     * @param string $payer_id
     * @return $this
     */
    public function setPayer_id($payer_id)
    {
        $this->payer_id = $payer_id;
        return $this;
    }

    /**
     * Deprecated - Use external_customer_id instead.
     * @deprecated Instead use getPayerId
     *
     * @return string
     */
    public function getPayer_id()
    {
        return $this->payer_id;
    }

    /**
     * A unique identifier of the customer to whom this bank account belongs to. Generated and provided by the facilitator. This is required when creating or using a stored funding instrument in vault.
     * 
     *
     * @param string $external_customer_id
     * 
     * @return $this
     */
    public function setExternalCustomerId($external_customer_id)
    {
        $this->external_customer_id = $external_customer_id;
        return $this;
    }

    /**
     * A unique identifier of the customer to whom this bank account belongs to. Generated and provided by the facilitator. This is required when creating or using a stored funding instrument in vault.
     *
     * @return string
     */
    public function getExternalCustomerId()
    {
        return $this->external_customer_id;
    }

    /**
     * A unique identifier of the customer to whom this bank account belongs to. Generated and provided by the facilitator. This is required when creating or using a stored funding instrument in vault.
     *
     * @deprecated Instead use setExternalCustomerId
     *
     * @param string $external_customer_id
     * @return $this
     */
    public function setExternal_customer_id($external_customer_id)
    {
        $this->external_customer_id = $external_customer_id;
        return $this;
    }

    /**
     * A unique identifier of the customer to whom this bank account belongs to. Generated and provided by the facilitator. This is required when creating or using a stored funding instrument in vault.
     * @deprecated Instead use getExternalCustomerId
     *
     * @return string
     */
    public function getExternal_customer_id()
    {
        return $this->external_customer_id;
    }

    /**
     * A unique identifier of the merchant for which this bank account has been stored for. Generated and provided by the facilitator so it can be used to restrict the usage of the bank account to the specific merchnt.
     * 
     *
     * @param string $merchant_id
     * 
     * @return $this
     */
    public function setMerchantId($merchant_id)
    {
        $this->merchant_id = $merchant_id;
        return $this;
    }

    /**
     * A unique identifier of the merchant for which this bank account has been stored for. Generated and provided by the facilitator so it can be used to restrict the usage of the bank account to the specific merchnt.
     *
     * @return string
     */
    public function getMerchantId()
    {
        return $this->merchant_id;
    }

    /**
     * A unique identifier of the merchant for which this bank account has been stored for. Generated and provided by the facilitator so it can be used to restrict the usage of the bank account to the specific merchnt.
     *
     * @deprecated Instead use setMerchantId
     *
     * @param string $merchant_id
     * @return $this
     */
    public function setMerchant_id($merchant_id)
    {
        $this->merchant_id = $merchant_id;
        return $this;
    }

    /**
     * A unique identifier of the merchant for which this bank account has been stored for. Generated and provided by the facilitator so it can be used to restrict the usage of the bank account to the specific merchnt.
     * @deprecated Instead use getMerchantId
     *
     * @return string
     */
    public function getMerchant_id()
    {
        return $this->merchant_id;
    }

    /**
     * Time the resource was created.
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
     * Time the resource was created.
     *
     * @return string
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * Time the resource was created.
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
     * Time the resource was created.
     * @deprecated Instead use getCreateTime
     *
     * @return string
     */
    public function getCreate_time()
    {
        return $this->create_time;
    }

    /**
     * Time the resource was last updated.
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
     * Time the resource was last updated.
     *
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    /**
     * Time the resource was last updated.
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
     * Time the resource was last updated.
     * @deprecated Instead use getUpdateTime
     *
     * @return string
     */
    public function getUpdate_time()
    {
        return $this->update_time;
    }

    /**
     * Date/Time until this resource can be used to fund a payment.
     * 
     *
     * @param string $valid_until
     * 
     * @return $this
     */
    public function setValidUntil($valid_until)
    {
        $this->valid_until = $valid_until;
        return $this;
    }

    /**
     * Date/Time until this resource can be used to fund a payment.
     *
     * @return string
     */
    public function getValidUntil()
    {
        return $this->valid_until;
    }

    /**
     * Date/Time until this resource can be used to fund a payment.
     *
     * @deprecated Instead use setValidUntil
     *
     * @param string $valid_until
     * @return $this
     */
    public function setValid_until($valid_until)
    {
        $this->valid_until = $valid_until;
        return $this;
    }

    /**
     * Date/Time until this resource can be used to fund a payment.
     * @deprecated Instead use getValidUntil
     *
     * @return string
     */
    public function getValid_until()
    {
        return $this->valid_until;
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
     * Creates a new Bank Account Resource.
     *
     * @param \PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @return BankAccount
     */
    public function create($apiContext = null)
    {

        $payLoad = $this->toJSON();
        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }
        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/vault/bank-accounts", "POST", $payLoad);
        $this->fromJson($json);
        return $this;
    }

    /**
     * Obtain the Bank Account resource for the given identifier.
     *
     * @param string $bankAccountId
     * @param \PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @return BankAccount
     */
    public static function get($bankAccountId, $apiContext = null)
    {
        ArgumentValidator::validate($bankAccountId, 'bankAccountId');

        $payLoad = "";
        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }
        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/vault/bank-accounts/$bankAccountId", "GET", $payLoad);
        $ret = new BankAccount();
        $ret->fromJson($json);
        return $ret;
    }

    /**
     * Delete the bank account resource for the given identifier.
     *
     * @param \PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @return bool
     */
    public function delete($apiContext = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");

        $payLoad = "";
        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }
        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/vault/bank-accounts/{$this->getId()}", "DELETE", $payLoad);
        return true;
    }

    /**
     * Update information in a previously saved bank account. Only the modified fields need to be passed in the request.
     *
     * @param \PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @return BankAccount
     */
    public function update($apiContext = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");

        $payLoad = "";
        if ($apiContext == null) {
            $apiContext = new ApiContext(self::$credential);
        }
        $call = new PPRestCall($apiContext);
        $json = $call->execute(array('PayPal\Rest\RestHandler'), "/v1/vault/bank-accounts/{$this->getId()}", "PATCH", $payLoad);
        $this->fromJson($json);
        return $this;
    }

}
