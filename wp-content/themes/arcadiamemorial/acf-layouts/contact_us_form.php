<section class="contact-us-form">
  <div class="container-fluid">
    <div class="row d-md-flex justify-content-md-center justify-content-lg-start">
      <div class="col-xl-6 col-lg-6">
        <div class="contact-img">
          <?php echo wp_get_attachment_image( get_sub_field('image'), 'contact-us-form' ); ?>
        </div>
        <!-- /.contact-img -->
      </div>
      <!-- /.col-xl-6 -->
      <div class="col-xl-4 col-lg-5 col-md-8">
        <div class="contact-form">
          <h2><?php the_sub_field('title'); ?></h2>
          <div class="form">
            <div class="dropdown">
                <div class="select d-flex justify-content-between align-items-center">
                  <span class="message">Message Subject</span> <span class="icon icon-bracket-accordion "></span>
                </div>
                <input type="hidden" name="gender">
                <ul class="dropdown-menu">
                  <li>Technical Support</li>
                  <li>General Question</li>
                  <li>Collaboration</li>
                  <li>Question about the Online Memorial</li>
                  <li>Sponsorship of the project</li>
                  <!-- <li>Message Subject 6</li>
                  <li>Message Subject 7</li>
                  <li>Message Subject 8</li>
                  <li>Message Subject 9</li>
                  <li>Message Subject 10</li> -->
                </ul>
              </div>
              <!-- /.dropdown -->
              <?php echo do_shortcode( '[contact-form-7 id="290" title="Contact form Contact-us"]' ); ?>
           </div>
          </div>
        </div>
        <!-- /.contact-form -->
      </div>
      <!-- /.col-xl-6 px-0 form-bg-contact-->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.contact-us-map -->
