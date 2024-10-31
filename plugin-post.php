<?php
$options = get_option('wpsj_settings');
//var_dump($options);
/*
if(!function_exists('getValues'))
{
function getValues(){
}
}
*/
if(!function_exists('wpScarcityJeet_mainwrapper'))
{
function wpScarcityJeet_mainwrapper($content){
	ob_start();
	$options = get_option('wpsj_settings');
	date_default_timezone_set($options['timezone']);
	$endDate = new DateTime($options['end_date']);
	$dateNow = new DateTime('now');
        //print_r($dateNow);
	$diff = $endDate->format('U') - $dateNow->format('U');

	switch ($options['expiry_action']) {
		case 'none':
			if($diff<=0)return false;
			break;
		case 'redirect' : 
			if($diff<=0){
				echo '<script type="text/javascript">document.location.href="'.esc_url($options['expiry_url']).'";</script>';
				return false;
			}
			break;
		default:
			break;
	}

	if($options['position']=="top"){
		require("wpscarcityjeet_top.php");
	}else{
		require("wpscarcityjeet_bot.php");
	}
	require("css/wpsj-inline.css.php");
	?>
	<id="wpscarcityjeet_audio" controls="controls" style="display:none;">
		<source src="<?php echo esc_url(plugins_url('images/notify.ogg', __FILE__ )); ?>" type="audio/ogg">
		<source src="<?php echo esc_url(plugins_url('images/notify.mp3', __FILE__ )); ?>" type="audio/mpeg">
	</audio>
	<?php
	$wpsjTimer = ob_get_clean();
	$wpsjTimer = trim(preg_replace('/\s+/', ' ', $wpsjTimer));
	$content = $wpsjTimer.$content;
	return $content;
}
}

if(!function_exists('wpscarcityjeet_enqueue_scripts'))
{
function wpscarcityjeet_enqueue_scripts() {
	$options = get_option('wpsj_settings');	
	
	$ver = "1.0.0";
        wp_enqueue_style("animation_library", plugins_url('css/animate.css', __FILE__), $ver );
	wp_enqueue_style("wpscarcityjeet", plugins_url('css/wpscarcityjeet.css', __FILE__), $ver );
	wp_enqueue_style("countdown_css", plugins_url('css/jquery.countdown.css', __FILE__), $ver );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script("countdown-plugin", plugins_url('js/jquery.plugin.min.js', __FILE__), array('jquery'), $ver );
	wp_enqueue_script("countdown", plugins_url('js/jquery.countdown.min.js', __FILE__), array('jquery'), $ver );
	wp_enqueue_script("initialize", plugins_url('js/initialize.js', __FILE__), array('jquery'), $ver );
	
	$wpsjTimer = addslashes(wpScarcityJeet_mainwrapper(""));
	//include("js/initialize.js.php");
}
}
//add_action('wp_head', 'wpscarcityjeet_enqueue_scripts');
add_filter("the_content", function($content){
	$options = get_option('wpsj_settings');	
	
	ob_start();
	include("js/initialize.js.php");
	$wpsj_script = ob_get_clean();
	$content .= $wpsj_script;
	return $content;
}, 100);

if(!function_exists('wpsj_returnFalse'))
{
function wpsj_returnFalse(){
	return false;
}
}

if($options['apply_to'] == 'all'){
	add_action('wp_head', 'wpscarcityjeet_enqueue_scripts');
	add_shortcode('wp_scarcity_jeet', 'wpsj_returnFalse');
}else{
	add_shortcode('wp_scarcity_jeet', 'wpscarcityjeet_enqueue_scripts');
}