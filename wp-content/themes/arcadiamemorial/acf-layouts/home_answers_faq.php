<section class="home-answers-faq">
  <div class="container">
    <div class="row">
      <div class="col-xl-7 col-lg-7 col-md-12">
        <div class="faq-wrapper">

          <div class="accordion" id="accordionExample">
            <?php
              $rows = get_sub_field('home_faq');
              if ($rows) {
                $i = 0;
                foreach ($rows as $row) {
                  $image = $row['image'];
                  ?>
                    <?php 
                      if( !empty($row['title']) ){
                        ?>
                        <h2 class="title"><?php echo $row['title']; ?> </h2>
                        <?php 
                      }
                      ?>
                        <div class="card">
                          <div class="card-header" id="heading_3qn<?php echo $i ?>">
                            <div id="collapse_3qn<?php echo $i ?>" class="collapse <?php echo ($i == 0) ? ' show' : ''; ?>" aria-labelledby="heading_3qn<?php echo $i ?>" data-parent="#accordionExample">
                            <div class="card-body">
                              <span class="close-accordion" data-toggle="collapse" data-target="#collapse_3qn<?php echo $i ?>" aria-controls="collapseOne">
                                <img src="<?php echo get_template_directory_uri(); ?>/static/img/icons/close-in-circle.svg" alt="#">
                              </span>
                              <h4>
                                <?php echo $row['question']; ?>
                              </h4>
                              <?php echo $row['answer']; ?>
                            </div>
                          </div>
                            <h2 class="mb-0 tab-pane collapse<?php echo ($i == 0) ? ' show' : ''; ?>" id="collapse_3qn<?php echo $i ?>" data-parent="#accordionExample">
                              <span class="btn" data-toggle="collapse" data-target="#collapse_3qn<?php echo $i ?>" aria-controls="collapse_3qn<?php echo $i ?>">
                                <?php echo $row['question']; ?>
                              </span>
                              <span class="open-accordion" data-toggle="collapse" data-target="#collapse_3qn<?php echo $i ?>" aria-controls="collapseOne">
                              <img src="<?php echo get_template_directory_uri(); ?>/static/img/icons/plus-in-circle.svg" alt="#">
                              </span>
                            </h2>
                          </div>
                          <!-- /.card-header -->
                        </div>
                    <?php
                    $i++;
                  }
                }
              ?>
          </div>
          <!-- /.accordion -->
        </div>
        <!-- /.faq-wrapper -->
      </div>
      <!-- /.col-xl-7 col-lg-7 col-md-12 -->
      <div class="col-xl-5 col-lg-5">
        <div class="faq-img-wrapper">
          <?php echo wp_get_attachment_image( get_sub_field('image'), 'answers-faq' ); ?>
        </div>
      </div>
      <!-- /.col-xl-5 col-lg-5 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</section>
<!-- /.home-answers-faq -->