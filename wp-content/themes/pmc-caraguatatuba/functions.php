<?php
/**
 * Theme supports and assets for the Prefeitura de Caraguatatuba block theme.
 *
 * @package PMC_Caraguatatuba
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'PMC_THEME_VERSION', '0.2.0' );

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

	add_editor_style( 'assets/css/portal.css' );
}
add_action( 'after_setup_theme', 'pmc_caraguatatuba_setup' );

function pmc_caraguatatuba_assets() {
	wp_enqueue_style( 'pmc-caraguatatuba-style', get_stylesheet_uri(), array(), PMC_THEME_VERSION );
	wp_enqueue_style( 'pmc-caraguatatuba-portal', get_theme_file_uri( 'assets/css/portal.css' ), array( 'pmc-caraguatatuba-style' ), PMC_THEME_VERSION );
	wp_enqueue_script( 'pmc-caraguatatuba-portal', get_theme_file_uri( 'assets/js/portal.js' ), array(), PMC_THEME_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'pmc_caraguatatuba_assets' );

function pmc_caraguatatuba_register_pattern_category() {
	register_block_pattern_category(
		'pmc-caraguatatuba',
		array( 'label' => __( 'Portal Caraguatatuba', 'pmc-caraguatatuba' ) )
	);
}
add_action( 'init', 'pmc_caraguatatuba_register_pattern_category' );
