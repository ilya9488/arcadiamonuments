<?php
class CommentsData {
  public $comments_tree;

  function get_comments_tree($args){
    $comments = get_comments($args);
    $sort_arr = [];

    if(!empty($comments)) {
      foreach ($comments as $comment) {
        $this->get_comment($comment);
      }

      $arr = $this->comments_tree;

      foreach ($arr as $key => $comm) {
        if ($comm['parent'] == 0) {
          $sort_arr[] = $comm;
        } else {
          $sort_arr['childs'][$comm['parent']][] = $comm;
        }
      }
    }
    return $sort_arr;
  }

  function get_comment($comment){
    $author       = get_user_meta($comment->user_id);
    $author_name  = !empty($author['first_name'][0]) ? $author['first_name'][0] . ' ' . $author['last_name'][0] : $author['nickname'][0];

    $data = [
      'comment_id'      => $comment->comment_ID,
      'parent'          => $comment->comment_parent,
      'author_id'       => $comment->user_id,
      'author_name'     => $author_name,
      'author_logo'     => [
        'photo' => get_user_option('user_photo', $comment->user_id),
        'letter' => mb_strtoupper(mb_substr($author_name, 0, 1)),
      ],
      'comment_content' => $comment->comment_content,
      'comment_photos'  => get_comment_meta($comment->comment_ID, 'photos'),
      'comment_date'    => date('F j, Y \a\t g:i a', strtotime($comment->comment_date)),
    ];

    $this->comments_tree[] = $data;
  }

  function get_plain_child_comments($comments){
    $child_comments = [];

    if(!empty($comments['childs'])){
      foreach($comments['childs'] as $child_blocks){
        foreach($child_blocks as $child){
          $child_comments[] = $child;
        }
      }
    }

    return $child_comments;
  }
}


