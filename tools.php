<?php
/*
 * Plugin Name: Awesome Elements For Elementor
 * Description: This plugin for elements widget for elementor
 * Version: 1.0
 * Author: Md Abul Bashar
 * Author URI: https://www.facebook.com/hmbashar/
 * Text Domain: AEFE
 * Elementor tested up to:     3.6.8
 * Elementor Pro tested up to: 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


//define URL
define('AEFE_URL', plugin_dir_url( __FILE__ ));
define('AEFE_PATH', plugin_dir_path(__FILE__));



function aefe_plugin_general_init() {

	// Load plugin file
	require_once( __DIR__ . '/elementor-addon/includes/elementor-configuration.php' );

	// Run the plugin
	\AEFE_ELEMENTOR\Plugin::instance();

}
add_action( 'plugins_loaded', 'aefe_plugin_general_init' );



/**
 * Enqueue scripts and styles.
 */
function aefe_stylesheet_enque() {    
    wp_enqueue_style( 'aefe_stylesheet',  AEFE_URL . "/assets/css/style.css");
}
add_action( 'wp_enqueue_scripts', 'aefe_stylesheet_enque' );


function aefe_general_function() {
	add_image_size( 'our-work', 400, 300, true );
}
add_action('after_setup_theme', 'aefe_general_function');



// add custom our own category for this plugin
function aefe_add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'aefe-category',
		[
			'title' => esc_html__( 'Awesome Elements', 'aefe' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'aefe_add_elementor_widget_categories' );