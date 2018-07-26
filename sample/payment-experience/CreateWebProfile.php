<?php

require __DIR__ . '/../bootstrap.php';

// ### Create Web Profile
// Use the /web-profiles resource to create seamless payment experience profiles. See the payment experience overview for further information about using the /payment resource to create the PayPal payment and pass the experience_profile_id.
// Documentation available at https://developer.paypal.com/docs/api/#create-a-web-experience-profile

// Lets create an instance of FlowConfig and add
// landing page type information
$flowConfig = new \PayPal\Api\FlowConfig();
// Type of PayPal page to be displayed when a user lands on the PayPal site for checkout. Allowed values: Billing or Login. When set to Billing, the Non-PayPal account landing page is used. When set to Login, the PayPal account login landing page is used.
$flowConfig->setLandingPageType("Billing");
// The URL on the merchant site for transferring to after a bank transfer payment.
$flowConfig->setBankTxnPendingUrl("http://www.yeowza.com/");
// When set to "commit", the buyer is shown an amount, and the button text will read "Pay Now" on the checkout page.
$flowConfig->setUserAction("commit");
// Defines the HTTP method to use to redirect the user to a return URL. A valid value is `GET` or `POST`.
$flowConfig->setReturnUriHttpMethod("GET");

// Parameters for style and presentation.
$presentation = new \PayPal\Api\Presentation();

// A URL to logo image. Allowed vaues: .gif, .jpg, or .png.
$presentation->setLogoImage("http://www.yeowza.com/logo.png")
//	A label that overrides the business name in the PayPal account on the PayPal pages.
    ->setBrandName("YeowZa! Paypal")
//  Locale of pages displayed by PayPal payment experience.
    ->setLocaleCode("US")
// A label to use as hypertext for the return to merchant link.
    ->setReturnUrlLabel("Return")
// A label to use as the title for the note to seller field. Used only when `allow_note` is `1`.
    ->setNoteToSellerLabel("Thanks!");

// Parameters for input fields customization.
$inputFields = new \PayPal\Api\InputFields();
// Enables the buyer to enter a note to the merchant on the PayPal page during checkout.
$inputFields->setAllowNote(true)
    // Determines whether or not PayPal displays shipping address fields on the experience pages. Allowed values: 0, 1, or 2. When set to 0, PayPal displays the shipping address on the PayPal pages. When set to 1, PayPal does not display shipping address fields whatsoever. When set to 2, if you do not pass the shipping address, PayPal obtains it from the buyer’s account profile. For digital goods, this field is required, and you must set it to 1.
    ->setNoShipping(1)
    // Determines whether or not the PayPal pages should display the shipping address and not the shipping address on file with PayPal for this buyer. Displaying the PayPal street address on file does not allow the buyer to edit that address. Allowed values: 0 or 1. When set to 0, the PayPal pages should not display the shipping address. When set to 1, the PayPal pages should display the shipping address.
    ->setAddressOverride(0);

// #### Payment Web experience profile resource
$webProfile = new \PayPal\Api\WebProfile();

// Name of the web experience profile. Required. Must be unique
$webProfile->setName("YeowZa! T-Shirt Shop" . uniqid())
    // Parameters for flow configuration.
    ->setFlowConfig($flowConfig)
    // Parameters for style and presentation.
    ->setPresentation($presentation)
    // Parameters for input field customization.
    ->setInputFields($inputFields)
    // Indicates whether the profile persists for three hours or permanently. Set to `false` to persist the profile permanently. Set to `true` to persist the profile for three hours.
    ->setTemporary(true);

// For Sample Purposes Only.
$request = clone $webProfile;

try {
    // Use this call to create a profile.
    $createProfileResponse = $webProfile->create($apiContext);
} catch (\PayPal\Exception\PayPalConnectionException $ex) {
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
    ResultPrinter::printError("Created Web Profile", "Web Profile", null, $request, $ex);
    exit(1);
}

// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
 ResultPrinter::printResult("Created Web Profile", "Web Profile", $createProfileResponse->getId(), $request, $createProfileResponse);

return $createProfileResponse;
