PayPal PHP SDK release notes
============================
v0.15.1
----
* Enabled Deleting Billing Plans
* Updated Samples

v0.15.0
----
* Extended Invoicing Capabilities
* Allows QR Code Generation for Invoices
* Updated Formatter to work with multiple locales
* Removed Future Payments mandate on Correlation Id

v0.14.2
----
* Quick Patch to Unset Cipher List for NSS

v0.14.1
----
* Updated HttpConfig to use TLSv1 as Cipher List
* Added resetRequestId in ApiContext to enable multiple create calls in succession
* Sanitize Input for Price Variables
* Made samples look better and work best

v0.14.0
----
* Enabled Billing Plans and Agreements APIs
* Renamed SDK name to PayPal-PHP-SDK

v0.13.2
----
* Updated Future Payments and LIPP Support
* Updated Logging Syntax

v0.13.1
----
* Enabled TLS version 1.x for SSL Negotiation
* Updated Identity Support from SDK Core
* Fixed Backward Compatibility changes

v0.13.0
----
* Enabled Payment Experience

v0.12.0
----
* Enabled EC Parameters Support for Payment APIs
* Enabled Validation for Missing Accessors

v0.11.1
----
* Removed Dependency from SDK Core Project
* Enabled Future Payments

v0.11.0
----
* Ability for PUT and PATCH requests
* Invoice number, custom and soft descriptor
* Order API and tests, more Authorization tests
* remove references to sdk-packages
* patch for retrieving paid invoices
* Shipping address docs patch
* Remove @array annotation
* Validate return cancel url
* type hinting, comment cleaning, and getters and setters for Shipping

v0.8.0
-----
* Invoicing API support added

v0.7.1
-----
* Added support for Reauthorization

v0.7.0
-----
* Added support for Auth and Capture APIs
* Types modified to match the API Spec
* Updated SDK to use namespace supported core library

v0.6.0
-----
* Adding support for dynamic configuration of SDK (Upgrading sdk-core-php dependency to V1.4.0)
* Deprecating the setCredential method and changing resource class methods to take an ApiContext argument instead of a OauthTokenCredential argument.

v0.5.0
-----
* Initial Release
