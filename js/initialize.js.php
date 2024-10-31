<?php 
	$options = get_option('wpsj_settings');	
	$wpsjTimer = addslashes(wpScarcityJeet_mainwrapper(""));
	$origDate = $options['end_date'];
	$end_date['year'] = (int)date("Y", strtotime($origDate));
	$end_date['month'] = (int)date("m", strtotime($origDate));
	$end_date['day'] = (int)date("d", strtotime($origDate));
	$end_date['hour'] = (int)date("h", strtotime($origDate));
	$end_date['mins'] = (int)date("i", strtotime($origDate));
	$end_date['secs'] = (int)date("s", strtotime($origDate));
	$end_date_string = $end_date['year']. ", " . ($end_date['month'] - 1) . ", " . $end_date['day'] . ", " . $end_date['hour'] . ", " . $end_date['mins'] . ", " . $end_date['secs'];
	$dt = date_create(null, timezone_open($options['timezone']));
	$tzOffset = date_offset_get($dt)/60;
	if($tzOffset>0)$tzOffset = "+".$tzOffset;
?>
<script type="text/javascript">
	wpsjTimer = '<?php echo $wpsjTimer;?>';
	wpsjTimerOptions= {
		effect_transition : <?php echo esc_html((float)($options['effect_transition'])*1000); ?>,
		effect_delay : <?php echo esc_html($options['effect_delay']*1000); ?>,
		endYear : <?php echo esc_html($end_date['year']); ?>,
		endMonth : <?php echo esc_html($end_date['month']); ?>,
		endDay : <?php echo esc_html($end_date['day']); ?>,
		endHour : <?php echo esc_html($end_date['hour']); ?>,
		endMins : <?php echo esc_html($end_date['mins']); ?>,
		endSecs : <?php echo esc_html($end_date['secs']); ?>,
		endDateString : new Date(<?php echo esc_html($end_date_string); ?>),
		tzOffset : "<?php echo esc_html($tzOffset); ?>",
		effect_sound : <?php echo esc_html((strlen($options['effect_sound'])>0)? $options['effect_sound']:0); ?>,
		effect : "<?php echo esc_html($options['effect']); ?>",
		position : "<?php echo esc_html($options['position']); ?>",
		expiry_action : "<?php echo esc_html($options['expiry_action']); ?>",
		expiry_url : "<?php echo esc_html($options['expiry_url']); ?>",
		format : "<?php echo esc_html($options['format']);?>"
	};
</script>
