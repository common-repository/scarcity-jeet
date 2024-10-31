<?php
$noItemsClass = "";
if(!$options['product_box_show'])$noItemsClass.= " noProductsBox";
if(!$options['show_action_button'])$noItemsClass.= " noActionButton";
?>
<div id="wpscarcityjeet" class="format<?php echo esc_attr($options['format']);?> position<?php echo esc_attr(ucfirst($options['position'])); ?> <?php echo (isset($options['product_box']) &&$options['product_box'] ) ? 'hasProductBox':''; ?> effect<?php echo esc_attr(ucfirst($options['effect'])); ?> <?php echo esc_attr($noItemsClass);?>" data-effect="<?php echo esc_attr($options['effect']);?>" data-audio="<?php echo esc_url(plugins_url('images/notify', __FILE__)); ?>">
	<div class="wrapper">
		<?php if($options['product_box_show']){?>
			<div class="productBoxWrap ">
				<a href="<?php echo esc_url($options['product_box_link']); ?>" class="productBox"><img  src="<?php echo esc_url($options['product_box_image']);?>" alt="box" /></a>
			</div>
		<?php } ?>
		<div class="introText"><p><?php echo esc_html($options['catch_line']); ?></p></div>
		
			<?php if($options['show_action_button']) { ?>
			<div class="subscribe">
				<a href="<?php echo esc_url($options['action_button_link']); ?>" class="buttonLink"><span><?php echo esc_html($options['action_button_text']); ?></span></a>
			</div>
			<?php } ?>
			<div id="wpsjTimerCnt"></div>
		
		<div class="clrB"></div>
	</div>
</div>

	<?php //require("js/init.js.php"); ?>
	<?php //require("css/wpsj-inline.css.php"); ?>