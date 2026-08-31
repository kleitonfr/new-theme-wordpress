<?php get_header(); ?>

<?php

	$categories = get_the_category();

	$featured = get_tag_featured();

	$parent = 0;

	foreach ($categories as $category) {

		if (count($categories) > 0) {

			if ($category->parent === 0) 
				$parent = $category->term_id;
			else 
				$parent = $category->parent;
		}
	}

	$category = get_category($parent);

?>

<main id="main" role="main">

	<div id="single" class="container">

    <div class="row">

    	<div id="content" class="col-lg-9">

    		<?php get_template_part('template-parts/main/content/search', get_post_format()); ?>

    		<!-- Breadcrumb -->

    		<?php echo breadcrumb($categories) ?>

    		<!-- Page Header -->

    		<?php

		      if (have_posts()) :

		        while (have_posts()) :

		          the_post();

		          $post_thumbnail_title = get_post(get_post_thumbnail_id())->post_title;

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

		      <?php if ($post->post_type !== 'videos') : ?>

			      <div class="d-inline-block ml-auto">

				      <span class="text-muted"><i class="fas fa-tags fa-fw"></i></span>

				      <?php 

								get_post_categories(
									$post, 
									"badge badge__adjust badge-secondary ellipsis align-text-bottom", 
									"badge badge__adjust badge-light d-sm-none d-md-inline-block ellipsis align-text-bottom"
								); 
								
							?>

						</div>

					<?php endif; ?>

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

				<div id="featuredNews__Single">

					<div class="card-deck">

					  <div class="card image-zoom-effect">

					  	<?php if ($featured['ID'] > 0) : ?>

			        	<span class="badge badge-info badge__overlay">
						  		<a class="text-secondary" href="<?php echo get_tag_link($featured['ID']); ?>">
						  			<?php echo esc_html($featured['name']); ?>
						  		</a>
						  	</span>

			        <?php endif; ?>

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
					      	<a class="text-primary" href="#">
					      		<?php the_title(); ?>
					      	</a>
					      </h5>


					      


					      <div class="card-text position-relative">

					      	<?php if ($post->post_type === 'videos') : ?>

					      		<?php get_video(); ?>

									<?php else : ?>
										
										<?php the_content(); ?>

										<?php if (in_category( 'ods' )) : ?>

										

											<div class="container">
											  <div class="row align-itens-center">
											    <div class="col-md-12 mx-auto text-center">
											      <a href="https://odsbrasil.gov.br/"><img class="logo-ods" src="https://www.caraguatatuba.sp.gov.br/pmc/wp-content/uploads/2024/04/materia_comprometida_ods.png" alt="Logo Oficial ODS" width="600px" height="70px"></a>
											    </div> 
											  </div>
											</div>
										<?php endif;?>

										

									<?php endif; ?>

					      </div>

					      <?php if ($post->post_type !== 'videos') : ?>

					      	<div class="mt-1 d-inline-block">

							      <span class="text-muted"><i class="fas fa-tags fa-fw"></i></span>

							      <?php get_post_categories($post, "text-secondary", "text-muted"); ?>
										
									</div>

								<?php endif; ?>

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

					<?php

						$category_plus_link = esc_url(get_category_link($parent));
						$category_plus_link_target = "_self";
						$category_plus_label = null;

						if ($category)
							$category_plus_label = $category->name;

						if ($post->post_type === 'videos') {

							$category_plus_link = "https://www.youtube.com/channel/UCH84Ukn-PabhE7vhXxhPUDw";
							$category_plus_link_target = "_blank";
							$category_plus_label = "Vídeos";
						}

					?>

					<a 
						class="link-plus text-secondary text-uppercase text-right d-block w-100 pb-3 ellipsis" 
						href="<?php echo $category_plus_link; ?>" 
						target="<?php echo $category_plus_link_target; ?>">
						<i class="fas fa-plus-circle fa-2x mt-2 text-default"></i> 
						<span class="align-text-top">Mais <?php echo $category_plus_label; ?></span>
					</a>

				</div>

				<?php

		        endwhile;

		      endif;

		    ?>

				<!-- ### END - Featured News Single ### -->

				<?php get_template_part('template-parts/main/content/banners-carousel', get_post_format()); ?>

				<!-- ### BEGIN - Latest News ### -->

				<?php

				  $posts = get_lastest_posts('noticias', 5, false, false, array(), true);

				  if ($posts) :

				?>

				<div id="latestNews" class="mb-3">
					<h2 class="widget-title pt-0 striped-detail__bottom striped-detail__modifier striped-detail__bt">
						<a class="text-secondary" href="<?php echo esc_url(get_category_link(2)); ?>">
							<i class="fab fa-readme"></i> Veja Também
							<span class="badge badge-muted">Recentes</span>
						</a>
					</h2>

					<?php

				    foreach ($posts as $key => $post) : 

				      setup_postdata($post);

				      $post_thumbnail_title = get_post(get_post_thumbnail_id())->post_title;

				      $categories = get_the_category();

				  ?>

					<div class="row mx-sm-0">
						<div class="col-sm-5 col-md-4 col-lg-4 col-xl-3 pl-sm-0">

							<?php if (has_post_thumbnail()): ?>

				        <img 
				          class="img-fluid img-thumbnail mx-auto d-block" 
				          src="<?php the_post_thumbnail_url('latest'); ?>" 
				          alt="<?php echo $post_thumbnail_title; ?>" 
				          title="<?php echo $post_thumbnail_title; ?>">

				      <?php endif; ?>

						</div>
						<div class="col-sm-7 col-md-8 col-lg-8 col-xl-9 px-sm-0">
							<h5 class="ellipsis ellipsis__modifier">
								<a class="text-primary" href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h5>
							<div class="news-text position-relative">

								<?php the_excerpt(); ?>

								<span class="read-more-shadow"></span>

							</div>

							<a class="btn btn-sm btn-secondary float-right" href="<?php the_permalink(); ?>">Leia Mais</a>

							<span class="text-muted"><i class="fas fa-tags fa-fw"></i></span>

							<?php 

								get_post_categories($post, 
																		"badge badge__adjust badge-secondary", 
																		"badge badge__adjust badge-light d-sm-none d-md-inline-block"); 

							?>

							<span class="created-at d-block text-muted">
								<i class="fas fa-calendar-alt fa-lg"></i> Publicado em <?php echo get_the_date('d/m/Y'); ?>
							</span>
						</div>
					</div>

					<?php

				    endforeach;

				  ?>

				</div>

				<?php

				  endif;

				  wp_reset_postdata();

				?>

				<!-- ### END - Latest News ### -->

    	</div>

    	<div id="sidebar" class="col-lg-3">

    		<?php get_template_part('bars/sidebar', get_post_format()); ?>

    	</div>

    </div>

	</div>

</main>

<?php get_footer(); ?>