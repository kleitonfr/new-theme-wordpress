<!-- ### BEGIN - Video Gallery ### -->

<?php

  $args = array('post_type'=>'videos', 'showposts'=> 3);

  $videos = get_posts($args);

  if ($videos) :

?>

<div id="videoGallery" class="pb-4">
	<h2 class="widget-title striped-detail__bottom striped-detail__modifier striped-detail__bt">
		<a class="text-secondary" href="https://www.youtube.com/channel/UCH84Ukn-PabhE7vhXxhPUDw" target="_blank">
			<i class="fas fa-video"></i> Galeria de Vídeos 
			<span class="badge badge-muted d-none d-sm-block">Youtube</span>
		</a>
	</h2>

	<!-- ### Youtube Carousel ### -->

	<div id="youtubeCarousel" class="carousel slide mt-4" data-ride="false">
    <ol class="carousel-indicators carousel-indicators__adjust">

      <?php foreach ($videos as $key => $video): ?>

      <li 
        data-target="#youtubeCarousel" 
        data-slide-to="<?php echo $key; ?>" 
        <?php echo ($key === 0) ? 'class="active"' : null; ?>>
      </li>

      <?php endforeach; ?>

    </ol>
    <div class="carousel-inner">

      <?php

        foreach($videos as $key => $post) :

          setup_postdata( $post );

      ?>

      <div class="carousel-item <?php echo ($key === 0) ? 'active' : null; ?>">
        <?php get_video($key); ?>
      </div>

      <?php

        endforeach;

      ?>

    </div>
  </div>

  <a 
    class="link-plus text-secondary text-uppercase float-right d-block mt-3" 
    href="https://www.youtube.com/channel/UCH84Ukn-PabhE7vhXxhPUDw"
    target="_blank">
		<i class="fas fa-plus-circle fa-2x mt-2 text-default"></i> 
		<span class="align-text-top">Mais Vídeos</span>
	</a>
</div>

<?php

  endif;

  wp_reset_postdata();

?>

<!-- ### END - Video Gallery ### -->