<?php
include get_template_directory() . '/controllers/comments/comments_data.php';

$args_comments = [
  'post_id' => $post_id,
  'status' => 'approve',
  'hierarchical' => false,
  'order' => 'DESC',
];

$comments = new CommentsData();
$comment_tree = $comments->get_comments_tree($args_comments);

if(isset($comment_tree['childs'])){
  $child_comments = $comment_tree['childs'];

  unset($comment_tree['childs']);
}
?>
<div class="guestbook row justify-content-center">

<?php if(is_user_logged_in()){ ?>
  <div class="col-12">
    <form action="#" method="post" enctype="multipart/form-data" class="add-text comment_form">
      <h3>Write in the guestbook</h3>
      <input type="hidden" name='post_id' value="<?= $post_id; ?>">
      <input type="hidden" name='comment_parent' value="0">
      <input type="hidden" name='comment_parent_user_id' value="0">
      <input type="hidden" name='user_id' value="<?= get_current_user_id(); ?>">
      <textarea name="message" class="text-field" placeholder="Add your text here"></textarea>
      <div class="btn-wrap d-flex justify-content-between align-items-center">
        <label class="add-wrap">
          <span class="add-txt">Add Photo</span><span class="add-btn"><span class="icon icon-add-photo"></span></span>
          <input type="file" name="photos" class="photos" style="display: none" multiple>
          <input type="hidden" class="filename" name="filename" value="">
        </label>
        <button type="submit" class="btn-create publish">publish</button>
      </div>
    </form>
  </div>
<?php } ?>

<?php if(!empty($comments)){ ?>
  <div class="col-12">
    <?php foreach($comment_tree as $key => $comment){ ?>
      <div class="comments" id="comment-<?= $comment['comment_id']; ?>">
        <div class="guest d-flex align-items-center">
          <span class="thumbnail" <?= $comment['author_logo']['photo'] ? 'style="background-image: url(' . $comment['author_logo']['photo'] . ');"' : $comment['author_logo']['letter'] ?>></span>
          <span class="name"><?= $comment['author_name']; ?></span>
        </div>
        <p class="comments-text">
          <?= $comment['comment_content']; ?>
        </p>
        <div class="img-wrap d-flex flex-wrap">
          <?php if(!empty($comment['comment_photos'][0])){ ?>
            <?php foreach($comment['comment_photos'][0] as $comment_photo){ ?>
              <a data-caption="" data-fancybox="comment-img-<?= $key ?>" href="<?= $comment_photo; ?>">
                <img src="<?= $comment_photo; ?>" alt="#">
              </a>
            <?php } ?>
          <?php } ?>
        </div>
        <span class="data">
          <?= $comment['comment_date']; ?> |
        </span>
        <button class="reply toast-1">Reply</button>

        <div class="toast toast-1 toast-reply hide" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header justify-content-end">
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="toast-body p-0">
            <form action="#" method="post" enctype="multipart/form-data" class="add-text comment_form">
              <input type="hidden" name='post_id' value="<?= $post_id; ?>">
              <input type="hidden" name='comment_parent' value="<?= $comment['comment_id']; ?>">
              <input type="hidden" name='comment_parent_user_id' value="<?= $comment['author_id']; ?>">
              <input type="hidden" name='user_id' value="<?= get_current_user_id(); ?>">
              <textarea name="message" class="text-field" placeholder="Add your text here"></textarea>
              <div class="btn-wrap d-flex justify-content-between align-items-center">
                <label class="add-wrap">
                  <span class="add-txt">Add Photo</span><span class="add-btn"><span class="icon icon-add-photo"></span></span>
                  <input type="file" name="photos" class="photos" style="display: none" multiple>
                  <input type="hidden" class="filename" name="filename" value="">
                </label>
                <button type="submit" class="btn-create publish">publish</button>
              </div>
            </form>
          </div>
        </div>

        <?php if(!empty($child_comments[$comment['comment_id']])){ ?>
          <?php foreach($child_comments[$comment['comment_id']] as $key_child => $child_comment){ ?>
            <div class="comments" id="comment-<?= $child_comment['comment_id']; ?>">
              <div class="guest d-flex align-items-center">
                <span class="thumbnail" <?= $child_comment['author_logo']['photo'] ? 'style="background-image: url(' . $child_comment['author_logo']['photo'] . ');"' : $child_comment['author_logo']['letter'] ?>></span>
                <span class="name"><?= $child_comment['author_name']; ?></span>
              </div>
              <p class="comments-text">
                <?= $child_comment['comment_content']; ?>
              </p>
              <div class="img-wrap img-wrap-<?= $key . '-' . $key_child ?> d-flex flex-wrap">
                <?php if(!empty($child_comment['comment_photos'][0])){ ?>
                  <?php foreach($child_comment['comment_photos'][0] as $child_comment_photo){ ?>
                    <a data-caption="" data-fancybox="comment-child-img-<?= $key . '-' . $key_child ?>" href="<?= $child_comment_photo; ?>">
                      <img src="<?= $child_comment_photo; ?>" alt="#">
                    </a>
                  <?php } ?>
                <?php } ?>
              </div>
              <span class="data">
                <?= $child_comment['comment_date']; ?> |
              </span>
            </div>
          <?php } ?>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
<?php } ?>
</div>

<script>
    // Send Comment
    $('body').on('submit', 'form.comment_form', function(e){
        e.preventDefault();

        if (window.FormData === undefined){
            alert('Please renew your browser to send comments!')
        } else {
            var form = $(this);
            var formData = new FormData(form.get(0));

            $.each(form.find('.photos')[0].files, function (key, input) {
                formData.append('files[]', input);
            });

            $.ajax({
                type: 'POST',
                url: '<?= get_stylesheet_directory_uri(); ?>/controllers/comments/new_comment.php',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                dataType: 'json',
                success: function (message) {
                    if(message !== 'Error'){
                        form.trigger('reset');
                        form.html('Your comment will be published after moderation!')
                    }else{
                        alert('Comment data is incorrect!')
                    }
                },
                error: function () {
                    console.log('Error');
                },
            });
        }
    });
</script>
