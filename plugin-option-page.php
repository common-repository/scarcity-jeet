<?php
if(!function_exists('wpsj_addOptionsLink'))
{
function wpsj_addOptionsLink(){
	add_options_page('WP Scarcity Jeet Options', "WP Scarcity Jeet", 'manage_options', 'wpscarcityjeet_options','wpScarcityJeetOptionsPage');
}
}

$cmntmkrpref='wpscarcityjeet_';
require_once("wpscarcityjeet-sequence/plugin.php");

   	$gdprwpvar=new \Wpscarcityjeet\license\wpscarcityjeetpluginlisence(array('wpscarcityjeet','wpscarcityjeet_'));
    if($gdprwpvar->validate()==1)
    {
    add_action('admin_menu','wpsj_addOptionsLink');
    }
    else
    {
		if(isset($_GET["page"]) && ($_GET['page']=='wpscarcityjeet_options'))
		{
		add_action('admin_enqueue_scripts',function(){
			wp_register_style('bootstrap_for_lockscreen_wpfbbarjeet',plugins_url('wpscarcityjeet-sequence/asset/bootstrap/css/bootstrap.min.css',__FILE__));
			wp_enqueue_style('bootstrap_for_lockscreen_wpfbbarjeet');
		});
		}
    new \Wpscarcityjeet\license\wpscarcityjeetactivationpage(array('wpscarcityjeet','wpscarcityjeet_'));
	}
	
	add_action('wp_ajax_wpscarcityjeet_adminajxlcnc',
	function()
	{
		if(isset($_POST['reverifyjkmvhblicense']) && isset($_POST['rvryfyplugin']) && isset($_POST['rvryfypluginpref'])
		&&(isset($_POST['wpscarcityjeet_csrf']) && wp_verify_nonce($_POST['wpscarcityjeet_csrf'],'wpscarcityjeet')))
		{
			$ob=new \Wpscarcityjeet\license\wpscarcityjeetpluginlisence(array(sanitize_text_field($_POST['rvryfyplugin']),sanitize_text_field($_POST['rvryfypluginpref'])));
			$ob->reValidate("server");
		}
		wp_die();
	});

	add_action('admin_footer',function(){
		if(isset($_GET['page']) && $_GET['page']=='wpscarcityjeet_options')
		{
			echo '<span class="pull-right" style="bottom:0px;right:0px;margin-bottom:35px;margin-right:10px;position:absolute"><a href="https://teknikforce.com" target="_BLANK"><img src="'.esc_url(plugins_url('images/tekniklogo.png',__FILE__)).'" style="cursor:pointer"></a></span>';
		}
	});

function wpsj_plugin_action_links( $links, $file ) {
	if ( $file == plugin_basename( dirname(__FILE__).'/wpscarcityjeet.php' ) ) {
		array_unshift($links, '<a href="' . esc_url(admin_url( 'admin.php?page=wpscarcityjeet_options' )) . '">'.__( 'Settings' ).'</a>');
	}//print_r($links);
	return $links;
}

add_filter( 'plugin_action_links', 'wpsj_plugin_action_links', 10, 2 );



if(!function_exists('wpsj_register_settings'))
{
function wpsj_register_settings(){
	register_setting('wpscarcityjeet_settings_group', 'wpsj_settings', 'wpsj_sanitize_options');
}
}

add_action('admin_init','wpsj_register_settings');

if(!function_exists('wpsj_sanitize_options'))
{
function wpsj_sanitize_options($options){
	$options['show_action_button'] = isset($options['show_action_button'] ) ? true : false;
	$options['product_box_show'] = isset($options['product_box_show'] ) ? true : false;
	$options['effect_sound'] = isset($options['effect_sound'] ) ? true : false;
	return $options;
}
}

