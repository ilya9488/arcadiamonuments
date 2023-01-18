<?php
if(!empty($_POST['user_id'])){
  require_once('../../../../../wp-config.php');
  $wp->init();
  $wp->parse_request();
  $wp->query_posts();
  $wp->register_globals();

  $user_id = (int)$_POST['user_id'];
  $memorial_id = (int)$_POST['memorial_id'];

  $user_favorites = !empty($favorites = get_user_meta( $user_id, 'favorites' )) ? $favorites[0] : [];

  //$user_favorites = [];

  if(!in_array($memorial_id, $user_favorites)){
    array_unshift($user_favorites, $memorial_id);

    update_user_meta( $user_id, 'favorites', $user_favorites );

    echo 'ok';
  }
}
