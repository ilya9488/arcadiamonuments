<section class="home-our-offers">
  <div class="container-fluid p-0 m-0">
    <div class="row p-0 m-0 justify-content-md-center">
      <div class="p-0 col-lg-6">
        <div class="our-offers-img">
          <?php echo wp_get_attachment_image( get_sub_field('image'), 'our-offers' ); ?>
        </div>
        <!-- /.our-offers-img -->
      </div>
      <!-- /.col -->
      <div class="p-0 col-lg-6">

        <div class="our-offers-wrapper">
        <div class="offers-list">
         <?php if (get_sub_field('top_indent')) {
          ?>
          <div class="top-indent"></div>
          <?php
        } ?>
          <?php the_sub_field('text'); ?>
           <a href="<?php the_sub_field('btn_url'); ?>"
             class="btn btn-light"><span><?php the_sub_field('btn_name'); ?></span></a>
        </div>
        <!-- /.offers-list -->
      </div>
      <!-- /.col-md-12 col-lg-6 col-xl-6 -->
      </div>
        <!-- /.our-offers-wrapper -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.home-our-offers -->