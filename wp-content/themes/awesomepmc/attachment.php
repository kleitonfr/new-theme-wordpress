<?php get_header(); ?>

<main id="main" role="main">

	<div id="single" class="container">

    <div class="row">

    	<div id="content" class="col-lg-9">

    		<?php get_template_part('template-parts/main/content/search', get_post_format()); ?>

    		<!-- Breadcrumb -->

    		<?php echo breadcrumb() ?>

    		<!-- Page Header -->

    		<?php

		      if (have_posts()) :

		    ?>

    		<h1 class="widget-title striped-detail__bottom striped-detail__modifier striped-detail__mb">
					<a class="text-secondary" href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h1>

		    <div class="meta-tags py-3 border-bottom d-flex text-uppercase">
		    	<div class="created-at d-inline-block">
		      	<span class="text-muted">
		      		<i class="fas fa-calendar-alt"></i> 
		      		<small>Publicado em: <?php echo get_the_date('d/m/Y'); ?></small>
		      	</span>
		      </div>
		    </div>

		    <div class="share-buttons">
			    <div 
			    	class="fb-share-button" 
			    	data-href="<?php get_permalink() ?>" 
			    	data-layout="button_count" 
			    	data-size="small" 
			    	data-mobile-iframe="true"></div>

			    <a 
			    	class="twitter-share-button" 
			    	href="https://twitter.com/share" 
			    	data-url="<?php get_permalink() ?>" 
			    	data-text="<?php get_the_title(); ?>" 
			    	data-via="caraguaoficial"></a>
		    </div>

				<!-- ### BEGIN - Featured News - Single ### -->

				<div id="post__Attachment">

					<div class="card-deck mb-3">

					  <div class="card image-zoom-effect">
					  	
					    <div class="card-body">
					      <h5 class="card-title">
					      	<a class="text-primary" href="#">
					      		<?php the_title(); ?>
					      	</a>
					      </h5>
					      <div class="card-text position-relative text-center">

					      	<?php echo wp_get_attachment_image( get_the_ID(), 'large' ); ?>

					      	<?php // the_content(); ?>

					      	<small class="d-block mt-2 text-left text-uppercase" style="font-family: Oswald,sans-serif;"> 

					      		<span class="text-muted"><i class="fas fa-download fa-2x"></i> Downloads:</span>

										<?php

											$images = array();

											// $image_sizes = get_intermediate_image_sizes();

											// array_unshift( $image_sizes, 'full' );

											$image_sizes = array( 'thumbnail', 'medium', 'large', 'full' );

											foreach($image_sizes as $image_size) {

												$image    = wp_get_attachment_image_src( get_the_ID(), $image_size );

												$name     = $image_size . ' (' . $image[1] . 'x' . $image[2] . ')';

												$images[] = '<a href="' . $image[0] . '">' . $name . '</a>';
											}

											echo implode( ' | ', $images );
										?>

									</small>

					      </div>
					    </div>
					    <div class="card-footer">
						    <div 
						    	class="fb-share-button" 
						    	data-href="<?php get_permalink() ?>" 
						    	data-layout="button_count" 
						    	data-size="small" 
						    	data-mobile-iframe="true"></div>

						    <a 
						    	class="twitter-share-button" 
						    	href="https://twitter.com/share" 
						    	data-url="<?php get_permalink() ?>" 
						    	data-text="<?php get_the_title(); ?>" 
						    	data-via="caraguaoficial"></a>
					    </div>
					  </div>

					</div>

				</div>

				<?php

		      endif;

		    ?>

				<!-- ### END - Featured News Single ### -->

				<?php get_template_part('template-parts/main/content/banners-carousel', get_post_format()); ?>

    	</div>

    	<div id="sidebar" class="col-lg-3">

    		<?php get_template_part('bars/sidebar', get_post_format()); ?>

    	</div>

    </div>

	</div>

</main>

<?php get_footer(); ?>