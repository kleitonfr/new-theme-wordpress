<?php get_header(); ?>

<main id="main" role="main">

	<div id="index" class="container">

		<div class="row">

			<div id="content" class="col-lg-9">

				<?php get_template_part('template-parts/main/content/search', get_post_format()); ?>

				<?php get_template_part('template-parts/main/content/featured-news-carousel', get_post_format()); ?>

				<?php get_template_part('template-parts/main/content/featured-news', get_post_format()); ?>

				<?php get_template_part('template-parts/main/content/banners-carousel', get_post_format()); ?>

				<?php get_template_part('template-parts/main/content/latest-news', get_post_format()); ?>

			</div>

			<div id="sidebar" class="col-lg-3">

				<?php get_template_part('bars/sidebar', get_post_format()); ?>

			</div>

		</div>

		<div class="row">

			<div id="utilities" class="col-sm-12">

				<?php get_template_part('template-parts/main/utilities/projects-and-programs', get_post_format()); ?>

			</div>

		</div>

		<div class="row">

			<div id="mediasFlickr" class="col-sm-12 col-md-12 col-lg-6">

				<?php get_template_part('template-parts/main/medias/photo-gallery', get_post_format()); ?>

			</div>

			<div id="mediasYoutube" class="col-sm-12 col-md-12 col-lg-6">

				<?php get_template_part('template-parts/main/medias/video-gallery', get_post_format()); ?>

			</div>



		</div>

		<hr id="mediasBottom">

		<div class="row">

			<div id="resourcesGovernment" class="col-sm-12 col-md-12 col-lg-9">

				<?php get_template_part('template-parts/main/resources/municipal-government', get_post_format()); ?>

			</div>

			<div id="resourcesUseful" class="col-sm-12 col-md-12 col-lg-3">

				<?php get_template_part('template-parts/main/resources/banner', get_post_format()); ?>

				<?php get_template_part('template-parts/main/resources/useful-phones', get_post_format()); ?>

			</div>

		</div>

	</div>

</main>

<?php get_footer(); ?>