<?php
/**
 * PMC Caraguatatuba — funções do tema.
 *
 * O tema é um Block Theme nativo: praticamente toda a apresentação vem do
 * theme.json e da marcação de blocos em templates/, parts/ e patterns/.
 * Este arquivo se limita a suportes de tema, enfileiramento de assets e
 * registro da categoria de padrões.
 *
 * @package PMC_Caraguatatuba
 */

declare( strict_types = 1 );

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'PMC_CARAGUATATUBA_VERSION' ) ) {
	define( 'PMC_CARAGUATATUBA_VERSION', '1.0.0' );
}

/**
 * Suportes do tema.
 */
function pmc_caraguatatuba_setup(): void {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'html5', array( 'search-form', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 128,
		'width'       => 128,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	add_editor_style( 'assets/css/portal.css' );

	load_theme_textdomain( 'pmc-caraguatatuba', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'pmc_caraguatatuba_setup' );

/**
 * CSS e JS do front-end.
 *
 * portal.css complementa o theme.json apenas onde o WordPress nativo não
 * consegue expressar a estrutura (posicionamento em camadas do hero, pill da
 * busca, faixa de eventos rolável).
 */
function pmc_caraguatatuba_assets(): void {
	$css_path = get_theme_file_path( 'assets/css/portal.css' );
	$js_path  = get_theme_file_path( 'assets/js/portal.js' );

	wp_enqueue_style(
		'pmc-portal',
		get_theme_file_uri( 'assets/css/portal.css' ),
		array('global-styles'),
		file_exists( $css_path ) ? (string) filemtime( $css_path ) : PMC_CARAGUATATUBA_VERSION
	);

	wp_enqueue_script(
		'pmc-portal',
		get_theme_file_uri( 'assets/js/portal.js' ),
		array(),
		file_exists( $js_path ) ? (string) filemtime( $js_path ) : PMC_CARAGUATATUBA_VERSION,
		array( 'strategy' => 'defer', 'in_footer' => true )
	);
}
add_action( 'wp_enqueue_scripts', 'pmc_caraguatatuba_assets' );

/**
 * Categoria própria para os padrões do portal.
 */
function pmc_caraguatatuba_pattern_category(): void {
	if ( ! function_exists( 'register_block_pattern_category' ) ) {
		return;
	}

	register_block_pattern_category(
		'pmc-caraguatatuba',
		array(
			'label'       => __( 'Portal Caraguatatuba', 'pmc-caraguatatuba' ),
			'description' => __( 'Seções do portal institucional da Prefeitura de Caraguatatuba.', 'pmc-caraguatatuba' ),
		)
	);
}
add_action( 'init', 'pmc_caraguatatuba_pattern_category' );