if(!function_exists('wpsj_add_assets'))
{
function wpsj_add_assets(){
	wp_enqueue_style("my_style", plugins_url('css/options.css', __FILE__) );
	wp_enqueue_style("datepicker", plugins_url('css/jquery.simple-dtpicker.css', __FILE__) );
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'wp-color-picker');
	 wp_enqueue_script("datepicker", plugins_url('js/jquery.simple-dtpicker.js', __FILE__) );
	wp_enqueue_script("my_script", plugins_url('js/plugin-option.js', __FILE__) );
}
}
/**
 * Return an array of timezones
 * 
 * @return array
 */

 if(!function_exists('wpscarcity_timezoneList'))
 {
function wpscarcity_timezoneList(){
    $timezoneIdentifiers = DateTimeZone::listIdentifiers();
    $utcTime = new DateTime('now', new DateTimeZone('UTC'));
   
    $tempTimezones = array();
    foreach ($timezoneIdentifiers as $timezoneIdentifier) {
        $currentTimezone = new DateTimeZone($timezoneIdentifier);
     //print_r($currentTimezone);
        $tempTimezones[] = array(
            'offset' => (int)$currentTimezone->getOffset($utcTime),
            'identifier' => $timezoneIdentifier
        );//print_r($tempTimezones);
    }

    function doUsort($a, $b){
        
    	return ($a['offset'] == $b['offset'])
			? strcmp($a['identifier'], $b['identifier'])
			: $a['offset'] - $b['offset'];
    }
    // Sort the array by offset,identifier ascending
    usort($tempTimezones, 'doUsort');
      
	$timezoneList = array();
    foreach ($tempTimezones as $tz) {
		$sign = ($tz['offset'] > 0) ? '+' : '-';
		$offset = gmdate('H:i', abs($tz['offset']));
        $timezoneList[$tz['identifier']] = '(UTC ' . $sign . $offset . ') ' .
			$tz['identifier'];
    }

    return $timezoneList;
}
 }
