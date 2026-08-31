<?php $menu_items = wp_get_nav_menu_items('redes-sociais', array('order' => 'DESC')); ?>

<div class="col-sm-4">
	<div class="float-md-right">
		<h2 class="text-white h2__modifier">
			<i class="fas fa-share-square fa-lg"></i> 
			Nos siga nas <b>Redes Sociais</b>
		</h2>
		<ul class="list-inline">

			<?php foreach ($menu_items as $menu_item) : ?>

      <li class="list-inline-item">
        <a 
        	class="text-white d-block" 
        	href="<?php echo $menu_item->url; ?>" 
        	target="<?php echo $menu_item->target ? '_blank' : '_self' ?>" 
        	title="<?php echo $menu_item->title; ?>">
        	<i class="<?php echo implode(' ', $menu_item->classes); ?>"></i> 
        	<span class="d-inline-block d-sm-none"><?php echo $menu_item->title; ?></span>
        </a>
      </li>

      <?php endforeach; ?>
      
		</ul>
	</div>
</div>