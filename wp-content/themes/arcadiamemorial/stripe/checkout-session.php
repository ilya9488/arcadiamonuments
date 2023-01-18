<?php
require '../vendor/autoload.php';
require 'init.php';

\Stripe\Stripe::setApiKey($stripe_key);

header('Content-Type: application/json');

$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => [
    'card',
  ],
  'line_items' => [[
    'price_data' => [
      'currency' => 'usd',
      'unit_amount' => $_POST['gift_price']*100,
      'product_data' => [
        'name' => $_POST['gift_name'],
        'images' => [$_POST['gift_image']],
      ],
    ],
    'quantity' => 1,
  ]],
  'payment_intent_data' => [
    'metadata' => [
      'memorial_id' => $_POST['memorial_id'],
      'gift_id' => $_POST['gift_id'],
      'user_id' => $_POST['user_id'],
    ],
  ],
  'mode' => 'payment',
  'success_url' => $_POST['response_url'] . '?gift_payed=1',
  'cancel_url' => $_POST['response_url'] . '?gift_payed=2',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);