if(!function_exists('wpScarcityJeetOptionsPage'))
{
function wpScarcityJeetOptionsPage(){
	ob_start();
	wpsj_add_assets();
	$options = get_option('wpsj_settings');

	$tzlist = wpscarcity_timezoneList();

	$defaultTime = date("Y-m-d h:i", time()+86400);
	?>
	<div class="wrap wpsj">
		<h2>WP Scarcity Jeet Options</h2>

		<form method="post" action="options.php" class="wpsj_form">
			<?php settings_fields('wpscarcityjeet_settings_group'); ?>
			<?php do_settings_sections('wpscarcityjeet_settings_group'); ?>
			
			<p>
				<label for="wpsj_settings[apply_to]" class="description"><?php  _e('Apply To :', 'wpscarcityjeet'); ?></label>
				<select name="wpsj_settings[apply_to]" id="wpsj_settings[apply_to]">
					<?php 
					$applyTo = array("all"=>"Show on all pages", "shortcode"=>"shortcode only");
					foreach ($applyTo as $key => $value) {
						$selected = ($options["apply_to"] == $key) ? "selected='selected'" : "";
						?>
						<option value="<?php echo esc_attr($key);?>" <?php selected($options['apply_to'], $key );?> ><?php echo esc_html($value);?></option>
						<?php
					}
					?>
				</select> use shortcode - <b>[wp_scarcity_jeet]</b>
			</p>
			<fieldset>
				<legend><?php _e('Bar Appearance', 'wpscarcityjeet'); ?></legend>
				<p>
					<label for="wpsj_settings[position]" class="description"><?php _e('Position :', 'wpscarcityjeet'); ?></label>
					<select name="wpsj_settings[position]" id="wpsj_settings[position]">
						<?php 
						$position = array("top"=>"Top", "bottom"=>"Bottom");
						foreach ($position as $key => $value) {
							?>
							<option value="<?php echo esc_attr($key);?>" <?php selected($options['position'], $key );?>><?php echo esc_html($value);?></option>
							<?php
						}
						?>
					</select>
				</p>

				<p style="height:50px;">
					<label for="wpsj_settings[color1]" class="description"><?php _e('Bar Gradient :', 'wpscarcityjeet'); ?></label>
					<input type="text" name="wpsj_settings[color1]" id="wpsj_settings[color1]" class="colorField " value="<?php echo esc_attr($options['color1']);?>" />to 
					<input type="text" name="wpsj_settings[color2]" id="wpsj_settings[color2]" class="colorField " value="<?php echo esc_attr($options['color2']);?>" />: &nbsp;
					<span class="previewColor">Preview</span>
				</p>
				<p>
					<label for="wpsj_settings[catch_line]" class="description"><?php _e('Catch Line :', 'wpscarcityjeet'); ?></label>
					<input type="text" name="wpsj_settings[catch_line]" id="wpsj_settings[catch_line]" class="inputField" value="<?php echo esc_attr($options['catch_line']);?>" />
				</p>

				<p style="height:50px;">
					<label for="wpsj_settings[catch_line_color]" class="description"><?php _e('Catch Line Color :', 'wpscarcityjeet'); ?></label>
					<input type="text" name="wpsj_settings[catch_line_color]" id="wpsj_settings[catch_line_color]" class="colorField " value="<?php echo esc_attr($options['catch_line_color']);?>" />
				</p>

				<fieldset class="toggles">
					<legend>
						<label for="wpsj_settings[show_action_button]" class="description"><?php _e('Show Action Button :', 'wpscarcityjeet'); ?></label>
						<input type="checkbox" name="wpsj_settings[show_action_button]" id="wpsj_settings[show_action_button]" class="inputCheck" value="true" <?php checked($options['show_action_button']==true); ?> />
					</legend>
					<p>
						<label for="wpsj_settings[action_button_color]" class="description"><?php _e('Background Color :', 'wpscarcityjeet'); ?></label>
						<input type="text" name="wpsj_settings[action_button_color]" id="wpsj_settings[action_button_color]" class="colorField " value="<?php echo esc_attr($options['action_button_color']);?>" />
					</p>
					<p>
						<label for="wpsj_settings[action_button_text]" class="description"><?php _e('Button Text :', 'wpscarcityjeet'); ?></label>
						<input type="text" name="wpsj_settings[action_button_text]" id="wpsj_settings[action_button_text]" class="inputField" value="<?php echo esc_attr($options['action_button_text']);?>" />
					</p>
					<p style="height:50px;">
						<label for="wpsj_settings[action_button_text_color]" class="description"><?php _e('Button Text Color :', 'wpscarcityjeet'); ?></label>
						<input type="text" name="wpsj_settings[action_button_text_color]" id="wpsj_settings[action_button_text_color]" class="colorField " value="<?php echo esc_attr($options['action_button_text_color']);?>" />
					</p>
					<p>
						<label for="wpsj_settings[action_button_link]" class="description"><?php _e('Link to :', 'wpscarcityjeet'); ?></label>
						<input type="text" name="wpsj_settings[action_button_link]" id="wpsj_settings[action_button_link]" class="inputField" value="<?php echo esc_attr($options['action_button_link']);?>" />
					</p>
				</fieldset>
				
				<fieldset class="toggles">
					<legend>
						<label for="wpsj_settings[product_box_show]" class="description"><?php _e('Show Image :', 'wpscarcityjeet'); ?></label>
						<input type="checkbox" name="wpsj_settings[product_box_show]" id="wpsj_settings[product_box_show]" class="inputCheck" value="true" <?php checked($options['product_box_show']==true); ?> />
					</legend>
					<p>
						<label for="wpsj_settings[product_box_image]" class="description"><?php _e('Image Path :', 'wpscarcityjeet'); ?></label>
						<?php $defaultBox = plugins_url('images/product_box.png', __FILE__); ?>
						<input type="text" name="wpsj_settings[product_box_image]" id="wpsj_settings[product_box_image]" class="inputField" value="<?php echo esc_attr($options['product_box_image']);?>" />
					</p>
					<p>
						<label for="wpsj_settings[product_box_link]" class="description"><?php _e('Link to :', 'wpscarcityjeet'); ?></label>
						<input type="text" name="wpsj_settings[product_box_link]" id="wpsj_settings[product_box_link]" class="inputField" value="<?php echo esc_attr($options['product_box_link']);?>" />
					</p>
				</fieldset>

			</fieldset>

			<fieldset>
				<legend><?php _e('Timer Configuration', 'wpscarcityjeet'); ?></legend>
				<p>
					<label for="wpsj_settings[timezone]" class="description"><?php _e('Select Timezone :', 'wpscarcityjeet'); ?></label>
					<select name="wpsj_settings[timezone]" id="wpsj_settings[timezone]">
						<?php 
						foreach ($tzlist as $key => $value) {
							?>
							<option value="<?php echo $key;?>" <?php selected($options['timezone'], $key );?> ><?php echo esc_html($value);?></option>
							<?php
						}
						?>
					</select>
				</p>

				<p>
					<label for="wpsj_settings[format]" class="description"><?php _e('Format :', 'wpscarcityjeet'); ?></label>

					<select name="wpsj_settings[format]" id="wpsj_settings[format]">
						<?php 
						$format = array(
							"YOWDHMS"=>"Year, Month, Weeks, Days, Hours, Minutes, Seconds", 
							"YODHMS"=>"Year, Month, Days, Hours, Minutes, Seconds", 
							"ODHMS"=>"Month, Days, Hours, Minutes, Seconds",
							"DHMS"=>"Days, Hours, Minutes, Seconds",
							"HMS"=>" Hours, Minutes, Seconds",
							"HM"=>" Hours, Minutes"
							);
						foreach ($format as $key => $value) {
							?>
							<option value="<?php echo esc_attr($key);?>" <?php selected($options['format'], $key );?> ><?php echo esc_html($value);?></option>
							<?php
						}
						?>
					</select>
				</p>

				<p>
					<label for="wpsj_settings[end_date]" class="description"><?php _e('Timer End Date / Time :', 'wpscarcityjeet'); ?></label>
					<input type="text" name="wpsj_settings[end_date]" id="wpsj_settings[end_date]" class="date-pick inputField" value="<?php echo esc_attr($options['end_date']);?>" />
				</p>

				<p style="height:50px;">
					<label for="wpsj_settings[timer_color1]" class="description"><?php _e('Numbers Gradient :', 'wpscarcityjeet'); ?></label>
					<input type="text" name="wpsj_settings[timer_color1]" id="wpsj_settings[timer_color1]" class="colorField " value="<?php echo esc_attr($options['timer_color1']);?>" />to 
					<input type="text" name="wpsj_settings[timer_color2]" id="wpsj_settings[timer_color2]" class="colorField " value="<?php echo esc_attr($options['timer_color2']);?>" />: &nbsp;
					<span class="previewNumbersColor">Preview</span>
				</p>

				<p style="height:50px;">
					<label for="wpsj_settings[timer_text_color]" class="description"><?php _e('Text Color :', 'wpscarcityjeet'); ?></label>
					<input type="text" name="wpsj_settings[timer_text_color]" id="wpsj_settings[timer_text_color]" class="colorField " value="<?php echo esc_attr($options['timer_text_color']);?>" />
				</p>

			</fieldset>

			<fieldset class="toggles <?php echo ($options['expiry_action'] == "none") ? "disabled" :""; ?>">
				<legend>
					<label for="wpsj_settings[expiry_action]" class="description"><?php _e('on Expiry :', 'wpscarcityjeet'); ?></label>
					<select name="wpsj_settings[expiry_action]" id="wpsj_settings[expiry_action]" style="width:250px;">
						<?php 
						$expiry_action = array("none"=>"Don't show the Bar at all", "expired"=>"Show Expired Timer at zero", "redirect"=>"Redirect to URL");
						foreach ($expiry_action as $key => $value) {
							?>
							<option value="<?php echo esc_attr($key);?>" <?php selected($options['expiry_action'], $key );?> ><?php echo esc_html($value);?></option>
							<?php
						}
						?>
					</select>

				</legend>
				<p>
					<label for="wpsj_settings[expiry_url]" class="description"><?php _e('Redirect URL :', 'wpscarcityjeet'); ?></label>
					<input type="text" name="wpsj_settings[expiry_url]" id="wpsj_settings[expiry_url]" class="inputField urlLink" value="<?php echo esc_attr($options['expiry_url']);?>" />
				</p>
			</fieldset>

			<fieldset class="toggles <?php echo ($options['effect'] == "none") ? "disabled" :""; ?>">
				<legend>
					<label for="wpsj_settings[effect]" class="description"><?php _e('Effect :', 'wpscarcityjeet'); ?></label>
					<select name="wpsj_settings[effect]" id="wpsj_settings[effect]" style="">
						<?php 
						$expiry_action = array("none"=>"No Effect", "slide"=>"Slide In", "fade"=>"Fade In", "bounce"=>"Bounce", "flash"=>"Flash", "pulse"=>"Pulse",
                                                    "rubberBand"=>"Rubber Band", "shake"=>"Shake", "headShake"=>"Head Shake", "swing"=>"Swing", "tada"=>"Tada", "wobble"=>"Wobble", "jello"=>"Jello", 
                                                    "bounceIn"=>"Bounce In", "bounceInDown"=>"Bounce In Down", "bounceInLeft"=>"Bounce In Left", "bounceInRight"=>"Bounce In Right", "bounceInUp"=>"Bounce In Up",
                                                    "fadeInDown"=>"Fade In Down", "fadeInDownBig"=>"Fade In Down Big", "fadeInLeft"=>"Fade In Left", "fadeInLeftBig"=>"Fade In Left Big", "fadeInRight"=>"Fade In Right",
                                                    "fadeInRightBig"=>"Fade In Right Big", "fadeInUp"=>"Fade In Up", "flip"=>"Flip", "flipInX"=>"Flip In X", "flipInY"=>"Flip In Y", "lightSpeedIn"=>"Light Speed In",
                                                    "rotateIn"=>"Rotate In", "rotateInDownLeft"=>"Rotate In Down Left", "rotateInDownRight"=>"Rotate In Down Right", "rotateInUpLeft"=>"Rotate In Up Left", 
                                                    "rotateInUpRight"=>"Rotate In Up Right", "rollIn"=>"Roll In", "zoomIn"=>"Zoom In", "zoomInDown"=>"Zoom In Down", "zoomInLeft"=>"Zoom In Left", 
                                                    "zoomInRight"=>"Zoom In Right", "zoomInUp"=>"Zoom In Up", "slideInDown"=>"Slide In Down", "slideInLeft"=>"Slide In Left", "slideInRight"=>"Slide In Right");
						foreach ($expiry_action as $key => $value) {
							?>
							<option value="<?php echo esc_attr($key);?>" <?php selected($options['effect'], $key);?> ><?php echo esc_html($value);?></option>
							<?php
						}
						?>
					</select>
				</legend>
				<p>
					<label for="wpsj_settings[effect_delay]" class="description"><?php _e('Delay :', 'wpscarcityjeet'); ?></label>
					<input type="text" name="wpsj_settings[effect_delay]" id="wpsj_settings[effect_delay]" class="inputField number" value="<?php echo esc_attr($options['effect_delay']);?>" /> seconds
				</p>
				<p>
					<label for="wpsj_settings[effect_transition]" class="description"><?php _e('Transition Time :', 'wpscarcityjeet'); ?></label>
					<input type="text" name="wpsj_settings[effect_transition]" id="wpsj_settings[effect_transition]" class="inputField number" value="<?php echo esc_attr($options['effect_transition']);?>" /> seconds
				</p>
				<p>
					<label for="wpsj_settings[effect_sound]" class="description"><?php _e('Play Sound :', 'wpscarcityjeet'); ?></label>
					<input type="checkbox" name="wpsj_settings[effect_sound]" id="wpsj_settings[effect_sound]" class="inputCheck" <?php checked($options['effect_sound']==true); ?> value="true" />
				</p>
			</fieldset>

			<?php submit_button( "Save Settings" );?>
		</form>

	</div>

	<style type="text/css">
	<?php
		$BarColor1 = esc_html($options['color1']);
		$BarColor2 = esc_html($options['color2']);
		$timerColor1 =esc_html($options['timer_color1']);
		$timerColor2 =esc_html($options['timer_color2']);
	?>
	.previewColor{
		background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, <?php echo $BarColor1;?>), color-stop(1, <?php echo $BarColor2;?>) );
		background-image: -o-linear-gradient(bottom, <?php echo $BarColor1;?> 0%, <?php echo $BarColor2;?> 100%);
		background-image: -moz-linear-gradient(bottom, <?php echo $BarColor1;?> 0%, <?php echo $BarColor2;?> 100%);
		background-image: -webkit-linear-gradient(bottom, <?php echo $BarColor1;?> 0%, <?php echo $BarColor2;?> 100%);
		background-image: -ms-linear-gradient(bottom, <?php echo $BarColor1;?> 0%, <?php echo $BarColor2;?> 100%);
		background-image: linear-gradient(to bottom, <?php echo $BarColor1;?> 0%, <?php echo $BarColor2;?> 100%);
	}
	.previewNumbersColor{
		background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, <?php echo $timerColor1;?>), color-stop(1, <?php echo $timerColor2;?>) );
		background-image: -o-linear-gradient(bottom, <?php echo $timerColor1;?> 0%, <?php echo $timerColor2;?> 100%);
		background-image: -moz-linear-gradient(bottom, <?php echo $timerColor1;?> 0%, <?php echo $timerColor2;?> 100%);
		background-image: -webkit-linear-gradient(bottom, <?php echo $timerColor1;?> 0%, <?php echo $timerColor2;?> 100%);
		background-image: -ms-linear-gradient(bottom, <?php echo $timerColor1;?> 0%, <?php echo $timerColor2;?> 100%);
		background-image: linear-gradient(to bottom, <?php echo $timerColor1;?> 0%, <?php echo $timerColor2;?> 100%);
	}

</style>
	<?php
	echo ob_get_clean();
}
}