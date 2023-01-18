<section class="home-steps">
  <div class="container">
    <div class="row">
      <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-10 offset-md-1">
        <h2><?php the_sub_field('title'); ?></h2>
      </div>
      <!-- /.col-xl-8 offset-xl-2 col-lg-12 -->
      <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="numbers">01</div>
        <h3><?php the_sub_field('title_1'); ?></h3>
        <p><?php the_sub_field('text_1'); ?></p>
      </div>
      <!-- /.col-xl-4 -->
      <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="numbers">02</div>
        <h3><?php the_sub_field('title_2'); ?></h3>
        <p><?php the_sub_field('text_2'); ?></p>
      </div>
      <!-- /.col-xl-4 -->
      <div class="col-xl-4 col-lg-4">
        <div class="numbers">03</div>
        <h3><?php the_sub_field('title_3'); ?></h3>
        <p><?php the_sub_field('text_3'); ?></p>
      </div>
      <!-- /.col-xl-4 -->
      <div class="plus plus-left" style="background-image: url(<?php echo get_template_directory_uri();?>/static/img/plusbg.png);"></div>
      <!-- /.plus .plus-left -->
      <div class="plus" style="background-image: url(<?php echo get_template_directory_uri();?>/static/img/plusbg.png);"></div>
      <!-- /.plus -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</section>
<!-- /.home-steps -->
