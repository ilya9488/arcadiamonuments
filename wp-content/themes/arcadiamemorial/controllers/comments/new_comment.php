<?php
if (!empty($_POST['post_id'])) {
  require_once('../../../../../wp-load.php');

  $post_id = (int)$_POST['post_id'];
  $user_id = (int)$_POST['user_id'];
  $comment_parent = (int)$_POST['comment_parent'];
  $comment_parent_user_id = (int)$_POST['comment_parent_user_id'];

  $comment_data = [
    'comment_post_ID'  => $post_id,
    'user_id'          => $user_id,
    'comment_parent'   => $comment_parent,
    'comment_content'  => wp_slash($_POST['message']),
    'comment_approved' => 0,
  ];

  if(!empty($_FILES['files'])) {
    $files = [];
    $diff = count($_FILES['files']) - count($_FILES['files'], COUNT_RECURSIVE);

    if ($diff == 0) {
      $files = [$_FILES['files']];
    } else {
      foreach ($_FILES['files'] as $k => $l) {
        foreach ($l as $i => $v) {
          $files[$i][$k] = $v;
        }
      }
    }

    foreach ($files as $file) {
      $photo = wp_upload_bits($file['name'], null, @file_get_contents($file['tmp_name']));

      if (!$photo['error']) {
        $image = wp_get_image_editor($photo['file']);

        $image->resize(750, 750);
        $image->save($photo['file']);
      }

      $comment_data['comment_meta']['photos'][] = $photo['url'];
    }
  }

  $comment_id = wp_insert_comment($comment_data);

  if($comment_id){
    if($comment_parent_user_id){
      $new_responses = get_user_meta( $comment_parent_user_id, 'new_responses' );
      $new_responses = !empty($new_responses[0]) ? $new_responses[0] : [];

      array_unshift($new_responses, $comment_id);

      update_user_meta( $comment_parent_user_id, 'new_responses', $new_responses );
    }

    echo $comment_id;
  }else{
    echo 'Error';
  }
}


