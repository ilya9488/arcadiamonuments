<section class="home-options">
  <div class="container">
    <div class="row">
      <div class="<?php if(get_sub_field('video_file') || get_sub_field('video_url')){ ?> col<?php } else{ ?> col-12 <?php } ?> mr-xl-0">
        <div class="options-wrapper">
            <?php the_sub_field('text'); ?>
          <a href="<?php the_sub_field('btn_url'); ?>"
             class="btn btn-light"><span><?php the_sub_field('btn_name'); ?></span></a>

        </div>
        <!-- /.options-wrapper -->
      </div>
      <!-- /.col -->
        <?php if(get_sub_field('video_file') || get_sub_field('video_url')){ ?>
        <div class="col-xl-6 d-flex justify-content-center">
          
          <div class="video-option" style="background-image: url(<?php the_sub_field('bg_img'); ?>">
            
          <button class="btn-video-option">
            <svg class="btn-pulse" viewBox="0 0 151 151" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle class="circle-1"  opacity="0.3" cx="75.5" cy="75.5" r="75"/>
              <circle class="circle-2" opacity="0.6" cx="75.5" cy="75.5" r="54.5" stroke-width="2"/>
              <circle class="circle-3"  cx="75.5" cy="75.5" r="35.5"/>
              <path class="path-play" d="M67.25 61.2106L92 75.5L67.25 89.7894L67.25 61.2106Z"/>
            </svg>
          </button>
        </div>
        <!-- /.video-option -->
      </div>         
      <!-- /.col-xl-6 -->
      <?php } ?>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
  <div id="modal-optons-video" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">

          <?php if(get_sub_field('video_file')){ ?>
            <video src="<?php  the_sub_field('video_file'); ?>" controls></video>
          <?php } ?>

          
            <?php if(get_sub_field('video_url')){ ?>
              <iframe src="<?= 'https://www.youtube.com/embed/' . str_replace("https://youtu.be/", "", get_sub_field('video_url')); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            
          <?php } ?>

        </div>
      </div>
    </div>
  </div>
  <script>
    // stop video 
    $(document).on('hide.bs.modal', function(e) {
      const $target = $(e.target);
      stopVideo($target)
    });
    function stopVideo ( element ) {
      var iframe = element.find( 'iframe');
      var video = element.find( 'video' );
      if ( iframe.is(":visible") ) {
        var iframeSrc = iframe.attr('src');
        iframe.attr('src', iframeSrc);
      }
      if ( video.is(":visible") ) {
        video.trigger('pause');
      }
    }
  </script>
</section>