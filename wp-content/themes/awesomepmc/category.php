<?php get_header(); ?>

<?php

	$posts_id = array();
	
	$categories = get_the_category();

	$tag = get_term_by('name', 'destaques', 'post_tag');

	//$categories_id = array_map(create_function('$c', 'return $c->term_id;'), $categories);
	$categories_id = array_map(function($c){return $c->term_id;} , $categories);

	$current_category = get_query_var("cat");

	$category = get_category($current_category);

	$is_subcategory = is_subcategory();

	if ($is_subcategory) {

		$category = get_category(get_category($current_category)->parent);

		$subcategory = get_category($current_category);

		$breadcrumb_parts [] = $category;
		$breadcrumb_parts [] = $subcategory;

	} else {

		$breadcrumb_parts [] = $category;
	}

?>

<main id="main" role="main">

	<div id="categories" class="container">

    <div class="row">

    	<div id="content" class="col-lg-9">

    		<?php get_template_part('template-parts/main/content/search', get_post_format()); ?>

    		<!-- Breadcrumb -->

    		<?php echo breadcrumb($breadcrumb_parts) ?>

    		<!-- Page Header -->

    		<h1 class="widget-title striped-detail__bottom striped-detail__modifier striped-detail__bt">
					<a class="text-secondary" href="<?php echo esc_url(get_category_link($category->term_id)) ?>">
						<i class="fas fa-tags"></i> Categorias 
						<span class="badge badge-muted ellipsis"><?php echo esc_html($category->name); ?></span>
					</a>
				</h1>

				<?php if (is_subcategory()) : ?>

				<h2 class="widget-title pt-2 pb-1 border-bottom">
					<a 
						class="text-secondary pl-5 d-block ellipsis" 
						href="<?php echo esc_url(get_category_link($subcategory->term_id)) ?>">
						<i class="fas fa-level-down-alt align-text-top"></i> Subcategoria: 
						<span class="text-muted"><?php echo esc_html($subcategory->name); ?></span>
					</a>
				</h2>

				<?php endif; ?>

				<?php if (have_posts()) : ?>

				<!-- ### BEGIN - Featured News - Categories ### -->

				<?php

					if (in_category('noticias')) :

						if (is_subcategory())
					  	$posts = get_lastest_posts(null, 2, true, false, $categories_id);

						if (!is_subcategory())
					  	$posts = get_lastest_posts($category->slug, 2, true, false);

					  if ($posts) :

					  	$posts_id = array_map(create_function('$p', 'return $p->ID;'), $posts);

				?>

				<div id="featuredNews__Categories">
					<h2 class="widget-title striped-detail__bottom striped-detail__modifier striped-detail__bt">
						<a class="text-secondary" href="<?php echo get_tag_link($tag->term_id); ?>">
							<i class="fas fa-fire"></i> <?php echo esc_html($category->name); ?> em Destaque
						</a>
					</h2>

					<div class="card-deck">

						<?php

				      foreach ($posts as $key => $post) : 

				        setup_postdata($post);

				        $post_thumbnail_title = get_post(get_post_thumbnail_id())->post_title;

				        if ($key === 0) :

				    ?>

					  <div class="card image-zoom-effect">
					    <div class="card-body">
					      <h5 class="card-title">
					      	<a class="text-primary" href="<?php the_permalink(); ?>">
					      		<?php the_title(); ?>
					      	</a>
					    	</h5>
					      <p class="card-text position-relative mb-2">
					      	<?php echo strip_tags(custom_excerpt(40)); ?>
					      </p>
					      <small class="d-block mb-3 text-muted">Publicado em: <?php echo get_the_date('d/m/Y'); ?></small>
					      <a 
					      	class="float-right mt-1 text-muted" 
					      	href="<?php echo esc_url(get_category_link($categories[0]->term_id)) ?>">
				      		<i class="fas fa-tags"></i> <small><?php echo esc_html($categories[0]->name); ?></small>
				      	</a>
					      <a class="btn btn-sm btn-secondary" href="<?php the_permalink(); ?>">Leia Mais</a>
					    </div>

					    <?php if (has_post_thumbnail()) : ?>

						    <div class="image-zoom-effect__box">

					        <img 
					          class="card-img-bottom" 
					          src="<?php the_post_thumbnail_url('card'); ?>" 
					          alt="<?php echo $post_thumbnail_title; ?>" 
					          title="<?php echo $post_thumbnail_title; ?>">

						    </div>

					    <?php endif; ?>

					  </div>

					  <?php

					  		endif;

					  		if ($key === 1) :

					  ?>

					  <div class="card image-zoom-effect">

					  	<?php if (has_post_thumbnail()) : ?>

					  		<div class="image-zoom-effect__box">

					        <img 
					          class="card-img-top" 
					          src="<?php the_post_thumbnail_url('card'); ?>" 
					          alt="<?php echo $post_thumbnail_title; ?>" 
					          title="<?php echo $post_thumbnail_title; ?>">

					  		</div>

					  	<?php endif; ?>
					  	
					    <div class="card-body">
					      <h5 class="card-title">
					      	<a class="text-primary" href="<?php the_permalink(); ?>">
					      		<?php the_title(); ?>
					      	</a>
					      </h5>
					      <p class="card-text position-relative">
					      	<?php echo strip_tags(custom_excerpt(40)); ?>
					      </p>
					      <a 
					      	class="float-right mt-1 text-muted" 
					      	href="<?php echo esc_url(get_category_link($categories[0]->term_id)) ?>">
				      		<i class="fas fa-tags"></i> <small><?php echo esc_html($categories[0]->name); ?></small>
				      	</a>
					      <a class="btn btn-sm btn-secondary" href="<?php the_permalink(); ?>">Leia Mais</a>
					    </div>
					    <div class="card-footer">
					      <small class="text-muted">Publicado em: <?php echo get_the_date('d/m/Y'); ?></small>
					    </div>
					  </div>

					  <?php

					  		endif;

					  	endforeach;

					  ?>

					</div>

					<a 
						class="link-plus text-secondary text-uppercase text-right d-block w-100 pb-3" 
						href="<?php echo get_tag_link($tag->term_id); ?>">
						<i class="fas fa-plus-circle fa-2x mt-2 text-default"></i> 
						<span class="align-text-top">Mais Destaques</span>
					</a>

				</div>

				<?php

						endif;

						wp_reset_postdata();

					endif;

				?>

				<!-- ### END - Featured News Categories ### -->

				<?php if (in_category('noticias')) : ?>

				<?php get_template_part('template-parts/main/content/banners-carousel', get_post_format()); ?>

				<?php endif; ?>

				<!-- ### BEGIN - Latest News ### -->

				<div id="latestNews" <?php echo (in_category('noticias')) ? null : 'class="mt-3"'; ?>>
					<h2 class="widget-title pt-0 striped-detail__bottom striped-detail__modifier striped-detail__bt">
						<a class="text-secondary" href="<?php echo esc_url(get_category_link($category->term_id)) ?>">
							<i class="fas fa-list-ol"></i> Últimas Adicionadas
						</a>
					</h2>

					<?php

						if (is_subcategory())
							$args = array('category__and' => $categories_id, 'post__not_in' => $posts_id); 

						if (!is_subcategory())
							$args = array('cat' => get_query_var('cat'), 'post__not_in' => $posts_id);

						$paged = get_query_var('paged');

						if ($paged > 0)
							$args['paged'] = $paged;

						query_posts($args);

			      if (have_posts()) :

			        while (have_posts()) :

			          the_post();

			          $post_thumbnail_title = get_post(get_post_thumbnail_id())->post_title;

			          $categories = get_the_category();

			          $featured = get_tag_featured();

			    ?>

					<div class="row mx-sm-0">

						<?php if (in_category('noticias') || is_ancestor_of($categories) || in_category('vagas-pat')) : ?>

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

						<?php endif; ?>

						<?php 

							$col_class = 'col-sm-7 col-md-8 col-lg-8 col-xl-9'; 

							if (in_category('licitacao')) $col_class = 'col-sm-12';

						?>

						<div class="<?php echo $col_class; ?> px-sm-0">
							<h5 class="ellipsis ellipsis__modifier">
								<a class="text-primary" href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h5>
							<div class="news-text position-relative mb-2">
								<?php

									if (in_category('noticias') || 
											is_ancestor_of($categories) || 
											in_category('licitacao') || 
											in_category('vagas-pat')) : the_excerpt();

									else : the_content();

									endif;

								?>

								<?php if (in_category('noticias') || 
													is_ancestor_of($categories) || 
													in_category('licitacao') || 
													in_category('vagas-pat')) : ?>

									<span class="read-more-shadow"></span>

								<?php endif; ?>
							</div>

							<?php if (in_category('noticias') || 
												is_ancestor_of($categories) || 
												in_category('licitacao') || 
												in_category('vagas-pat')) : ?>

								<a class="btn btn-sm btn-secondary float-right" href="<?php the_permalink(); ?>">Leia Mais</a>
							
							<?php endif; ?>

							<span class="text-muted"><i class="fas fa-tags fa-fw"></i></span>

							<?php 

								get_post_categories($post, 
																		"badge badge__adjust badge-secondary", 
																		"badge badge__adjust badge-light d-sm-none d-md-inline-block", 
																		$is_subcategory, 
																		$current_category); 

							?>

							<span class="created-at d-block text-muted">
								<i class="fas fa-calendar-alt fa-lg"></i> Publicado em <?php echo get_the_date('d/m/Y'); ?>
							</span>
						</div>
					</div>

					<?php

		        	endwhile;

		      	endif;

		      	wp_reset_query();

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

				<?php else : ?>

					<div class="py-5 text-center">
						<h3 class="no-have-posts">Ops... Nada foi encontrado! <i class="far fa-frown"></i></h3>
					</div>

				<?php endif; ?>

    	</div>

    	<div id="sidebar" class="col-lg-3">

    		<?php get_template_part('bars/sidebar', get_post_format()); ?>

    	</div>

    </div>

	</div>

</main>

<?php get_footer(); ?>