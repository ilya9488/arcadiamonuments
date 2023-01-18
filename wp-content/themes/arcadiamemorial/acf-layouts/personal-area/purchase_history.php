<?php
include get_template_directory() . '/controllers/parts/gifts.php';
include get_template_directory() . '/controllers/parts/pagination.php';

$user_id = get_current_user_id();
$user_gifts = get_user_meta( $user_id, 'gifts' );

$items_per_page = 10;
$current_page = !empty($_GET['current-page']) ? $_GET['current-page'] : 1;

$pagination = new CustomPagination();
$paginate_pages = $pagination->paginate_pages($user_gifts[0], $items_per_page);
$paginate_items = $pagination->paginate_items($user_gifts[0], $items_per_page);
?>

<section class="personal-area purchase-history">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12">
        <div class="row">

          <div class="menu-wrap col-xl-3 col-lg-3 col-md-4 pl-0 ">
            <ul id="menu-personal-area" class="menu"><?php include get_template_directory() . '/acf-layouts/personal-area/tab_menu.php'; ?></ul>
          </div>

          <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12 px-xl-0 pl-lg-0">
            <div class="title col-12 pl-0">
              <h2>Purchase History</h2>
            </div>

            <div class="pagination-content row">
              <?php
                if(!empty($paginate_items[$current_page])){
                  foreach($paginate_items[$current_page] as $user_gift){ ?>
                    <div class="block col-auto">
                      <div class="img-wrap">
                        <div class="img">
                          <img src="<?= get_template_directory_uri() . '/static/img/memorial/icons/' . $gifts[$user_gift['gift_id']]['gift_image'] ?>" alt="#">
                        </div>

                        <span class="price">$ <?= $gifts[$user_gift['gift_id']]['gift_price'] ?></span>
                      </div>
                      <div class="text">
                        <h4 class="name"><?= get_the_title($user_gift['post_id']) ?></h4>
                        <span class="date"><?= date('F d, Y \a\t H:i', $user_gift['date_added']) ?></span>
                      </div>
                    </div>
                  <?php } ?>
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