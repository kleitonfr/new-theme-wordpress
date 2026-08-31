<!-- ### BEGIN - Featured News Carousel ### -->

<?php

  $posts = get_lastest_posts('noticias', 3, true, true);

  if ($posts) :

?>

<div id="featuredNewsCarousel" class="carousel slide carousel-fade image-zoom-effect" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php foreach ($posts as $key => $post): ?>
      <li 
        data-target="#featuredNewsCarousel" 
        data-slide-to="<?php echo $key; ?>" 
        <?php echo ($key === 0) ? 'class="active"' : null; ?>>
      </li>
    <?php endforeach; ?>
  </ol>
  <div class="carousel-inner">

    <?php

      foreach ($posts as $key => $post) : 

        setup_postdata($post);

        $post_thumbnail_title = get_post(get_post_thumbnail_id())->post_title;

    ?>

    <div class="carousel-item <?php echo ($key === 0) ? 'active' : null; ?> image-zoom-effect__box">
      
      <?php if (has_post_thumbnail()): ?>
        <img 
          class="d-block w-100" 
          src="<?php the_post_thumbnail_url('featured-news-carousel'); ?>" 
          alt="<?php echo $post_thumbnail_title; ?>" 
          title="<?php echo $post_thumbnail_title; ?>">
      <?php endif; ?>

      <div class="carousel-caption">
        <h5 class="text-uppercase px-3 ellipsis ellipsis__modifier">
        	<a class="text-white" href="<?php the_permalink(); ?>">
        		<?php the_title(); ?>
        	</a>
      	</h5>
        <p class="px-3 ellipsis ellipsis__modifier">
        	<?php echo strip_tags(custom_excerpt(50)); ?>
        </p>
        <div class="meta-tags d-none d-sm-flex">
        	<span class="meta-tags__date">
        		<i class="fas fa-calendar-alt"></i> <?php echo get_the_date('d/m/Y'); ?>
        	</span>
        	<span class="meta-tags__categories ml-auto">
        		<i class="fas fa-tags"></i>
            <?php the_category(', '); ?>
        	</span>
        </div>
      </div>
    </div>

    <?php

      endforeach;

    ?>

  </div>
  <a class="carousel-control-prev" href="#featuredNewsCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Próximo</span>
  </a>
  <a class="carousel-control-next" href="#featuredNewsCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
</div>

<?php

  endif;

  wp_reset_postdata();

?>

<!-- ### END - Featured News Carousel ### -->