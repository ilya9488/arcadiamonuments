<?php
$gifts = [];

$gifts_arr = get_field('gifts', 'option');

if(!empty($gifts_arr)){
  usort($gifts_arr, function($a, $b) {
    return $a['gift_order'] - $b['gift_order'];
  });

  foreach($gifts_arr as $gift){
    $gifts[$gift['gift_id']] = $gift;
  }
}