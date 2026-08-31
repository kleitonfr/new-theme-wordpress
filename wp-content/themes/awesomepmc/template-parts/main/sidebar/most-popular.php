<!-- ### BEGIN - Most Popular ### -->

<?php
	
	$args=array(
    'posts_per_page' => 5,
    'post_type' => 'post',
    'meta_key' => 'post_views_count', 
    'orderby' => 'meta_value_num', 
    'order' => 'DESC',
    'date_query' => array(
      array(
        'after' => '1 month ago',
        'column' => 'post_date'
      )
    )
  );

  $posts = get_posts($args);

?>

<div id="mostPopular">
	<h2 class="widget-title striped-detail__bottom striped-detail__modifier">
		<i class="fas fa-check-square"></i> Mais Acessadas
		
		<small class="text-muted">
			<span class="d-lg-none d-xl-inline-block">Últimos</span> 30 dias
		</small>
	</h2>

	<ul class="list-group list-group-flush">

		<?php

			if ($posts) :

				foreach ($posts as $post) :

					setup_postdata($post);

			    $title = mb_strimwidth(get_the_title(), 0, 95, "...");

		?>

	  <li class="list-group-item">
	  	<small class="text-muted">Publicado em <?php echo get_the_date('d/m/Y'); ?></small>
	  	<span class="badge badge-muted float-right">
	  		<i class="fas fa-eye"></i> <?php echo get_post_views(get_the_ID()); ?>
	  	</span>
	  	<a class="d-block text-dark most-popular-box" href="<?php the_permalink(); ?>">
	  		<?php echo ucfirst(mb_convert_case($title, MB_CASE_LOWER, "UTF-8")); ?>
	  	</a>
	  	<span class="meta-tags d-block pt-2 ellipsis ellipsis__modifier mr-1">
	  		<?php 

					get_post_categories($post, 
															"d-inline-block text-secondary mr-1", 
															"d-inline-block text-muted"); 

				?>
	  	</span>
	  </li>

	  <?php

	  		endforeach;

	  	else:

        echo '<li class="list-group-item">Nenhuma postagem encontrada</li>';

      endif;

      wp_reset_postdata();
	  ?>

	</ul>
</div>

<!-- ### END - Most Popular ### -->