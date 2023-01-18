<section class="login-form">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 mx-auto">

        <?php echo do_shortcode( '[custom_login]' ); ?>





        
        <?php if(!is_user_logged_in()) { ?>

          <div class="log-in-with">Or Log In With</div>
          <div class="with-links d-flex justify-content-center flex-wrap ">
              <?php echo do_shortcode( '[google-login]' ); ?>
<!--            <a href="/login/">-->
<!--              <img src="--><?php //echo get_template_directory_uri();?><!--/static/img/icons/google-color.svg" alt="#">-->
<!--            </a>-->
              <?php echo do_shortcode( '[facebook-login]' ); ?>
<!--            <a href="/login/">-->
<!--              <img src="--><?php //echo get_template_directory_uri();?><!--/static/img/icons/facebook-color.svg" alt="#">-->
<!--            </a>-->

      <?php
        }
        ?>

        </div>
      </div>
    </div>
  </div>
</section>