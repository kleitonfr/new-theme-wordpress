<!-- ### BEGIN - Common Services ### -->

<div id="commonServices">
	<h2 class="widget-title striped-detail__bottom striped-detail__modifier">
		<i class="fas fa-cogs"></i> Principais Serviços
	</h2>

	<ul class="nav nav-pills" id="pills-tabCommonServices" role="tablist">
	  <li class="nav-item w-50 text-center position-relative">
	    <a 
	    	class="nav-link active bg-transparent rounded-0 text-uppercase" 
	    	id="pills-citizen-tab" 
	    	data-toggle="pill" 
	    	href="#pills-citizen" 
	    	role="tab" 
	    	aria-controls="pills-citizen" 
	    	aria-selected="true">
	    	Cidadão
	    </a>
	  </li>
	  <li class="nav-item w-50 text-center position-relative">
	    <a 
	    	class="nav-link bg-transparent rounded-0 text-uppercase" 
	    	id="pills-company-tab" 
	    	data-toggle="pill" 
	    	href="#pills-company" 
	    	role="tab" 
	    	aria-controls="pills-company" 
	    	aria-selected="false">
	    	Empresa
	    </a>
	  </li>
	</ul>
	<div class="tab-content" id="pills-tabContentCommonServices">

    <?php $menu_items = wp_get_nav_menu_items('servicos-cidadao', array('order' => 'DESC')); ?>

	  <div 
	  	class="tab-pane fade show active" 
	  	id="pills-citizen" role="tabpanel" 
	  	aria-labelledby="pills-citizen-tab">
  		<ul class="list-group list-group-flush">

      <?php

    	foreach ($menu_items as $key => $menu_item) :

    		$page = get_page($menu_item->object_id);

    		if (($menu_item->object === 'page' && $page->post_status === 'publish') || 
            ($menu_item->object === 'post' && $page->post_status === 'publish') || 
            ($menu_item->object === 'category') || 
            ($menu_item->object === 'custom')) :
    			
      ?>

        <li class="list-group-item px-0 py-1">
          <a 
          	class="text-secondary" 
          	href="<?php echo $menu_item->url; ?>" 
          	target="<?php echo $menu_item->target ? '_blank' : '_self' ?>">
            <i class="<?php echo implode(' ', $menu_item->classes); ?>"></i>
            <span class="link-common-services ellipsis ellipsis__modifier">
              <?php echo $menu_item->title; ?>
            </span>
            <small class="text-muted d-block">
              <?php echo $menu_item->post_content; ?>
            </small>
          </a>
        </li>

      <?php

      	endif;

    	endforeach;

      ?>

      </ul>
	  </div>

    <?php $menu_items = wp_get_nav_menu_items('servicos-empresa', array('order' => 'DESC')); ?>

	  <div 
	  	class="tab-pane fade" 
	  	id="pills-company" 
	  	role="tabpanel" 
	  	aria-labelledby="pills-company-tab">
	  	<ul class="list-group list-group-flush">

      <?php

    	foreach ($menu_items as $key => $menu_item) :

    		$page = get_page($menu_item->object_id);

    		if (($menu_item->object === 'page' && $page->post_status === 'publish') || 
            ($menu_item->object === 'post' && $page->post_status === 'publish') || 
            ($menu_item->object === 'category') || 
            ($menu_item->object === 'custom')) :

      ?>

        <li class="list-group-item px-0 py-1">
          <a 
          	class="text-secondary" 
          	href="<?php echo $menu_item->url; ?>" 
          	target="<?php echo $menu_item->target ? '_blank' : '_self' ?>">
            <i class="<?php echo implode(' ', $menu_item->classes); ?>"></i>
            <span class="link-common-services ellipsis ellipsis__modifier">
              <?php echo $menu_item->title; ?>
            </span>
            <small class="text-muted d-block">
              <?php echo $menu_item->post_content; ?>
            </small>
          </a>
        </li>

      <?php

      	endif;

    	endforeach;

      ?>

      </ul>
	  </div>
	</div>

	<a class="link-plus text-secondary text-uppercase text-right d-block pb-2" href="<?php echo get_page_link(253); ?>">
		<i class="fas fa-plus fa-2x mt-2 text-default"></i> 
		<span class="align-text-top">Mais Serviços</span>
	</a>
</div>

<!-- ### END - Common Services ### -->