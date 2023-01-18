<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package arcadiamemorial
 */

get_header();
?>


<div id="page" class="site"> 
	<main id="primary" class="site-main"> 

		<section class="breadcrumbs-content">
			<div class="container-fluid p-0 m-0">
				<div class="row text-center mx-0 px-0">
					<div class="col-12 mx-0 px-0">
						<div class="breadcrumbs-wr" style="background-image: url(<?php echo get_template_directory_uri(); ?>/static/img/bread-crumbs-bg.png);">
							<h1>Search Result</h1>
							<div class="breadcrumbs">
										<a href="<?php echo site_url(); ?>">Home</a>
										<span class="delimiter"> / </span>
										Search Result
							</div>
							<!-- /.breadcrumbs -->
						</div>
						<!-- /.breadcrumbs-wr -->
						</div>
						<!-- /.col-12 -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid -->
			</section>
			<!-- /.breadcrumbs-content -->
		


<section class="search-result">
  <div class="container">
    <div class="row">
      <div class="col-12 d-flex justify-content-center align-items-center">

        <div class="your-search">
          <p>Your search has returned
						<b> <?php if( is_search() && get_post_type() == "memorials" ){ global $wp_query; echo $wp_query->found_posts; }else echo '0'; ?> </b>
						 results</p>
						 <?php // var_dump($wp_query) ?>
						 <!-- .post_type IN ('post', 'page', 'attachment', 'memorials') -->
        </div>
				
      </div>
      <!-- /.col-12 d-flex justify-content-center align-items-center -->
         
				<?php if ( have_posts() && get_post_type() == "memorials") : ?>

			<?php
			
			// / Start the Loop /
					while ( have_posts() ) :
						the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

					endwhile;

					// the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>

    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</section>



</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
