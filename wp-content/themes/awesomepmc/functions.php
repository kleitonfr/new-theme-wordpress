<?php

function setup() {

	load_theme_textdomain('awesomepmc');

	add_theme_support('title-tag');

	add_theme_support('post-thumbnails');
	
	add_image_size('featured-news-carousel', 825, 550, true);
	add_image_size('single', 825, 305, true);
	add_image_size('card', 530, 350, true);
	add_image_size('latest', 530, 530, true);

	// REMOVE WP EMOJI
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');

	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('admin_print_styles', 'print_emoji_styles');

	register_nav_menus( array(
		'menu-superior'     => __('Menu Superior', 'awesomepmc'),
		'menu-suspenso'     => __('Menu Suspenso', 'awesomepmc'),
		'servicos-cidadao'  => __('Serviços Cidadão', 'awesomepmc'),
		'servicos-empresa'  => __('Serviços Empresa', 'awesomepmc'),
		'governo-municipal' => __('Governo Municipal', 'awesomepmc'),
		'redes-sociais'     => __('Redes Sociais', 'awesomepmc'),
	));
}
add_action('after_setup_theme', 'setup');

// Desabilita a criação automática de uma nova imagem no padrão 'medium_large'
function disable_img_size($sizes) {

  unset( $sizes['medium_large']);
     
  return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'disable_img_size');

add_filter( 'img_caption_shortcode_width', '__return_false' );

add_filter( 'use_default_gallery_style', '__return_false' );

