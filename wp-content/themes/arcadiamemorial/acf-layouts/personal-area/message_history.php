<?php
include get_template_directory() . '/controllers/comments/comments_data.php';
include get_template_directory() . '/controllers/comments/responses.php';
include get_template_directory() . '/controllers/parts/pagination.php';

$user_id = get_current_user_id();

$args_comments = [
  'user_id' => $user_id,
  'status' => 'approve',
  'hierarchical' => false,
  'order' => 'DESC',
];

$comments = new CommentsData();
$comment_tree = $comments->get_comments_tree($args_comments);
$child_comments = $comments->get_plain_child_comments($comment_tree);

$items_per_page = 7;
$current_page = !empty($_GET['current-page']) ? $_GET['current-page'] : 1;

$pagination = new CustomPagination();
$paginate_pages = $pagination->paginate_pages($child_comments, $items_per_page);
$paginate_items = $pagination->paginate_items($child_comments, $items_per_page);

$responses = new Responses();
$new_responses = $responses->getNewResponses($user_id, 'update');
?>

<section class="personal-area message-history">
  <div class="container-fluid">
    <div class="row">
      <div class="float-left col-xl-10 col-lg-12 col-md-12 col-sm-12">
        <div class="row">

          <div class="menu-wrap col-xl-3 col-lg-3 col-md-4 pl-0 ">
            <ul id="menu-personal-area" class="menu">
              <?php include get_template_directory() . '/acf-layouts/personal-area/tab_menu.php'; ?>
            </ul>
          </div>

          <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12 px-xl-0 pl-lg-0">
            <div class="title col-12 pl-0">
              <h2>Message History</h2>
            </div>

            <div class="pagination-content row">
              <?php if($paginate_items[$current_page]){ ?>
                <?php foreach($paginate_items[$current_page] as $comment){ ?>
                  <div class="block col-12">
                    <div class="text-wrap<?= isset($new_responses['approved'][$comment['comment_id']]) ? ' new-comment' : ''; ?>">
                      <h5 class="title"><?= $comment['author_name']; ?></h5>
                      <span class="date"><?= $comment['comment_date']; ?></span>
                      <p class="text"><?= $comment['comment_content']; ?></p>
                      <a class="link-goto" href="<?php comment_link($comment['comment_id']); ?>" target="_blank">Go To Comment</a>
                    </div>
                  </div>
                <?php } ?>
              <?php }else{ ?>
                <p>No Answers yet!</p>
              <?php } ?>
            </div>
          </div>

          <div class="col-xl-9 col-lg-9 col-md-8 px-xl-0 pl-lg-0 offset-xl-3 offset-lg-3 offset-md-4">
            <?php include get_template_directory() . '/template-parts/pagination.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>