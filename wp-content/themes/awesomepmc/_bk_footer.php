		<footer id="footer" role="footer">

			<!-- ### BEGIN - Info ### -->

			<div id="info" class="bg-secondary py-5">

				<div class="container">

    			<div class="row">

    				<!-- ### Logo ### -->

    				<?php get_template_part('template-parts/footer/info/logo', get_post_format()); ?>

    				<!-- ### Social Network ### -->

    				<?php get_template_part('template-parts/footer/info/social-network', get_post_format()); ?>

    				<!-- ### Newsletter ### -->

    				<?php // get_template_part('template-parts/footer/info/newsletter', get_post_format()); ?>

    			</div>
    		</div>
  		</div>

  		<!-- ### END - Info ### -->

  		<!-- ### BEGIN - Details ### -->

  		<div id="details" class="bg-primary striped-detail__top striped-detail__modifier">

  			<div class="container">

    			<div class="row py-2 text-white small">

    				<!-- ### Address ### -->

						<?php get_template_part('template-parts/footer/details/address', get_post_format()); ?>

    				<!-- ### Developed ### -->

    				<?php get_template_part('template-parts/footer/details/developed', get_post_format()); ?>

    			</div>

    		</div>

  		</div>

  		<!-- ### END - Details ### -->

		</footer>

    <!-- Accessibility Tools -->

    <?php get_template_part('template-parts/tools/accessibility', get_post_format()); ?>

    <!-- Scroll to Top Button -->

    <?php get_template_part('template-parts/tools/scroll-to-top', get_post_format()); ?>

    <!-- Social Network Plugins -->

    <?php get_template_part('template-parts/tools/social-network', get_post_format()); ?>

	  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="<?php echo get_template_directory_uri(); ?>/vendor/jquery/jquery-3.3.1.min.js"></script>

		<script src="<?php echo get_template_directory_uri(); ?>/vendor/jquery/popper.min.js"></script>

		<script src="<?php echo get_template_directory_uri(); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>

		<script src="<?php echo get_template_directory_uri(); ?>/vendor/jquery/jquery.easing.min.js"></script>

		<script src="<?php echo get_template_directory_uri(); ?>/vendor/fancybox/jquery.fancybox.min.js"></script>

		<script src="<?php echo get_template_directory_uri(); ?>/assets/js/scroll-to-top.js"></script>

		<script src="<?php echo get_template_directory_uri(); ?>/assets/js/remove-class-regex.js"></script>

		<script src="<?php echo get_template_directory_uri(); ?>/assets/js/pmc-cookies.js"></script>

		<script src="<?php echo get_template_directory_uri(); ?>/assets/js/pmc-accessibility.js"></script>

		<?php if (is_home()) : ?>

			<script src="<?php echo get_template_directory_uri(); ?>/assets/js/pmc-tiles.js"></script>

			<script src="<?php echo get_template_directory_uri(); ?>/assets/js/pmc-flickr.js"></script>

		<?php endif; ?>

		<script type="text/javascript">

			$( document ).ready(function() {

				$('[data-toggle="popover"]').popover();

				$('[data-toggle="tooltip"]').tooltip();

      	var accessibility = new Prefeitura.Accessibility();

				accessibility.initialize();

			});

		</script>

		<?php if (is_page() || is_single()) : ?>

			<script type="text/javascript">

				$( document ).ready(function() {

					$('.gallery').each(function(index) {
				  
				  if ($(this).children('.gallery-item').length < 5) {

					  	$(this).css('column-count', 2);

					  	$(this).children('.gallery-item').children('.gallery-icon.landscape').children('a').css('max-height', '200px');
					  }
					});

				});

			</script>

		<?php endif; ?>

		<?php if (is_home()) : ?>

			<script type="text/javascript">

				$( document ).ready(function() {

					// FLICKR
				    
				  var Flickr = new Prefeitura.Flickr();
	          
	      	Flickr.initialize();

				});

			</script>

		<?php endif; ?>

		<!-- Analytics Tracking -->

    <?php get_template_part('template-parts/tools/analytics-tracking', get_post_format()); ?>

		<?php wp_footer(); ?>
		
	</body>
</html>