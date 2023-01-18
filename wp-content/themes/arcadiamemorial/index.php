<?php
  /**
   * The main template file
   *
   * This is the most generic template file in a WordPress theme
   * and one of the two required files for a theme (the other being style.css).
   * It is used to display a page when nothing more specific matches a query.
   * E.g., it puts together the home page when no home.php file exists.
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package arcadiamemorial
   */

  get_header();
?>
  <div id="page" class="site">
  <main id="primary" class="site-main">
    <?php if (have_rows('screens')):
      while (have_rows("screens")) : the_row();
        $row_layout = get_row_layout();
        if ($row_layout != "preset_screen"):
          get_template_part('acf-layouts/' . $row_layout);
        endif;
      endwhile;
    else :
      if (have_posts()) {
        while (have_posts()) {
          the_post(); ?>
          <div class="content-page">
            <div class="container">
              <?php echo the_content(); ?>
            </div>
          </div>
        <?php }
      }
    endif;
    ?>
  </main><!-- #site-main -->

<?php
//get_sidebar();
  get_footer();
