<?php
  /**
   * The main template file
   *
   * This is the most generic template file in a WordPress theme
   * and one of the two required files for a theme (the other being style.css).
   * It is used to display a page when nothing more specific matches a query.
   * E.g., it puts together the home page when no home.php file exists.
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package arcadiamemorial
   */

  get_header();
  $type = get_field('type')['value'];

  include get_template_directory() . '/controllers/pages/single-memorial-controller.php';
  include get_template_directory() . '/controllers/parts/events.php';
?>
  <div id="page" class="site">
  <main id="primary" class="site-main">
    <section class="memorial-banner">
      <div class="container-fluid p-0 m-0">
        <div class="banner" style="background-image: url(<?php the_field('image_bg'); ?>);">

        </div>
      </div>
    </section>

    <section class="memorial-portrait">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-5 col-md-5 col-sm-6">
            <div class="portrait">
              <img src="<?= $memorial_photo; ?>" alt="">

              <?php if($first_gift){ ?>
                <img class="gift" src="<?= get_template_directory_uri(); ?>/static/img/memorial/icons/<?= $first_gift['gift_image']; ?>" alt="<?= $first_gift['gift_name']; ?>">
              <?php } ?>
            </div>
          </div>
          <div class="p-0 m-0 col-xl-6 col-lg-5 col-md-6 col-sm-6 d-flex align-items-end">
            <div class="name-data">
              <h2><?php the_field('first_name');
                  echo ' ';
                  the_field('last_name') ?></h2>
              <h3><?php the_field('date_1'); ?> — <?php the_field('date_2'); ?></h3>

              <button class="add <?= $is_favorite ? 'js-delete-favorites' : '' ?> " data-user="<?= $user_id ?>" data-post="<?= $post_id ?>">
                <span class="<?= $is_favorite ? 'favorite' : 'add-to-favorites' ?>"><?= $is_favorite ? 'In favorites' : 'Add to favorites'?></span>
                <svg  class="<?= $is_favorite ? 'favorite' : '' ?>" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M4.13349 15C3.98011 15 3.82779 14.9501 3.6978 14.852C3.45565 14.6688 3.34254 14.3541 3.40844 14.0503L4.3091 9.91037L1.25464 7.11522C1.03012 6.9107 0.944344 6.58679 1.03652 6.29043C1.12871 5.99461 1.3795 5.78518 1.67645 5.75654L5.71787 5.37367L7.3157 1.47181C7.43352 1.18513 7.70183 1 7.99995 1C8.29807 1 8.56639 1.18513 8.6842 1.47114L10.2821 5.37367L14.3228 5.75654C14.6204 5.78451 14.8712 5.99461 14.9634 6.29043C15.0555 6.58624 14.9703 6.9107 14.7458 7.11522L11.6913 9.90982L12.592 14.0497C12.658 14.3541 12.5448 14.6688 12.3027 14.8514C12.0612 15.034 11.7392 15.048 11.4848 14.8885L7.99995 12.7154L4.51504 14.8897C4.39722 14.9627 4.26594 15 4.13349 15Z"/>
                </svg>
              </button>
            </div>
          </div>
          <div class="col-12">
            <div class="img-wrapper d-flex justify-content-sm-start justify-content-md-start justify-content-lg-start justify-content-xl-start justify-content-center">
              <?php if($other_gifts){ ?>
                <?php foreach($other_gifts as $post_gift){ ?>
                  <div class="icon-price">
                    <img class="gift" src="<?= get_template_directory_uri(); ?>/static/img/memorial/icons/<?= $post_gift['gift_image']; ?>" alt="<?= $post_gift['gift_name']; ?>">
                    <span class="name-sender"><?= $post_gift['user_name']; ?></span>
                  </div>
                <?php } ?>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>
      <script>
          $('.add-to-favorites').on('click', function(e){
              e.preventDefault();

              var favorite_button = $(this);

              $.ajax({
                  url: '<?= site_url(); ?>/wp-content/themes/arcadiamemorial/controllers/user/add_favorite.php',
                  method: 'post',
                  data: 'user_id=<?= $user_id ?>&memorial_id=<?= $post_id ?>',
                  success: function(response) {
                      if(response === 'ok'){
                          favorite_button.closest('button.add').addClass('js-delete-favorites');
                          favorite_button.html('In favorites')
                          favorite_button.removeClass('add-to-favorites')
                          favorite_button.addClass('favorite');
                          favorite_button.next().addClass('favorite')
                      }
                  }
              });
          })
          $(document).on('click', '.js-delete-favorites', function (e) {
              e.preventDefault();
              console.log('click');
              var $this = $(this);
              var postId = $this.data('post');
              var userId = $this.data('user');
              $.ajax({
                  method: "POST",
                  cache: false,
                  url: "<?php bloginfo('url');?>/wp-admin/admin-ajax.php",
                  data: {
                      postid: postId,
                      userid: userId,
                      postkey: 'favorites',
                      action: 'delete_favorites'
                  }
              }) .done(function(result) {
                      $this.removeClass('js-delete-favorites');
                      $this.find('span.favorite').removeClass('favorite').addClass('add-to-favorites').html('Add to favorites');
                      $this.find('svg.favorite').removeClass('favorite');
              });;


          });
      </script>
    <section class="tabs">
      <div class="container px-0 pr-lg-3 pl-lg-2">
        <div class="row px-0 mx-0 pl-md-2 mr-md-0 pr-md-0 mr-md-0 pl-sm-4 pr-sm-2 mx-sm-0">
          <nav class="col px-0">
            <div class="nav" id="nav-tab" role="tablist">
              <a class="col profile nav-link active active-tab" id="nav-profile-tab" data-toggle="tab"
                 href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                <span>Profile</span>
              </a>
              <?php if ($type == 'basic') { ?>
                <?php if( get_field('photo_video_enabled') ){ ?>
                  <a class="col gallery nav-link" id="nav-gallery-tab" data-toggle="tab" href="#nav-gallery" role="tab"
                     aria-controls="nav-gallery" aria-selected="false">
                    <span>photo/video</span>
                  </a>
                <?php } ?>
                <?php if( get_field('family_tree_enabled') ){ ?>
                  <a class="col family nav-link" id="nav-family-tab" data-toggle="tab" href="#nav-family" role="tab"
                     aria-controls="nav-family" aria-selected="false">
                    <span>family Tree</span>
                  </a>
                <?php } ?>
              <?php } ?>
              <?php if( get_field('events_enabled') ){ ?>
                <a class="col event nav-link" focus="true" id="nav-event-tab" data-toggle="tab" href="#nav-event"
                   role="tab" aria-controls="nav-event" aria-selected="true">
                  <span>events</span>
                </a>
              <?php } ?>
              <div class="col share nav-link js-modal-share" id="nav-share-tab" data-toggle="modal" data-target="#shareModal">
                <span>share</span>
              </div>
            </div>
          </nav>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /.tabs -->

    <section class="biography-main-events tab-content" id="nav-tabContent">
      <div class="container tab-pane fade show active" id="nav-profile" role="tabpanel"
           aria-labelledby="nav-profile-tab">
        <div class="row pr-2">
          <div class="col-xl-8 col-lg-12 align-self-start order-2 order-xl-1">

            <?php if( get_field('biography_enabled') ){ ?>
              <div class="biography-wrapper">
                <h2><?php the_field('biography_title'); ?></h2>
                <?php the_field('biography'); ?>
              </div>
            <?php } ?>

            <?php if( get_field('about_enabled') ){ ?>
              <div class="about row">
                <div class="col-12">
                  <h2><?php the_field('about_title'); ?></h2>
                </div>
                <div class="list-l flex-fill bd-highlight">
                  <?php the_field('about_1'); ?>
                </div>
                <div class="list-r flex-fill bd-highlight">
                  <?php the_field('about_2'); ?>
                </div>
              </div>
            <?php } ?>

            <?php if( get_field('memorial_enabled') ){ ?>
              <div class="memorial about row">
                <div class="col-12">
                  <h2><?php the_field('memorial_title'); ?></h2>
                </div>
                <div class="list-l flex-fill bd-highlight">
                  <?php the_field('memorial_1'); ?>
                </div>
                <div class="list-r flex-fill bd-highlight">
                  <?php the_field('memorial_2'); ?>
                </div>
              </div>
            <?php } ?>

            <?php if( get_field('map_enabled') && 1==0){ ?>
              <div class="memorial about row">
                <div class="col-12">
                  <div id="memorialMap"></div>
                </div>
                <script>
                  function initMap() {
                    const myLatlng = {
                      lat: <?php echo get_field('map')['lat']; ?>,
                      lng: <?php echo get_field('map')['lng']; ?> };
                    const map = new google.maps.Map(document.getElementById("memorialMap"), {
                      zoom: 14,
                      center: myLatlng,
                    });
                    const marker = new google.maps.Marker({
                      position: myLatlng,
                      map,
                      title: "Click to zoom",
                    });
                    map.addListener("center_changed", () => {
                      window.setTimeout(() => {
                        map.panTo(marker.getPosition());
                      }, 3000);
                    });
                    marker.addListener("click", () => {
                      map.setZoom(16);
                      map.setCenter(marker.getPosition());
                    });
                  }
                </script>
                <script
                  src="//maps.googleapis.com/maps/api/js?key=AIzaSyCU1bc0R8O5dAHLCAztbZNcKCV88gRno-4&callback=initMap"
                ></script>
              </div>
            <?php } ?>

            <?php if( get_field('family_enabled') ){ ?>
              <div class="family row">
                <div class="col-12">
                  <h2><?php the_field('family_title'); ?></h2>
                </div>
                <div class="list-l flex-fill bd-highlight">
                  <?php the_field('family_1'); ?>
                </div>
                <div class="list-r flex-fill bd-highlight">
                  <?php the_field('family_2'); ?>
                </div>
              </div>
            <?php } ?>

            <?php if( get_field('achievements_enabled') ){ ?>
              <div class="achievements row">
                <div class="col-12">
                  <h2><?php the_field('achievements_title'); ?></h2>
                </div>
                <div class="list-l flex-fill bd-highlight">
                  <?php the_field('achievements_1'); ?>
                </div>
                <div class="list-r flex-fill bd-highlight ">
                  <?php the_field('achievements_2'); ?>
                </div>
              </div>
            <?php } ?>

            <?php include get_template_directory() . '/template-parts/comments-list.php'; ?>
          </div>
          <!-- col-xl-8 col-lg-8 align-self-start order-2 order-xl-1 -->
          <div class="col-xl-4 col-lg-12 col-md-12 px-md-0 px-sm-3
                    d-xl-flex flex-xl-column
                    d-lg-inline-flex d-md-inline-flex
                    flex-md-wrap flex-lg-nowrap
                    justify-content-md-end justify-content-xl-start
                    order-1 order-xl-2">

            <div class="row justify-content-sm-center">
              <div class="col-xl-10 col-lg-5 col-md-6 col-sm-8 offset-xl-1 offset-lg-1">
                <div class="personal-memorial">
                  <h3>Personal Memorial Gifts</h3>
                  <p>You can select and leave one of the Memorial Gifts on the page, which will be displayed on the Online Memorial for <?= get_field('gifts_lifetime', 'option'); ?> hours.</p>
                </div>
                <!-- /.personal-memorial -->
              </div>
              <!-- /.col-12 -->
              <div class="col-xl-12 col-lg-5 col-md-6 col-sm-9 pr-xl-1 pt-xl-0">
                <div class="img-wrapper d-flex flex-wrap justify-content-lg-end justify-content-center">
                  <?php
                    $i = 0;
                    foreach ($gifts as $gift){
                      ++$i;

                      if($i > 6){ break; }
                  ?>
                    <div class="icon-price gift-buy"
                         data-toggle="modal"
                         data-target="#giftsModal"
                         data-gift_id="<?= $gift['gift_id']; ?>"
                         data-gift_name="<?= $gift['gift_name']; ?>"
                         data-gift_price="<?= $gift['gift_price']; ?>">
                      <img class="gift"
                           src="<?= get_template_directory_uri(); ?>/static/img/memorial/icons/<?= $gift['gift_image']; ?>" alt="<?= $gift['gift_name']; ?>">
                      <span class="price">$ <?= $gift['gift_price']; ?></span>
                    </div>
                  <?php } ?>
                  <button class="btn-create center" data-toggle="modal" data-target="#viewmoreModal">View More</button>
                </div>
              </div>

              <!-- Modal gifts -->
              <div class="modal gifts fade" id="giftsModal" tabindex="-1" aria-labelledby="candleModalLabel"
                   aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header justify-content-center">
                      <h4 class="modal-title" id="candleModalLabel">Gift for <?php the_field('first_name') ?> <?php the_field('last_name') ?></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <img class="gift" src="" alt="">
                      <p><?php the_field('head_text', 'option'); ?></p>
                      <span class="modal-price">$ 1,99</span>

                      <form action="<?= get_site_url(); ?>/wp-content/themes/arcadiamemorial/stripe/checkout-session.php" method="POST">
                        <input type="hidden" id="gift_id" name="gift_id" value="">
                        <input type="hidden" id="gift_name" name="gift_name" value="">
                        <input type="hidden" id="gift_price" name="gift_price" value="">
                        <input type="hidden" id="gift_image" name="gift_image" value="">
                        <input type="hidden" name="memorial_id" value="<?= get_the_ID(); ?>">
                        <input type="hidden" name="user_id" value="<?= get_current_user_id(); ?>">
                        <input type="hidden" name="response_url" value="<?= get_page_link(); ?>">
                        <button type="submit" class="btn-create center">Buy now</button>
                      </form>

                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal all gifts " viev more " -->
              <div class="modal all-gifts fade" id="viewmoreModal" tabindex="-1" aria-labelledby="viewmoreModalLabel"
                   aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header justify-content-center flex-column">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h3 class="modal-title" id="viewmoreModalLabel">Personal Memorial Gifts</h3>
                      <p>You can select and leave one of the Memorial Gifts on the page, which will be displayed on the
                        Online Memorial for <?= get_field('gifts_lifetime', 'option'); ?> hours.</p>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-12 pr-1 pt-0 justify-content-center">
                          <div class="img-wrapper d-flex flex-wrap justify-content-center">
                            <?php foreach ($gifts as $gift){ ?>
                              <div class="icon-price gift-buy"
                                   data-toggle="modal"
                                   data-target="#giftsModal"
                                   data-gift_id="<?= $gift['gift_id']; ?>"
                                   data-gift_name="<?= $gift['gift_name']; ?>"
                                   data-gift_price="<?= $gift['gift_price']; ?>">
                                <img class="gift"
                                     src="<?= get_template_directory_uri(); ?>/static/img/memorial/icons/<?= $gift['gift_image']; ?>" alt="<?= $gift['gift_name']; ?>">
                                <span class="price">$ <?= $gift['gift_price']; ?></span>
                              </div>
                            <?php } ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <?php if(!empty($main_events)){ ?>
              <div class="main-events col-xl-10 col-lg-4 col-md-4 col-sm-8 offset-xl-1">
                <h3>Main Events</h3>
                <ul>
                  <?php foreach($main_events as $main_event){ ?>
                    <li><span><?= $main_event; ?></span></li>
                  <?php } ?>
                </ul>
              </div>
              <?php } ?>

              <?php if( get_field('gallery_enabled') ){ ?>
                <div class="gallery col-xl-12 col-lg-5 col-md-6 col-sm-8">
                  <h3>Gallery</h3>
                  <div class="gallery-wrapper d-lg-flex flex-wrap">
                    <?php
                    $images = get_field('gallery');
                    if ($images){ ?>
                      <?php foreach ($images as $image){ ?>
                        <?php if (empty(get_field('video_url', $image['ID']))) { ?>
                          <a data-caption="<?php echo $image['caption']; ?>"
                            data-fancybox="foto-sidebar"
                            href="<?php echo $image['url']; ?>">
                            <img src="<?= $image['sizes']['thumbnail']; ?>" alt="#">
                          </a>
                        <?php } ?>
                      <?php } ?>
                    <?php } ?>
                  </div>
                </div>
              <?php } ?>

              <?php if( get_field('curator_enabled') ){ ?>
                <div class="curator col-xl-10 col-lg-3 col-md-2 col-sm-8 offset-xl-2">
                  <h3>The Curator Of Memorial</h3>
                  <img src="<?php echo get_template_directory_uri(); ?>/static/img/memorial/joan-smith/curator.jpg"
                       alt="#">
                  <span>Julian Thompson</span>
                </div>
              <?php } ?>

              <?php if( get_field('recent_updates_enabled') ){ ?>
                <div class="recent yellow-disc col-xl-12 col-sm-8 pr-0">
                  <h3>Recent Updates</h3>
                  <ul>
                    <li>Mary Thompson<a href="#"> wrote in the Guestbook</a> <span class="data"> July 31, 2020</span></li>
                    <li>Anna Thompson<a href="#"> left a gift</a><span class="data"> July 28, 2021</span></li>
                    <li>Angela Thompson <a href="#">shared photo</a><span class="data">July 20, 2021</span></li>
                  </ul>
                  <a class="link-arrow" href="#">View full story</a>
                </div>
              <?php } ?>
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.row px-2 -->
      </div>
      <!-- /.container -->
      <?php if ($type == 'basic') { ?>
        <!-- nav-gallery -->
        <div class="container px-0 big-gallery tab-pane fade" id="nav-gallery" role="tabpanel"
             aria-labelledby="nav-gallery-tab">
          <div class="tab-content" id="pills-tabContent">
            <div class="btn-wrap mx-auto d-flex justify-content-center">
              <button class="all active">All</button>
              <button class="foto">Photo</button>
              <button class="video">Video</button>
            </div>
            <?php
              $images = get_field('gallery');
              if ($images): ?>
                <?php foreach ($images as $image): ?>
                  <?php if (!empty(get_field('video_url', $image['ID']))) { ?>
                    <a data-caption="<?php echo $image['caption']; ?>"
                       data-fancybox="video"
                       href="<?php echo get_field('video_url', $image['ID']); ?>">
                      <?php echo wp_get_attachment_image($image['ID'], 'memorial-gallery'); ?>
                      <span class="icon icon-play-video"></span>
                    </a>
                  <?php } else { ?>
                    <a data-caption="<?php echo $image['caption']; ?>"
                       data-fancybox="foto"
                       href="<?php echo $image['url']; ?>">
                      <?php echo wp_get_attachment_image($image['ID'], 'memorial-gallery'); ?>
                    </a>
                  <?php } ?>
                <?php endforeach; ?>
              <?php endif; ?>
          </div>
        </div>

        <?php include get_template_directory() . '/acf-layouts/single-memorial/tree.php'; ?>
      <?php } ?>

      <?php include get_template_directory() . '/acf-layouts/single-memorial/events.php'; ?>



      <?php if($gift_payed){ ?>
        <!-- Modal gift payed -->
        <div class="modal gifts fade" id="giftPayedModal">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header justify-content-center">
                <h4 class="modal-title">
                  <?php if($gift_payed == 1){ ?>
                    Thank You
                  <?php }else{ ?>
                    Sorry
                  <?php } ?>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php if($gift_payed == 1){ ?>
                  <p>Your gift successfully added!</p>
                <?php }else{ ?>
                  <p>Something wrong with your payment!</p>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>

        <script>
            $(window).on('load', function() {
                $('#giftPayedModal').modal('show');
            });
        </script>
      <?php } ?>
    </section>
    <!-- /.biography-main-events TAB-CONTENT -->

  </main><!-- #site-main -->



    <div class="modal share fade align-items-center" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-header border-0">
                    <h3>Share This Memorial</h3>
                </div>
                <div class="modal-body">
                    <p>Store your memory. Share the memorial with your friends and family. They will be grateful to you.</p>
                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/static/img/icons/faseboock.svg" alt="#"></a>
                    <a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink(); ?>"><img style="max-width: 35px;" src="<?php echo get_template_directory_uri(); ?>/static/img/icons/linkedin.svg" alt="#"></a>
                    <a target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/static/img/icons/twitter.svg"
                                     alt="#"></a>
                </div>
                <div class="modal-footer border-0 d-flex justify-content-center">
                    <input  id="myInput" type="hidden" value="<?php the_permalink(); ?>" readonly="readonly">
                    <label for="myInput"><?php the_permalink(); ?></label>
                    <a class="copy-text" href="<?php the_permalink(); ?>" id="copyText"><img
                                src="<?php echo get_template_directory_uri(); ?>/static/img/icons/copy.svg" alt="#"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal share -->
<?php

get_footer();
