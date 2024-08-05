<?php
/**
 * Plugin Name: Dr Haiel
 * Version: First version
 * Description: use shortcode "[haiel]" in wordpress page to activate
 */

function helloworld_shortcode() {

	return '<div id="haiel" ></div>';
}

// add_shortcode('hello-world-react', 'helloworld_shortcode');
add_shortcode('haiel', 'helloworld_shortcode');

function helloworld_load_assets() {
	
	$react_app_js  = plugin_dir_url( __FILE__ ) . 'helloworldreactapp/build/static/js/all_in_one_file.js';
    $react_app_css = plugin_dir_url( __FILE__ ) . 'helloworldreactapp/build/static/css/somecss.css';
    // time stops stylesheet/js caching while in development, might want to remove later  
    $version = time();	
    wp_enqueue_script( 'haiel', $react_app_js, array(), $version, true );         
    wp_enqueue_style( 'haiel', $react_app_css, array(), $version );
}

add_action( 'wp_enqueue_scripts', 'helloworld_load_assets' );