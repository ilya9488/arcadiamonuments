<style>
    .home-page-first {
        background-image: url(<?php the_sub_field('image');?>);
    }

    @media (max-width: 600px) {
        .home-page-first {
            background-image: url(<?php the_sub_field('image');?>);
            padding-bottom: 120px;
        }
    }
</style>
<div class="home-page-first">

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-1"></div>

      <div class="col-md-6">

        <h1><?php the_sub_field('title'); ?></h1>

        <p class="page-first-text"><?php the_sub_field('subtitle'); ?></p>

        <a href="<?php the_sub_field('btn_link'); ?>"
           class="btn btn-light"><span><?php the_sub_field('btn_name'); ?></span></a>

      </div>

    </div>
  </div>

</div>
