<?php
/*
 * Plugin Name: Awesome Addon For Elementor
 * Description: This plugin for elements widget for elementor
 * Version: 1.0
 * Author: Md Abul Bashar
 * Author URI: https://www.facebook.com/hmbashar/
 * Text Domain: DFAAE
 * Elementor tested up to:     3.6.8
 * Elementor Pro tested up to: 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


//define URL
define('DFAAE_URL', plugin_dir_url( __FILE__ ));
define('DFAAE_PATH', plugin_dir_path(__FILE__));



function dfaae_plugin_general_init() {

	// Load plugin file
	require_once( __DIR__ . '/elementor-addon/includes/elementor-configuration.php' );

	// Run the plugin
	\DFAAE_ELEMENTOR\Plugin::instance();

}
add_action( 'plugins_loaded', 'dfaae_plugin_general_init' );



/**
 * Enqueue scripts and styles.
 */
function dfaae_stylesheet_enque() {    
    wp_enqueue_style( 'dfaae_stylesheet',  $DFAAE_URL . "/css/style.css");
}
add_action( 'wp_enqueue_scripts', 'dfaae_stylesheet_enque' );


function dfaae_general_function() {
	add_image_size( 'our-work', 400, 300, true );
}
add_action('after_setup_theme', 'dfaae_general_function');



// add custom our own category for this plugin
function dfaae_add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'dfaae-category',
		[
			'title' => esc_html__( 'Awesome Addon', 'dfaae' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'dfaae_add_elementor_widget_categories' );