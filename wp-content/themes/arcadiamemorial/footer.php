<?php
  /**
   * The template for displaying the footer
   *
   * Contains the closing of the #content div and all content after.
   *
   * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
   *
   * @package arcadiamemorial
   */

?>
</div><!-- #page -->
<footer class="footer <?= get_permalink(379); ?>">
    <?php $pageMemorial = 379; $pageId = get_the_ID();
    ?>

  <?php if (get_field('show_footer_form') && $pageId != $pageMemorial || is_404() || is_search()) {
    ?>
    <section class="bottom-form">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="form-wrapper"
                 style="background-image: url(<?php echo get_template_directory_uri(); ?>/static/img/bottom-form-bg.webp);">
              <h3 class="title-cf7">Create An Online Memorial Right Now</h3>
              <div class="form">
                <?php echo do_shortcode( '[contact-form-7 id="5" title="Contact form bottom"]' ); ?>
              </div>
            </div>
            <!-- /.title-form-wrapper -->
          </div>
          <!-- /.col-xl-12 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /.home-bottom-form -->
    <?php
  } ?>
  <!-- /.home-bottom-form -->
  <div class="container ">
    <div class="row">
      <div class="col-xl-4 col-lg-3 col-md-3 col-sm-6">
        <div class="create-a-digital">
          <div class="footer-logo-title">
            <svg class="white-logo">
              <use xlink:href="<?php echo get_template_directory_uri(); ?>/static/img/icons/sprite.svg#white-logo"></use>
            </svg>
          </div>
            <!-- /.footer-logo-title -->
            <p>Create a Digital Legacy and Preserve the Memory of your Loved Ones for your Family</p>
            <div class="links">
              <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/static/img/icons/faseboock-white.svg" alt="#"></a>
              <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/static/img/icons/gmail-white.svg" alt="#"></a>
              <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/static/img/icons/instagram-white.png" alt="#"></a>
            </div>
          <!-- /.links -->
        </div>
        <!-- /.create-a-digital -->
      </div>
      <!-- /.col-xl-4 -->
      <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6">
        <div class="useful">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="<?php echo site_url(); ?>/frequently-asked-questions">FAQ</a></li>
            <li><a href="<?php echo site_url(); ?>/contact-us">Contact us</a></li>
            <li><a href="<?php echo site_url(); ?>/privacy-policy">Privacy</a></li>
            <li><a href="<?php echo site_url(); ?>/terms-of-service">Terms</a></li>
            <li><a href="<?php echo site_url(); ?>/collaboration/">Partners</a></li>
          </ul>
        </div>
        <!-- /.useful -->
      </div>
      <!-- /.col-xl-2 -->
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
        <div class="our-friends">
          <h4>Our Friends</h4>
            <ul>
              <li><a href="https://arcadiamonuments.com/"><img src="<?php echo get_template_directory_uri(); ?>/static/img/icons/arcadia-monuments.png" alt="#"></a></li>
              <li><a href="#">SemperAmemus</a></li>
              <li><a href="https://ecomexpertise.com/"><img src="<?php echo get_template_directory_uri(); ?>/static/img/icons/ecomexpertise.png" alt="#"></a></li>
            </ul>
        </div>
        <!-- /.our-friends -->
      </div>
      <!-- /.col-xl-3 -->
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
        <div class="our-awards">
          <h4>Our Awards</h4>
          <ul>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/static/img/icons/BBB.png" alt="#"></a>
            </li>
          </ul>
        </div>
        <!-- /.our-awards -->
      </div>
      <!-- /.col-xl-3 -->
      <div class="col-xl-12">
        <div class="footer-bottom-text d-flex justify-content-lg-between">
          <span>© 2021 Designed and Developed by <a href="https://ecomexpertise.com/">EcomExpertise.com</a></span>
          <span class="text-lg-right">Copyright © 2021 EcomExpertise. - All Rights Reserved</span>
        </div>
        <!-- /.footer-bottom-text -->
      </div>
      <!-- /.col-xl-12 -->
    </div>
    <!-- /.row   -->
  </div>
  <!-- /.container-fluid -->
</footer>
<!-- /.foter -->


<?php wp_footer(); ?>

<?php if(is_user_logged_in()){ ?>
  <script>
    setInterval(function() {
      $.ajax({
        type: 'POST',
        url: '<?= get_stylesheet_directory_uri(); ?>/controllers/comments/check_responses.php',
        cache: false,
        data: 'user_id=<?= get_current_user_id(); ?>',
        dataType: 'json',
        success: function (count) {
          if(count > 0){
            $('.message-count').text(count);
            $('.message-count').removeClass('hide');
          }else{
            $('.message-count').text(count);
            $('.message-count').addClass('hide');
          }
        },
        error: function () {
            console.log('Error');
        },
      });
    }, 5000);
  </script>
<?php } ?>
</body>
</html>
