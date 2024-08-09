<?php
/**
 * Plugin Name: Dr. Haiel Chatbot
 * Version: 1.0
 * Adds Dr. Haiel Chatbot to each page of a website
 * Author: David Guan
 * License: GPL2
 * Description: Adds a chatbot to a hospital website to help patients navigate
 * 
 */

 function helloworld_shortcode() {

    ?> '<div id="haiel" ></div>'
    <?php
}
// function helloworld_shortcode() {

// 	return '<div id="haiel" ></div>';
// }

// need to change from shortcode to automatic
add_shortcode('haiel', 'helloworld_shortcode');

function helloworld_load_assets() {
	
	$react_app_js  = plugin_dir_url( __FILE__ ) . 'updateddrhaiel/build/static/js/all_in_one_file.js';
    $react_app_css = plugin_dir_url( __FILE__ ) . 'updateddrhaiel/build/static/css/somecss.css';
    // time stops stylesheet/js caching while in development, might want to remove later  
    $version = time();	
    wp_enqueue_script( 'haiel', $react_app_js, array(), $version, true );         
    wp_enqueue_style( 'haiel', $react_app_css, array(), $version );
}

add_action( 'wp_enqueue_scripts', 'helloworld_load_assets' );
add_action('wp_footer','helloworld_shortcode');