<!-- ### BEGIN - Navbar Icons ### -->

<?php $menu_items = wp_get_nav_menu_items('menu-suspenso', array('order' => 'DESC')); ?>

<nav id="iconNavbar" class="navbar navbar-expand-lg navbar-light navbar__icon">
  <button 
  	class="navbar-toggler" 
  	type="button" 
  	data-toggle="collapse" 
  	data-target="#navbarIcons" 
  	aria-controls="navbarIcons" 
  	aria-expanded="false" 
  	aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarIcons">
    <ul class="navbar-nav ml-auto">

      <?php

        foreach ($menu_items as $menu_item) :

          if ($menu_item->menu_item_parent == 0) :

            $parent = $menu_item->ID;
      ?>

      <li class="nav-item dropdown">
        <a 
        	id="<?php echo $menu_item->attr_title; ?>" 
        	class="nav-link dropdown-toggle" 
        	href="<?php echo $menu_item->url; ?>" 
        	data-toggle="dropdown" 
        	aria-haspopup="true" 
        	aria-expanded="false">
        	<i class="<?php echo implode(' ', $menu_item->classes); ?>"></i> <?php echo $menu_item->title ; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="<?php echo $menu_item->attr_title; ?>">

        <?php

        foreach ($menu_items as $submenu_item) :

          if($submenu_item->menu_item_parent == $parent) :

            $page = get_page($submenu_item->object_id);

            if (($submenu_item->object === 'page' && $page->post_status === 'publish') || 
                ($submenu_item->object === 'post' && $page->post_status === 'publish') || 
                ($submenu_item->object === 'category') || 
                ($submenu_item->object === 'custom')) :
        ?>

          <a 
            class="dropdown-item" 
            href="<?php echo $submenu_item->url; ?>" 
            target="<?php echo $submenu_item->target ? '_blank' : '_self' ?>">
          	<span class="fa-li"><i class="fas fa-genderless"></i></span> 
          	<?php echo $submenu_item->title ; ?>
          </a>

        <?php

            endif;

          endif;

        endforeach;

        ?>

        </div>
      </li>

      <?php

          endif;

        endforeach;

      ?>
    </ul>
  </div>
</nav>

<!-- ### END - Navbar Icons ### -->