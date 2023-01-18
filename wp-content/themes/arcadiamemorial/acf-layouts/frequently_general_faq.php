<section class="frequently-general-faq">
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="accordion" id="accordionExample">
              
            <?php
              $rows = get_sub_field('general_faq');
              if ($rows) {
                $i = 0;
                foreach ($rows as $row) {
                  $image = $row['image'];
                  ?>
                    <?php 
                      if( !empty($row['theme_title']) ){
                        ?>
                        <h2 class="title"><?php echo $row['theme_title']; ?> </h2>
                        <?php 
                      }
                      ?>

                        <div class="card">
                          <div class="card-header" id="heading<?php echo $i ?>">
                            <div id="collapse<?php echo $i ?>" class="collapse <?php echo ($i == 0) ? ' show' : ''; ?>" aria-labelledby="heading<?php echo $i ?>" data-parent="#accordionExample">
                            <div class="card-body">
                              <span class="close-accordion" data-toggle="collapse" data-target="#collapse<?php echo $i ?>" aria-controls="collapseOne">
                                <img src="<?php echo get_template_directory_uri(); ?>/static/img/icons/close-in-circle.svg" alt="#">
                              </span>
                              <h4>
                                <?php echo $row['question']; ?>
                              </h4>
                              <?php echo $row['answer']; ?>
                            </div>
                          </div>
                            <h2 class="mb-0 tab-pane collapse<?php echo ($i == 0) ? ' show' : ''; ?>" id="collapse<?php echo $i ?>" data-parent="#accordionExample">
                              <span class="btn" data-toggle="collapse" data-target="#collapse<?php echo $i ?>" aria-controls="collapse<?php echo $i ?>">
                                <?php echo $row['question']; ?>
                                <!-- Can I Add Information About My Business? -->
                              </span>
                              <span class="open-accordion" data-toggle="collapse" data-target="#collapse<?php echo $i ?>" aria-controls="collapseOne">
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
        <!-- /.col-12 -->
        </div>
      <!-- /.row -->
    </div>
  <!-- /.container -->
</section>
<!-- /.frequently-general-faq -->