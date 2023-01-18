<?php
include get_template_directory() . '/controllers/parts/gifts.php';

$post_id = get_the_ID();
$user_id = get_current_user_id();

// 1 - success / 2 - fail payment
$gift_payed = isset($_GET['gift_payed']) ? $_GET['gift_payed'] : 0;

if (isset(get_post_meta( $post_id, 'gifts' )[0])){
$post_gifts = get_post_meta( $post_id, 'gifts' )[0];
}

$gifts_quantity = (int)get_field('active_gifts_quantity', 'option');
$gifts_lifetime = (int)get_field('gifts_lifetime', 'option');
$gifts_life_end = strtotime(date('d-m-Y H:i')) - $gifts_lifetime * 60;
$active_gifts = [];
$first_gift = [];
$other_gifts = [];


if(!empty($post_gifts)){
  $k = 1;
  foreach ($post_gifts as $key => $post_gift){
    if($k > $gifts_quantity){
      break;
    }elseif(empty($post_gift)
      || ($post_gift['date_added'] < $gifts_life_end)){
      continue;
    }else{
      $active_gifts[] = $post_gift;
      ++$k;
    }
  }
}

if($active_gifts && $gifts){
  $first_gift = [];

  foreach($active_gifts as $post_gift){
    if(!empty($gifts[$post_gift['gift_id']]['gift_image'])){
      if(!$first_gift){
        $first_gift = $gifts[$post_gift['gift_id']];
      }

      $other_gifts[] = [
        'gift_image' => $gifts[$post_gift['gift_id']]['gift_image'],
        'gift_name' => $gifts[$post_gift['gift_id']]['gift_name'],
        'user_name' => $post_gift['user_id'] ? get_user_by( 'id', $post_gift['user_id'])->display_name : 'Unnamed',
      ];
    }
  }
}

$memorial_photo = wp_get_attachment_image_src(get_field('photo'), 'memorial-photo')[0];
$memorial_thumb = wp_get_attachment_image_src(get_field('photo'), 'thumbnail')[0];

$user_favorites = ($favorites = get_user_meta( $user_id, 'favorites' )) ? $favorites[0] : [];

$is_favorite = in_array($post_id, $user_favorites);
