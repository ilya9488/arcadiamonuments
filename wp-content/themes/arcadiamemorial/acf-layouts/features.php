<?php
  $rows = get_sub_field('list');
  if ($rows) {
    ?>
    <section class="home-features">
      <div class="container-fluid">
        <div class="row justify-content-md-center">
          <?php
            $i = 1;
            foreach ($rows as $row) {
              ?>
              <div class="col-xl-4 col-md-10 col-sm-12">
                <div class="row">

                  <div class="aside-title ">
                    <span class="number">0<?php echo $i; ?></span><span class="line"></span>
                  </div>
                  <!-- /.aside-title -->

                  <div class="col">
                    <h3><?php echo $row['title']; ?></h3>
                    <p><?php echo $row['text']; ?></p>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.col-xl-4 .col-md-10 .col-sm-12 -->
              <?php
              $i++;
            }
          ?>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.features -->
    <?php
  }
