<div class="concept-features">
  <div class="container">
    <div class="row">
      <div class="col">
        <h3><?php the_sub_field('title'); ?></h3>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">

      <?php
        $rows = get_sub_field('concept_features');
        if ($rows) {
          $i = 0;
          foreach ($rows as $row) {
            $image = $row['image'];
            ?>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                  <div class="row">
                    <div class="col-2">
                      <div class="img-wrapper">
                      <?php echo wp_get_attachment_image($image, 'concept_features'); ?>
                    </div>
                    <!-- /.col-2 -->
                  </div>
                  <!-- /.img-wrapper -->
                  <div class="col-10">
                    <div class="text-wrapper">
                      <h4><?php echo $row['title']; ?></h4>
                      <p><?php echo $row['text']; ?></p>
                    </div>
                  <!-- /.text-wrapper -->
                  </div>
                <!-- /.col-10 -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.col-xl-6 col-lg-6 col-md-12 col-sm-12 -->
            <?php
            $i++;
          }
        }
      ?>
      <!-- / ?php -->      
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</div>
<!-- /.concept-features -->