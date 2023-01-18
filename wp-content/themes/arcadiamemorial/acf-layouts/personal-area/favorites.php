<?php
include get_template_directory() . '/controllers/parts/pagination.php';

$user_id = get_current_user_id();
$user_favorites = !empty($favorites = get_user_meta( $user_id, 'favorites' )) ? $favorites[0] : false;



$items_per_page = 5;
$current_page = !empty($_GET['current-page']) ? $_GET['current-page'] : 1;

$pagination = new CustomPagination();
$paginate_pages = $pagination->paginate_pages($user_favorites, $items_per_page);
$paginate_items = $pagination->paginate_items($user_favorites, $items_per_page);
?>
<section id="favorites" class="personal-area favorites">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12">
        <div class="row">

          <div class="menu-wrap col-xl-3 col-lg-3 col-md-4 pl-0 ">
            <ul id="menu-personal-area" class="menu"><?php include get_template_directory() . '/acf-layouts/personal-area/tab_menu.php'; ?></ul>
          </div>

          <div class="col-xl-9 col-lg-9 col-md-8 px-xl-0 pl-lg-0">

            <div class="title col-12 pl-0">
              <h2>Favorites</h2>
            </div>
            <div class="pagination-content row">

              <?php if ($paginate_items) {
              if($paginate_items[$current_page]){ ?>
                <?php foreach($paginate_items[$current_page] as $post){ ?>
<!--                  --><?php //$post_id = $post[0]; ?>
                  <?php $post_id = $post; ?>

                  <a href="<?= get_post_permalink($post_id) ?>" class="block col-11">
                      <div class="row">
                      <div class="col-auto pr-0">
                        <div class="img-wrap">
                          <?= wp_get_attachment_image(get_field('photo', $post_id), 'memorial-photo'); ?>
                        </div>
                      </div>
                      <div class="col text">
                        <div class="text-wrap">
                          <h4><?= get_field('first_name', $post_id) . ' ' . get_field('last_name', $post_id) ?></h4>
                          <p class="date"><?= get_field('date_1', $post_id); ?> — <?= get_field('date_2', $post_id); ?></p>
                         <?php if ( get_field('town', $post_id) ) :?>
                            <p class="city"><?= get_field('town', $post_id); ?></p>
                         <?php endif;?>
                          <p class="info"><?= mb_strimwidth(get_field('biography', $post_id), 0, 120, "...") ?></p>
                        </div>

                        <svg class="star js-delete-favorites" onclick="deleteFavorites(<?= $post_id;?>, <?= $user_id ?>, event, this)"> width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <g clip-path="url(#clip0)">
                            <path d="M19.9477 7.67123C19.816 7.26626 19.4568 6.97954 19.0335 6.94124L13.2601 6.41709L10.9784 1.07521C10.81 0.682743 10.4267 0.429443 10 0.429443C9.57338 0.429443 9.18992 0.682743 9.02253 1.07521L6.74085 6.41709L0.96652 6.94124C0.543234 6.9803 0.184799 7.26702 0.0523506 7.67123C-0.0793349 8.07621 0.0422796 8.5204 0.362414 8.80117L4.72665 12.628L3.43986 18.2955C3.34571 18.7122 3.50746 19.1431 3.85323 19.3931C4.03908 19.5281 4.25744 19.5956 4.47656 19.5956C4.66485 19.5956 4.8533 19.5455 5.02161 19.4448L10 16.4681L14.9775 19.4448C15.3427 19.663 15.8018 19.643 16.1468 19.3931C16.4926 19.1431 16.6543 18.7122 16.5602 18.2955L15.2734 12.628L19.6376 8.80117C19.9576 8.5204 20.0794 8.07712 19.9477 7.67123Z"/>
                          </g>
                          <defs><clipPath id="clip0"> <rect width="20" height="20" fill="white"/> </clipPath></defs>
                        </svg>
                          <script type="text/javascript">
                              function deleteFavorites(postId, userId, event, el)
                              {
                                  console.log(el);
                                  event.preventDefault();
                                  jQuery.ajax({
                                      method: "POST",
                                      cache: false,
                                      url: "<?php bloginfo('url');?>/wp-admin/admin-ajax.php",
                                      data: {
                                          postid: postId,
                                          userid : userId,
                                          postkey: 'favorites',
                                          action: 'delete_favorites'
                                      }
                                  })
                                      .done(function(result) {
                                          el.closest('.block').remove();
                                      });
                              }
                          </script>

                      </div>
                    </div>
                  </a>
                <?php } ?>
              <?php }
              }?>
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