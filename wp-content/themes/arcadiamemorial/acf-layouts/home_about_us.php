
<section class="about-us">
  <div class="container-xl container-fluid">
    <div class="row pr-xl-3 d-flex justify-content-center">
      <div class="col-auto px-md-0">
          <div class="rous">
            <?php echo wp_get_attachment_image( get_sub_field('image'), 'about-us' ); ?>
          </div>
          <!-- /.rous -->
      </div>
      <!-- /.col-md-6 -->
      <!-- <div class="col mx-0 px-0 pr-md-4 mr-md-2 d-flex justify-content-center order-lg-<?php the_sub_field('order_position'); ?>"> -->
      <div class="col mx-0 px-0 d-flex justify-content-center order-lg-<?php the_sub_field('order_position'); ?>">
      <div class="about-us-wrapper d-flex justify-content-lg-<?php the_sub_field('block_position'); ?>" style="background-color:<?php the_sub_field('bg_color'); ?>">
        <div class="about-us-text">
          
          <?php the_sub_field('text'); ?>
          <!-- btn -->
          <a href="<?php the_sub_field('btn_url'); ?>"
             class="btn btn-light"><span><?php the_sub_field('btn_name'); ?></span></a>
          <!-- /.btn -->
        </div>
        <!-- /.about-us -->
       </div>
      </div>
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
  <div style="height:<?php the_sub_field('div_height'); ?>px; "></div>
</section>
<!-- /.home-rose -->
