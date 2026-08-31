<!-- ### BEGIN - Latest News ### -->

<?php

  $posts = get_lastest_posts('noticias', 4);

  if ($posts) :

?>

<div id="latestNews">
	<h2 class="widget-title pt-0 striped-detail__bottom striped-detail__modifier striped-detail__bt">
		<a class="text-secondary" href="<?php echo esc_url(get_category_link(2)); ?>">
			<i class="fas fa-newspaper"></i> Últimas Notícias 
			<span class="badge badge-muted d-none d-sm-block">Atualidades</span>
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

    endforeach;

  ?>

	<a 
		class="link-plus text-secondary text-uppercase float-right d-block" 
		href="<?php echo esc_url(get_category_link(2)); ?>">
		<i class="fas fa-plus-circle fa-2x mt-2 text-default"></i> 
		<span class="align-text-top">Mais Notícias</span>
	</a>
</div>

<?php

  endif;

  wp_reset_postdata();

?>

<!-- ### END - Latest News ### -->