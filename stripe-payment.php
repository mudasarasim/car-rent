<?php
require 'vendor/autoload.php'; // Stripe SDK

\Stripe\Stripe::setApiKey('sk_test_51RyUXL2c9q4ewL2PpttSLvFJm8b9JNC8hGmtcZeEykc9YpgPHEzmWxECC6bwUHoAQix3kEosVNOsy29aZubhXmHc00DbwjsQnC');

$price = floatval($_GET['price']);
$booking_id = intval($_GET['booking_id']);

$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'aed',
            'product_data' => ['name' => 'Car Booking ID #' . $booking_id],
            'unit_amount' => $price * 100, // amount in cents
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => "https://almarsaa.com/success.php?booking_id=$booking_id&price=$price&method=stripe",
    'cancel_url' => "https://almarsaa.com/cancel.php",
]);

header("Location: " . $session->url);
exit;
?>
