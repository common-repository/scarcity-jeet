<script type="text/javascript">
jQuery(document).ready(function(){
	var $wpsj = jQuery("#wpscarcityjeet");
	var barHeight = $wpsj.outerHeight();
	<?php if($effect_sound){ ?>
		var audioElement = document.createElement('audio');
		audioElement.setAttribute('src', jQuery("#wpscarcityjeet").data('audio')+".ogg");
                audioElement.setAttribute('src', jQuery("#wpscarcityjeet").data('audio')+".mp3");
	<?php } ?>

	function appendBody(){
		jQuery('body').append($wpsj).animate({padding<?php echo esc_html(ucfirst($position));?>:"+"+barHeight}, <?php echo esc_html($effect_transition); ?>);
                
                
	}
	
	jQuery("#wpsjTimerCnt").countdown({until:new Date("<?php echo esc_html($end_date);?>"), format :"<?php echo esc_html($format);?>", padZeroes:true<?php if($expiry_action == "redirect"){ echo ", expiryUrl:\"".esc_html($expiry_url)."\""; }; ?>, onTick:prependPeriod, timezone:<?php echo esc_html($tzOffset); ?>});//.countdown('pause');
	
	switch("<?php echo esc_html($effect); ?>"){
		case "slide":
			setTimeout(function(){
				appendBody();
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
				$wpsj.animate({<?php echo esc_html($position);?>:0}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
			break;
                        
		case "fade" :
			setTimeout(function(){
				appendBody();
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
				$wpsj.animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
			break;
                case "bounce":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated bounce').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;
                case "flash":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated flash').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break; 
                case "pulse":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated pulse').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;
                case "rubberBand":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated rubberBand').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break; 
                case "shake":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated shake').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break; 
                case "headShake":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated headShake').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break; 
                case "swing":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated swing').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;
                case "swing":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated swing').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;
                case "tada":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated tada').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;
		case "wobble":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated wobble').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;
                case "jello":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated jello').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;
                case "bounceIn":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated bounceIn').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;
                case "bounceInDown":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated bounceInDown').animate({opacity:1}, <?php echo $effect_transition; ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;
                case "bounceInLeft":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated bounceInLeft').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;   
                case "bounceInRight":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated bounceInRight').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;  
                case "bounceInUp":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated bounceInUp').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;  
                case "fadeInDown":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated fadeInDown').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;   
                case "fadeInDownBig":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated fadeInDownBig').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;    
                case "fadeInLeft":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated fadeInLeft').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;     
                case "fadeInLeftBig":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated fadeInLeftBig').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;       
                case "fadeInRight":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated fadeInRight').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;  
                case "fadeInRightBig":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated fadeInRightBig').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;
                case "fadeInUp":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated fadeInUp').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;
                case "flip":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated flip').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;  
                case "flipInX":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated flipInX').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;
                case "flipInY":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated flipInY').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;   
                case "lightSpeedIn":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated lightSpeedIn').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;
                case "rotateIn":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated rotateIn').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;  
                case "rotateInDownLeft":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated rotateInDownLeft').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;    
                case "rotateInDownRight":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated rotateInDownRight').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;      
                case "rotateInUpLeft":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated rotateInUpLeft').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;   
                case "rotateInUpRight":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated rotateInUpRight').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break; 
                case "rollIn":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated rollIn').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;     
                case "zoomIn":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated zoomIn').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;  
                case "zoomInDown":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated zoomInDown').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break; 
                case "zoomInLeft":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated zoomInLeft').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;    
                case "zoomInRight":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated zoomInRight').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;     
                case "zoomInUp":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated zoomInUp').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;     
                case "slideInDown":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated slideInDown').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;     
                case "slideInLeft":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated slideInLeft').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;    
                case "slideInRight":
			setTimeout(function(){
				<?php if($effect_sound){ ?>audioElement.play();<?php } ?>
                                $wpsj.addClass('animated slideInRight').animate({opacity:1}, <?php echo esc_html($effect_transition); ?>);
			}, <?php echo esc_html($effect_delay); ?>);
                        break;          
                        
		default:
			appendBody();
	}


});
function prependPeriod(){
	if(jQuery("#wpscarcityjeet").hasClass('positionTop')){
		jQuery("#wpsjTimerCnt").find(".countdown-period").each(function(){
			jQuery(this).prependTo(jQuery(this).parent());
		});
	}
}
</script>