<?php
/**
 * @package wpScarcityJeet
 * version 1.0
 */
/*
Plugin Name: Scarcity Jeet
Plugin URI: https://teknikforce.com
Description: Implement scarcity on your webpages and boost your conversions.
Version: 1.0.1
Author: Cecil Gupta
License: GPLv2 or later
*/

if(!defined('ABSPATH')){exit;}

global $options;
global $attribs;

$options = get_option('wpscarcityjeet_settings');

if(!function_exists('wpsj_activationHook'))
{
function wpsj_activationHook(){
	$options = array(
		"apply_to" => 'all',
		"position" => 'bottom',
		"color1" => '#1a82f7',
		"color2" => '#2f2727',
		"catch_line" => 'Hurry! The offer ends soon',
		"catch_line_color" => '#fff',

		"show_action_button" => '1',
		"action_button_color" => '#91bd09',
		"action_button_text" => 'Subscribe',
		"action_button_link" => '#',
		"action_button_text_color" => '#fff',

		"action_button_product_box_show" => '1',
		"action_button_product_box_image" => plugins_url('images/product_box.png', __FILE__),
		"action_button_product_box_link" => '#',

		"timezone" => "UTC",
		"format" => "DHMS",
		"end_date" => date("Y-m-d h:i", time()+86400),
		"timer_color1" => "#555",
		"timer_color2" => "#333",
		"timer_text_color" => "#fff",
		
		"expiry_action" => "none",
		"expiry_url" => "#",

		"effect" => "none",
		"effect_delay" => 3,
		"effect_transition" => 0.3,
		"effect_sound" => "1"
		);
	add_option('wpsj_settings',$options);
}
}

register_activation_hook( __FILE__, 'wpsj_activationHook' );

if(is_admin()){
	include("plugin-option-page.php");
}else{
	include("plugin-post.php");
}