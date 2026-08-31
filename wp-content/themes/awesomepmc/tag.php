<?php get_header(); ?>

<?php $tag = get_term_by('slug', 'destaques', 'post_tag'); ?>

<main id="main" role="main">

	<div id="tags" class="container">

    <div class="row">

    	<div id="content" class="col-lg-9">

    		<?php get_template_part('template-parts/main/content/search', get_post_format()); ?>

    		<!-- Breadcrumb -->

    		<?php echo breadcrumb() ?>

    		<!-- Page Header -->

    		<h1 class="widget-title striped-detail__bottom striped-detail__modifier striped-detail__bt mb-4">
					<a class="text-secondary" href="<?php echo get_tag_link($tag->term_id); ?>">
						<i class="fas fa-tags"></i> Tags 
						<span class="badge badge-muted"><?php echo esc_html($tag->name); ?></span>
					</a>
				</h1>

				<?php get_template_part('template-parts/main/content/banners-carousel', get_post_format()); ?>

				<!-- ### BEGIN - Latest News ### -->

				<div id="latestNews">
					<h2 class="widget-title pt-0 striped-detail__bottom striped-detail__modifier striped-detail__bt">
						<a class="text-secondary" href="<?php echo get_tag_link($tag->term_id); ?>">
							<i class="fas fa-list-ol"></i> Últimas Adicionadas
						</a>
					</h2>

					<?php

			      if (have_posts()) :

			        while (have_posts()) :

			          the_post();

			          $post_thumbnail_title = get_post(get_post_thumbnail_id())->post_title;

			          $categories = get_the_category();

			          $featured = get_tag_featured();

			    ?>

					<div class="row mx-sm-0">

						<div class="col-sm-5 col-md-4 col-lg-4 col-xl-3 pl-sm-0">

							<?php if (has_post_thumbnail()) : ?>

				        <img 
				          class="img-fluid img-thumbnail mx-auto d-block" 
				          src="<?php the_post_thumbnail_url('latest'); ?>" 
				          alt="<?php echo $post_thumbnail_title; ?>" 
				          title="<?php echo $post_thumbnail_title; ?>">

				        <?php if ($featured['ID'] > 0) : ?>

				        	<span class="badge badge-info badge__featured"><?php echo $featured['name']; ?></span>

				        <?php endif; ?>

				      <?php endif; ?>

						</div>

						<div class="col-sm-7 col-md-8 col-lg-8 col-xl-9 px-sm-0">
							<h5 class="ellipsis ellipsis__modifier">
								<a class="text-primary" href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h5>
							<div class="news-text position-relative mb-2">

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

		        	endwhile;

		      	endif;

		    	?>

		    	<?php

	          global $wp_query;
	         
	          $big = 999999999; // need an unlikely integer

	          echo bootstrap_pagination(array(
		          'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
		          'format' => '?paged=%#%',
		          'prev_text' => __('Anterior'),
		          'next_text' => __('Próximo'),
		          'current' => max(1, get_query_var('paged')),
		          'total' => $wp_query->max_num_pages,
		          'end_size' => 1,
		          'mid_size' => 4, // 2 numbers before/after the current page
	          ));

	        ?>

				</div>

				<!-- ### END - Latest News ### -->

    	</div>

    	<div id="sidebar" class="col-lg-3">

    		<?php get_template_part('bars/sidebar', get_post_format()); ?>

    	</div>

    </div>

	</div>

</main>

<?php get_footer(); ?>