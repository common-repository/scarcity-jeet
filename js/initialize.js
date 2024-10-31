jQuery(document).ready(function($) {
	console.log(wpsjTimerOptions);
	jQuery('body').append(wpsjTimer);
	$wpsj = jQuery("#wpscarcityjeet");
	var barHeight = $wpsj.outerHeight();
       
	                           

	
	if(wpsjTimerOptions.effect_sound){ 
		var audioElement = document.createElement('audio');
		audioElement.setAttribute('src', jQuery("#wpscarcityjeet").data('audio')+".ogg");
		audioElement.setAttribute('src', jQuery("#wpscarcityjeet").data('audio')+".mp3");
	} 
	var paddingPos = (wpsjTimerOptions.position == "top") ? "paddingTop" : "paddingBottom";
        
	wpsjPosition = wpsjTimerOptions.position;

	jQuery('body').animate({paddingPos:barHeight}, wpsjTimerOptions.effect_transition);
        jQuery('body').addClass({paddingPos:barHeight}, wpsjTimerOptions.effect_transition);
      
        
	console.log(paddingPos);
       
	function prependPeriod(){
		if(jQuery("#wpscarcityjeet").hasClass('positionTop')){
			jQuery("#wpsjTimerCnt").find(".countdown-period").each(function(){
				jQuery(this).prependTo(jQuery(this).parent());
			});
		}
	}

	var myOptions = {
		until:new Date(wpsjTimerOptions.endDateString), 
		format :wpsjTimerOptions.format, 
		padZeroes:true, 
		onTick:prependPeriod, 
		timezone:wpsjTimerOptions.tzOffset
	}
	if(wpsjTimerOptions.expiry_action=="redirect"){
		myOptions.expiryUrl = wpsjTimerOptions.expiry_url
	}
	console.log(myOptions);
	jQuery("#wpsjTimerCnt").countdown(myOptions);


	switch(wpsjTimerOptions.effect){
		case "slide":
                   
			setTimeout(function(){
                          
				if(wpsjTimerOptions.effect_sound)audioElement.play();
				var animateOption = new Object;
				animateOption[wpsjTimerOptions.position.toString()] = 0 ;
				$wpsj.animate(animateOption, wpsjTimerOptions.effect_transition);
			}, wpsjTimerOptions.effect_delay);
			break;
                case "fade" :
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
				$wpsj.animate({opacity:1}, wpsjTimerOptions.effect_transition);
			}, wpsjTimerOptions.effect_delay);
                       
			break;
               case "bounce":
			setTimeout(function(){
                           
				if(wpsjTimerOptions.effect_sound)audioElement.play();
                                $wpsj.addClass("animated bounce").animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);    
                        break;
                case "flash":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated flash').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break; 
                case "pulse":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated pulse').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;
                case "rubberBand":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated rubberBand').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break; 
                case "shake":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated shake').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break; 
                case "headShake":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated headShake').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break; 
                case "swing":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated swing').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;
                case "tada":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated tada').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;
		case "wobble":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated wobble').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;
                case "jello":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated jello').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;
                case "bounceIn":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated bounceIn').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;
                case "bounceInDown":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                var animateOption = new Object;
				animateOption[wpsjTimerOptions.position.toString()] = 0 ;
                                $wpsj.addClass('animated bounceInDown').animate(animateOption, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;
                case "bounceInLeft":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                var animateOption = new Object;
				animateOption[wpsjTimerOptions.position.toString()] = 0 ;
                                $wpsj.addClass('animated bounceInLeft').animate(animateOption, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;   
                case "bounceInRight":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                var animateOption = new Object;
				animateOption[wpsjTimerOptions.position.toString()] = 0 ;
                                $wpsj.addClass('animated bounceInRight').animate(animateOption, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;  
                case "bounceInUp":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                var animateOption = new Object;
				animateOption[wpsjTimerOptions.position.toString()] = 0 ;
                                $wpsj.addClass('animated bounceInUp').animate(animateOption, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;  
                case "fadeInDown":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated fadeInDown').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;   
                case "fadeInDownBig":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated fadeInDownBig').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;    
                case "fadeInLeft":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated fadeInLeft').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;     
                case "fadeInLeftBig":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated fadeInLeftBig').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;       
                case "fadeInRight":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated fadeInRight').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;  
                case "fadeInRightBig":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated fadeInRightBig').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;
                case "fadeInUp":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated fadeInUp').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;
                case "flip":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated flip').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;  
                case "flipInX":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                var animateOption = new Object;
				animateOption[wpsjTimerOptions.position.toString()] = 0 ;
                                $wpsj.addClass('animated flipInX').animate(animateOption, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;
                case "flipInY":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                var animateOption = new Object;
				animateOption[wpsjTimerOptions.position.toString()] = 0 ;
                                $wpsj.addClass('animated flipInY').animate(animateOption, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;   
                case "lightSpeedIn":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated lightSpeedIn').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;
                case "rotateIn":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated rotateIn').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;  
                case "rotateInDownLeft":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated rotateInDownLeft').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;    
                case "rotateInDownRight":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated rotateInDownRight').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;      
                case "rotateInUpLeft":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated rotateInUpLeft').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;   
                case "rotateInUpRight":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated rotateInUpRight').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break; 
                case "rollIn":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated rollIn').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;     
                case "zoomIn":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                var animateOption = new Object;
				animateOption[wpsjTimerOptions.position.toString()] = 0 ;
                                $wpsj.addClass('animated zoomIn').animate(animateOption, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;  
                case "zoomInDown":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                var animateOption = new Object;
				animateOption[wpsjTimerOptions.position.toString()] = 0 ;
                                $wpsj.addClass('animated zoomInDown').animate(animateOption, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break; 
                case "zoomInLeft":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                var animateOption = new Object;
				animateOption[wpsjTimerOptions.position.toString()] = 0 ;
                                $wpsj.addClass('animated zoomInLeft').animate(animateOption, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;    
                case "zoomInRight":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                var animateOption = new Object;
				animateOption[wpsjTimerOptions.position.toString()] = 0 ;
                                $wpsj.addClass('animated zoomInRight').animate(animateOption, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;     
                case "zoomInUp":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                var animateOption = new Object;
				animateOption[wpsjTimerOptions.position.toString()] = 0 ;
                                $wpsj.addClass('animated zoomInUp').animate(animateOption, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;     
                case "slideInDown":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated slideInDown').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;     
                case "slideInLeft":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated slideInLeft').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;    
                case "slideInRight":
			setTimeout(function(){
				if(wpsjTimerOptions.effect_sound){ audioElement.play(); }
                                $wpsj.addClass('animated slideInRight').animate({opacity:1}, wpsjTimerOptions.effect_transition);
                                 }, wpsjTimerOptions.effect_delay);
                        break;    
                    
		default:
	}
        
});