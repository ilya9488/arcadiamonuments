<section class="about-us-who-we-are">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-lg-6 col-md-9 col-sm-10">
        <?php the_sub_field('text_1'); ?>
      </div>
      <!-- /.col-lg-6 col-md-9 col-sm-12 -->
      <div class="col-lg-6 col-md-9 col-sm-10">
        <div class="img-wrapper">
          <?php echo wp_get_attachment_image( get_sub_field('image'), 'about-us' ); ?>
        </div>
        <!-- /.img-wrapper -->
        <?php the_sub_field('text_2'); ?>
        <!-- <p>Besides the writers, we have assembled a team of artists and professional designers. Their job is to make the memorial truly unique. So that it reflects the personality, the individuality of the person.</p>
        <p>Thus, by contacting our experts, you can order a completely unique and personalized online memorial, which will preserve the most pleasant moments of your deceased loved one’s life forever.</p> -->
      </div>
      <!-- /.col-lg-6 col-md-9 col-sm-12 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</section>
<!-- /.about-us-who-we-are -->