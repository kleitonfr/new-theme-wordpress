<?php get_header(); ?>

<main id="main" role="main">

	<div id="page" class="container">

    <div class="row">

    	<div id="content" class="col-lg-9">

    		<?php get_template_part('template-parts/main/content/search', get_post_format()); ?>

    		<!-- Page Header -->

    		<h1 class="widget-title striped-detail__bottom striped-detail__modifier striped-detail__bt pt-0">
					<a class="bg-secondary text-white d-block widget-title__p-adjust ellipsis" href="<?php the_permalink(); ?>">
						<i class="far fa-check-square text-white"></i> <?php the_title();  ?>
					</a>
				</h1>

		    <div class="meta-tags py-3 d-flex text-uppercase">
		      <div class="d-inline-block ml-auto">
			      <span class="text-muted"><i class="fas fa-tags fa-fw"></i></span>
			      <?php get_page_categories(
			      													$post, 
			      													"badge badge__adjust badge-secondary", 
			      													"badge badge__adjust badge-light d-none d-md-inline-block"); ?>
					</div>
		    </div>

				<!-- ### BEGIN - Featured News - Page ### -->

				<?php 

					if (have_posts()) :

						while (have_posts()) :

							the_post();

							$post_thumbnail_title = get_post(get_post_thumbnail_id())->post_title;
				?>

				<div id="featuredNews__Page">

				  <div class="card image-zoom-effect">
				  	
				  	<?php if (has_post_thumbnail()): ?>

					  	<div class="image-zoom-effect__box">

				        <img 
				          class="card-img-top" 
				          src="<?php the_post_thumbnail_url('single'); ?>" 
				          alt="<?php echo $post_thumbnail_title; ?>" 
				          title="<?php echo $post_thumbnail_title; ?>">

					  	</div>

				  	<?php endif; ?>

				    <div class="card-body">
				      <h5 class="card-title">
				      	<a class="text-primary" href="<?php the_permalink(); ?>">
				      		<?php the_title();  ?>
				      	</a>
				      </h5>
				      <div class="card-text position-relative">
				      	<?php the_content(); ?>
				      </div>
				    </div>
				    <div class="card-footer">
				    	<span class="text-muted"><i class="fas fa-tags fa-fw"></i></span>
				    	<?php get_page_categories(
				      													$post, 
				      													"text-secondary", 
				      													"text-muted"); ?>
				    </div>
				  </div>

				</div>

				<?php 

						endwhile;

					endif;

				?>

				<!-- ### END - Featured News Categories ### -->

				<?php get_template_part('template-parts/main/content/banners-carousel', get_post_format()); ?>

    	</div>

    	<div id="sidebar" class="col-lg-3">

    		<?php get_template_part('bars/sidebar', get_post_format()); ?>

    	</div>

    </div>

	</div>

</main>

<?php get_footer(); ?>