<?php
if(!empty($_POST['user_id'])){
  require_once('../../../../../wp-config.php');
  $wp->init();
  $wp->parse_request();
  $wp->query_posts();
  $wp->register_globals();

  $user_id = (int)$_POST['user_id'];

  $new_user_data = [
    'first_name'   => preg_replace('/[^A-Za-z]/', '', $_POST['first_name']),
    'last_name' => preg_replace('/[^A-Za-z]/', '', $_POST['last_name']),
    'birthday'  => preg_replace('/[^0-9\/]/', '', $_POST['birthday']),
  ];

  if(!empty($_FILES['user_photo'])){
    $user_photo = wp_upload_bits($_FILES['user_photo']['name'], null, @file_get_contents($_FILES['user_photo']['tmp_name']));

    $image = wp_get_image_editor( $user_photo['file'] );

    if ( ! is_wp_error( $image ) ) {
      $image->resize( 750, 750 );
      $image->save( $user_photo['file'] );

      update_user_meta($user_id, 'user_photo', $user_photo['url']);

      $new_user_data['user_photo'] = $user_photo['url'];
    }
  }

  $new_user_data['ID'] = $user_id;

  foreach($new_user_data as $key => $value) {
    update_user_meta( $user_id, $key, $value );
  }

  if(is_email($_POST['email'])){
    wp_update_user([
      'ID' => $user_id,
      'user_email' => $_POST['email'],
    ]);
  }

  wp_redirect(get_site_url() . '/dashboard/personal-data/');
}