<?php
require '../vendor/autoload.php';
require 'init.php';

\Stripe\Stripe::setApiKey($stripe_key);

function print_log($val) {
  return file_put_contents('php://stderr', print_r($val, TRUE));
}

$payload = @file_get_contents('php://input');
$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
$event = null;

try {
  $event = \Stripe\Webhook::constructEvent(
    $payload, $sig_header, $stripe_endpoint_secret
  );
} catch(\UnexpectedValueException $e) {
  // Invalid payload
  http_response_code(400);
  exit();
} catch(\Stripe\Exception\SignatureVerificationException $e) {
  // Invalid signature
  http_response_code(400);
  exit();
}

if ($event->type == 'payment_intent.succeeded') {
  require_once('../../../../wp-config.php');
  $wp->init();
  $wp->parse_request();
  $wp->query_posts();
  $wp->register_globals();
  //$wp->send_headers();

  $post_id = $event->data->object->metadata->memorial_id;
  $gift_id = $event->data->object->metadata->gift_id;
  $user_id = $event->data->object->metadata->user_id;

  $new_gift = [
    'gift_id' => $gift_id,
    'user_id' => $user_id,
    'post_id' => $post_id,
    'date_added' => strtotime(date('d-m-Y H:i')),
  ];

  $post_gifts = get_post_meta( $post_id, 'gifts' );
  $user_gifts = get_user_meta( $user_id, 'gifts' );

  $post_gifts = !empty($post_gifts) ? $post_gifts[0] : [];
  $user_gifts = !empty($user_gifts) ? $user_gifts[0] : [];

  array_unshift($post_gifts, $new_gift);
  array_unshift($user_gifts, $new_gift);

  update_post_meta( $post_id, 'gifts', $post_gifts );
  update_user_meta( $user_id, 'gifts', $user_gifts );
}

http_response_code(200);