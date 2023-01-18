<?php
  include get_template_directory() . '/controllers/parts/tree.php';

  $tree = new MemorialTree();
?>

<div class="container tab-pane fade" id="nav-family" role="tabpanel" aria-labelledby="nav-family-tab">
  <div class="family-tree" style="background-image: url(<?php echo get_template_directory_uri(); ?>/static/img/memorial/tree.png);">
    <div class="container-xl container-fluid">
      <div class="row">
        <div class="col-12 text-center"><h2><?php the_field('tree_title'); ?></h2></div>

        <div class="col-xl-6 col-lg-6 col-md-6 d-flex flex-wrap justify-content-center">
          <?= $tree->getBranch('grandfather_father'); ?>
          <?= $tree->getBranch('grandmother_father'); ?>
          <?= $tree->getBranch('father'); ?>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 d-flex flex-wrap justify-content-center">
          <?= $tree->getBranch('grandfather_mother'); ?>
          <?= $tree->getBranch('grandmother_mother'); ?>
          <?= $tree->getBranch('mother'); ?>
        </div>

        <div class="col-12 d-flex justify-content-center">
          <div class="family-member">
              <?php if (!empty($memorial_thumb)) :?>
                    <div class="img-wrap">
                      <img class="family-member"
                           src="<?= $memorial_thumb; ?>"
                           alt="<?php the_field('first_name'); ?>">
                    </div>
              <?php endif; ?>
            <h4 class="name"><?php the_field('first_name'); ?> <?php the_field('last_name') ?></h4>
            <div class="data"><?php the_field('date_1'); ?> — <?php the_field('date_2'); ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
