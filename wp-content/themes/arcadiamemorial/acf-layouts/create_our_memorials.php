<section class="create-a-memorial">
  <div class="container-xl container-fluid">
    <div class="row">
      <div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3">
        <h2 class="text-center mt-0">Our Memorials Have Such Features</h2>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-8 offset-md-2 offset-lg-0">
        <div class="free">
          <div class="head-text">
            <span>It is FREE of charge when ordering an Online Monument from  <a href="https://arcadiamonuments.com" target="blank">Arcadia Monuments</a></span>
          </div>
          <div class="title-wrapper">
            <h3>Free</h3>
          </div>
          <div class="content-bg">
            <div class="content d-flex flex-column justify-content-center">
              <ul>
                <li>Photos, videos and other multimedia content</li>
                <li>Biography, written by professional content writers</li>
                <li>Information about the place of burial with a map</li>
                <li>Guestbook for Online Memorial guests to leave comments</li>
                <li>A virtual calendar with the most memorable dates</li>
              </ul>
              <a href="https://arcadiamonuments.com" class="btn-create" target="blank">order now</a>
            </div>
            <a class="view-example" target="_blank" href="<?php echo site_url()?>/memorials/412/">view example</a>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-8 offset-md-2 offset-lg-0">
        <div class="premium">
          <div class="head-text">
            <span>The cost is caculated individually</span>
          </div>
          <div class="title-wrapper">
            <h3>Premium</h3>
          </div>
          <div class="content-bg">
            <div class="content d-flex flex-column justify-content-center">
              <ul>
                <li>Personalised design of the Online Memorial</li>
                <li>Any quantity of photos, videos and other multimedia content</li>
                <li>Information about work, education, achievements, etc</li>
                <li>Biography, written by professional content writers</li>
                <li>Guestbook for Online Memorial guests to leave comments</li>
                <li>A virtual calendar with the most memorable dates</li>
                <li>Public/Private Online Memorial</li>
                <li>Information about the place of burial with a map</li>
              </ul>
              <button type="button" class="btn-create" data-toggle="modal" data-target="#createPremiumModal">order now</button>
            </div>
            <a class="view-example" target="_blank" href="https://premium.arcadiamemorial.com/">view example</a>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-8 offset-md-2 offset-lg-0">
        <div class="basic">
          <div class="head-text">
            <span>The cost is caculated individually</span>
          </div>
          <div class="title-wrapper">
            <h3>Basic</h3>
          </div>
          <div class="content-bg">
            <div class="content d-flex flex-column justify-content-center">
              <ul>
                <li>Photos, videos and other multimedia content</li>
                <li>Biography, written by professional content writers</li>
                <li>A family tree that you can create with our specialists</li>
                <li>Public/Private Online Memorial</li>
                <li>Information about the place of burial with a map</li>
                <li>Guestbook for Online Memorial guests to leave comments.</li>
                <li>A virtual calendar with the most memorable dates</li>
              </ul>
              <button type="button" class="btn-create" data-toggle="modal" data-target="#createBasicModal">order now</button>
            </div>
            <a class="view-example" target="_blank" href="<?php echo site_url()?>/memorials/aron-lipnitskiy/">view example</a>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Premium Modal -->
  <div class="modal fade pr-0" id="createPremiumModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <div class="modal-body">
          <h2 class="text-left">Order Form:</h2>
          <?php echo do_shortcode( '[contact-form-7 id="297" title="Create A Premium Memorial Contact form"]' ); ?>
        </div>
      </div>
    </div>
  </div>

    <!-- Basic Modal -->
    <div class="modal fade pr-0" id="createBasicModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <h2 class="text-left">Order Form:</h2>
                    <?php echo do_shortcode( '[contact-form-7 id="560" title="Create A Basic Memorial Contact"]' ); ?>
                </div>
            </div>
        </div>
    </div>


</section>
<!-- /.create-a-memorial -->

