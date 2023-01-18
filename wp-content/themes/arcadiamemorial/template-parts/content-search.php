<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package arcadiamemorial
 */

  $post_id = get_the_ID();
?>

    <a href="<?= get_post_permalink($post_id) ?>" class="col-12 border-last">
      <div class="result-content d-flex align-content-start">

        <div class="result-img">
          <?= wp_get_attachment_image(get_field('photo', $post_id), 'memorial-photo'); ?>
        </div>
        <!-- /.result-img -->
        <div class="result-text">
          <h4><?= get_field('first_name', $post_id) . ' ' . get_field('last_name', $post_id) ?></h4>
            <p class="date"><?= get_field('date_1', $post_id); ?> — <?= get_field('date_2', $post_id); ?></p>
            <?php if(false){ ?>
              <p class="city">San Francisco</p>
            <?php } ?>
            <p class="info"><?= mb_strimwidth(get_field('biography', $post_id), 0, 120, "...") ?></p>
        </div>
        <!-- /.result-text -->
      </div>
      <!-- /.result-content -->
    </a>
    <!-- /.col-12 border-last -->
