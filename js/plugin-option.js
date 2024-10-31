jQuery(document).ready(function($) {
	function toggleFieldSet(myFS, action, speed){
		myHeight = myFS.data('height');
		if(action=="hide"){
			myFS.animate({height:"40px"}, speed, function(){jQuery(this).addClass("disabled")});
		}else{
			myFS.removeClass('disabled').animate({height:myHeight}, speed);
		}
	}

	function showHideFeildset(myObj, speed){
		myFS = myObj.parent("legend").parent("fieldset");
		if(myObj.is(":checked")){
			toggleFieldSet(myFS, "show", speed);
		}else{
			toggleFieldSet(myFS, "hide", speed);
		}
	}

	jQuery('*[name="wpsj_settings[end_date]"]').appendDtpicker();

	jQuery('.colorField').wpColorPicker({change : function(e, ui){
		var BarColor1 = jQuery("#wpsj_settings\\[color1\\]").wpColorPicker('color');
		var BarColor2 = jQuery("#wpsj_settings\\[color2\\]").wpColorPicker('color');
		var TimerColor1 = jQuery("#wpsj_settings\\[timer_color1\\]").wpColorPicker('color');
		var TimerColor2 = jQuery("#wpsj_settings\\[timer_color2\\]").wpColorPicker('color');
console.log(BarColor1);
		jQuery(".previewColor")
			.css('background-image', '-webkit-gradient(linear, left top, left bottom, color-stop(0, '+BarColor1+'), color-stop(1, '+BarColor2+') )')
			.css('background-image', '-o-linear-gradient(bottom, '+BarColor1+' 0%, '+BarColor2+' 100%)')
			.css('background-image', '-moz-linear-gradient(bottom, '+BarColor1+' 0%, '+BarColor2+' 100%))')
			.css('background-image', '-webkit-linear-gradient(bottom, '+BarColor1+' 0%, '+BarColor2+' 100%)')
			.css('background-image', '-ms-linear-gradient(bottom, '+BarColor1+' 0%, '+BarColor2+' 100%)')
			.css('background-image', 'linear-gradient(to bottom, '+BarColor1+' 0%, '+BarColor2+' 100%)');

		jQuery(".previewNumbersColor")
			.css('background-image', '-webkit-gradient(linear, left top, left bottom, color-stop(0, '+TimerColor1+'), color-stop(1, '+TimerColor2+') )')
			.css('background-image', '-o-linear-gradient(bottom, '+TimerColor1+' 0%, '+TimerColor2+' 100%)')
			.css('background-image', '-moz-linear-gradient(bottom, '+TimerColor1+' 0%, '+TimerColor2+' 100%))')
			.css('background-image', '-webkit-linear-gradient(bottom, '+TimerColor1+' 0%, '+TimerColor2+' 100%)')
			.css('background-image', '-ms-linear-gradient(bottom, '+TimerColor1+' 0%, '+TimerColor2+' 100%)')
			.css('background-image', 'linear-gradient(to bottom, '+TimerColor1+' 0%, '+TimerColor2+' 100%)');
		}
	});

	jQuery("#wpsj_settings\\[effect\\], #wpsj_settings\\[expiry_action\\]").change(function(){
		myFS = jQuery(this).parent("legend").parent("fieldset");
		myHeight = myFS.data('height');
		if(jQuery(this).val()=="none" || jQuery(this).val()=="expired" ){
			myFS.animate({height:"40px"}, 200, function(){jQuery(this).addClass("disabled")});
		}else{
			myFS.removeClass("disabled").animate({height:myHeight}, 200);
		}
	});


	if(jQuery("#wpsj_settings\\[expiry_action\\]").val()!="redirect"){
		myFS = jQuery("#wpsj_settings\\[expiry_action\\]").parent("legend").parent("fieldset");
		toggleFieldSet(myFS, "hide",0);
	}

	jQuery("fieldset.toggles").each(function(){
		myHeight = jQuery(this).css("height","auto").height();
		jQuery(this).css("height", "");
		jQuery(this).data('height', myHeight);
		jQuery(this).children("legend").children("input:checkbox").click(function(){
			showHideFeildset(jQuery(this), 200);
		});
		jQuery(this).children("legend").children("input:checkbox").each(function(){
			showHideFeildset(jQuery(this), 0);
		});
	});

}(jQuery));