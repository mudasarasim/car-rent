<?php
$payment_type = $_POST['payment_type'];
$price = floatval($_POST['price']);
$booking_id = intval($_POST['booking_id']);

if ($payment_type === 'stripe') {
    // Redirect to stripe payment page
    header("Location: stripe-payment.php?price=$price&booking_id=$booking_id");
    exit;
} elseif ($payment_type === 'paypal') {
    // Redirect to paypal payment page
    header("Location: paypal-payment.php?price=$price&booking_id=$booking_id");
    exit;
} else {
    echo "Invalid payment method selected.";
}
?>
