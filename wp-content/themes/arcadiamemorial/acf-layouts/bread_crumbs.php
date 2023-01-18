<section class="breadcrumbs-content">
  <div class="container-fluid p-0 m-0">
    <div class="row text-center mx-0 px-0">
      <div class="col-12 mx-0 px-0">
        <div class="breadcrumbs-wr" style="background-image: url(<?php echo get_template_directory_uri(); ?>/static/img/bread-crumbs-bg.png);">
          <h1><?php the_sub_field('title'); ?></h1>
          <div class="breadcrumbs">
                <a href="<?php echo site_url(); ?>"><?php the_sub_field('text_1'); ?></a>
                <span class="delimiter"> / </span>
                <?php the_sub_field('text_2'); ?>
          </div>
          <!-- /.breadcrumbs -->
        </div>
        <!-- /.breadcrumbs-wr -->
        </div>
        <!-- /.col-12 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.breadcrumbs-content -->