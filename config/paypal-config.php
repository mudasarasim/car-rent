<?php
require __DIR__ . '/../vendor/autoload.php'; // Load Composer autoload

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

$paypal = new ApiContext(
    new OAuthTokenCredential(
        'AeeVLdp9j6Z7jaM04fg4mYInN1y-BoHtW14Iwaqw4OE1x4vw7Rygs1Yu3Hem4EMMICZ1s36M6KvpWK6m',     // 🔁 Replace with your client ID
        'EBq_Z4G5mU6a5PrX4T0-bB-kj3CptVafA-HI_f-I8tGG0PAb4Zvb3vSJ-kRPskenz996HCP6uuK0O8dF'  // 🔁 Replace with your client secret
    )
);

// Sandbox environment
$paypal->setConfig([
    'mode' => 'sandbox', // Change to 'live' for production
    'http.ConnectionTimeOut' => 30,
    'log.LogEnabled' => false,
]);
