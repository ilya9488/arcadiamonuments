<?php
if (!empty($_POST['user_id'])) {
  require_once('../../../../../wp-load.php');

  include get_template_directory() . '/controllers/comments/responses.php';

  $responses = new Responses();
  $new_responses = $responses->getNewResponses($_POST['user_id'], 'check');

  echo $new_responses['count'];
}
