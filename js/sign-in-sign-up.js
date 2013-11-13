// JavaScript Document

 	$(window).load(function(){
		$("#slider_1").asyncSlider({
			keyboardNavigate: false,
			autoswitch: 0 * 1000, 
			prevNextNav: false,
		    centerPrevNextNav: false,
		});

	$(".go_to_slide_exit").click(function(ev){
		ev.preventDefault();
		$("#slider_1").asyncSlider("moveToSlide", 1);
	});
	$(".go_to_slide_login").click(function(ev){
		ev.preventDefault();
		$("#slider_1").asyncSlider("moveToSlide", 2);
	});
	$(".go_to_slide_c_signup").click(function(ev){
		ev.preventDefault();
		$("#slider_1").asyncSlider("moveToSlide", 3);
	})
	
	$(".go_to_slide_sign_up_direct").click(function(ev){
		ev.preventDefault();
		$("#slider_1").asyncSlider("moveToSlide", 4);
	})
	$(".go_to_slide_sign_up_direct_c").click(function(ev){
		ev.preventDefault();
		$("#slider_1").asyncSlider("moveToSlide", 3);
	})
	$(".go_to_slide_sign_up_direct_m").click(function(ev){
		ev.preventDefault();
		$("#slider_1").asyncSlider("moveToSlide", 5);
	})
	
	$(".go_to_slide_m_signup").click(function(ev){
		ev.preventDefault();
		$("#slider_1").asyncSlider("moveToSlide", 5);
	})	
	$(".go_to_slide_forgot").click(function(ev){
		ev.preventDefault();
		$("#slider_1").asyncSlider("moveToSlide", 6);
	})
	
	
	<!--Hide login on cart and watching tab click-->
	$(".slide-out-div").click(function(ev){ 
		ev.preventDefault();
		$("#slider_1").asyncSlider("moveToSlide", 1);
	});
	$(".slide-out-div2").click(function(ev){
		ev.preventDefault();
		$("#slider_1").asyncSlider("moveToSlide", 1);
	});
});