<?php
/**
 * Plugin Name: Dr. Haiel Chatbot
 * Version: 1.0
 * Adds Dr. Haiel Chatbot to each page of a website
 * Author: David Guan
 * License: GPL2
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
	
	$react_app_js  = plugin_dir_url( __FILE__ ) . 'ls_uhcc_bot_fe/build/static/js/all_in_one_file.js';
    $react_app_css = plugin_dir_url( __FILE__ ) . 'ls_uhcc_bot_fe/build/static/css/somecss.css';
    // time stops stylesheet/js caching while in development, might want to remove later  
    $version = time();	
    wp_enqueue_script( 'haiel', $react_app_js, array(), $version, true );         
    wp_enqueue_style( 'haiel', $react_app_css, array(), $version );
}

add_action( 'wp_enqueue_scripts', 'helloworld_load_assets' );
add_action('wp_footer','helloworld_shortcode');


//trying to add settings page

function dbi_add_settings_page() {
    add_options_page( 'Example plugin page', 'Example Plugin Menu', 'manage_options', 'dbi-example-plugin', 'dbi_render_plugin_settings_page' );
}
function dbi_render_plugin_settings_page() {
    ?>
    <h2>Example Plugin Settings</h2>
    <form action="options.php" method="post">
        <?php 
        settings_fields( 'dbi_example_plugin_options' );
        do_settings_sections( 'dbi_example_plugin' ); ?>
        <input name="submit" class="button button-primary" type="submit" value="<?php esc_attr_e( 'Save' ); ?>" />
    </form>
    <?php
}
function dbi_register_settings() {
    register_setting( 'dbi_example_plugin_options', 'dbi_example_plugin_options', 'dbi_example_plugin_options_validate' );
    add_settings_section( 'api_settings', 'API Settings', 'dbi_plugin_section_text', 'dbi_example_plugin' );

    add_settings_field( 'dbi_plugin_setting_api_key', 'API Key', 'dbi_plugin_setting_api_key', 'dbi_example_plugin', 'api_settings' );
    add_settings_field( 'dbi_plugin_setting_results_limit', 'Results Limit', 'dbi_plugin_setting_results_limit', 'dbi_example_plugin', 'api_settings' );
    add_settings_field( 'dbi_plugin_setting_start_date', 'Start Date', 'dbi_plugin_setting_start_date', 'dbi_example_plugin', 'api_settings' );
}
function dbi_plugin_section_text() {
    echo '<p>Here you can set all the options for using the API</p>';
}

function dbi_plugin_setting_api_key() {
    $options = get_option( 'dbi_example_plugin_options' );
    echo "<input id='dbi_plugin_setting_api_key' name='dbi_example_plugin_options[api_key]' type='text' value='" . esc_attr( $options['api_key'] ) . "' />";
}

function dbi_plugin_setting_results_limit() {
    $options = get_option( 'dbi_example_plugin_options' );
    echo "<input id='dbi_plugin_setting_results_limit' name='dbi_example_plugin_options[results_limit]' type='text' value='" . esc_attr( $options['results_limit'] ) . "' />";
}

function dbi_plugin_setting_start_date() {
    $options = get_option( 'dbi_example_plugin_options' );
    echo "<input id='dbi_plugin_setting_start_date' name='dbi_example_plugin_options[start_date]' type='text' value='" . esc_attr( $options['start_date'] ) . "' />";
}
add_action( 'admin_init', 'dbi_register_settings' );
add_action( 'admin_menu', 'dbi_add_settings_page' );
echo "<script>window.alert('david');</script>";
echo "<script>
let number = 1;
window.alert(number);
</script>";