function widgets_init() {

	register_sidebar( array(
		'name'          => __('Banners Carousel - 825 x 188', 'awesomepmc'),
		'id'            => 'banners-carousel',
		'description'   => __('Banners Carousel posicionado no conteúdo principal', 'awesomepmc'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar( array(
		'name'          => __('Banner 1 - 263 x 263', 'awesomepmc'),
		'id'            => 'banner-1',
		'description'   => __('Banner 263 x 263 posicionado na barra lateral', 'awesomepmc'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar( array(
		'name'          => __('Banner 2 - 263 x 263', 'awesomepmc'),
		'id'            => 'banner-2',
		'description'   => __('Banner 263 x 263 posicionado na barra lateral', 'awesomepmc'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar( array(
		'name'          => __('Acesso Rápido', 'awesomepmc'),
		'id'            => 'acesso-rapido',
		'description'   => __('Links posicionado em projetos e programas', 'awesomepmc'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar( array(
		'name'          => __('Acontece em Caraguá', 'awesomepmc'),
		'id'            => 'acontece-em-caragua',
		'description'   => __('Links posicionado em projetos e programas', 'awesomepmc'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar( array(
		'name'          => __('Banner 3 - 263 x 198', 'awesomepmc'),
		'id'            => 'banner-3',
		'description'   => __('Banner 263 x 198 posicionado no fim da página', 'awesomepmc'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar( array(
		'name'          => __('Telefones Úteis', 'awesomepmc'),
		'id'            => 'telefones-uteis',
		'description'   => __('Principais telefones da Prefeitura', 'awesomepmc'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar( array(
		'name'          => __('Endereço', 'awesomepmc'),
		'id'            => 'endereco',
		'description'   => __('Endereço da Prefeitura Municipal de Caraguatatuba', 'awesomepmc'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar( array(
		'name'          => __('Desenvolvido Por', 'awesomepmc'),
		'id'            => 'desenvolvido-por',
		'description'   => __('Identificação do desenvolvedor do site', 'awesomepmc'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'widgets_init');

function my_widget_title($t) {

    return null;
}
add_filter('widget_title', 'my_widget_title'); 

// Remove jquery-migrate
add_action('wp_default_scripts', function($scripts) {

  if (!empty($scripts->registered['jquery']))
		$scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, array('jquery-migrate'));
});

// Função para tamanhos customizados do resumo
// https://stackoverflow.com/questions/4082662/multiple-excerpt-lengths-in-wordpress
function custom_excerpt($limit) {

  $excerpt = explode(' ', get_the_excerpt(), $limit);

  if (count($excerpt) >= $limit) {

    array_pop($excerpt);

    $excerpt = implode(" ", $excerpt) . '...';

  } else {

    $excerpt = implode(" ", $excerpt);
  }

  $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

  return $excerpt;
}

function custom_excerpt_length($length) {
	return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length');


function read_more($link) {

	return '<i class="fas fa-ellipsis-h text-secondary align-bottom ml-1"></i>';
}
add_filter('excerpt_more', 'read_more');


function get_lastest_posts(
	$category_name = 'noticias', 
	$posts_per_page = 3, 
	$featured = false, 
	$carousel = false, 
	$category__and = array(), 
	$rand = false) {

  $args = array('category_name' => $category_name, 'posts_per_page' => $posts_per_page);

  if (count($category__and) > 0)
  	$args = array('category__and' => $category__and, 'posts_per_page' => $posts_per_page);

  if ($featured)
  	$args['tag'] = 'destaques';

  if ($carousel)
  	$args['meta_query'] = array(
			'relation'		=> 'AND',
			array(
				'key'	 	=> 'carousel',
				'value' => 'yes',
				'compare' 	=> 'LIKE',
			)
		);

  if ($featured && !$carousel)
  	$args['meta_query'] = array(
			'relation'		=> 'AND',
			array(
				'key'	 	=> 'carousel',
				'compare' 	=> 'NOT EXISTS',
			),
			'relation'		=> 'OR',
			array(
				'key'	 	=> 'carousel',
				'value' => 'yes',
				'compare' 	=> 'NOT LIKE',
			)
		);

  if (!$featured) {

  	$tag = get_term_by('name', 'destaques', 'post_tag');

  	$args['tag__not_in'] = array($tag->term_id);
  }

  if ($rand) {
  	$args['orderby'] = 'rand';
  	$args['date_query'] = array(
      array(
        'after' => '1 month ago',
        'column' => 'post_date'
      )
    );
  }

  if (is_single())
  	$args['post__not_in'] = array(get_the_ID());

  $lastest_posts = get_posts($args);

  return $lastest_posts;
}

function get_first_category() {

	$categories = get_the_category();

	if (!empty($categories))
	  echo '<a href="'.esc_url(get_category_link($categories[0]->term_id)).'">'.esc_html($categories[0]->name).'</a>';
}

function is_subcategory() {

  $query_var = get_query_var('cat');

  $category = get_category($query_var);

  if ($category->errors)
  	return false;

  return ($category->parent == 0 ) ? false : true;
}

function get_post_categories(
	$post, 
	$class_category, 
	$class_subcategory, 
	$is_subcategory = false, 
	$current_category = null) {

	$parents = array();
	$subcategories = array();

	$categories = get_the_category($post->ID);

	foreach($categories as $category) {

		if ($category->parent === 0) {

			$parents[] = $category;

		} else {

			$subcategories[] = $category;
		}
	}

	if (count($parents) > 0) {

	  foreach($parents as $category) {

			$category_link = '<a 
													class="'.$class_category.'" 
													href="'.esc_url(get_category_link($category->term_id)).'">
													'.esc_html($category->name).'
												</a>' . "\n";

			$parent = $category->term_id;
		
			echo $category_link;

			foreach ($subcategories as $key => $subcategory) {

				$subcategory_link = '<a 
															class="'.$class_subcategory.'" 
															href="'.esc_url(get_category_link($subcategory->term_id)).'">'
															.esc_html($subcategory->name).
														'</a>' . "\n";

				if ($is_subcategory) {
		
					if ($subcategory->parent === $parent && $subcategory->term_id === $current_category) {

						echo $subcategory_link;

						if (count($subcategories) > 1 && count($subcategories) > ($key + 1))
							echo '<span class="text-muted"><i class="fas fa-plus"></i></span>' . "\n";
					}

				} else {

					if ($subcategory->parent === $parent) {

						echo $subcategory_link;

						if (count($subcategories) > 1 && count($subcategories) > ($key + 1))
							echo '<span class="text-muted"><i class="fas fa-plus"></i></span>' . "\n";
					}
				}
			}
	  }

	} else {

		foreach($categories as $category) {

			echo '<a 
							class="'.$class_category.'" 
							href="'.esc_url(get_category_link($category->term_id)).'">
							'.esc_html($category->name).'
						</a>' . "\n";
		}
	}
}

function get_page_categories($page, $class_parent, $class_child) {

	if ($page->post_parent === 0) {

		echo '<a class="'.$class_parent.'" href="'.get_permalink().'">'
						.str_replace("|", "-", get_the_title()).
				 '</a>' . "\n";

	} else {

		$parent = get_post($page->post_parent);

		echo '<a class="'.$class_parent.'" href="'.get_page_link($parent->ID).'">
						'.str_replace("|", "-", $parent->post_title).'
					</a>' . "\n";

		echo '<a class="'.$class_child.'" href="'.get_permalink().'">
						'.str_replace("|", "-", get_the_title()).'
					</a>' . "\n";

	}
}

// Verifica se a categoria é descendente de notícias
function is_ancestor_of($categories, $ancestor_id = 2) {

	$is_ancestor = false;

	foreach($categories as $category) {

		if (cat_is_ancestor_of($ancestor_id, $category->term_id))
			$is_ancestor = true;
	}

	return $is_ancestor;
}

function videos_registrer() {

	$labels = array(
	  'name'               => _x('Vídeos', 'post type general name', 'awesomepmc'),
	  'singular_name'      => _x('Vídeo', 'post type singular name', 'awesomepmc'),
	  'add_new'            => _x('Adicionar novo vídeo', 'video', 'awesomepmc'),
	  'add_new_item'       => __('Adicionar novo', 'awesomepmc'),
	  'edit_item'          => __('Editar vídeo', 'awesomepmc'),
	  'new_item'           => __('Novo vídeo', 'awesomepmc'),
	  'view_item'          => __('Ver vídeo', 'awesomepmc'),
	  'search_items'       => __('Procurar vídeo', 'awesomepmc'),
	  'not_found'          =>  __('Nada encontrado', 'awesomepmc'),
	  'not_found_in_trash' => __('Nada encontrado no lixo', 'awesomepmc'),
	  'parent_item_colon'  => ''
	);

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'query_var'          => true,
    'rewrite'            => true,
    'has_archive'        => false, 
    'capability_type'    => 'post',
    'hierarchical'       => false,
    'menu_position'      => 4,
    'supports'           => array('title')
  );

  register_post_type('videos', $args);
}
add_action('init', 'videos_registrer');

function setting_cookies() {

	$url = '//' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];
	$current_post_id = url_to_postid($url);
	$post_type = get_post_type($current_post_id);

	if ($post_type === 'post') { // || $post_type === 'page'

		// time() + 60*60*24*30

		set_post_views($current_post_id);

		setcookie("post_views_count_".$current_post_id, true);
	}
}
add_action('init', 'setting_cookies');

function get_post_views($postID, $view_class = "d-none"){

    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);

    if($count == ''){

        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');

        return '0 <span class="'.$view_class.'">Visualizações</span>';
    }

    return $count.' <span class="'.$view_class.'">Visualização(ões)</span>';
}

function set_post_views($postID) {

		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);

		if ($count == '') {

			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '1');

		} else {

			if (!isset($_COOKIE['post_views_count_'. $postID])) {

				$count++;

				update_post_meta($postID, $count_key, $count);
			}
		}

		// setcookie(name, value, expire, path, domain, secure, httponly);
		setcookie("post_views_count_".$postID, true, 0, false, false, false, true);
}

function get_widget_data_for($sidebar_name) {
	
	global $wp_registered_sidebars, $wp_registered_widgets;

	// Holds the final data to return
	$output = array();

	// Loop over all of the registered sidebars looking for the one with the same name as $sidebar_name
	$sibebar_id = false;

	foreach ($wp_registered_sidebars as $sidebar) {

		if ($sidebar['name'] == $sidebar_name) {

			// We now have the Sidebar ID, we can stop our loop and continue.
			$sidebar_id = $sidebar['id'];

			break;
		}
	}

	if (!$sidebar_id) {

		// There is no sidebar registered with the name provided.
		return $output;
	}

	// A nested array in the format $sidebar_id => array( 'widget_id-1', 'widget_id-2' ... );
	$sidebars_widgets = wp_get_sidebars_widgets();

	$widget_ids = $sidebars_widgets[$sidebar_id];

	if (!$widget_ids) {

		// Without proper widget_ids we can't continue.
		return array();
	}

	// Loop over each widget_id so we can fetch the data out of the wp_options table.
	foreach ($widget_ids as $id) {

		// The name of the option in the database is the name of the widget class.
		$option_name = $wp_registered_widgets[$id]['callback'][0]->option_name;

		// Widget data is stored as an associative array.
		// To get the right data we need to get the right key which is stored in $wp_registered_widgets
		$key = $wp_registered_widgets[$id]['params'][0]['number'];

		$widget_data = get_option( $option_name );

		// Add the widget data on to the end of the output array.
		$output[] = (object) $widget_data[$key];
	}

	return $output;
}

// https://github.com/WordPress/WordPress/blob/master/wp-includes/general-template.php#L3160
function bootstrap_pagination($args = '') {

	global $wp_query, $wp_rewrite;

	// Setting up default values based on the current URL.
	$pagenum_link = html_entity_decode( get_pagenum_link() );

	$url_parts    = explode('?', $pagenum_link);

	// Get max pages and current page out of the current query, if available.
	$total   = isset($wp_query->max_num_pages) ? $wp_query->max_num_pages : 1;

	$current = get_query_var('paged') ? intval(get_query_var('paged')) : 1;

	// Append the format placeholder to the base URL.
	$pagenum_link = trailingslashit($url_parts[0]) . '%_%';

	// URL base depends on permalink settings.
	$format  = $wp_rewrite->using_index_permalinks() && ! strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
	
	$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit($wp_rewrite->pagination_base . '/%#%', 'paged') : '?paged=%#%';

	$defaults = array(
		'base'               => $pagenum_link, // http://example.com/all_posts.php%_% : %_% is replaced by format (below)
		'format'             => $format, // ?page=%#% : %#% is replaced by the page number
		'total'              => $total,
		'current'            => $current,
		'aria_current'       => 'page',
		'show_all'           => false,
		'prev_next'          => true,
		'prev_text'          => __( '&laquo; Previous' ),
		'next_text'          => __( 'Next &raquo;' ),
		'end_size'           => 1,
		'mid_size'           => 2, // 2 numbers before/after the current page
		'type'               => 'plain',
		'add_args'           => array(), // array of query args to add
		'add_fragment'       => '',
		'before_page_number' => '',
		'after_page_number'  => '',
	);

	$args = wp_parse_args($args, $defaults);

	if (!is_array($args['add_args'])) $args['add_args'] = array();

	// Merge additional query vars found in the original URL into 'add_args' array.
	if (isset($url_parts[1])) {

		// Find the format argument.
		$format       = explode('?', str_replace('%_%', $args['format'], $args['base']));

		$format_query = isset($format[1]) ? $format[1] : '';

		wp_parse_str( $format_query, $format_args );

		// Find the query args of the requested URL.
		wp_parse_str($url_parts[1], $url_query_args);

		// Remove the format argument from the array of query arguments, to avoid overwriting custom format.
		foreach ($format_args as $format_arg => $format_arg_value) {

			unset($url_query_args[ $format_arg ]);
		}

		$args['add_args'] = array_merge($args['add_args'], urlencode_deep($url_query_args));
	}

	// Who knows what else people pass in $args
	$total = (int) $args['total'];

	if ( $total < 2 ) return;

	$current  = (int) $args['current'];

	$end_size = (int) $args['end_size']; // Out of bounds?  Make it the default.

	if ( $end_size < 1 ) $end_size = 1;

	$mid_size = (int) $args['mid_size'];

	if ( $mid_size < 0 ) $mid_size = 2;

	$add_args   = $args['add_args'];
	$r          = '';
	$page_links = array();
	$dots       = false;

	$disabled = "disabled";
	$link = null;

	if ($args['prev_next'] && $current && 1 < $current) :

		$link = str_replace('%_%', 2 == $current ? '' : $args['format'], $args['base']);
		$link = str_replace('%#%', $current - 1, $link);

		if ($add_args) $link = add_query_arg($add_args, $link);

		$link .= $args['add_fragment'];
		
		$disabled = "";

	endif;



	$first = str_replace('%_%', $args['format'], $args['base']);
	$first = str_replace('%#%', 1, $first);

	if ($add_args) $first = add_query_arg($add_args, $first);

	$first .= $args['add_fragment'];



	$page_links[] = ' <nav id="pageNavigation" class="mt-4 mb-lg-4" aria-label="Page Navigation">
											<ul class="pagination justify-content-center">
												<li class="page-item d-none d-xl-inline-block '.$disabled.'">
											 		<a 
											 			class="page-link" 
											 			href="'.esc_url(apply_filters('paginate_links', $first)).'" 
											 			aria-label="Primeira"
											 			title="Primeira">
											 			<span aria-hidden="true"><i class="fas fa-angle-double-left" aria-hidden="true"></i></span>
											 			<span class="sr-only">Primeira</span>
											 		</a>
											 	</li>
											 	<li class="page-item '.$disabled.'">
											 		<a 
											 			class="page-link" 
											 			href="'.esc_url(apply_filters('paginate_links', $link)).'" 
											 			aria-label="'.$args['prev_text'].'">
											 			<span class="d-none d-md-block d-xl-none" aria-hidden="true">
											 				<i class="fa fa-chevron-left" aria-hidden="true"></i>
											 			</span>
											 			<span class="d-none d-xl-block" aria-hidden="true">'.$args['prev_text'].'</span>
											 		</a>
											 	</li>';

	for ($n = 1; $n <= $total; $n++) :

		if ($n == $current) :

			$page_links[] = ' <li class="page-item active">
												 	<a class="page-link" href="#">
												 		'.number_format_i18n( $n ).'<span class="sr-only">(current)</span>
												 	</a>
											  </li>';

			$dots         = true;

		else :

			if ($args['show_all'] || ($n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size)) :

				$link = str_replace( '%_%', 1 == $n ? '' : $args['format'], $args['base'] );
				$link = str_replace( '%#%', $n, $link );

				if ($add_args) $link = add_query_arg($add_args, $link);

				$link .= $args['add_fragment'];

				/** This filter is documented in wp-includes/general-template.php */
				$page_links[] = ' <li class="page-item">
													 	<a class="page-link" href="'.esc_url(apply_filters('paginate_links', $link)).'">
													 		'.$args['before_page_number'].number_format_i18n($n).$args['after_page_number'].'
													 	</a>
												  </li>';

				$dots         = true;

			elseif ($dots && ! $args['show_all']) :

				$page_links[] = ' <li class="page-item disabled">
													 	<a class="page-link" href="">
													 		<span class="page-numbers dots">'. __('&hellip;').'</span>
													 	</a>
												  </li>';

				$dots         = false;

			endif;
		endif;
	endfor;

	if ($args['prev_next'] && $current && $current < $total) :

		$link = str_replace('%_%', $args['format'], $args['base']);
		$link = str_replace('%#%', $current + 1, $link);

		if ($add_args) $link = add_query_arg($add_args, $link);

		$link .= $args['add_fragment'];

		$disabled = "";

	else:

		$link = null;

		$disabled = "disabled";

	endif;



	$last = str_replace('%_%', $args['format'], $args['base']);
	$last = str_replace('%#%', $total, $last);

	if ($add_args) $last = add_query_arg($add_args, $last);

	$last .= $args['add_fragment'];



	$page_links[] = ' 		<li class="page-item '.$disabled.'">
												 	<a 
												 		class="page-link" 
												 		href="'.esc_url(apply_filters('paginate_links', $link)).'" 
												 		aria-label="'.$args['next_text'].'">
												 		<span class="d-none d-xl-block" aria-hidden="true">'.$args['next_text'].'</span>
											 			<span class="d-none d-md-block d-xl-none" aria-hidden="true">
											 				<i class="fa fa-chevron-right" aria-hidden="true"></i>
											 			</span>
												 	</a>
											  </li>
											  <li class="page-item d-none d-xl-inline-block '.$disabled.'">
											 		<a 
											 			class="page-link" 
											 			href="'.esc_url(apply_filters('paginate_links', $last)).'" 
											 			aria-label="Última"
											 			title="Última">
											 			<span aria-hidden="true"><i class="fas fa-angle-double-right" aria-hidden="true"></i></span>
											 			<span class="sr-only">Última</span>
											 		</a>
											 	</li>
											</ul>
										</nav>';

	$r = join("\n", $page_links);

	return $r;
}

function breadcrumb($categories = array()) {

	$parents = array();
	$subcategories = array();

	$breadcrumb_links[] = 
  			'<nav class="striped-detail__bottom striped-detail__modifier striped-detail__bt mb-3" aria-label="breadcrumb">
				  <ol class="breadcrumb mb-0">
				    <li class="breadcrumb-item">
				    	<a href="'.esc_url(home_url('/')).'">
				    		<i class="fas fa-genderless align-middle text-muted"></i> Início
				    	</a>
				    </li>';

  if (is_search()) {

  	$breadcrumb_links[] = '<li class="breadcrumb-item active ellipsis" aria-current="page">Pesquisa por: '
  													.strip_tags(html_entity_decode(ucwords(get_query_var('s')))).
  												'</li>';
  }

  if (is_tag()) {

  	$tag = get_term_by('name', get_query_var('tag'), 'post_tag' );

  	$breadcrumb_links[] = '<li class="breadcrumb-item active ellipsis" aria-current="page">'
  													.ucwords($tag->name).
  												'</li>';
	}

	foreach($categories as $category) {

		if ($category->parent === 0) {

			$parents[] = $category;

		} else {

			$subcategories[] = $category;
		}
	}

	if (count($parents) > 0) {

	  foreach($parents as $key => $category) {

	  	$classes = 'breadcrumb-item';

	    $aria_current = null;

			$label = '<a 
									href="'.esc_url(get_category_link($category->term_id)).'">'
									.esc_html($category->name).
								'</a>' . "\n";

			$parent = $category->term_id;

	    if (($key + 1) === count($categories)) {

    		$classes = 'breadcrumb-item active ellipsis';

    		$aria_current = 'aria-current="page"';

    		$label = strip_tags($label);
    	}
		
			$breadcrumb_links[] = '<li class="'.$classes.'" '.$aria_current.'>'
															.$label.
  													'</li>';

			foreach ($subcategories as $key => $subcategory) {

				if ($subcategory->parent === $parent) {

					$subcategory_link = '';

					$subcategory_link .= esc_html($subcategory->name). "\n";

					if (count($subcategories) > 1 && count($subcategories) > ($key + 1))
						$subcategory_link .= '<span class="text-muted"><i class="fas fa-plus"></i></span>' . "\n";

		    	if (($key + 1) === count($subcategories)) {

		    		$classes = 'breadcrumb-item active ellipsis';

		    		$aria_current = 'aria-current="page"';

		    		$breadcrumb_links[] = '<li class="'.$classes.'" '.$aria_current.'>'
																		.$subcategory_link.
		  														'</li>';
		    	}
				}
			}
	  }

	} else {

		$classes = 'breadcrumb-item';

    $aria_current = null;

		foreach($categories as $key => $category) {

			$label = '<a 
									href="'.esc_url(get_category_link($category->term_id)).'">
									'.esc_html($category->name).'
								</a>' . "\n";

			if (($key + 1) === count($categories)) {

    		$classes = 'breadcrumb-item active ellipsis';

    		$aria_current = 'aria-current="page"';

    		$label = strip_tags($label);
    	}

			$breadcrumb_links[] = '<li class="'.$classes.'" '.$aria_current.'>'
															.$label.
  													'</li>';
		}
	}

	$breadcrumb_links[] =

				  '</ol>
				</nav>';

	return join("\n", $breadcrumb_links);
}

function menu_categories() {

	$menu_categories_links[] = 
				'<ul class="list-unstyled position-relative mb-0">';

	$args = array(
		'parent' => 2 // $category->term_id
	);

	$categories = get_categories($args);

	// $concursos = get_category_by_slug('concursos');
	// $processo_seletivo = get_category_by_slug('processo-seletivo-guarda-mirim');

	// array_push($categories, $concursos, $processo_seletivo);

	usort($categories, function($a, $b) {

		$al = strtolower(strtr($a->name, array('Secretaria de ' => '', 'Secretaria dos Direitos da ' => '')));
    $bl = strtolower(strtr($b->name, array('Secretaria de ' => '', 'Secretaria dos Direitos da ' => '')));

    if ($al === $bl)
    	return 0;
    
    return ($al > $bl) ? +1 : -1;
	});

	foreach ($categories as $category) {

		$name = strtr($category->name, array('Secretaria de ' => '', 'Secretaria dos Direitos da ' => ''));

		$menu_categories_links[] =
					'<li>
						 <a 
							 class="text-muted d-block ellipsis ellipsis__modifier" 
							 href="'.get_category_link($category->term_id).'" rel="bookmark">
							 <i class="'.$category->description.'"></i>
							 <small>'.$name.'</small>
						 </a>
					 </li>';
	}

	$menu_categories_links[] = 
				'</ul>';

	return join("\n", $menu_categories_links);
}

function add_meta_tags() {

  global $post;

  if (is_single()) {

    $meta = strip_tags($post->post_content);
    $meta = strip_shortcodes($meta);
    $meta = str_replace(array("\n", "\r", "\t"), ' ', $meta);

    if (preg_match('/^.{1,280}\b/s', $meta, $match))
    	$description = trim($match[0], " \t.") . '...';

    // FACEBOOK

    echo '<!-- Facebook Open Graph Tags -->' . "\n";
		echo '<meta property="og:url" content="' . get_permalink() . '" />' . "\n";
		echo '<meta property="og:type" content="article" />' . "\n";
		echo '<meta property="og:title" content="' . $post->post_title . '" />' . "\n";
		echo '<meta property="og:description" content="' . $description . '" />' . "\n";

		if (has_post_thumbnail())
			echo '<meta property="og:image" content="' . get_the_post_thumbnail_url() . '" />' . "\n";

		echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '" />' . "\n";
		echo '<meta property="og:locale" content="pt_BR" />' . "\n";

		// TWITTER

		echo '<!-- Twitter Open Graph Tags -->' . "\n";
		echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
		echo '<meta name="twitter:site" content="@caraguaoficial" />' . "\n";
		echo '<meta name="twitter:url" content="' . get_permalink() . '" />' . "\n";
		echo '<meta name="twitter:title" content="' . $post->post_title . '" />' . "\n";
		echo '<meta name="twitter:description" content="' . $post->description . '" />' . "\n";

		if (has_post_thumbnail())
			echo '<meta name="twitter:image" content="' . get_the_post_thumbnail_url() . '?w=640" />' . "\n";
  }
}
add_action( 'wp_head', 'add_meta_tags');

function get_tag_featured() {

	$featured = array('ID' => 0, 'name' => null);

	$tags = wp_get_post_terms(get_the_ID());

	foreach ($tags as $tag) {

		if ($tag->slug === 'destaques') {

			$featured['ID'] = $tag->term_id;
			$featured['name'] = $tag->name;
		}
	}

	return $featured;
}

function get_video($key = 0) {

	$textDescription = get_field('youtube_link');
  $parsed     = parse_url($textDescription);
  $hostname   = $parsed['host'];
  $query      = $parsed['query'];
  $path       = $parsed['path'];
  $Arr = explode('v=', $query);
  $videoIDwithString = $Arr[1];
  $videoID = substr($videoIDwithString, 0, 11); // 5sRDHnTApSw

  if(isset($videoID) && isset($hostname) && ($hostname=='www.youtube.com' || $hostname=='youtube.com'))

		echo '<div class="embed-responsive embed-responsive-16by9">
			      <iframe 
			      	id="yt-embed-'.$key.'" 
			        class="embed-responsive-item" 
			        src="https://www.youtube.com/embed/'.$videoID.'" 
			        webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe>
			    </div>';
}

// Coloca a div.table-responsive em torno da table
function tekst_wrapper($content) {

  return preg_replace_callback('~<table.*?</table>~is', function($match) {

    return '<div class="table-responsive">' . $match[0] . '</div>';

  }, $content);
}
add_filter('the_content', 'tekst_wrapper');

// Adiciona as classes do Bootstrap às tabelas
function add_bootstrap_table_class($content) {

	$regex = '/(<table)([^>]*)(>)/i';

	$tablestr = '<table class="table table-striped table-bordered table-hover table-sm">';

	$new_content = preg_replace($regex, "$1$3", $content);

  return str_replace('<table>', $tablestr, $new_content);
}
add_filter( 'the_content', 'add_bootstrap_table_class' );

// Shortcode to return all children pages - [page_hierarchy_menu child_of="262"]
function page_hierarchy_menu_handler($atts, $content = null) {

	$args = shortcode_atts(array(
	  'depth'        => 0,
	  'show_date'    => '',
	  'date_format'  => get_option('date_format'),
	  'child_of'     => 0,
	  'exclude'      => '',
	  'include'      => '',
	  'title_li'     => __(''),
	  'echo'         => 0,
	  'authors'      => '',
	  'sort_column'  => 'menu_order, post_title',
	  'link_before'  => '',
	  'link_after'   => '',
	  'item_spacing' => 'preserve',
	  'walker'       => '',
	  'post_type'    => 'page',
	  'post_status'  => 'publish',
	), $atts);

	return '<ol>'.wp_list_pages($args).'</ol>';
}
add_shortcode('page_hierarchy_menu', 'page_hierarchy_menu_handler');

// Allow an author to edit posts created by other authors
// function add_theme_caps() {
	
// 	$role = get_role( 'author' );
//    	$role->add_cap( 'edit_others_posts' ); 
// }
// add_action( 'admin_init', 'add_theme_caps');

//Desativa a api do wordpress, liberando apenas o endpoint de posts:
add_filter( 'rest_authentication_errors', function( $result ) {

    if ( ! empty( $result ) ) {
        return $result;
    }

    $request = $_SERVER['REQUEST_URI'] ?? '';

    // Permite endpoints públicos de posts
    if (
        strpos( $request, '/wp-json/wp/v2/posts' ) !== false
    ) {
        return $result;
    }

    // Permite endpoints públicos de paginas
    if (
        strpos( $request, '/wp-json/wp/v2/page' ) !== false
    ) {
        return $result;
    }

    // Bloqueia o restante para usuários não logados
    if ( ! is_user_logged_in() ) {
        return new WP_Error(
            'rest_not_logged_in',
            'You are not currently logged in.',
            array( 'status' => 401 )
        );
    }

    return $result;
});


add_filter( 'the_content', 'wp_learn_amend_content' );

function wp_learn_amend_content( $content ) {
    // do some things that update $content
    return $content;
}