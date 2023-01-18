<section class="home-counter">
  <div class="container">
		<div class="row">
			<div class="col-12">
				<div class="counter-wrapper"
								style="background-image: url(<?php echo get_template_directory_uri(); ?>/static/img/map.png);">

						<div class="row align-items-center">
							<div class="col-xl-6">
								<h2 class="p-0 m-0">
										<?php the_sub_field('title'); ?>
								</h2>
							</div>
								<!-- /.col-md-6 -->
							<div class="col-xl-6 text-center mt-5 mt-xl-0 p-0">

									<div id="counter">
										<div data-module="ui/Demo" class="tick-wrapper" data-processed="true"
														data-initialized="ui/Demo">
											<div class="tick" data-value="2734" data-did-init="setupFlip">
												<div data-repeat="true" aria-hidden="true">
													<span data-view="flip"></span>
												</div>
											</div>
										</div>
									</div>

								<script>
									function getRandomNum(min, max) {
											return Math.ceil(Math.random() * (max - min) + min);
									}

									<?php $show_real_count = get_field('show_real_count', 'options');

									if ($show_real_count) :?>
											function setupFlip(tick) {
											let currentMemorial = <?= wp_count_posts('memorials')->publish ?>;
											Tick.helper.interval(function () {
													// tick.value = tick.value + getRandomNum(1, 5);
													tick.value = currentMemorial;
													tick.root.setAttribute('aria-label', tick.value);
											}, 2500);
											setInterval(function () {
													//ajax
													let newCountMemorial = currentMemorial
													$.ajax({
															type: 'POST',
															url: '<?php echo admin_url('admin-ajax.php');?>',
															dataType: "json", // add data type
															data: {action: 'get_ajax_posts'},
															success: function (response) {
																	newCountMemorial = response;
															}
													});
													tick.value = newCountMemorial;
													tick.root.setAttribute('aria-label', tick.value);
											}, 2000)
									}
								<?php else: ?>
										function setupFlip(tick) {
												Tick.helper.interval(function () {
														tick.value = tick.value + getRandomNum(1, 5);
														tick.root.setAttribute('aria-label', tick.value);
												}, 2500);
												// setInterval(function () {
												//     //ajax
												//     tick.value = 5000;
												//     tick.root.setAttribute('aria-label', tick.value);
												// }, 2000)
										}
								<?php endif; ?>
							</script>

						</div>
						<!-- /.col-md-6 -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.counter-wrapper -->
			</div>
			<!-- /.col-12 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
</section>
<!-- /.home-counter -->