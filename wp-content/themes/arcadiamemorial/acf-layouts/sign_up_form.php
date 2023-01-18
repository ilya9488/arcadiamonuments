<section class="signup-form">
  <div class="container">
    <div class="row">
      <div class="col-12">

        <?php if ( is_user_logged_in() ) { ?>
          <div class="congratulations">
            <div class="text-wrap">
              <h3>Congratulations!</h3>
              <p>There is 1 step left to complete your registration. We have sent a confirmation email to the Email address you provided during registration. Please, open it and follow the instructions.</p>
            </div>
          </div>
        <?php } ?>

      </div>
      <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 mx-md-auto mx-auto">
        <?php echo do_shortcode( '[register_form]' ); ?>

        <?php if(!is_user_logged_in()) { ?>

          <div class="log-in-with">Or Sign Up With</div>
          <div class="with-links d-flex justify-content-center flex-wrap ">
              <?php echo do_shortcode( '[google-login]' ); ?>
<!--            <a href="/login/">-->
<!--              <img src="--><?php //echo get_template_directory_uri();?><!--/static/img/icons/google-color.svg" alt="#">-->
<!--            </a>-->
              <?php echo do_shortcode( '[facebook-login]' ); ?>
<!--            <a href="/login/">-->
<!--              <img src="--><?php //echo get_template_directory_uri();?><!--/static/img/icons/facebook-color.svg" alt="#">-->
<!--            </a>-->
          </div>

      <?php
        }
        ?>

        <script type="text/javascript">
        let userlogin = document.querySelector('input#user_login')
            document.querySelector('input#user_email').onchange = function(){
            userlogin.value = this.value ; 
          };
        </script>
        
      </div>
    </div>
  </div>
</section>