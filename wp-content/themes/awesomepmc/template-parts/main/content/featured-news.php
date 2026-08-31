<!-- ### BEGIN - Featured News ### -->

<?php

  $posts = get_lastest_posts('noticias', 3, true);

  if ($posts) :

  	$tag = get_term_by('name', 'destaques', 'post_tag');

?>

<div id="featuredNews">
	<h2 class="widget-title striped-detail__bottom striped-detail__modifier striped-detail__bt">
		<a class="text-secondary" href="<?php echo get_tag_link($tag->term_id); ?>">
			<i class="fas fa-fire"></i> Notícias em Destaque 
			<span class="badge badge-muted d-none d-sm-block">Populares</span>
		</a>
	</h2>

	<div class="card-deck">

		<?php

      foreach ($posts as $post) : 

        setup_postdata($post);

        $post_thumbnail_title = get_post(get_post_thumbnail_id())->post_title;

        $categories = get_the_category();

    ?>

	  <div class="card image-zoom-effect">

	  	<?php if (has_post_thumbnail()): ?>

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
	      	<?php echo strip_tags(custom_excerpt(22)); ?>
	      	<span class="read-more-shadow"></span>
	      </p>
	      <a class="float-right mt-1 text-muted" href="<?php echo esc_url(get_category_link($categories[0]->term_id)) ?>">
      		<i class="fas fa-tags"></i> <small><?php echo esc_html($categories[0]->name); ?></small>
      	</a>
	      <a class="btn btn-sm btn-secondary" href="<?php the_permalink(); ?>">Leia Mais</a>
	    </div>
	    <div class="card-footer">
	      <small class="text-muted">Publicado em: <?php echo get_the_date('d/m/Y'); ?></small>
	    </div>
	  </div>

	  <?php

      endforeach;

    ?>

	</div>
</div>

<?php

  endif;

  wp_reset_postdata();

?>

<!-- ### END - Featured News ### -->