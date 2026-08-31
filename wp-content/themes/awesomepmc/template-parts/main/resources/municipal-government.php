<!-- ### BEGIN - Municipal Government ### -->

<?php

	$menu_items = wp_get_nav_menu_items('governo-municipal', array('order' => 'DESC'));

	list($menu_items_1, $menu_items_2) = array_chunk($menu_items, ceil(count($menu_items) / 2));

?>
	    		
<div id="municipalGovernment">
	<h2 class="widget-title striped-detail__bottom striped-detail__modifier striped-detail__bt">
		<a class="text-secondary" href="<?php echo esc_url(home_url('/governo-municipal')); ?>">
			<i class="fas fa-users"></i> Governo Municipal 
			<span class="badge badge-muted d-none d-sm-block">Secretarias</span>
		</a>
	</h2>

	<!-- ### List #1 ### -->

	<ul class="list-unstyled w-auto float-left position-relative text-uppercase mb-sm-4">

	<?php

	foreach ($menu_items_1 as $menu_item) :

		$page = get_page($menu_item->object_id);

		if (($menu_item->object === 'page' && $page->post_status === 'publish') || 
        ($menu_item->object === 'post' && $page->post_status === 'publish') || 
        ($menu_item->object === 'category') || 
        ($menu_item->object === 'custom')) :

	?>

		<li>
	  	<a class="text-muted d-block" href="<?php echo $menu_item->url; ?>">
	  		<span class="fa-li text-default"><i class="<?php echo implode(' ', $menu_item->classes); ?>"></i></span> 
	  		<small><?php echo $menu_item->title; ?></small>
	  	</a>
		</li>

	<?php

		endif;
		
	endforeach;

	?>

	</ul>

	<!-- ### List #2 ### -->

	<ul class="list-unstyled w-auto float-md-right position-relative text-uppercase mb-sm-4">
		
	<?php

	foreach ($menu_items_2 as $menu_item) :

		$page = get_page($menu_item->object_id);

		if (($menu_item->object === 'page' && $page->post_status === 'publish') || 
        ($menu_item->object === 'post' && $page->post_status === 'publish') || 
        ($menu_item->object === 'category') || 
        ($menu_item->object === 'custom')) :

	?>

		<li>
	  	<a class="text-muted d-block" href="<?php echo $menu_item->url; ?>">
	  		<span class="fa-li text-default"><i class="<?php echo implode(' ', $menu_item->classes); ?>"></i></span> 
	  		<small><?php echo $menu_item->title; ?></small>
	  	</a>
		</li>

	<?php

		endif;
		
	endforeach;

	?>
		
	</ul>

</div>

<!-- ### END - Municipal Government ### -->