<section class="create-our-memorials">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10">
        <div class="title-wrapper">
          <h2><?php the_sub_field('title'); ?></h2>
          <!-- <h2>Our Memorials Have Such Features</h2> -->
        </div>
        <!-- /.title-wrapper -->
      </div>
      <!-- /.col-6 -->
    </div>
    <!-- /.row justify-content-center -->

    <div class="row text-center p-0 m-0">
      <div class="offset-block-headedr"></div>
          <div class="free col cell-lite-gray m_4 t_center">
              <h3>Free</h3>
          </div>
          <div class="basic col cell-yellow m_4 t_center">
              <h3>Basic</h3>
          </div>
          <div class="premium col cell-dark-gray m_4 t_center">
            <h3>Premium</h3>
          </div>
      </div>
      <!-- /.row text-center p-0 m-0 -->

    <div class="row p-0 m-0">
      <div class="col p-0 m-0 border_b">
      <div class="offset-block">
          <h4>Cover Page</h4>
          <p>Online Memorial page layout.</p>
      </div>
      </div>
      <div class="standard col p-0 cell-white-gray m_4 t_center">
         <p>Standard</p>
      </div>
      <div class="standard col p-0 cell-lite-yellow m_4 t_center">
        <p>Standard</p>
      </div>
      <div class="customised col p-0 cell-gray m_4 t_center">
        <p>Customised</p>
      </div>
    </div>
    <!-- /.row text-center p-0 m-0 -->
    <div class="row p-0 m-0">
      <div class="col p-0 border_b">
      <div class="offset-block">
          <h4>Main Photo</h4>
          <p>Main photo of Online Memorial page.</p>
      </div>
      </div>
      <div class="standard col p-0 cell-white-gray m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/dark-circle-check.svg" alt="#">
      </div>
      <div class="standard col p-0 cell-lite-yellow m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/dark-circle-check.svg" alt="#">
      </div>
      <div class="customised col p-0 cell-gray m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/white-circle-check.svg" alt="#">
      </div>
    </div>
    <!-- /.row text-center p-0 m-0 -->
    <div class="row p-0 m-0">
      <div class="col p-0 m-0 border_b">
      <div class="offset-block">
          <h4>Biography</h4>
          <p>Biography of the person, written by professional content writers with input from family members and close relatives.</p>
      </div>
      </div>
      <div class="standard col p-0 cell-white-gray m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/dark-circle-cross.svg" alt="#">
      </div>
      <div class="standard col p-0 cell-lite-yellow m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/dark-circle-check.svg" alt="#">
      </div>
      <div class="customised col p-0 cell-gray m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/white-circle-check.svg" alt="#">
      </div>
    </div>
    <!-- /.row text-center p-0 m-0 -->
    <div class="row p-0 m-0">
      <div class="col p-0 m-0 border_b">
      <div class="offset-block">
          <h4>Gallery</h4>
          <p>Photo gallery.</p>
      </div>
      </div>
      <div class="standard col p-0 cell-white-gray m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/dark-circle-cross.svg" alt="#">
      </div>
      <div class="standard col p-0 cell-lite-yellow m_4 t_center">
        <p>9 photos</p>
      </div>
      <div class="customised col p-0 cell-gray m_4 t_center">
        <p>Unlimited number of photos</p>
      </div>
    </div>
    <!-- /.row text-center p-0 m-0 -->
    <div class="row p-0 m-0">
      <div class="col p-0 m-0 border_b">
      <div class="offset-block">
          <h4>Family tree</h4>
          <p>A family tree that you can create with our specialists.</p>
      </div>
      </div>
      <div class="standard col p-0 cell-white-gray m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/dark-circle-cross.svg" alt="#">
      </div>
      <div class="standard col p-0 cell-lite-yellow m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/dark-circle-cross.svg" alt="#">
      </div>
      <div class="customised col p-0 cell-gray m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/white-circle-check.svg" alt="#">
      </div>
    </div>
    <!-- /.row text-center p-0 m-0 -->
    <div class="row p-0 m-0">
      <div class="col p-0 border_b">
      <div class="offset-block">
          <h4>Events Calendar</h4>
          <p>A calendar with the most important and memorable dates in a person’s life.</p>
      </div>
      </div>
      <div class="standard col p-0 cell-white-gray m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/dark-circle-check.svg" alt="#">
      </div>
      <div class="standard col p-0 cell-lite-yellow m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/dark-circle-check.svg" alt="#">
      </div>
      <div class="customised col p-0 cell-gray m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/white-circle-check.svg" alt="#">
      </div>
    </div>
    <!-- /.row text-center p-0 m-0 -->
    <div class="row p-0 m-0">
      <div class="col p-0 border_b">
      <div class="offset-block">
          <h4>Privacy</h4>
          <p>Possibility to make Online Memorial available for everybody or only a certain circle of people.</p>
      </div>
      </div>
      <div class="standard col p-0 cell-white-gray m_4 t_center">
        <p>Public</p>
      </div>
      <div class="standard col p-0 cell-lite-yellow m_4 t_center">
        <p>Public</p>
      </div>
      <div class="customised col p-0 cell-gray m_4 t_center">
        <p>Public / Private</p>
      </div>
    </div>
    <!-- /.row text-center p-0 m-0 -->
    <div class="row p-0 m-0">
      <div class="col p-0 m-0 border_b">
      <div class="offset-block">
          <h4>Guestbook</h4>
          <p>Opportunity for Online Memorial guests to leave comments, share their experiences, stories about a person, etc.</p>
      </div>
      </div>
      <div class="standard col p-0 cell-white-gray m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/dark-circle-cross.svg" alt="#">
      </div>
      <div class="standard col p-0 cell-lite-yellow m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/dark-circle-check.svg" alt="#">
      </div>
      <div class="customised col p-0 cell-gray m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/white-circle-check.svg" alt="#">
      </div>
    </div>
    <!-- /.row text-center p-0 m-0 -->
    <div class="row p-0 m-0">
      <div class="col p-0 m-0 border_b">
      <div class="offset-block">
          <h4>Burial Place</h4>
          <p>Information about the place of burial (city, region, cemetery) with a map.</p>
      </div>
      </div>
      <div class="standard col p-0 cell-white-gray m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/dark-circle-cross.svg" alt="#">
      </div>
      <div class="standard col p-0 cell-lite-yellow m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/dark-circle-check.svg" alt="#">
      </div>
      <div class="customised col p-0 cell-gray m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/white-circle-check.svg" alt="#">
      </div>
    </div>
    <!-- /.row text-center p-0 m-0 -->
    <div class="row p-0 m-0">
      <div class="col p-0 m-0 border_b">
      <div class="offset-block">
          <h4>Information About Family</h4>
          <p>Information about family members.</p>
      </div>
      </div>
      <div class="standard col p-0 cell-white-gray m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/dark-circle-cross.svg" alt="#">
      </div>
      <div class="standard col p-0 cell-lite-yellow m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/dark-circle-check.svg" alt="#">
      </div>
      <div class="customised col p-0 cell-gray m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/white-circle-check.svg" alt="#">
      </div>
    </div>
    <!-- /.row text-center p-0 m-0 -->
    <div class="row p-0 m-0">
      <div class="col p-0 m-0 border_b">
      <div class="offset-block">
          <h4>Achievement / Employment</h4>
          <p>Information about person’s achievements (education, degree, work, achievements in work, science, sports and other fields).</p>
      </div>
      </div>
      <div class="standard col p-0 cell-white-gray m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/dark-circle-cross.svg" alt="#">
      </div>
      <div class="standard col p-0 cell-lite-yellow m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/dark-circle-check.svg" alt="#">
      </div>
      <div class="customised col p-0 cell-gray m_4 t_center">
        <img src="<?php echo get_template_directory_uri(); ?>/static/img/create-memorial/icons/white-circle-check.svg" alt="#">
      </div>
    </div>
    <!-- /.row text-center p-0 m-0 -->

    <div class="row text-center p-0 m-0">
      <div class="offset-block-headedr"></div>
          <div class="free col m_4">
           <div class="price">
              <div class="price-wrapper">
                $00<div class="zero">.00</div>
                <span class="per">Per Month</span>
              </div> 
           </div>   
          </div>
          <div class="basic col m_4">
           <div class="price">
              <div class="price-wrapper">
                $10<div class="zero">.00</div>
                <span class="per">Per Month</span>
              </div> 
           </div>   
          </div>
          <div class="premium col m_4">
           <div class="price">
              <div class="price-wrapper">
                $50<div class="zero">.00</div>
                <span class="per">Per Month</span>
              </div> 
           </div> 
          </div>
      </div>
      <!-- /.row text-center p-0 m-0 -->
      <div class="row text-center p-0 m-0">
      <div class="offset-block-headedr"></div>
          <div class="view col m_4">
           <a href="#">View example<img class="arrow" src="<?php echo get_template_directory_uri(); ?>/static/img/about-us/icons/arrow-right.svg" alt="#"></a>   
          </div>
          <div class="view col m_4">
           <a href="#">View example<img class="arrow" src="<?php echo get_template_directory_uri(); ?>/static/img/about-us/icons/arrow-right.svg" alt="#"></a>   
          </div>
          <div class="view col m_4">
           <a href="#">View example<img class="arrow" src="<?php echo get_template_directory_uri(); ?>/static/img/about-us/icons/arrow-right.svg" alt="#"></a> 
          </div>
      </div>
      <!-- /.row text-center p-0 m-0 -->
      <div class="row text-center p-0 m-0">
      <div class="offset-block-headedr"></div>
          <div class="free-btn col cell-lite-gray m_4 t_center">
            <a href="#">Order now</a>
          </div>
          <div class="basic-btn col cell-yellow col m_4 t_center">
            <a href="#">Order now</a>
          </div>
          <div class="premium-btn col cell-dark-gray m_4 t_center">
            <a href="#">Order now</a>
          </div>
      </div>
      <!-- /.row text-center p-0 m-0 -->
  </div>
  <!-- /.container -->
</section>
<!-- /.create-our-memorials -->