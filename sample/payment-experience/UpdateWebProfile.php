<?php

// #### Update Web Profile
// Use this call to update an experience profile.
// Documentation available at https://developer.paypal.com/webapps/developer/docs/api/#update-a-web-experience-profile

// We will be re-using the sample code to get a web profile. GetWebProfile.php will
// create a new web profileId for sample, and return the web profile object.
/** @var \PayPal\Api\WebProfile $webProfile */
$webProfile = require 'GetWebProfile.php';


// Updated the logo image of presentation object in a given web profile.
$webProfile->getPresentation()->setLogoImage("http://www.google.com/favico.ico");

try {
    // Update the web profile to change the logo image.
    if ($webProfile->update($apiContext)) {
        // If the update is successfull, we can now get the object, and verify the web profile
        // object
        $updatedWebProfile = \PayPal\Api\WebProfile::get($webProfile->getId(), $apiContext);
    }
} catch (\Exception $ex) {
    echo "Exception: " . $ex->getMessage() . PHP_EOL;
    if (is_a($ex, '\PayPal\Exception\PPConnectionException')) {
        /** @var $ex \PayPal\Exception\PPConnectionException */
        var_dump($ex->getData());
    }
    exit(1);
}

print_result("Updated Web Profile", "Web Profile", $updatedWebProfile->getId(), $updatedWebProfile);
