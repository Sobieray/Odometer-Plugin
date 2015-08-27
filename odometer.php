<?php
/**
 * Plugin Name: Odometer
 * Plugin URI: http://jns.design
 * Description: This plugin adds Odometer by HubSpot.
 * Version: 1.0.0
 * Author: Matt Sobieray
 * Author URI: http://hyfyn.com
 * License: GPL2
 */

add_shortcode('odometer', 'odometer_shortcode');
add_action('wp_enqueue_scripts', 'odometer_scripts');
function odometer_scripts() {
    $url = plugin_dir_url( __FILE__ );
    wp_enqueue_style('odometer-default', $url  . 'odometer-theme-default.css', array(), null, false );
    wp_enqueue_style('odometer-custom', $url  . 'custom.css', array(), null, false );
    wp_enqueue_script( 'odometer-js', $url  . 'odometer.min.js', array(), null, false );
    wp_enqueue_script('odometer-init', $url  . 'odometer-init.js', array(), null, true );
}
function odometer_shortcode($atts) {
	$a = shortcode_atts( array(
		 'start_number' => '0',
		 'finish_number' => '15',
		 'text' => 'the text'
		), $atts );
	return '<div class="hero_content odometer-container"><div class="border-right"><div class="odometer" data-end="'.esc_attr($a['finish_number']).'">'. esc_attr($a['start_number']) .'</div><p>'. esc_attr($a['text']) .'</p></div></div>';    
}
?>