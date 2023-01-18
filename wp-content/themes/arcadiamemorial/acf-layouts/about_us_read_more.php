<section class="about-us-read-more">
  <div class="container">
    <div class="row justify-content-sm-center mx-0 px-0">
      <div class="col-xl-12 col-sm-12">
        <h2><?php the_sub_field('title'); ?></h2>
      </div>
      <!-- /.col-xl-12 -->
      <?php
        $rows = get_sub_field('read_more');
        if ($rows) {
          $i = 0;
          foreach ($rows as $row) {
            $image = $row['image'];
            ?>

            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10
            <?php echo ($i == 0) ? ' border-buttom' : ''; 
                  echo ($i == 1) ? ' border-left-buttom-right' : ''; 
                  echo ($i == 2) ? ' border-buttom' : '';
                  echo ($i == 4) ? ' border-left-right' : ''; 
                  ?>"
                  > 
              <div class="read-more-wrapper" style="text-align:<?php echo $row['img_position']; ?>">
                <?php  if( !empty($row['img_link']) ){ ?>
                <a target="_blank" rel="nofollow" href="<?php echo $row['img_link']; ?>">
                    <?php }
                    else { ?>
                    <span>
                        <?php } ?>
                  <?php echo wp_get_attachment_image($image, 'more'); ?>
                    <?php  if( !empty($row['img_link']) ){ ?>
                </a>
                  <?php }
                  else { ?>
                      </span>
                  <?php } ?>
                <?php
                  if( !empty($row['text']) ){
                    ?>
                    <p><?php echo $row['text']; ?></p>
                    <?php 
                  }
                  ?>
              <?php
              if( !empty($row['link']) && !empty($row['text_link'])){
                ?>
                <a rel="nofollow" target="_blank"  class="link-arrow" href="<?php echo $row['link']; ?>">
                    <?php echo $row['text_link']; ?>
                </a>
                <?php 
              }
              ?>
              
            </div>
            <!-- /.read-more-wrapper -->
          </div>
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
</section>
<!-- /.about-us-read-more -->
