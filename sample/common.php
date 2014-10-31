<?php

/*
	Common functions used across samples
*/

use PayPal\Api\Address;
use PayPal\Api\CreditCard;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\Transaction;
use PayPal\Api\FundingInstrument;

/**
 * Helper Class for Printing Results
 *
 * Class ResultPrinter
 */
class ResultPrinter {

    private static $printResultCounter = 0;

    public static function printResult($title, $objectName, $objectId = null, $request = null, $response = null)
    {
        if (self::$printResultCounter == 0) {
            include "header.html";
            echo '<br />
                  <div class="row"><div class="col-md-2 pull-left"><a href="../index.html"><h4>&#10094;&#10094; Back to Samples</h4></a><br /><br /></div>
                  <div class="col-md-1 pull-right"><img  src="../images/pp_v_rgb.png" height="70" /></div> </div><div class="clearfix visible-xs-block"></div>';
            echo '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
        }
        self::$printResultCounter++;
        echo '
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-'.self::$printResultCounter.'">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#step-'. self::$printResultCounter .'" aria-expanded="false" aria-controls="step-'.self::$printResultCounter.'">
            '. self::$printResultCounter .'. '. $title .'</a>
                </h4>
            </div>
            <div id="step-'.self::$printResultCounter.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-'. self::$printResultCounter . '">
                <div class="panel-body">
            ';

        if ($objectId) {
            echo '<div>' . ($objectName ? $objectName : "Object") . " with ID: $objectId </div>";
        }

        echo '<div class="row hidden-xs hidden-sm hidden-md"><div class="col-md-6"><h4>Request Object</h4>';
        self::printObject($request);
        echo '</div><div class="col-md-6"><h4>Response Object</h4>';
        self::printObject($response);
        echo '</div></div>';

        echo '<div class="hidden-lg"><ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" ><a href="#step-'.self::$printResultCounter .'-request" role="tab" data-toggle="tab">Request</a></li>
                        <li role="presentation" class="active"><a href="#step-'.self::$printResultCounter .'-response" role="tab" data-toggle="tab">Response</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane" id="step-'.self::$printResultCounter .'-request"><h4>Request Object</h4>';
        self::printObject($request) ;
        echo '</div><div role="tabpanel" class="tab-pane active" id="step-'.self::$printResultCounter .'-response"><h4>Response Object</h4>';
        self::printObject($response);
        echo '</div></div></div></div>
            </div>
        </div>';

        flush();
    }

    protected static function printObject($object)
    {
        if ($object) {
            if (is_a($object, 'PayPal\Common\PPModel')) {
                /** @var $object \PayPal\Common\PPModel */
                echo '<pre class="prettyprint">' . $object->toJSON(128) . "</pre>";
            } elseif (is_string($object)) {
                echo "<pre>$object</pre>";
            } else {
                echo "<pre>";
                print_r($object);
                echo "</pre>";
            }
        } else {
            echo "<span>No Data</span>";
        }
    }
}

/**
 * ### getBaseUrl function
 * // utility function that returns base url for
 * // determining return/cancel urls
 *
 * @return string
 */
function getBaseUrl()
{

    $protocol = 'http';
    if ($_SERVER['SERVER_PORT'] == 443 || (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on')) {
        $protocol .= 's';
        $protocol_port = $_SERVER['SERVER_PORT'];
    } else {
        $protocol_port = 80;
    }

    $host = $_SERVER['HTTP_HOST'];
    $port = $_SERVER['SERVER_PORT'];
    $request = $_SERVER['PHP_SELF'];
    return dirname($protocol . '://' . $host . ($port == $protocol_port ? '' : ':' . $port) . $request);
}

/**
 * Creates a new mock 'payment authorization'
 *
 * @param PayPal\Api\ApiContext apiContext
 * @return PayPal\Api\Authorization
 */
function createAuthorization($apiContext)
{
    $addr = new Address();
    $addr->setLine1("3909 Witmer Road")
        ->setLine2("Niagara Falls")
        ->setCity("Niagara Falls")
        ->setState("NY")
        ->setPostalCode("14305")
        ->setCountryCode("US")
        ->setPhone("716-298-1822");

    $card = new CreditCard();
    $card->setType("visa")
        ->setNumber("4417119669820331")
        ->setExpireMonth("11")
        ->setExpireYear("2019")
        ->setCvv2("012")
        ->setFirstName("Joe")
        ->setLastName("Shopper")
        ->setBillingAddress($addr);

    $fi = new FundingInstrument();
    $fi->setCreditCard($card);

    $payer = new Payer();
    $payer->setPaymentMethod("credit_card")
        ->setFundingInstruments(array($fi));

    $amount = new Amount();
    $amount->setCurrency("USD")
        ->setTotal("1.00");

    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setDescription("Payment description.");

    $payment = new Payment();

// Setting intent to authorize creates a payment
// authorization. Setting it to sale creates actual payment
    $payment->setIntent("authorize")
        ->setPayer($payer)
        ->setTransactions(array($transaction));

    $paymnt = $payment->create($apiContext);
    $resArray = $paymnt->toArray();

    return $authId = $resArray['transactions'][0]['related_resources'][0]['authorization']['id'];
}
