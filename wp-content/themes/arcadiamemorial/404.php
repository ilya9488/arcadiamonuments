<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package arcadiamemorial
 */

get_header();
?>

	<main id="primary" class="site-main">
	
	<section class="breadcrumbs-content">
		<div class="container-fluid p-0 m-0">
			<div class="row text-center mx-0 px-0">
				<div class="col-12 mx-0 px-0">
					<div class="breadcrumbs-wr" style="background-image: url(<?php echo get_template_directory_uri(); ?>/static/img/bread-crumbs-bg.png);">
						<h1>404 Page</h1>
						<div class="breadcrumbs">
							<a href="<?php echo site_url(); ?>">Home </a>
							<span class="delimiter"> / </span>
							404
						</div>
					</div>
					<!-- /.breadcrumbs-wr -->
					</div>
					<!-- /.col-12 mx-0 px-0 -->
				</div>
				<!-- /.row text-center mx-0 px-0 -->
			</div>
			<!-- /.container-fluid p-0 m-0 -->
	</section>
	<!-- /.breadcrumbs-content -->

		<section class="oops-page">
			<div class="container">
				<div class="row">
					<div class="col-12 justify-content-xl-center">
						
						<div class="text-wrapper">
							<h2>Oops, Page Not Found</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris volutpat arcu felis eget fermentum erat eu. Sit massa nunc sapien sem lacinia maecenas elit ut vulputate.</p>
						</div>
						<!-- /.text-wrapper -->
						
						<div class="img-wrapper">
							<img src="<?php echo get_template_directory_uri(); ?>/static/img/404/404.png" alt="#">
						</div>
							<!-- /.img-wrapper -->

					<div class="go-home-btn">
						<a href="<?php echo site_url(); ?>">go home page</a>
					</div>
					<!-- /.go-home-btn -->
					</div>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container -->
		</section>
		<!-- /.oops-page -->

	</main><!-- #main -->

<?php
get_footer();
