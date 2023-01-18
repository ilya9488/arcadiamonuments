<?php
class Responses{
  function getNewResponses($user_id, $type){
    $new_responses = get_user_meta( $user_id, 'new_responses' );

    $count = 0;
    $approved = [];
    $unapproved = [];

    if(!empty($new_responses[0])){
      foreach($new_responses[0] as $response){
        $status = wp_get_comment_status($response);

        if($status == 'approved'){
          $approved[$response] = 1;
          ++$count;
        }elseif($status == 'unapproved'){
          $unapproved[] = $response;
        }
      }
    }

    if($type == 'update'){
      update_user_meta( $user_id, 'new_responses', $unapproved );
    }

    return [
      'count' => $count,
      'approved' => $approved,
      'unapproved' => $unapproved,
    ];
  }
}
