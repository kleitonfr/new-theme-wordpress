<?php
/**
 * Funções e suportes de tema — Prefeitura de Caraguatatuba
 *
 * @package PMC_Caraguatatuba
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Segurança: impede acesso direto ao arquivo.
}

define( 'PMC_THEME_VERSION', '0.1.0' );

/**
 * Suportes de tema (padrão para block themes / FSE).
 */
function pmc_caraguatatuba_setup() {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 90,
		'width'       => 90,
		'flex-height' => true,
		'flex-width'  => false,
	) );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );

	add_editor_style( 'assets/css/header.css' );
}
add_action( 'after_setup_theme', 'pmc_caraguatatuba_setup' );

/**
 * Enfileira estilos e scripts do front-end.
 *
 * O style.css só carrega o cabeçalho do tema (obrigatório no WP);
 * o design real do header+banner vive em assets/css/header.css,
 * que cobre tudo que o theme.json não resolve nativamente
 * (barra de utilidades, ticker de eventos, overlay e dots do carrossel).
 */
function pmc_caraguatatuba_assets() {
	wp_enqueue_style(
		'pmc-caraguatatuba-style',
		get_stylesheet_uri(),
		array(),
		PMC_THEME_VERSION
	);

	wp_enqueue_style(
		'pmc-caraguatatuba-header',
		get_theme_file_uri( 'assets/css/header.css' ),
		array( 'pmc-caraguatatuba-style' ),
		PMC_THEME_VERSION
	);

	wp_enqueue_script(
		'pmc-caraguatatuba-header',
		get_theme_file_uri( 'assets/js/header.js' ),
		array(),
		PMC_THEME_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'pmc_caraguatatuba_assets' );

/**
 * Registra os padrões (patterns) do tema, incluindo o header+banner,
 * para que fiquem disponíveis no inserter do editor além do template part.
 */
function pmc_caraguatatuba_register_pattern_category() {
	register_block_pattern_category(
		'pmc-caraguatatuba',
		array( 'label' => __( 'Portal Caraguatatuba', 'pmc-caraguatatuba' ) )
	);
}
add_action( 'init', 'pmc_caraguatatuba_register_pattern_category' );
