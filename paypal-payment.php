<?php
require 'config/paypal-config.php';

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

$price = floatval($_GET['price']);
$booking_id = intval($_GET['booking_id']);

$payer = new Payer();
$payer->setPaymentMethod('paypal');

// Item info
$item = new Item();
$item->setName("Car Booking ID #$booking_id")
    ->setCurrency('USD')
    ->setQuantity(1)
    ->setPrice($price);

$itemList = new ItemList();
$itemList->setItems([$item]);

$amount = new Amount();
$amount->setCurrency('USD')
    ->setTotal($price);

$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription("Car booking payment")
    ->setInvoiceNumber(uniqid()); // Unique transaction ID

$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl("http://localhost/car-rent/success.php?method=paypal&booking_id=$booking_id&price=$price")
             ->setCancelUrl("http://localhost/car-rent/cancel.php");

$payment = new Payment();
$payment->setIntent('sale')
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions([$transaction]);

try {
    $payment->create($paypal);
    header("Location: " . $payment->getApprovalLink());
    exit;
} catch (Exception $ex) {
    echo "PayPal Error: " . $ex->getMessage();
}
