<?php
/*
 * Plugin Name: Awesome Addon For Elementor
 * Description: This plugin for elements widget for elementor
 * Version: 1.0
 * Author: Md Abul Bashar
 * Author URI: https://www.facebook.com/hmbashar/
 * Text Domain: cbpw
 * Elementor tested up to:     3.5.0
 * Elementor Pro tested up to: 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Enqueue scripts and styles.
 */
function cb_pwork_stylesheet_enque() {
    $cb_pwork_url = plugin_dir_url( __FILE__ );
    wp_enqueue_style( 'cb_pwork_stylesheet',  $cb_pwork_url . "/css/style.css");
}
add_action( 'wp_enqueue_scripts', 'cb_pwork_stylesheet_enque' );


function cb_pwork_general_function() {
	add_image_size( 'our-work', 400, 300, true );
}
add_action('after_setup_theme', 'cb_pwork_general_function');



