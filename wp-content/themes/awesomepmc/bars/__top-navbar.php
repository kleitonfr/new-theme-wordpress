<!-- ### BEGIN - Navbar Top ### -->

<?php

  global $wp;

  $current_url = home_url($wp->request.'/');

  $menu_items = wp_get_nav_menu_items('menu-superior', array('order' => 'DESC'));
  
?>

<nav id="topNavbar" class="navbar navbar-expand-lg navbar-light navbar__top">
  <a 
    class="navbar-brand navbar-brand__adjust d-block" 
    href="<?php echo esc_url(home_url('/')); ?>" 
    title="Prefeitura Municipal de Caraguatatuba">
  	<img 
  		src="<?php echo get_template_directory_uri(); ?>/assets/img/brasao-classico.png" 
  		alt="Prefeitura Municipal de Caraguatatuba" height="129">
  </a>
  <button 
  	class="navbar-toggler" 
  	type="button" 
  	data-toggle="collapse" 
  	data-target="#navbarTop" 
  	aria-controls="navbarTop" 
  	aria-expanded="false" 
  	aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTop">
    <ul class="navbar-nav ml-auto">

      <?php foreach ($menu_items as $menu_item) : ?>

      <li class="<?php echo ($menu_item->url === $current_url) ? 'nav-item active' : 'nav-item' ?>">
        <a 
          class="nav-link <?php echo $menu_item->attr_title; ?>" 
          href="<?php echo $menu_item->url; ?>" 
          title="<?php echo $menu_item->title; ?>" 
          target="<?php echo $menu_item->target ? '_blank' : '_self' ?>">
          <?php if ($menu_item->attr_title === "nav-link__social") : ?>
            <i class="<?php echo implode(' ', $menu_item->classes); ?>"></i>
          <?php endif; ?>
          <span <?php echo ($menu_item->attr_title === "nav-link__social") ? 'class="d-inline-block d-lg-none"' : ''; ?>>
            <?php echo $menu_item->title; ?>
          </span>
        </a>
      </li>

      <?php endforeach; ?>

    </ul>
  </div>
</nav>

<!-- ### END - Navbar Top ### -->